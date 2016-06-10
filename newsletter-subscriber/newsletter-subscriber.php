<?php 
/**
 * @package Newsletter Subscriber
 * @version 1.0
 */
/*
Plugin Name: Newsletter Subscriber
Plugin URI: http://wordpress.org/plugins/facebook-footer-link
Description: Get user subcription.
Author: Subhasish Manna
Version: 1.0
Author URI: http://b.subho.host22.com
*/

// Exit if accessed directly

if( !defined('ABSPATH')){
	exit;
}

//Load scripts 

require_once(plugin_dir_path(__FILE__).'/inc/newsletter-subscriber-scripts.php');

//Social Links Class
require_once(plugin_dir_path(__FILE__).'/inc/ns-class.php');

//register widget

function ns_widget_register(){
	register_widget('Newsletter_Subscriber');
}
add_action('widgets_init', 'ns_widget_register');

//Load scripts 

require_once(plugin_dir_path(__FILE__).'/inc/ns_mailer.php');

