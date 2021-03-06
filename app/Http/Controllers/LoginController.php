<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class LoginController extends Controller
{
    public function login(Request $request){

    	

    	//attempt to authenticate the user

    	if(Auth::attempt([

    		'email'=>$request->email,
    		'password'=>$request->password
    	]))
    		//if the above auth method is true,find the user
    	{
    		$user=User::where(['email'=>$request->email,'Verifytoken'=>null])->first();//use email to find the user since emails are unique in the database
    		if($user->admin()){ //check whether user is admin.
    			return redirect()->route('admin.index');//re-direct to the admin dashboard
    		}else{

    		return redirect()->route('home');//user is an applicant redirect to the home page.
    	}
            Session::flash('alert-danger','User not verified!');

        return redirect()->route('login');
        
    }

    	//if the authentixcation i not successful,redirect the user back

    	

    }
}
