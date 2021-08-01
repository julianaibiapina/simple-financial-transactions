<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth:users');
    }
    
    public function getAuthenticatedUser(){
        return response()->json(Auth::guard('users')->user());
    }   
}
