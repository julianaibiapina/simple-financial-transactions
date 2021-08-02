<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth:users');
    }
    
    public function getAuthenticatedUser(){
        return response()->json(Auth::guard('users')->user());
    }   

    public function getUsers()
    {
    
        $users = User::all();

        // $teste = Gate::alows('make-transaction', $user);

        return $users;
    }
}
