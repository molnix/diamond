<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('styles/profile.css')}}">
    @include('linkHead')
    <script src="{{asset('js/jquery.validate.min.js')}}" defer></script>
    <title>Алмаз</title>
</head>
<body id="Body" class="body">

