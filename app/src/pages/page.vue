<template>
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-sm-offset-2">
                <h1>{{ post.title.rendered }}</h1>
                <div v-html="post.content.rendered"></div>



            </div><!-- /.blog-main -->

        </div><!-- /.row -->

    </div><!-- /.container -->

</template>

<script>
    export default {
        data:function () {
            return {
                post: {
                    title: {
                        rendered:  ''
                    },
                    date:  '',

                    content: {
                        rendered: ''
                    }

                }
            }
        },
        mounted:function (){
            jQuery.get(wp_rest_api.base_url + 'pages?slug=' + this.$route.params.slug ).always( (response) => {
                this.post= response[0];
            });
        }

    }
</script>

<style>
    img{
        max-width: 100%;
    }
</style>