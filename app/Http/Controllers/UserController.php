<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;
use Google\Cloud\Firestore\FirestoreClient;

class UserController extends Controller
{
    protected FirestoreClient $firestore;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firestore = $firebaseService->getFirestore();
    }

    public function getUsers(Request $request)
    {
        $search = $request->input('search');
        $collection = $this->firestore->collection('users');
        $documents = $collection->documents();

        $users = [];
        foreach ($documents as $doc) {
            if ($doc->exists()) {
                $data = $doc->data();
                $data['id'] = $doc->id();
                $data['first_name'] = $data['first_name'] ?? null;
                $data['middle_initial'] = $data['middle_initial'] ?? null;
                $data['last_name'] = $data['last_name'] ?? null;
                $data['age'] = $data['age'] ?? null;
                $data['sex'] = $data['sex'] ?? null;
                $data['email'] = $data['email'] ?? null;
                $data['address'] = $data['address'] ?? null;
                $data['profile_picture'] = $data['profile_picture'] ?? null;

                if ($search) {
                    $name = strtolower($data['first_name'] . ' ' . ($data['middle_initial'] ?? '') . ' ' . $data['last_name']);
                    if (str_contains(strtolower($name), strtolower($search))) {
                        $users[] = $data;
                    }
                } else {
                    $users[] = $data;
                }
            }
        }

        return view('pages.users.users', [
            'users' => $users,
            'search' => $search
        ]);
    }

    public function view($id)
    {
        $docRef = $this->firestore->collection('users')->document($id);
        $snapshot = $docRef->snapshot();

        if ($snapshot->exists()) {
            $user = $snapshot->data();
            $user['id'] = $snapshot->id();
            return view('user-info-view', compact('user'));
        }

        abort(404, 'User not found.');
    }

    public function getUserById($id)
    {
        $docRef = $this->firestore->collection('users')->document($id);
        $snapshot = $docRef->snapshot();

        if ($snapshot->exists()) {
            $user = $snapshot->data();
            $user['id'] = $snapshot->id();
            return view('pages.users.view-user-info', compact('user'));
        }

        abort(404, 'User not found.');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'middle_initial' => 'nullable|string',
            'last_name' => 'required|string',
            'age' => 'required|integer',
            'sex' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'profile_picture' => 'nullable|url',
        ]);

        $this->firestore->collection('users')->add($validated);

        return redirect()->route('users')->with('success', 'User added successfully.');
    }

    public function updateUser(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'middle_initial' => 'nullable|string',
            'last_name' => 'required|string',
            'age' => 'required|integer',
            'sex' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'profile_picture' => 'nullable|url',
        ]);

        $this->firestore->collection('users')->document($id)->set($validated);

        return redirect()->route('users')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $this->firestore->collection('users')->document($id)->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully.');
    }
}
