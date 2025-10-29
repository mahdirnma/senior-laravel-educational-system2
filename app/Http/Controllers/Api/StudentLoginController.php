<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginAdminRequest $request)
    {
        $user=Student::where('email',$request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            $token=$user->createToken('student-token')->plainTextToken;
            return response()->json([
                'token'=>$token,
                'user'=>$user,
            ]);
        }
        return response()->json('Unauthorize',401);

    }
}
