<template>
    <div id="app">
        <!--<input v-model="article_id" type="text" name="id" placeholder="テキスト">-->
        <!--<input v-model="article_user_id" type="text" name="text" placeholder="ユーザーid">-->
        <!--<input v-model="content" type="text" name="text" placeholder="コンテンツ">-->
        <!--<input v-model="title" type="text" name="text" placeholder="タイトル">-->

        <!--<div>-->
            <!--{{ article_id }}-->
            <!--{{ article_user_id }}-->
            <!--{{ content }}-->
            <!--{{ title }}-->
        <!--</div>-->

        <input v-model="article.id" type="text" name="id" placeholder="テキスト">
        <input v-model="article.user_id" type="text" name="text" placeholder="ユーザーid">
        <input v-model="article.content" type="text" name="text" placeholder="コンテンツ">
        <input v-model="article.title" type="text" name="text" placeholder="タイトル">

        <div>
            {{ article.id }}
            {{ article.user_id }}
            {{ article.content }}
            {{ article.title }}
        </div>

        <button v-on:click="postArticle()">投稿</button>

        <button v-on:click="gotoIndexArticle()">一覧に戻る</button>
    </div>
</template>

<script>
    export default {
        name: "Create.vue",
        data() {
            return {
                article: {id: "", user_id: "", content: "", title: ""},
                // article_id: null,
                // article_user_id: null,
                // content: null,
                // title: null,
            }
        },
        methods: {
            postArticle: function() {
                // let params = new URLSearchParams();
                // params.append('article', this.article);

                axios.post('/api/articles/', {
                    id: this.article.id,
                    user_id: this.article.user_id,
                    content: this.article.content,
                    title: this.article.title
                }).then(res => {

                    alert("完了")
                    console.log(res.data)

                    // this.articles = res.data
                    // console.log(res.data)

                    // console.log(res.data.id)
                    // console.log(res.data.user_id);
                    // console.log(res.data.content);
                    // console.log(res.data.title);
                    // console.log(res.data.created_at);
                })
                .catch(error => {
                    alert("登録失敗");
                    console.log(error);
                })
            },
            gotoIndexArticle: function() {
                this.$router.push({ name: 'article_index', params: { }})
            }
        }
    }
</script>

<style scoped>

</style>