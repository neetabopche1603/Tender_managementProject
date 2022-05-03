<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __index()
    {
        $users = User::all();
        return view('user-register.users', compact('users'));
    }

    public function __userForm()
    {
        return view('user-register.add');
    }

    public function __store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all()); 
        // die;
        // echo "</pre>";

        $validator = Validator::make(
            $request->all(),
            [
                'emp_name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:6|max:8',
                'password_confirm' => 'required|same:password',
                'contact_no' => 'required|min:10|max:10|regex:/[6789][0-9]{9}/|unique:users,contact_no',
                'designation' => 'required',
                'address_line1' => 'required',
                'city' => 'required',
                'state' => 'required',
                'pincode' => 'required|min:6|max:6',
                'country' => 'required',
            ],
        );

        if ($validator->fails()) {
            return redirect('admin/user/user-register')
                ->withErrors($validator)
                ->withInput();
        }
        $fulladdress = $request->address_line1 . ',' . $request->address_line2 . ',' . $request->city . ',' . $request->state . ',' . $request->pincode . ',' . strtoupper($request->country);
        $storeUser = new User;

        $storeUser->emp_name = $request->emp_name;
        $storeUser->email  = $request->email ;
        $storeUser->password = Hash::make($request->password);
        $storeUser->contact_no  = $request->contact_no ;
        $storeUser->designation = $request->designation;
        $storeUser->address = $fulladdress;

        $storeUser->save();

        return redirect()->route('user.register')->with('success',$request->emp_name.' Register Successfully...');
    }

    public function __userEditForm($id){
        $editUsers = User::find($id);
        return view('user-register.edit',compact('editUsers'));
    }

    public function __update(Request $request){
        $update = User::find($request->id);
        $update->emp_name = $request->emp_name;
        $update->email  = $request->email;
        if ($request->password != '') {
            $update->password = Hash::make($request->password);
        }

        $update->contact_no = $request->contact_no;
        $update->designation  = $request->designation;
        $update->address  = $request->address;
        $update->update();

        return redirect()->route('user.register')->with('success',$request->emp_name.' Updated Successfully.....');

    }

    public function __deleteUser($uid){
        $deleteTender = User::find($uid)->delete();
        return redirect('admin/user/user-register')->with('success', ' User Successfully Deleted.....');
    }
}
