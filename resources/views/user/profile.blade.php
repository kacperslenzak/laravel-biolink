@extends('layouts.layout')

@section('title')
    {{ $user->name }}
@endsection

@section('body')
    <div class="wrapper">
        <div class="profile position-relative">
            <h1>{{ $user->name }}</h1>
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
@endsection
