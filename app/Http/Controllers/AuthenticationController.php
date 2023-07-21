<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Models\Auth\BaseUser;
use App\Models\Auth\Userhype;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{

    public $successStatus = 200;

		public function loginhype(){
			if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
				$user = Auth::user();
				$success['token'] =  $user->createToken('nApp')->accessToken;
				return response()->json(['success' => $success], $this->successStatus);
			}
			else{
				return response()->json(['error'=>'Unauthorised'], 401);
			}
		}


    // public function login()
    // {
    //     if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
    //         $user = Auth::user();
    //         $success['token'] = $user->createToken('appToken')->accessToken;
    //        //After successfull authentication, notice how I return json parameters
    //         return response()->json([
    //           'success' => true,
    //           'token' => $success,
    //           'user' => $user
    //       ]);
    //     } else {
    //    //if authentication is unsuccessfull, notice how I return json parameters
    //       return response()->json([
    //         'success' => false,
    //         'message' => 'Invalid Email or Password',
    //     ], 401);
    //     }
    // }
    
    // public function loginhype(Request $request) {

     
    //         $request->validate([
    //             'email'  => 'required|email',
    //             'password'  => 'required',
    //         ]);

    //         $user  = User::where('email', $request->email)->first();

    //         if (! $user || ! Hash::check($request->password, $user->password)) {
    //             throw ValidationException::withMessages([
    //                 'email'  => ["The Provided credentials are incorrect."],
    //             ]);
    //         }

    //         $test = $user->createToken("user login")->plainTextToken;
         
    //         return $test;


        
    // }
}
