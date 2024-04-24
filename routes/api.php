<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', function(Request $request){
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ],[
        "email.email" => "email é inválido!"
    ]);

    if (Auth::attempt($credentials)) {

        $user = User::find( Auth::user()->id );
        $token = $user->createToken('my-token');

        return response()->json(['token' => $token->plainTextToken]);
    }

    return response()->json([
        "message" => "Usuário ou senha inválido"
    ], 401);
});

Route::post("/logout", function(Request $request){

    $request->user()->currentAccessToken()->delete();
    return response()->json("Token revogado com sucesso!", 200);
})->middleware('auth:sanctum');

