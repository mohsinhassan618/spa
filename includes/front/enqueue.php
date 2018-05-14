<?php

function spa_enqueue_scripts(){
    wp_register_style(
        'spa_bootstrap',
        get_template_directory_uri() . "/assets/css/bootstrap.min.css"
    );

    wp_enqueue_style('spa_bootstrap');



    wp_register_script(
        'spa_bootstrap',
        get_template_directory_uri() . "/assets/js/bootstrap.min.js",
        array(),
        false,
        true
    );

    wp_register_script(
        'spa_build',
        get_template_directory_uri() . '/app/dist/build.js',
       // 'http://localhost:8080/dist/build.js',
        [],
        false,
        true
    );
    wp_register_script(
        'spa_moment',
        get_template_directory_uri() . "/assets/js/moment.js",
        array(),
        false,
        true
    );



    wp_localize_script('spa_build','wp_rest_api',[
        'base_url'        =>   rest_url('/wp/v2/'),
        'spa_url'         =>   rest_url('/spa/v1/'),
        'site_name'       =>   get_bloginfo('name'),
        'footer_text'     =>   get_theme_mod('spa_footer_text'),
        'nonce'           =>   wp_create_nonce('wp_rest')
    ]);
    wp_enqueue_script('jquery');
    wp_enqueue_script('spa_bootstrap');
    wp_enqueue_script('spa_moment');
    wp_enqueue_script('spa_build');

}