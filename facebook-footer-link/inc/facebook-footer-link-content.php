<?php 

function subho_facebook_footer_content($content){
	global $ffl_options;
	$footer_added_content = '<hr />';
	$footer_added_content .= '<div class="footer-content">';
	$footer_added_content .= '<span class="dashicons dashicons-facebook"></span> Find me on <a style="color: '.$ffl_options['link_color'].'; " target="_blank" href="'.$ffl_options['facebook_url'].'">facebook</a>';
	$footer_added_content .= '</div>';
	if($ffl_options['show_in_feed']){
		if((is_single() || is_home()) && $ffl_options['enable'] ){
			return $content.$footer_added_content;
		}
		
	}else{
		if(is_single() && $ffl_options['enable'] ){
			return $content.$footer_added_content;
		}
	}
	
	return $content;
}
add_filter('the_content', 'subho_facebook_footer_content');