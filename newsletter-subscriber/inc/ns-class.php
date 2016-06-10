<?php 




class Newsletter_Subscriber extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'ns_widget',
			'description' => 'Newsletter Subscriber Form',
		);
		parent::__construct( 'Newsletter_Subscriber', 'Newsletter Subscriber Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$recipient =  $instance['recipient'];
		$subject = !empty($instance['subject']) ? $instance['subject'] : __('New Subscriber', 'ns-domain');
		// outputs the content of the widget
		echo $args['before_widget'];
			
		echo $args['before_title'];
			echo $instance['title'];
		echo $args['after_title'];
		?>
		<div class="ns-submit-msg"></div>
		<form  id="ns-form">
			<p>
			<label  id="ns-name" for=""><?php _e('Name: ', 'ns-domain'); ?></label> <br />
				<input id="news-name" type="text" name="ns-name" required />
			</p>
			<p>
			<label  id="ns-email" for=""><?php _e('Email: ', 'ns-domain'); ?></label> <br />
				<input id="news-email" type="email" name="ns-email" required  />
				<input id="news-recipint" type="hidden" name="ns-email" value="<?php echo $recipient; ?>" />
				<input id="news-recipint" type="hidden" name="news-recipint" value="<?php echo $recipient; ?>" />
				<input id="news-subject" type="hidden" name="news-subject" value="<?php echo $subject; ?>" />
			</p>
			<p>
				<input type="submit" class="btn btn primary" id="ns-submit" value="Submit" />
			</p>
		</form>
		
		<?php 
		
		echo $args['after_widget'];
		
		
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = !empty($instance['title']) ? $instance['title'] : __('Newsletter Subscriber', 'ns-domain');
		$subject = !empty($instance['subject']) ? $instance['subject'] : __('New Subscriber', 'ns-domain');
		$recipient =  $instance['recipient'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ns-domain' ); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" type="text" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('subject'); ?>"><?php _e('Subject', 'ns-domain' ); ?></label>
			<input id="<?php echo $this->get_field_id('subject'); ?>" type="text" class="widefat" name="<?php echo $this->get_field_name('subject'); ?>" value="<?php echo $subject; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('recipient'); ?>"><?php _e('Recipient', 'ns-domain' ); ?></label>
			<input id="<?php echo $this->get_field_id('recipient'); ?>" type="text" class="widefat" name="<?php echo $this->get_field_name('recipient'); ?>" value="<?php echo $recipient; ?>" />
		</p>
		
		<?php
	}

	
}