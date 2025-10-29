<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginAdminRequest $request)
    {
        $user=Teacher::where('email',$request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            $token=$user->createToken('teacher-token')->plainTextToken;
            return response()->json([
                'token'=>$token,
                'user'=>$user,
            ]);
        }
/*        $token=Auth::guard('api_teachers')->user()->createToken('auth_token')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => Auth::guard('api_teachers')->user(),
        ]);*/
    }
}
