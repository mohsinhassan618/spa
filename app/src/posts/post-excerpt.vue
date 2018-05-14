<template>
    <div class="blog-post">
        <router-link :to="'/post/' + post.slug + '/' + post.id"   v-if="post.spa_meta.thumbnail">
            <img :src="post.spa_meta.thumbnail" class="img-responsive">
        </router-link>
        <h2>
            <router-link :to="'/post/' + post.slug + '/' + post.id" >
            {{ post.title.rendered }}
            </router-link>
        </h2>

        <p>{{ moment(post.date) }} By
            <router-link :to="'/author/' + post.author">{{ post.spa_meta.user_nicename }}</router-link>
        </p>

        <div  v-html="post.excerpt.rendered"></div>

        <hr>
    </div><!-- /.blog-post -->
</template>

<script>

    export default {
        props: ['post'],


    }
</script>