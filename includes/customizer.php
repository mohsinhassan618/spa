<?php

function spa_customizer_register( $wp_customize ){
	$wp_customize->add_setting( 'spa_footer_text', array(
		'default'                   =>  'Blog template built for Bootstrap by @mdo.',
	));

	$wp_customize->add_section( 'spa_section', array(
		'title'                     =>  __( 'SPA Settings', 'spa' ),
		'priority'                  =>  30
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'spa_footer_text_input',
		array(
			'label'                 =>  __( 'Footer Text', 'spa' ),
			'section'               => 'spa_section',
			'settings'              => 'spa_footer_text'
		)
	));
}