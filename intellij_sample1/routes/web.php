<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use App\Author;
//
//Route::get('/', function () {
//
//    //テスト
//    $flights = App\Author::all();
//    foreach ($flights as $flight) {
//        echo $flight->name;
//    }
//
//    return view('welcome');
//});


// /api/* 以外の全てのリクエストに対して、 resources/views/app.blade.php を返す
// vue側でルーティングする場合は、Laravel側でのルーティングをやめる処理を書く。
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');

