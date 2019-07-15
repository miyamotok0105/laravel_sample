
# README.md

```
composer global require "laravel/installer=~1.1"
```


```
composer create-project laravel/laravel your-project-name --prefer-dist
```


# welcome2を作ってみる。

resourcesフォルダのviewsの中にテンプレートを作成する。    


```
cp resources/views/welcome.blade.php resources/views/welcome2.blade.php
```

routesフォルダのweb.phpにルーティングを書く。    

http://127.0.0.1:8000/welcome2
にアクセス。


# homeを作ってみる。


```
cp resources/views/welcome.blade.php resources/views/home.blade.php
```

routesフォルダのweb.phpにルーティングを書く。    


http://127.0.0.1:8000/home
にアクセス。


# homeのテストコードを書く


```
php artisan make:test HomeTest
```

testフォルダのFeatureのHomeTest.phpを編集。    


```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

```


```
vendor/bin/phpunit tests/Feature/HomeTest.php
```

# マイグレートする

mysqlが大変なので、sqliteに変更する。    
configフォルダのdatabase.phpを変更。    


```
    /* 'default' => env('DB_CONNECTION', 'mysql'),*/
    'default' => env('DB_CONNECTION', 'sqlite'),
```

.envの情報を変更。    


```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```


```
DB_CONNECTION=sqlite
```


```
php artisan migrate
```


# 認証/登録機能を追加する


routesフォルダのweb.phpにルーティングを書く。    


```php:web.php
Route::get('/auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/auth/register', 'Auth\RegisterController@register');
Route::get('/auth/login', 'Auth\LoginController@showLoginForm');
Route::post('/auth/login', 'Auth\LoginController@login');
Route::get('/auth/logout', 'Auth\LoginController@logout');

```

フォルダとファイル作成


```
mkdir resources/views/auth
touch resources/views/auth/register.blade.php
```



