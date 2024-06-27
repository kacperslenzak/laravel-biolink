<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/{username}', [UserController::class, 'show']);

Route::get('/image/{username}', [\App\Http\Controllers\MetaImageController::class, 'show']);
