<?php

use Illuminate\Support\Facades\Route;

use Laravel\Socialite\Facades\Socialite;


Route::get('/', function () {
    return view('welcome');
});

Route::get("auth/google/redirect",function(){
    return Socialite::driver('google')->redirect();
})->name("google.auth");

Route::get("auth/google/callback",function(){
    $user = Socialite::driver('google')
    ->user();
   $userData = [
    'name' => $user->getName(),
    'email' => $user->getEmail(),
    
    ];
    return response()->json($userData);
})->name("google.auth.redirect");
