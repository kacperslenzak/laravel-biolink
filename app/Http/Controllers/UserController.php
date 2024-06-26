<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Models\ProfileSettings;
use App\Models\ProfileView;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(string $username, Request $request): mixed
    {
        $user = User::where('name', $username)->first();

        if(is_null($user)){
            return redirect('/');
        }

        $ip_address = $request->ip();
        $profile_view = ProfileView::firstOrCreate(['user_id' => $user->id, 'viewer_ip' => $ip_address]);

        $links = Links::all()->where('user_id', $user->id);
        $profile_settings = ProfileSettings::all()->where('user_id', $user->id)->first();
        $profile_views = count(ProfileView::where('user_id', auth()->user()->id)->get());

        return view('user.profile', [
            'user' => $user,
            'links' => $links,
            'profile_settings' => $profile_settings,
            'profile_views' => $profile_views
        ]);
    }
}
