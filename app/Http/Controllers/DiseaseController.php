<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;

class DiseaseController extends Controller
{
    protected $firestore;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firestore = $firebaseService->getFirestore();
    }

    public function index()
    {
        $collection = $this->firestore->collection('detection_results')->documents();
        $results = [];

        foreach ($collection as $doc) {
            if ($doc->exists()) {
                $data = $doc->data();
                $data['id'] = $doc->id();

                // Resolve user name from userId
                $userId = $data['userId'] ?? null;
                if ($userId) {
                    $userSnapshot = $this->firestore->collection('users')->document($userId)->snapshot();
                    if ($userSnapshot->exists()) {
                        $userData = $userSnapshot->data();
                        $first = $userData['first_name'] ?? '';
                        //$middle = $userData['middle_initial'] ?? '';
                        $last = $userData['last_name'] ?? '';
                        $data['user_name'] = trim("$first  $last");
                    } else {
                        $data['user_name'] = 'Unknown User';
                    }
                } else {
                    $data['user_name'] = 'No User ID';
                }

                $results[] = $data;
            }
        }

        return view('pages.disease.index', compact('results'));
    }

    public function view($id)
    {
        $doc = $this->firestore->collection('detection_results')->document($id)->snapshot();

        if ($doc->exists()) {
            $data = $doc->data();
            $data['id'] = $doc->id();

            // Add user name in view page too
            $userId = $data['userId'] ?? null;
            if ($userId) {
                $userSnapshot = $this->firestore->collection('users')->document($userId)->snapshot();
                if ($userSnapshot->exists()) {
                    $userData = $userSnapshot->data();
                    $first = $userData['first_name'] ?? '';
                    $middle = $userData['middle_initial'] ?? '';
                    $last = $userData['last_name'] ?? ',';
                    $data['user_name'] = trim("$first $middle $last");
                } else {
                    $data['user_name'] = 'Unknown User';
                }
            } else {
                $data['user_name'] = 'No User ID';
            }

            return view('pages.disease.view', compact('data'));
        } else {
            abort(404, 'Detection result not found.');
        }
    }
}
