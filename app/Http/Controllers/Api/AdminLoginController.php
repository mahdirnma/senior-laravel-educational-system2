<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginAdminRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $token=Auth::guard('api_admin')->user()->createToken('auth_token')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => Auth::guard('api_admin')->user(),
        ]);
    }
}
