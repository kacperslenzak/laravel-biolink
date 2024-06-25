<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Models\ProfileSettings;
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

        $links = Links::all()->where('user_id', $user->id);
        $profile_settings = ProfileSettings::all()->where('user_id', $user->id)->first();

        return view('user.profile', [
            'user' => $user,
            'links' => $links,
            'profile_settings' => $profile_settings
        ]);
    }
}
