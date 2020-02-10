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
    {{--<link href="{{ asset('css/reset.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body>

<div id="app">
    <header-component></header-component>
    <router-view></router-view>
    <footer-component></footer-component>
</div>
<script src="{{ asset('js/app.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="js/googleTr.js"></script>
<script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script>
</body>
</html>