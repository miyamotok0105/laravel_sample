
# Intellijのサンプル

## WIP

MonsterControllerで動きが確認できてない部分がある。
GreetControllerがエラーの状態。リポジトリやサービスに分離しようとしてエラー中。Monsterの実装を真似すると良い。    


## バージョン

```
mac book
php:5.6.30
composer:1.8.6
laravel:v5.4.36
```

初めはこれを叩いた。

```
composer create-project laravel/laravel=5.5 intellij_sample1
```

git cloneした時はこちらを設定する。


```
#初期設定時
composer install
php artisan migrate
php artisan db:seed

#環境変数がない場合
cp .env.example .env
#keyがない場合
php artisan key:generate
#vue側を入れる
npm install
ビルド
npm run dev
#起動
php artisan serve
```


## マイグレート

### sqliteの場合のマイグレート

sqliteは簡易なんだけど、テーブルの列変更とかできなかったはず。alter tableが出来ないはず。
一回消してマイグレートし直しが必要のはず。


```
touch database/database.sqlite
//
sqlite3 database/database.sqlite
//テーブル一覧
.table
//スキーマ表示
.schema tablename
//終了
.q
```


.envを変更

```:.env
#DB_CONNECTION=mysql
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=homestead
#DB_USERNAME=homestead
#DB_PASSWORD=secret

DB_CONNECTION=sqlite
```



```
#反映
php artisan clear-compiled
composer dump-autoload
php artisan optimize

php artisan migrate
php artisan db:seed
```


### mysqlの場合のマイグレート

mysql5.6か8.0かで少し違ってハマる。


```
#バージョン確認
mysql --version
#状態確認
mysql.server status
#開始
mysql.server start
#停止
mysql.server stop
#ログイン
mysql -uroot
create user 'default'@'localhost' identified  by 'secret';

mysql -u default -p
passは　secret
```


```:.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=default
DB_USERNAME=default
DB_PASSWORD=secret
```



## key生成


```
php artisan key:generate
```

## マイグレート

### マイグレーションのファイル作成


```
php artisan make:migration create_hoge
php artisan make:migration create_authors_table
php artisan make:migration create_publishers_table
php artisan make:migration create_books_table
php artisan make:migration create_bookdetails_table

php artisan make:migration create_greet_dictionarys_table
```

例）挨拶辞書テーブル作成。



```php:2019_08_15_081958_create_greet_dictionarys_table.php

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGreetDictionarysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('greet_dictionary', function (Blueprint $table) {
            $table->increments('greet_id');
            $table->integer('country_id');
            $table->string('greet_msg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('greet_dictionary');
    }
}

```


### 実行

```
//マイグレートする
php artisan migrate
//ロールバック
php artisan migrate:rollback
//まとめて元に戻す
php artisan migrate:reset
```

### カラム変更のマイグレートする場合

Laravelデフォルトの機能でカラム変更できないのでdbalを使用する。


```
composer require doctrine/dbal
```

## シーダー


```
php artisan make:seeder ArticlesTableSeeder
php artisan make:seeder BookTableSeeder
php artisan make:seeder AuthorsTableSeeder
php artisan make:seeder PublishersTableSeeder

//シードを指定して実行
php artisan db:seed --class=ArticlesTableSeeder
//シード実行(DatabaseSeederの内容を実行)
php artisan db:seed
```

## Eloquent(エロクエント)

appの直下にモデルがある。artisan make:modelでモデル作成。    
-mをつけるとマイグレーションも作成される。    


```
php artisan make:model Article -m
php artisan make:model Author
```


サーバー起動

```
php artisan serve
```


```
php artisan route:list
```


# サービスプロバイダ


```
1.
GET:/api/greet
入力：なし
出力：文字列
処理：挨拶を出力。

2.
GET:/api/greet/v2
入力：なし
出力：文字列
処理：挨拶を出力。

3.
GET:/api/greet/{country}
入力：country=国記号
出力：文字列
処理：国別の挨拶を出力。
     en：英語
     ja：日本語

4.
POST:/api/greet/
入力：body param
    query=挨拶
    country=国番号
出力：
    status=ステータス
    msg=メッセージ
処理：挨拶を登録する。
     en：英語
     ja：日本語


```


