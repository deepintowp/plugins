<?php 

class Social_links extends WP_Widget {
	/*
	*	Setup widget name etc.
	*/
	public function __construct(){
		parent::__construct(
			'social-links_widget',
			__('Social Links Widget','social-links'),
			array('description'=>__('Add Social Links', 'social-links'))
		);
	}
	/*
	*	Output the content of widget
	*	@param array $args 
	*	@param array $intance
	*/
	public function widget($args, $instance){
		$title = $instance['widget_title'];
		$links = array(
			'facebook'=> esc_attr($instance['facebook_link']),
			'google'=> esc_attr($instance['google_link']),
			'linkedin'=> esc_attr($instance['linkedin_link']),
			'twitter'=> esc_attr($instance['twitter_link'])
		
		);
		$icon = array(
			'facebook' => esc_attr($instance['facebook_incon']),
			'twitter' => esc_attr($instance['twitter_incon']),
			'google' => esc_attr($instance['google_incon']),
			'linkedin' => esc_attr($instance['linkedin_incon']),
		
		);
		$icon_width = $instance['incon_width'];
		echo $args['before_widget'];
		echo $args['before_title'];
		echo $title;
		echo $args['after_title'];
		
		// call frontend function
		$this->getSocialLinks($links, $icon, $icon_width );
		echo  $args['after_widget'];
	}
	/*
	*	Output the options form on admin
	*	@param array $intance The Widget options 
	*	
	*/
	public function form($instance){
		//call form function 
		$this->getForm($instance);
	}
	
	
	
