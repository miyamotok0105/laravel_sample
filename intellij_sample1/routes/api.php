<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Database\Eloquent\Model;

//追加
// URLが/api/monstersでコントローラ実行
Route::resource('monsters', 'MonsterController');

Route::resource('articles', 'ArticleController');

Route::resource('chatlist', 'ChatListController');

//挨拶クラス
use App\Services\GreetService;
Route::get('greet/', function(GreetService $greet){
    return $greet->getMessage();
});
//挨拶クラス
Route::get('greet/v2', 'GreetController@getMessage');
//挨拶クラス　国別
Route::get('greet/v2/{country}', 'GreetController@getMessageByCountry');

Route::post('greet/v2', 'GreetController@postMessage');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//GET /api/articles で、記事5件をJsonで返す。
//Route::group(['middleware' => 'api'], function() {
//    Route::get('articles',  function() {
//        $articles = Article::all()->take(5);
//        return $articles;
//    });
//});

