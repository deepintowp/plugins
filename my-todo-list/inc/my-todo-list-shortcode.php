<?php 

	
function my_todo_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
			'title'=>'Todo Title',
			'count'=>10,
			'category'=>'all',
			
	), $atts, 'todo'));
// category conditions

if( $category == 'all' ){
	$terms = '';
}else{
	$terms = array(array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => $category,
		)
	);
}
$todos = new WP_Query(array(
			'post_type'	=>	'todo',
			'posts_per_page'	=>	$count,
			'tax_query'	=>	$terms,
			'orderby'	=>	'todo_date__picker',
			'order'	=>	'DESC',

));	
	
	$output = '<div class="todo">';
	while ( $todos->have_posts() ) {
		$todos->the_post();
		$output .= '<div class="todo-title"><h2>'.get_the_title().'</h2></div>';
		$output .= '<div class="todo-details"><b>Details: </b>'.get_post_meta(get_the_ID(), 'todo_details', true).'</div>';
		$output .= '<div class="todo-priority"><b>Priority: </b>'.get_post_meta(get_the_ID(), 'priority', true).'</div>';
		$output .= '<div class="todo-date"><b>Date: </b>'.get_post_meta(get_the_ID(), 'todo_date__picker', true).'</div>';
	}
	$output .= '</div>';
	
return $output;
	
	
}
add_shortcode('todo', 'my_todo_shortcode');	