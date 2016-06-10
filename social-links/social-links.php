<?php 
/**
 * @package Social Links
 * @version 1.6
 */
/*
Plugin Name: Social Links
Plugin URI: http://wordpress.org/plugins/social-links
Description: Add social icon in widget area.
Author: Subhasish Manna
Version: 1.0
Author URI: http://b.subho.host22.com
*/

// Exit if accessed directly

if( !defined('ABSPATH')){
	exit;
}
//Load scripts 

require_once(plugin_dir_path(__FILE__).'/inc/social-links-scripts.php');

//Social Links Class
require_once(plugin_dir_path(__FILE__).'/inc/social-links-class.php');

//register widget

function sl_widget_register(){
	register_widget('Social_links');
}
add_action('widgets_init', 'sl_widget_register');








