<?php 
// Add Scripts
function subho_facebook_footer_link_scripts(){
	wp_enqueue_style('subho-facebook-footer-link-css', plugins_url().'/facebook-footer-link/css/style.css' );
	wp_enqueue_script('subho-facebook-footer-link-css', plugins_url().'/facebook-footer-link/js/main.js');
	
}
add_action('wp_enqueue_scripts', 'subho_facebook_footer_link_scripts');