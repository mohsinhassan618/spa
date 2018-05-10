<template>
    <footer class="container text-center">
        <p> {{ footer_text }}</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
</template>

<script>
    export default {
        data: function (){
            return {
                footer_text:   wp_rest_api.footer_text
            }
        }

    }
</script>