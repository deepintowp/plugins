<?php 
/**
 * @package Facebook Footer Link
 * @version 1.6
 */
/*
Plugin Name: Facebook Footer Link
Plugin URI: http://wordpress.org/plugins/facebook-footer-link
Description: This plugin will give you a link after every to to like this on facebook.
Author: Subhasish Manna
Version: 1.0
Author URI: http://b.subho.host22.com
*/

// Exit if accessed directly

if( !defined('ABSPATH')){
	exit;
}
//global options variable
$ffl_options = get_option('ffl_setting');
// laod scripts

require_once(plugin_dir_path(__FILE__).'/inc/facebook-footer-link-scripts.php');
// laod contentfile

require_once(plugin_dir_path(__FILE__).'/inc/facebook-footer-link-content.php');

// laod settings page
require_once(plugin_dir_path(__FILE__).'/inc/facebook-footer-link-settings.php');
