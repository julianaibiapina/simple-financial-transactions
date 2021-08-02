<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    public function login(Request $request){
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $model = User::where('email', '=', $request->input('email'))->first();

        if(!$model){
            return response()->json(['message' => 'Email não cadastrado no sistema'], 401);
        }

        if(!Hash::check($request->input('password'), $model->password)){
            return response()->json(['message' => 'Senha incorreta'], 401);
        }

        $token = $model->createToken('user');

        return response()->json([
            'access_token' => $token->accessToken,
            'expires_at'   => $token->token->expires_at
        ], 200);
        

    }
}
