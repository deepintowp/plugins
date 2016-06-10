<?php 
/**
 * @package My Todo List
 * @version 1.6
 */
/*
Plugin Name: My Todo List
Plugin URI: http://wordpress.org/plugins/my-todo-list
Description: Add todo by shortcode.
Author: Subhasish Manna
Version: 1.0
Author URI: http://b.subho.host22.com
*/

// Exit if accessed directly

if( !defined('ABSPATH')){
	exit;
}
//Load scripts 

require_once(plugin_dir_path(__FILE__).'/inc/my-todo-list-scripts.php');


//Load shortcode File

require_once(plugin_dir_path(__FILE__).'/inc/my-todo-list-shortcode.php');


// check if it is on admin area

if(is_admin()){
	//Load cpt file

require_once(plugin_dir_path(__FILE__).'/inc/my-todo-list-cpt.php');

//Load Custom Field

require_once(plugin_dir_path(__FILE__).'/inc/my-todo-list-custom-field.php');

	
	
}







