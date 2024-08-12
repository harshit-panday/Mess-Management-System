<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function register(){
        return view('account.register');
    }

    public function processRegister(Request $request){
        $validator=Validator::make($request->all(),[
        'name'=>'required|min:3',
        'email'=>'required|email|unique:users',
        'password'=>'required|confirmed|min:5',
        'password_confirmation'=>'required']);

        if($validator->fails()){
            return redirect()->route('account.register')->withInput()->withErrors($validator);
        }

        //Now Register User
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->role='user';
        $user->save();

        return redirect()->route('account.login')->with('success','you have registered successfully.');

    }

    public function login(){
        return view('account.login');
    }

    public function authenticate(Request $request){
        $validator= Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if($validator->fails()){
            return redirect()->route('account.login')->withInput()->withErrors($validator);
        }

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('account.profile');
        }
        else{
            return redirect()->route('account.login')->with('error','Either email/password is incorrect.');
        }
    }

    public function profile(){
        $user=User::find(Auth::user()->id);
        // dd($user);
        
        return view('account.profile');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }



// /***********user profile update *******************

public function loadAllUsers() {
    // Fetch the authenticated user
    $all_users = Auth::user();

    // Check if the user is authenticated
    if (!$all_users) {
        return redirect()->route('account.login')->with('error', 'You need to login first.');
    }

    // Return the view with the user data
    return view('users', compact('all_users'));
}

public function EditUser(Request $request){
    //update user here
    $request->validate([
        'name'=> 'required| string',
        'email'=> 'required| email',
        'mess'=>'string',
        'location'=>'string',
        'phone'=>'string',
        // 'password'=> 'required| confirmed| min:4| max:8',
    ]);

    try{
        //update user here
        $update_user = User::where('id',$request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'mess_name'=>$request->mess_name,
            'location'=>$request->location,
            'phone'=>$request->phone,
        ]);
        
        return redirect('/users')->with('success','user updated successfully');
    } catch(\Exception $e){
        return redirect('/add/user')->with('fail', $e->getMessage());

    }
}

public function loadEditForm($id){
    $user = User::find($id);

    return view('edit-user', compact('user'));
}



}
