<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}">
    @hasSection('title')
        <title>@yield('title') | fraud.cool</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    @yield('head')

    @vite(['resources/sass/app.scss'])
</head>
<body>
    @yield('body')
</body>
</html>
