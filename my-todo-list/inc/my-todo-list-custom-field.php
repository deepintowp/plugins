<?php 


function create_todo_metboxes(){
	add_meta_box(
		'todo_metabex',
		__('Todo Info', 'text-domain'),
		'create_todo_metboxes_callback',
		'todo',
		'normal',
		'low'
	
	);
	
}
add_action('add_meta_boxes', 'create_todo_metboxes');
//callback
function create_todo_metboxes_callback (){
	wp_nonce_field(basename(__FILE__), 'todo_meta_nonce');
	$all_value = get_post_meta(get_the_ID());
	?>
		<div class="warp metboxes_container">
			
			<div class="single_metbox" style="margin:8px 0; padding:10px 0;" >
				<label for="priority"><?php _e('Priority', 'todo-domain'); ?></label>
				<select name="priority" id="priority">
					<?php $options = array('Low', 'Normal', 'High'); 
						foreach($options as $key => $value ):
						if( $value == $all_value['priority'][0] ){
							echo '<option selected >'.$value.'</option>';
							
						}else{
							echo '<option  >'.$value.'</option>';
						}
					 endforeach; ?>
				</select>
			</div><!-- single_metbox -->
			
			<div class="single_metbox" style="margin:8px 0; padding:10px 0;">
				<label for="todo_details"><?php _e('Details', 'todo-domain'); ?></label>
				
				<?php
				$content = get_post_meta(get_the_ID(), 'todo_details', true);
				
				wp_editor( $content, 'todo_details', array(
				
				'media_buttons'=>false,
				'textarea_rows'=>8
				
				) );
				?>
			</div><!-- single_metbox -->
			
			<div class="single_metbox" style="margin:8px 0; padding:10px 0;">
				<label for="todo_date__picker"><?php _e('Date', 'todo-domain'); ?></label>
				<input type="" id="todo_date__picker" name="todo_date__picker" value="<?php 
					if($all_value['todo_date__picker']){
					echo $all_value['todo_date__picker'][0];
					}
				?>" />
			</div><!-- single_metbox -->
			
			
		</div>
	
	<?php
}
function save_todo_metaboxes(){
$autosave = wp_is_post_autosave(get_the_ID());
$revision = wp_is_post_revision(get_the_ID());
if($autosave || $revision ){
return;
}
if(!wp_verify_nonce($_POST['todo_meta_nonce'], basename(__FILE__))){
return;
}
if(isset($_POST['priority'])){
update_post_meta(get_the_ID(), 'priority', sanitize_text_field($_POST['priority']));
}

if(isset($_POST['todo_details'])){
update_post_meta(get_the_ID(), 'todo_details', sanitize_text_field($_POST['todo_details']));
}

if(isset($_POST['todo_date__picker'])){
update_post_meta(get_the_ID(), 'todo_date__picker', sanitize_text_field($_POST['todo_date__picker']));
}



}
add_action('save_post', 'save_todo_metaboxes'); 



