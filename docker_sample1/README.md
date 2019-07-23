
# laradock使ったサンプル

docker-composeでupして、composer create-projectする例。    

```
$ mkdir app
$ cd app
$ git clone https://github.com/LaraDock/laradock.git
$ cd laradock
$ cp env-example .env

$ docker-compose up -d nginx mysql redis beanstalkd
$ docker exec -it laradock_workspace_1 /bin/bash
$ composer create-project laravel/laravel testapp
```


# 参考

https://qiita.com/miyamotok0105/items/aa694eb89ad1abd8c94a
