<?php 

// create menu link

function subho_facebook_footer_link_option_link(){
	add_options_page(
		'Facebook Footer Link Options',
		'Fb Link',
		'manage_options',
		'subho_fab_options',
		'subho_facebook_footer_link_callback'
	);
}
// create option page content
function subho_facebook_footer_link_callback(){
	//init options global 
	global $ffl_options;
	ob_start(); ?>
		<div class="wrap">
			<h2><?php _e('Facebook footer link', 'ffl_domain') ?></h2>
			<p><?php _e('Facebook footer link settings', 'ffl_domain') ?></p>
			<form action="options.php" method="post" >
			
				<?php settings_fields( 'subh_fb_setting_group' ); ?>
				
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row" >
								<label for="ffl_setting[enable]"><?php _e('Enable', 'ffl_domain'); ?></label>
							</th>
							<td>
								<input type="checkbox"  name="ffl_setting[enable]"  id="ffl_setting[enable]" value="1"  <?php checked('1', $ffl_options['enable']); ?>  />
							</td>
						</tr>
						<tr>
							<th scope="row" >
								<label for="ffl_setting[facebook_url]"><?php _e('Facebook Url', 'ffl_domain'); ?></label>
							</th>
							<td>
								<input type="text"  name="ffl_setting[facebook_url]"  id="ffl_setting[facebook_url]" value="<?php echo $ffl_options['facebook_url']; ?>"  class="regular-text"  />
								<p class="description"><?php _e('Enter your facebook profile url.', 'ffl_domain'); ?></p>
							</td>
						</tr>
						<tr>
							<th scope="row" >
								<label for="ffl_setting[link_color]"><?php _e('Link Color', 'ffl_domain'); ?></label>
							</th>
							<td>
								<input type="text"  name="ffl_setting[link_color]"  id="ffl_setting[link_color]" value="<?php echo $ffl_options['link_color']; ?>"  class="regular-text"  />
								<p class="description"><?php _e('Enter link color. You can give hex value as well.', 'ffl_domain'); ?></p>
							</td>
						</tr>
						<tr>
							<th scope="row" >
								<label for="ffl_setting[show_in_feed]"><?php _e('Show in post feed', 'ffl_domain'); ?></label>
							</th>
							<td>
								<input type="checkbox"  name="ffl_setting[show_in_feed]"  id="ffl_setting[show_in_feed]" value="1"  <?php checked('1', $ffl_options['show_in_feed']); ?>  />
							</td>
						</tr>
						
						
					</tbody>
				</table>
				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'ffl_domain'); ?>" /></p>
			</form>
		</div>
	
	<?php echo ob_get_clean();
}
add_action('admin_menu','subho_facebook_footer_link_option_link');

//register settings
add_action( 'admin_init', 'subho_fb_footer_link_register_link' );

function subho_fb_footer_link_register_link() {
	register_setting('subh_fb_setting_group', 'ffl_setting' );
}