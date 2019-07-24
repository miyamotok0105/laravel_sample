<template>
    <div id="app">
        <div>
            <h1>チャット　サンプル</h1>
            <hr>
            <button v-on:click="getChatList()">チャットデータ取得</button>

            <input v-model="message" type="text" name="message" placeholder="メッセージ">
            <button v-on:click="postMessage()">投稿</button>

            <div v-for="chat in chatList">
                <h2>{{ chat }}</h2>
                <!--id：{{ chat.id }}　メッセージ：　{{ chat.message }}-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Index",
        data() {
            return {
                chatList: [],
                id: 0,
                message: "",
            };
        },
        methods: {
            getChatList: function() {
                axios.get('/api/chatlist/').then(res => {

                    this.chatList = res.data
                    console.log(res.data)

                    // console.log(res.data.id)
                    // console.log(res.data.created_at);
                })
            },
            postMessage: function() {
                axios.post('/api/chatlist/', {
                    id: this.id,
                    message: this.message,
                }).then(res => {

                    // alert("完了")
                    // alert(res.data.id)
                    // alert(res.data.message)
                    // console.log(res.data)
                    this.chatList.push(res.data);
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
            }
            // gotoCreateArticle: function() {
            //     this.$router.push({ name: 'article_create', params: { }})
            // }
        }
    }
</script>

<style scoped>

</style>