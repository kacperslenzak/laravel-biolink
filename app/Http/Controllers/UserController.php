<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(string $username): mixed
    {
        $user = User::where('name', $username)->first();
        if(is_null($user)){
            return redirect('/');
        }

        return view('user.profile', [
            'user' => $user
        ]);
    }
}
