<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            "email.email" => "email é inválido!"
        ]);

        if (Auth::attempt($credentials)) {

            $user = User::find( Auth::user()->id );
            $token = $user->createToken('my-token');

            return response()->json(['accessToken' => $token->plainTextToken]);
        }

        return response()->json([
            "message" => "Credenciais inválidas"
        ], 401);

    }

    public function logout(Request $request){

        $request->user()->currentAccessToken()->delete();
        return response()->json("Token revogado com sucesso!", 200);
    }
}
