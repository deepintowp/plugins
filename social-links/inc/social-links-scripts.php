<?php 

function sl_add_scripts(){
	wp_enqueue_style('style-css', plugins_url().'/social-links/css/style.css' );
	wp_enqueue_script('main-js', plugins_url().'/social-links/js/main.js', array('jquery'), '1.0', true );
}
add_action('wp_enqueue_scripts', 'sl_add_scripts');