<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\FirebaseService;
use Kreait\Firebase\Exception\Auth\InvalidCustomToken;

class FirebaseAuth
{
    protected \Kreait\Firebase\Auth $auth;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->auth = $firebaseService->getAuth();
    }

    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken() ?? session('firebase_token');

        if (!$token) {
            return redirect()->back()->withErrors(['auth' => 'Access Denied: No token provided']);
        }

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($token);
            $request->attributes->set('firebase_user', $verifiedIdToken->claims()->all());
        } catch (InvalidCustomToken $e) {
            return redirect()->back()->withErrors(['auth' => 'Access Denied: Invalid Token. Please log in.']);
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['auth' => 'Access Denied: Invalid Token. Please log in.']);
        }

        return $next($request);
    }
}
