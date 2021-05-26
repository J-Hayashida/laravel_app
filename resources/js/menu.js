
require('./bootstrap');

import VueRouter from 'vue-router';

window.Vue = require('vue').default;
Vue.use(VueRouter);

// ＳＰＡのルーティング設定
const router = new VueRouter({
    mode: 'history',
    base: '/laravel_app/public/home',
    routes: [
        { path: '/', component: require('./components/menu/MenuComponent.vue').default },
        { path: '/sub_menu', component: require('./components/menu/SubMenuComponent.vue').default },
    ]
})

new Vue({
    el: '#app',
    router,
});
