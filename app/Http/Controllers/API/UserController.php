<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    // Login API

    public function login(){
      if(Auth::attempt(['email'=> request('email'), 'password' => request('password')])){
        $user = Auth::user();
        $success['token'] = $user -> ceateToken("Personal access token")->accessToken;
        return response() -> json(['success' => $success], $this->successStatus);
      }
      else {
        return response()->json(['error' => 'Unathorized'], 401);
      }
    }
}
