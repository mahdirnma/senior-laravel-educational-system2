<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\LoginStudentRequest;
use App\Http\Requests\LoginTeacherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function studentsLoginForm()
    {
        return view('auth.student.login');
    }
    public function studentsLogin(LoginStudentRequest $request){
        $myData = $request->only(['email', 'password']);
        if (!Auth::guard('students')->attempt($myData)) {
            return redirect()->route('student.login.form');
        }

        return redirect()->route('student.dashboard');
    }

    public function teachersLoginForm()
    {
        return view('auth.teacher.login');
    }
    public function teachersLogin(LoginTeacherRequest $request){
        $myData = $request->only(['email', 'password']);
        if (!Auth::guard('teachers')->attempt($myData)) {
            return redirect()->route('teacher.login.form');
        }
        return redirect()->route('teacher.dashboard');
    }
    public function adminLoginForm(){
        return view('auth.admin.login');
    }

    public function adminLogin(LoginAdminRequest $request)
    {
        $myData= $request->only(['email', 'password']);
        if (!Auth::guard('admin')->attempt($myData)) {
            return redirect()->route('admin.login.form');
        }
        return redirect()->route('admin.dashboard');
    }
    public function studentsLogout(){
        Auth::guard('students')->logout();
        return redirect()->route('student.login.form');
    }
    public function teachersLogout(){
        Auth::guard('teachers')->logout();
        return redirect()->route('teacher.login.form');
    }
    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.form');
    }
}
