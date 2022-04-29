# README


- Laravel8

```

composer create-project laravel/laravel:^8.0 example-app-v8.0

mysql -uroot -p
CREATE DATABASE exampleAppV8 DEFAULT CHARACTER SET utf8mb4;

```



```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=exampleAppV8
DB_USERNAME=root
DB_PASSWORD=
```


```
php artisan make:migration book --create=books
php artisan migrate
php artisan migrate:status

php artisan serve
```

```
curl http://localhost:8000/api/books
```


### database

https://readouble.com/laravel/8.x/ja/database.html#configuration




- 本

PHPフレームワーク Laravel Webアプリケーション開発    
https://github.com/laravel-socym

Laravelチュートリアル    
https://www.hypertextcandy.com/laravel-tutorial-authentication


このサービスいいね。
https://www.techpit.jp/courses/laravel-trello-todo/lectures/8475484

