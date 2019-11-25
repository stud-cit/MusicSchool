<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>School</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200i,300,400,600,600i,800,800i,900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body>

<div id="app">
    <header-component></header-component>
    <router-view></router-view>
</div>

<script src="{{ asset('js/app.js')}}"></script>

</body>
</html>