<?php

// Setup
define( 'SPA_PLUGIN_URL', __FILE__ );

// Includes
include( get_template_directory() . '/includes/setup.php' );
include( get_template_directory() . '/includes/front/enqueue.php' );
include( get_template_directory() . '/includes/customizer.php' );
include( get_template_directory() . '/includes/api/api.php' );



// Hooks
add_action( 'wp_enqueue_scripts', 'spa_enqueue_scripts' );
add_action( 'after_setup_theme', 'spa_setup' );
add_action( 'customize_register', 'spa_customizer_register' );
add_action('rest_api_init','spa_rest_api_init');

// Shortcodes