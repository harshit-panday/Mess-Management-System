<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminRegister()
    {
        return view('admin.AdminRegister');
    }

    public function AdminProcessRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:admins', // Make sure to use the correct table name
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.AdminRegister')->withInput()->withErrors($validator);
        }

        // Save the new admin
        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->save();

        // Redirect to a success page or the admin dashboard
        return redirect()->route('admin.adminLogin')->with('success', 'Admin registered successfully');
    }

    public function login(){
        return view('admin.adminLogin');
    }

    public function adminAuthenticate(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if($validator -> fails()){
            return redirect()->route('admin.adminLogin')->withInput()->withErrors($validator);
        }
            
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('admin.adminProfile');
        }else{
            return redirect()->route('admin.adminLogin')->with('error','Either Email/Password is incorrect');
        }
    }
    public function adminProfile(){
        return view('admin.adminProfile');
    }

}
