
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
//追加
import VueRouter from 'vue-router'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('hello-world-component', require('./components/HelloWorldComponent.vue'));

Vue.component('article-create-component', require('./components/Articles/Create.vue'));
Vue.component('article-index-component', require('./components/Articles/Index.vue'));

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        // TOPページ
        { path: '/article/index', name: 'article_index', component: require('./components/Articles/Index.vue') },
        // 記事投稿フォームページ
        { path: '/article/create', name: 'article_create', component: require('./components/Articles/Create.vue') },
    ]
});

// const app = new Vue({
//     el: '#app'
// });

const app = new Vue({
    router,
    el: '#app'
});
