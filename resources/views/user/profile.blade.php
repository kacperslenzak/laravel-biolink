@extends('layouts.layout')

@section('title')
    {{ $user->name }}
@endsection

@section('body')
    <div class="wrapper">
        <div class="profile">
            <h1>{{ $user->name }}</h1>
            @isset($profile_settings->description)
                <p class="text-white-50">{{ $profile_settings->description }}</p>
            @endisset
            <p class="text-white-50"></p>
            <div class="icons mt-3 text-center">
                @foreach($links as $link)
                    <a href="//{{$link->link_url}}" target="_blank">
                        <i class="{{ $link->icon_class() }} text-white"></i>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
@endsection
