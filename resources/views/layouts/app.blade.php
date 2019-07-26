<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- font --}}
    <link href="https://fonts.googleapis.com/css?family=Fascinate&display=swap" rel="stylesheet">
    {{-- icons --}}
    <script src="https://kit.fontawesome.com/3b4174c44f.js"></script>
    {{-- styles --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{config('app.name', 'CheckInn')}}</title>
</head>
<body>
    
    @include('inc.navbar')

    @yield('content')
    <div id="app"></div>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
