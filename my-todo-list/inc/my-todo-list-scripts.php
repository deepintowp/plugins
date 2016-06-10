<?php 
// LOAD STYLE AND SCRIPTS In ADMIN AREA ONLY
function todo_admin_scripts_n_style(){
	global $typenow, $pagenow;
	// load style and scripts only in new todo post-type and edit todo post-type page.
	if($typenow == 'todo' &&  ($pagenow == 'post.php' || $pagenow == 'post-new.php'  ) ){
	wp_enqueue_style('todo-admin-css', plugins_url().'/my-todo-list/css/admin.css' );
	
	wp_enqueue_style('jqueryui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/base/jquery-ui.css', array(), '1.5.2016', 'all' );
	wp_enqueue_script('todo-admin-js', plugins_url().'/my-todo-list/js/admin.js', array('jquery', 'jquery-ui-datepicker'), '1.0', true );
	}
}
add_action( 'admin_enqueue_scripts', 'todo_admin_scripts_n_style' );





// LOAD STYLE AND SCRIPTS For frontend
function todo_add_scripts(){
	wp_enqueue_style('todo-css', plugins_url().'/my-todo-list/css/style.css' );
	wp_enqueue_script('todo-main-js', plugins_url().'/my-todo-list/js/main.js', array('jquery'), '1.0', true );
}
add_action('wp_enqueue_scripts', 'todo_add_scripts');