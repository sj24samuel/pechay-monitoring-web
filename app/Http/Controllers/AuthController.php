<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Exception\Auth\SignIn\FailedToSignIn;
use Illuminate\Http\Request;
use App\Services\FirebaseService;

class AuthController extends Controller
{
    protected $firebaseAuth;
    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseAuth = $firebaseService;
    }
    public function index()
    {
        return view('pages.auth.login');
    }
    public function reset()
    {
        return view('pages.auth.reset-password');
    }
    public function viewProfile()
    {
        return view('pages.auth.user-profile');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            $auth = $this->firebaseAuth->getAuth();
            $signInResult = $auth->signInWithEmailAndPassword($request->email, $request->password);

            $user = $signInResult->data();
            $idToken = $signInResult->idToken();

            session([
                'firebase_token' => $idToken,
                'firebase_user' => [
                    'uid' => $user['localId'] ?? null,
                    'email' => $user['email'] ?? null,
                    'name' => $user['displayName'] ?? 'User',
                ]
            ]);

            return redirect('/dashboard')->with('success', 'Login successful!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['login' => 'Invalid email or password']);
        }
    }
    public function logout(Request $request)
    {
        try {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            session()->forget(['firebase_token', 'firebase_user']);
            return redirect('/login')->with('success', 'Logged out successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['logout' => 'Something went wrong while logging out.']);
        }
    }
}
