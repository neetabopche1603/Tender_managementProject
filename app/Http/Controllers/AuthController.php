<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __index(){
        return view('login');
    }

    public function __login(Request $request){ 

        $check = Admin::where('email',$request->email)->where('type',0)->first();
        if ($check && Hash::check($request->password, $check->password)) {
             $request->session()->put('user_name', $check->email);
            // Session::put('user_name', $check->email);
            return redirect()->route('admin.dashboard')->with('msg','Admin have Successfully Login...');

        } else {
            return redirect()->route('login')->with('msg','Oppes! You have entered invalid credentials');
        }
    }
    }

