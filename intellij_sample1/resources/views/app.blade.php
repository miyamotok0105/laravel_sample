<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 追加 -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- 追加 -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Laravel</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<!-- コンポーネントの配置 -->
<div id="app">
    <div class="container">
        <router-view></router-view>
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>