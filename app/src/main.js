import Vue from 'vue'; // vue is global
import App from './App.vue';
import Nav from './globals/nav.vue';
import Footer from './globals/footer.vue';
import PostExcerpt from './posts/post-excerpt.vue';
import VueRouter from 'vue-router';
import { routes } from './routes';
import  mixin from './mixin';

Vue.use(VueRouter);
Vue.mixin(mixin);

const router  =  new VueRouter({
    routes:     routes,
    mode:       'history',
    base:       '/spa/'

});

Vue.component('app-main-nav',Nav);
Vue.component('app-footer',Footer);
Vue.component('app-post-excerpt',PostExcerpt);

new Vue({
    el: '#app',
    router: router,
    render: h => h(App), //render function will process the template  ./app.vue as app load all html,style, script

//      render:  funtion (h) {
//     h(App);
// }
});
