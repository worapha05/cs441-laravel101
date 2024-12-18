<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CS441 - Songs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen w-screen bg-gradient-to-l from-gray-200 via-fuchsia-200 to-stone-100">

<x-layouts.nav-bar></x-layouts.nav-bar>
{{--<div class="mt-8">--}}
{{--    @foreach($songs as $song)--}}
{{--        <x-songs.track :song="$song"></x-songs.track>--}}
{{--    @endforeach--}}
{{--</div>--}}
{{ $slot }}
</body>
</html>
