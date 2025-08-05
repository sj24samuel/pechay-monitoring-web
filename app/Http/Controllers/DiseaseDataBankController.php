<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;
use Google\Cloud\Firestore\FirestoreClient;

class DiseaseDataBankController extends Controller
{
    protected FirestoreClient $firestore;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firestore = $firebaseService->getFirestore();
    }

public function index(Request $request)
{
    $search = $request->input('search');

    $diseasesRef = $this->firestore->collection('disease_info');
    $documents = $diseasesRef->documents();

    $diseases = [];
    foreach ($documents as $doc) {
        $data = $doc->data();
        $data['id'] = $doc->id();

        // Simple case-insensitive search by disease name
        if (!$search || stripos($data['disease_name'], $search) !== false) {
            $diseases[] = $data;
        }
    }

    return view('pages.diseasedata.databank', compact('diseases'));
}


    public function show($id)
    {
        $docRef = $this->firestore->collection('disease_info')->document($id);
        $snapshot = $docRef->snapshot();

        if (!$snapshot->exists()) {
            abort(404, 'Disease not found');
        }

        $disease = $snapshot->data();
        $disease['id'] = $snapshot->id();

        return view('pages.diseasedata.view', compact('disease'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'disease_name' => $request->input('disease_name'),
            'symptoms' => array_filter(explode("\n", $request->input('symptoms'))),
            'condtion' => array_filter(explode("\n", $request->input('condtion'))),
            'control' => array_filter(explode("\n", $request->input('control'))),
            'references' => array_filter(explode("\n", $request->input('references'))),
        ];

        $this->firestore->collection('diseases')->document($id)->set($data);

        return redirect()->route('disease.databank')->with('success', 'Disease updated successfully!');
    }
    public function edit($id)
    {
        $docRef = $this->firestore->collection('disease_info')->document($id);
        $snapshot = $docRef->snapshot();

        if (!$snapshot->exists()) {
            abort(404, 'Disease not found');
        }

        $disease = $snapshot->data();
        $disease['id'] = $snapshot->id();

        return view('pages.diseasedata.edit', compact('disease'));
    }

}
