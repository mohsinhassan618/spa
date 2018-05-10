<template>

    <div class="container">
        <div class="jumbotron">
            <h1> {{ user_nicename }} 's profile</h1>

        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <app-post-excerpt v-for="post in posts" :key="post.id" :post="post"></app-post-excerpt>
                <nav>
                    <ul class="pager">
                        <li v-if="page > 1">
                            <router-link :to="'?page=' + (page-1) ">Previous</router-link>
                        </li>
                        <li v-if="posts.length">
                            <router-link :to="'?page=' + (page+1) ">Next</router-link>
                        </li>
                    </ul>
                </nav>
            </div><!-- /.blog-main -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</template>

<script>
    export default {
        data: function(){
            return {
                posts: [],
                page: 1,
                user_nicename: ''
            }
        },

        mounted: function (){

            this.get_posts();

            jQuery.get(wp_rest_api.base_url + 'users/' + this.$route.params.id  ).always((response) => {
                this.user_nicename = response.name;
            });

        },
        methods: {
            get_posts: function (){

                this.page  = parseInt(this.$route.query.page) || this.page ;

                if(this.page < 1 ){
                    this.page = 1;
                }

                jQuery.get(wp_rest_api.base_url + 'posts',{page: this.page,author: this.$route.params.id }  ).always((response) => {
                    this.posts    = response;
                });
            }
        },
        watch:{
            '$route': function(to,from){
                this.get_posts();
            }
        }

    }
</script>