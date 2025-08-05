<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;

class MonitoringController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index()
    {
        // Example: read from Firestore
        $firestore = $this->firebase->getFirestore();
        $collection = $firestore->collection('pechay_scans');
        $documents = $collection->documents();

        // Example: read from RTDB
        $rtdb = $this->firebase->getRTDB();
        $data = $rtdb->getReference('pechay_monitoring')->getValue();

        return view('pages.index', compact('documents', 'data'));
    }
}
