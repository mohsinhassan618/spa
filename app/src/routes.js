import Home       from  './pages/home.vue';
import SinglePost from  './pages/single-post.vue';
import Page       from  './pages/page.vue';
import Author     from  './users/author.vue';

//use '/' at start to append from base spa otherwise it appends from from current


export const routes          =    [
    {path: '',                 component: Home },
    {path: '/post/:slug/:id',  component: SinglePost },
    {path: '/:slug',           component:Page },
    {path: '/author/:id',      component:Author}
];