	// create form 
	public function getForm($instance){
		/*================================
			Links
		=================================*/
		// Get Widget Title
		if(isset($instance['widget_title'])){
			$widget_title = esc_attr($instance['widget_title']);
		}else{
			$widget_title = 'Follow us Socially.';
		}
		// Get facebook links
		if(isset($instance['facebook_link'])){
			$facebook_link = esc_attr($instance['facebook_link']);
		}else{
			$facebook_link = 'https://facebook.com/manna3w';
		}
		// Get twitter links
		if(isset($instance['twitter_link'])){
			$twitter_link = esc_attr($instance['twitter_link']);
		}else{
			$twitter_link = 'https://twitter.com/manna3w';
		}
		// Get google plus links
		if(isset($instance['google_link'])){
			$google_link = esc_attr($instance['google_link']);
		}else{
			$google_link = 'https://plus.google.com/manna3w';
		}
		// Get linkedin plus links
		if(isset($instance['linkedin_link'])){
			$linkedin_link = esc_attr($instance['linkedin_link']);
		}else{
			$linkedin_link = 'https://linkedin.com/manna3w';
		}
		/*================================
			Icons Image
		=================================*/
		// Get facebook incon
		if(isset($instance['facebook_incon'])){
			$facebook_incon = esc_attr($instance['facebook_incon']);
		}else{
			$facebook_incon = plugins_url().'/social-links/img/facebook_icon.png';
		}
		// Get Twitter incon
		if(isset($instance['twitter_incon'])){
			$twitter_incon = esc_attr($instance['twitter_incon']);
		}else{
			$twitter_incon = plugins_url().'/social-links/img/twitter_icon.png';
		}
		// Get Google incon
		if(isset($instance['google_incon'])){
			$google_incon = esc_attr($instance['google_incon']);
		}else{
			$google_incon = plugins_url().'/social-links/img/google_icon.png';
		}
		// Get linkedin incon
		if(isset($instance['linkedin_incon'])){
			$linkedin_incon = esc_attr($instance['linkedin_incon']);
		}else{
			$linkedin_incon = plugins_url().'/social-links/img/linkedin_icon.png';
		}
		
		// icon width
		if(isset($instance['incon_width'])){
			$incon_width = esc_attr($instance['incon_width']);
		}else{
			$incon_width = 32;
		}
		?>
		<!-- title -->
		<p> 
			<label for="<?php echo $this->get_field_id('widget_title'); ?>"><?php _e('Title', 'social-links'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('widget_title'); ?>" class="widefat" name="<?php echo $this->get_field_name('widget_title'); ?>" value="<?php echo esc_attr($widget_title); ?>" />
		</p>
		<!-- facebook -->
		<p> 
			<label for="<?php echo $this->get_field_id('facebook_link'); ?>"><?php _e('Facebook Url', 'social-links'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('facebook_link'); ?>" class="widefat" name="<?php echo $this->get_field_name('facebook_link'); ?>" value="<?php echo esc_attr($facebook_link); ?>" />
		</p>
		<p> 
			<label for="<?php echo $this->get_field_id('facebook_incon'); ?>"><?php _e('Facebook Icon', 'social-links'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('facebook_incon'); ?>" class="widefat" name="<?php echo $this->get_field_name('facebook_incon'); ?>" value="<?php echo esc_attr($facebook_incon); ?>" />
		</p>
		<!-- twitter -->
		<p> 
			<label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php _e('Twitter Url', 'social-links'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('twitter_link'); ?>" class="widefat" name="<?php echo $this->get_field_name('twitter_link'); ?>" value="<?php echo esc_attr($twitter_link); ?>" />
		</p>
		<p> 
			<label for="<?php echo $this->get_field_id('twitter_incon'); ?>"><?php _e('Twitter Icon', 'social-links'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('twitter_incon'); ?>" class="widefat" name="<?php echo $this->get_field_name('twitter_incon'); ?>" value="<?php echo esc_attr($twitter_incon); ?>" />
		</p>
		<!-- Google Plus -->
		<p> 
			<label for="<?php echo $this->get_field_id('google_link'); ?>"><?php _e('Google Plus Url', 'social-links'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('google_link'); ?>" class="widefat" name="<?php echo $this->get_field_name('google_link'); ?>" value="<?php echo esc_attr($google_link); ?>" />
		</p>
		<p> 
			<label for="<?php echo $this->get_field_id('google_incon'); ?>"><?php _e('Google Plus Icon', 'social-links'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('google_incon'); ?>" class="widefat" name="<?php echo $this->get_field_name('google_incon'); ?>" value="<?php echo esc_attr($google_incon); ?>" />
		</p>
		<!-- LinkedIn -->
		<p> 
			<label for="<?php echo $this->get_field_id('linkedin_link'); ?>"><?php _e('LinkedIn Url', 'social-links'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('linkedin_link'); ?>" class="widefat" name="<?php echo $this->get_field_name('linkedin_link'); ?>" value="<?php echo esc_attr($linkedin_link); ?>" />
		</p>
		<p> 
			<label for="<?php echo $this->get_field_id('linkedin_incon'); ?>"><?php _e('LinkedIn Icon', 'social-links'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('linkedin_incon'); ?>" class="widefat" name="<?php echo $this->get_field_name('linkedin_incon'); ?>" value="<?php echo esc_attr($linkedin_incon); ?>" />
		</p>
		<!-- icon width -->
		<p> 
			<label for="<?php echo $this->get_field_id('incon_width'); ?>"><?php _e('Icon Width', 'social-links'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('incon_width'); ?>" class="widefat" name="<?php echo $this->get_field_name('incon_width'); ?>" value="<?php echo esc_attr($incon_width); ?>" />
		</p>
		
		
		
		
		
		
		
		<?php
		
	}
	
	public function getSocialLinks($links, $icon, $icon_width ){
		?> 
		<div class="social-icons"> 
			<a title="Facebook" target="_blank" href="<?php echo $links['facebook']; ?>"  ><img src="<?php echo $icon['facebook']; ?>" alt="facebook" width="<?php echo $icon_width; ?>" /></a>
			<a  title="Google Plus" target="_blank" href="<?php echo $links['google']; ?>"  ><img src="<?php echo $icon['google']; ?>" alt="google" width="<?php echo $icon_width; ?>" /></a>
			<a  title="LinkedIn" target="_blank" href="<?php echo $links['linkedin']; ?>"  ><img src="<?php echo $icon['linkedin']; ?>" alt="linkedin" width="<?php echo $icon_width; ?>" /></a>
			<a  title="Twitter" target="_blank" href="<?php echo $links['twitter']; ?>"  ><img src="<?php echo $icon['twitter']; ?>" alt="twitter" width="<?php echo $icon_width; ?>" /></a>
		
		</div>
		
		<?php
	}
	
	
	
	
}