モデル


```
greet_dictionary モデル

greet_id：キー
country_id：国ID
greet_msg：挨拶文

```


## ルーティング部分で直接サービスを呼ぶ

「ルティング->サービスプロバイダ->サービス」の流れ。


なんかサービス作る。

```
mkdir app/Services
touch app/Services/GreetService.php
```


```php:app/Services/GreetService.php
<?php
namespace App\Services;
 
class GreetService
{
 
  public static function getMessage()
  {
  return 'hello!!';
  }
 
}
```


サービスプロバイダを作成する。

サービスプロバイダでインスタンス生成方法を紐付けるバインドには種類がある。
bindはnewしてインスタンス生成。instanceはインスタンス結合。singletonは１回きりの作成。


```
php artisan make:provider UtilServiceProvider
```


```:app/Providers/UtilServiceProvider.php
    public function register()
    {
        $this->app->bind('greet', 'app\Service\GreetService');
    }
```


今回作成したプロバイダを登録する。


```:config/app.php
    'providers' => [

    ...
    App\Providers\UtilServiceProvider::class,
```


ルティング設定。


```:routes/api.php
use App\Services\GreetService;
Route::get('greet/', function(GreetService $greet){
    return $greet->getMessage();
});
```


http://localhost:8000/api/greet



## コントローラでサービスを呼ぶ

「ルティング->コントローラ->サービスプロバイダ->サービス」の流れ。


コントローラ作る。


```
php artisan make:controller GreetController
```


```:app/Http/Controllers/GreetController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GreetService;

class GreetController extends Controller
{
    private $greet;

    function __construct(GreetService $greet) {
        $this->greet = $greet;
    }

    public function getMessage() {
        return $this->greet->getMessage();
    }
    
}

```


ルーティングにコントローラ紐付け。


```
Route::get('greet/v2', 'GreetController@getMessage');
```


http://localhost:8000/api/greet/v2


## 多言語で挨拶できるようにする


コントローラに追加


```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GreetService;
use Validator;

class GreetController extends Controller
{
    private $greet;

    function __construct(GreetService $greet) {
        $this->greet = $greet;
    }

    public function getMessage() {
        return $this->greet->getMessage();
    }

    public function getMessageByCountry(Request $request, $country) {
        $validator = Validator::make($request->all(), [
            'country' => 'required|string|max:2'
        ]);
        return $this->greet->getMessageBy($request->country);
    }

    public function postMessage() {

    }
    
}

```

http://localhost:8000/api/greet/v2/en
http://localhost:8000/api/greet/v2/ja


## 挨拶を登録する



http://localhost:8000/api/greet/v2?country=en&query=111111




# APIを作る

## リソースクラスを使用する場合


```
php artisan make:controller MonsterController --resource
```

追加

```php:routes/api.php
Route::resource('monsters', 'MonsterController');
```

設計

GET /api/monsters/    
GET /api/monsters/{id}    
POST /api/monsters/    
PUT /api/monsters/    
DELETE /api/monsters/{id}    


```
mkdir ./app/Domain/Models
php artisan make:model app/Domain/Models/Monster -m
```

```php:app/Domain/Models/Monster.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    protected $primaryKey = 'monster_id';
}

```

マイグレーションファイルを変更


```
        Schema::create('monsters', function (Blueprint $table) {
            $table->bigIncrements('monster_id');
            $table->string('name');
            $table->string('voice');
            $table->timestamps();
        });
        
        Schema::dropIfExists('monsters');
```


```
php artisan make:seeder MonstersTableSeeder
```


```
        DB::table("monsters")->insert([
            "monster_id" => 1,
            "name"       => "komaさん",
            "voice"      => "もんげぇ",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
 
        DB::table("monsters")->insert([
            "monster_id" => 2,
            "name"       => "Nyanchuuさん",
            "voice"      => "ミーだにゃぁ",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
```

シーダ指定してinsert

```
php artisan db:seed --class=MonstersTableSeeder
```


