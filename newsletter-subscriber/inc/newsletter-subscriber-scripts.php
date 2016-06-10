<?php 

function ns_add_scripts(){
	wp_enqueue_style('ns-style-css', plugins_url().'/newsletter-subscriber/css/style.css' );
	wp_enqueue_script('ns-main-js', plugins_url().'/newsletter-subscriber/js/main.js', array('jquery'), '1.0', true );
	wp_localize_script( 'ns-main-js', 'nssubmitform', array(
		'url'=> admin_url('admin-ajax.php'),
		'security'=> wp_create_nonce('ns-nonce')
	) );
}
add_action('wp_enqueue_scripts', 'ns_add_scripts');