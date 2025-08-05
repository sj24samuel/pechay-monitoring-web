<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Contract\Database;
use Google\Cloud\Firestore\FirestoreClient;

class FirebaseService
{
    protected Auth $auth;
    protected Database $database;
    protected FirestoreClient $firestore;

    public function __construct()
    {
        $serviceAccountPath = storage_path('app/firebase/firebase-credential.json');
        $projectId = 'drpechay-2025'; // ✅ Replace with your actual Firebase Project ID

        $factory = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL', 'https://drpechay-2025-default-rtdb.firebaseio.com/'));

        $this->auth = $factory->createAuth();
        $this->database = $factory->createDatabase();

        // ✅ Create FirestoreClient manually (Google Cloud SDK, not Kreait)
        $this->firestore = new FirestoreClient([
            'keyFilePath' => $serviceAccountPath,
            'projectId' => $projectId,
        ]);
    }

    public function getAuth(): Auth
    {
        return $this->auth;
    }

    public function getDatabase(): Database
    {
        return $this->database;
    }

    public function getFirestore(): FirestoreClient
    {
        return $this->firestore;
    }
}
