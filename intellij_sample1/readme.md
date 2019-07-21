
# Intellijのサンプル


## sqliteの操作


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

```
#DB_CONNECTION=mysql
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=homestead
#DB_USERNAME=homestead
#DB_PASSWORD=secret
DB_CONNECTION=sqlite
```

## マイグレート

### マイグレーションのファイル作成

```
php artisan make:migration create_hoge
php artisan make:migration create_authors_table
php artisan make:migration create_publishers_table
php artisan make:migration create_books_table
php artisan make:migration create_bookdetails_table
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

### カラム変更のマイグレート

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
mkdir ./app/Models
php artisan make:model Models/Monster -m
```

```php:app/Models/Monster.php
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
use App\Models\Monster;

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

```php:routes/api.php
※下記を追加
 
Route::resource('monsters', 'MonsterController');
```


```
php artisan route:list
```


# 参考


https://www.yuulinux.tokyo/9991/
