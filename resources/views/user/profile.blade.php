@extends('layouts.layout')

@section('title')
    {{ $user->name }}
@endsection

@section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>@hex419</title>
    <meta name="description" content="fraud.cool #1 bio link">
    <meta content="website" property="og:type">
    <meta content="{{'@'}}{{ $user->name }} | fraud.lol" property="og:title">
    <meta content="" property="og:description">
    <meta content="{{'@'}}{{ $user->name }} | fraud.cool" name="author">
    <meta content="#FFFFFF" name="theme-color">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="og:image" content="{{ url('image/'.$user->name) }}">
@endsection

@section('body')
    <div class="wrapper">
        <div class="profile position-relative">
            <div class="profile-username">
                <h1 class="@if($profile_settings->username_glow) username-glow @endif @switch($profile_settings->username_effect) @case(0) rainbow-text @break @case(1) red-sparkles @break @endswitch">{{ $user->name }}</h1>
            </div>
            <h4 class="text-white-50 font-bold">UID: {{ $user->id }}</h4>
            @isset($profile_settings->description)
                <p class="text-white-50 mt-3">{{ $profile_settings->description }}</p>
            @endisset
            <div class="icons mt-3 text-center">
                @foreach($links as $link)
                    <a href="//{{$link->link_url}}" target="_blank">
                        <i class="{{ $link->icon_class() }} text-white"></i>
                    </a>
                @endforeach
            </div>

            <div class="profile-views text-white position-absolute">
                <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5"></path></svg> <span>{{ $profile_views }}</span></p>
            </div>

        </div>
    </div>

    <style>
        .profile {
            background-color: rgba(27, 27, 27, {{ $profile_settings->profile_opacity }}%) !important;
        }

        @if($profile_settings->badge_glow)
        .wrapper .profile i {
            text-shadow: 0 0 16.5px #fff;
        }
        @endif
    </style>
@endsection
