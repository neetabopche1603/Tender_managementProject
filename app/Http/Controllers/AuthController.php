<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __index(){
        return view('login');
    }

    public function __login(Request $request){ 

        $check = Admin::where('email',$request->email)->first();
        if ($check && Hash::check($request->password, $check->password)) {
             session()->put('user_name', $check->email);
             session()->put('name', $check->name);
             session()->put('type','admin');
            // Session::put('user_name', $check->email);
            return redirect()->route('admin.dashboard')->with('success','Dear, '.$check->name.' Admin have Successfully Login...');
        } else {
            return redirect()->route('login')->with('faild','Opps! You have entered invalid credentials');
        }
    }

    public function __userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            session()->put('user_name', Auth()->user()->email);
            session()->put('name', Auth()->user()->emp_name);
            session()->put('type','user');
            return redirect()->route('admin.dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("user")->withSuccess('Login details are not valid');
    }
    }

