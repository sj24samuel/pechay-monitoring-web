<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;
use Carbon\Carbon;

class DashboardController extends Controller
{
    protected $firestore;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firestore = $firebaseService->getFirestore();
    }

    public function index()
    {
        return view('pages.layout.index');
    }

    public function getCharts(Request $request)
    {
        $detectionCollection = $this->firestore->collection('detection_results');
        $userCollection = $this->firestore->collection('users');

        $diseaseNames = [];
        $diseaseTrends = [];

        foreach ($detectionCollection->documents() as $doc) {
            $data = $doc->data();
            if (isset($data['disease'])) {
                $diseaseNames[] = $data['disease'];
            }
            if (isset($data['timestamp'])) {
            try {
                if (is_object($data['timestamp']) && method_exists($data['timestamp'], 'seconds')) {
                    $timestamp = Carbon::createFromTimestamp($data['timestamp']->seconds);
                } else {
                    $timestamp = Carbon::parse($data['timestamp']); // fallback for string dates
                }

                $date = $timestamp->format('Y-m-d');
                $diseaseTrends[$date] = ($diseaseTrends[$date] ?? 0) + 1;
                } catch (\Exception $e) {
                    \Log::error("Timestamp parsing failed: " . $e->getMessage());
                }
            }

        }

        $userAges = [];
        $userCount = 0;

        foreach ($userCollection->documents() as $doc) {
            $data = $doc->data();
            if (isset($data['age'])) {
                $userAges[] = $data['age'];
            }
            $userCount++;
        }

        if ($request->wantsJson()) {
            return response()->json([
                'pieAge' => array_count_values($userAges),
                'barUserCount' => $userCount,
                'pieDisease' => array_count_values($diseaseNames),
                'lineDiseaseTrend' => $diseaseTrends,
            ]);
        }

        return view('pages.dashboard.dashboard');
    }
}
