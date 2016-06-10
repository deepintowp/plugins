<?php 

class My_Github_Repos extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'my_github_repo',
			'description' => 'Embed Github Repos.',
		);
		parent::__construct( 'My_Github_Repos', 'My Github Repos', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		$title = !empty($instance['title']) ? $instance['title'] : 'My Github Repos';
		$count = !empty($instance['count']) ? $instance['count'] : 5;
		$username = !empty($instance['username']) ? $instance['username'] : 'deepintowp';
		echo $args['before_widget'];
		echo $args['before_title'];
			echo $title;
		echo $args['after_title'];
			echo $this->showgitRepos($title, $username, $count);
		echo $args['after_widget'];
		
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = !empty($instance['title']) ? $instance['title'] : 'My Github Repos';
		$count = !empty($instance['count']) ? $instance['count'] : 5;
		$username = !empty($instance['username']) ? $instance['username'] : 'deepintowp';
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'mgs-domain'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username', 'mgs-domain'); ?></label>
			<input id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>" class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Number Of Repos', 'mgs-domain'); ?></label>
			<input id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" class="widefat" />
		</p>
		
		<?php 
	}
	
	public function showgitRepos($title, $username, $count ){
		$url = "https://api.github.com/users/$username/repos?sort=created&per_page=$count";
		$options = array('http'=> array( 'user_agent'=> $_SERVER['HTTP_USER_AGENT'] ) );
		$context = stream_context_create($options);
		$response = file_get_contents($url, false, $context);
		$repos = json_decode($response);
		$output = '<ul style="list-style:none;" class="my-git-repo"></ul>';
		$output .= '<img style="display:block; width:100px; height:100px; margin:10px auto;" src="'.$repos[0]->owner->avatar_url.'" alt="'.$repos[0]->owner->login.'" />';
		$output .= '<p style="text-align:center; font-weight:900; " >'.$repos[0]->owner->login.'</p>';
		
				foreach ($repos as $repo):
				$output .= '<li class="repo">
								<div class="repo-name">
									<span class="dashicons dashicons-book" ></span><a target="_blank" href="'.$repo->html_url.'">'.$repo->name.'</a>
								</div>
								<div class="repo-description"> 
									'.$repo->description.'
								</div>
							</li>';
				endforeach;
		$output .= '</ul>';
		return $output;
	}
	
	
}