```
php artisan make:middleware UnescapeJsonResponse
```

```php:app/Http/Middleware/UnescapeJsonResponse.php
<?php

namespace App\Http\Middleware;

use Closure;

class UnescapeJsonResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        return $next($request);

        $response = $next($request);

        // JSON以外はそのまま
        if (!$response instanceof JsonResponse) {
            return $response;
        }

        // エンコードオプションを追加して設定し直す
        $newEncodingOptions = $response->getEncodingOptions() | JSON_UNESCAPED_UNICODE;
        $response->setEncodingOptions($newEncodingOptions);

        return $response;
    }
}

```


```php:app/Http/Kernel.php
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        
        ※下記を追加
        
        'UnescapeJsonResponse' => \App\Http\Middleware\UnescapeJsonResponse::class,
    ];
```



```php:app/Http/Controllers/MonsterController.php
use Illuminate\Http\Request;
//追加
use App\Domain\Models\Monster;

class MonsterController extends Controller
{
    //コンストラクタ追加
    public function __construct()
    {
        $this->middleware('UnescapeJsonResponse');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //追加
        $items = Monster::all();
        return response()->json($items);
    }
```

登録処理

```php:app/Http/Controllers/MonsterController.php
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required|max:255',
            'voice'  => 'required|max:255',
        ]);
        $monster = new Monster();
        $monster->name = $request->name;
        $monster->voice = $request->voice;
        $monster->save();
        return response()->json();
    }
```

```php:app/Http/Controllers/MonsterController.php
    public function show($id)
    {
        $item = Monster::find($id);
        return response()->json($item);
    }
```

```php:app/Http/Controllers/MonsterController.php
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'   => 'required|max:255',
            'voice'  => 'required|max:255',
        ]);
        $monster = Monster::find($id);
        $monster->name = $request->name;
        $monster->voice = $request->voice;
        $monster->save();
        return response()->json();
    }
```

```php:app/Http/Controllers/MonsterController.php
    public function destroy(Request $request, $id)
    {
        $monster = Monster::find($id);
        $monster->delete();
        return response()->json();
    }
```

```php:routes/api.php
※下記を追加
 
Route::resource('monsters', 'MonsterController');
```


```
php artisan route:list
```


接続

http://127.0.0.1:8000/api/monsters


## 記事API追加


```
php artisan make:controller ArticleController --resource
```



```php:app/Http/Controllers/ArticleController.php
//追加
use App\Article;

class ArticleController extends Controller
{
    //コンストラクタ追加
    public function __construct()
    {
        $this->middleware('UnescapeJsonResponse');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //追加
        $items = Article::all();
        return response()->json($items);
    }
```



```php:routes/api.php
※下記を追加
 
Route::resource('articles', 'ArticleController');
```

接続

http://127.0.0.1:8000/api/articles


## チャットAPI追加


```
php artisan make:model Message -m
```


```
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body'); // メッセージ本文を追加
            $table->timestamps();
        });
    }
```


```
class Message extends Model
{
    protected $guarded = ['id'];
}

```


```
php artisan make:seed MessagesTableSeeder
```


```
public function run()
{
    for($i = 1 ; $i <= 10 ; $i++) {

        \App\Message::create([
            'body' => $i .'番目のテキスト'
        ]);

    }
}
```


```
public function run()
{
     $this->call(UsersTableSeeder::class);
     $this->call(MessagesTableSeeder::class);
}
```


```
php artisan db:seed
```


```
php artisan make:controller ChatController --resource
```


http://127.0.0.1:8000/chatlist/index


## フロント側を作る


```
npm install vue-router
```


```js:resources/assets/js/app.js

```


```
npm run watch
```


# エラー解決

### 500番エラーの時はlaravel.logを確認。

storage/logsにサーバー側のエラーが出てる。

```
Failed to load resource: the server responded with a status of 500 (Internal Server Error)
```



# 参考

https://www.yuulinux.tokyo/9991/

Laravel5.6とVue.jsで簡単なシングルページアプリケーション
https://qiita.com/shin1kt/items/8c98fb209de5caa9076d
