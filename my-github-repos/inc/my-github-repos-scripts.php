<?php 

function mgr_add_scripts(){
	wp_enqueue_style('mgr-style-css', plugins_url().'/my-github-repos/css/style.css' );
	wp_enqueue_script('mgr-main-js', plugins_url().'/my-github-repos/js/main.js', array('jquery'), '1.0', true );
	
}
add_action('wp_enqueue_scripts', 'mgr_add_scripts');