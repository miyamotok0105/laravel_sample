
# 1.静的ページをdockerで動かす


```
├── docker
│   └── web
│   └── default.d
│   └── default.conf
├── docker-compose.yml
└── index.html
```


```
docker-compose up -d
```

アクセス

http://localhost:8000


docker内に入ってるindex.htmlと外にあるindex.htmlは同じ。

```
docker exec -it docker_sample2_web_1 /bin/bash
cd var/www/html
```


# 参考

https://qiita.com/wjtnk/items/9d6a56a05bff2068cd2c
