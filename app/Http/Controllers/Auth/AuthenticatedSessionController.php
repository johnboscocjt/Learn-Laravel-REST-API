<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller{
    /**
     * Handle an incoming authentication request.
     */

    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return response()->noContent();

        // get authenticated user
        $user = auth()->user();

        return response()->json([
            'success' => true,
            'data' => [
                'token' => $user->createToken($user->name())->plainTextToken,
                'name' => $user->name(),
            ],
            'message' => 'Login successful, User logged in',

        ]);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
