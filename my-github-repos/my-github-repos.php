<?php 
/**
 * @package My github Repos
 * @version 1.0
 */
/*
Plugin Name: My github Repos
Plugin URI: http://wordpress.org/plugins/my-github-repos
Description: Get Github Repos in widget.
Author: Subhasish Manna
Version: 1.0
Author URI: http://b.subho.host22.com
*/

// Exit if accessed directly

if( !defined('ABSPATH')){
	exit;
}

//Load scripts 

require_once(plugin_dir_path(__FILE__).'/inc/my-github-repos-scripts.php');

//My github Repos class
require_once(plugin_dir_path(__FILE__).'/inc/my-github-repos-class.php');

//register widget

function mgr_widget_register(){
	register_widget('My_Github_Repos');
}
add_action('widgets_init', 'mgr_widget_register');


