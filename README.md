# laravel_sample



# laravel5.5

- 開発マシン

mac

- laradockで環境を構築

http://laradock.io/getting-started/#Usage



    cd laravel_sample/laradock_sample
    git clone https://github.com/LaraDock/laradock.git
    cd laradock
    cp env-example .env
    docker-compose up -d workspace

    docker ps
    dockerの名前を指定してdockerに入る
    docker exec -it laradock_workspace_1 /bin/bash

    //
    composer create-project laravel/laravel laravel --prefer-dist
    exit
    docker-compose up -d mysql
    docker-compose up -d nginx


    全部止める
    docker-compose stop

