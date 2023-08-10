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
}
