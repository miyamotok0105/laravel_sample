<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>
    こんにちは！
    @if (Auth::check())
        {{ \Auth::user()->name }}さん<br />
        <a href="/auth/logout">ログアウト</a>
    @else
        ゲストさん<br />
        <a href="/auth/login">ログイン</a><br />
        <a href="/auth/register">会員登録</a>
    @endif
    </body>
</html>
