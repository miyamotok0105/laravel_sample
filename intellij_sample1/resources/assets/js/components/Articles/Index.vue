<template>
    <div id="app">
        <div>
            <div>index!!</div>
            <article-create-component></article-create-component>
            <hr>
            <button v-on:click="getArticle()">記事一覧取得</button>
            <button v-on:click="gotoCreateArticle()">記事作成</button>

            <div v-for="article in articles">
                id：{{ article.id }}　タイトル：　{{ article.title }} コンテンツ： {{ article.content }}
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Index.vue",
        data() {
            return {
                articles: []
            };
        },
        methods: {
            getArticle: function() {
                axios.get('/api/articles/').then(res => {

                    this.articles = res.data
                    console.log(res.data)

                    // console.log(res.data.id)
                    // console.log(res.data.user_id);
                    // console.log(res.data.content);
                    // console.log(res.data.title);
                    // console.log(res.data.created_at);
                })
            },
            gotoCreateArticle: function() {
                this.$router.push({ name: 'article_create', params: { }})
            }
        }
    }
</script>

<style scoped>

</style>