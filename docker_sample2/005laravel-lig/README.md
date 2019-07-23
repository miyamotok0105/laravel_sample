
# 5.Laravelをdockerで動かす

ligの記事を参考に動かした。
https://liginc.co.jp/465420


```
git clone https://github.com/Laradock/laradock.git
mkdir src
cd laradock
cp env-example .env

```


APP_CODE_PATH_HOSTはアプリケーションのディレクトリパス。
DATA_PATH_HOSTはプロジェクトのデータ管理場所。
COMPOSE_PROJECT_NAMEはdokcerのコンテナ名。
MYSQL_VERSIONはmysqlのバージョン。

```
APP_CODE_PATH_HOST=../src/
DATA_PATH_HOST=../.laradock/data
COMPOSE_PROJECT_NAME=laradock-project_name
MYSQL_VERSION=5.7
```

docker起動。

```
docker-compose up -d nginx mysql phpmyadmin
```

Laravelインストール

```
docker-compose exec workspace bash
composer create-project --prefer-dist laravel/laravel ./
```


Laravelの設定


```:laradock_project_name/src/.env
DB_HOST=mysql
DB_DATABASE=default
DB_USERNAME=default
DB_PASSWORD=secret
```

コマンドでmysql接続

サーバ: mysql
ユーザー名: default
パスワード: secret


```
docker-compose exec workspace bash
mysql -u default -p

```

phpadminで接続

http://localhost:8080


