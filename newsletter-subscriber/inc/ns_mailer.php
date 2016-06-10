<?php 


function ns_form_action_function(){
	$data = $_POST['data'];
	
	if( !check_ajax_referer('ns-nonce', 'security' ) ){
		
		wp_send_json_error('security failed');
		
		
		return;
		
	}
	// validation if name or email field is empty
	if( empty($data['email']) || empty($data['name'])){
		echo '<span style="color:red" >Fillup all field. </span>';
		wp_die();
		return;
	}
	// email validation 
	
	if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
		  echo '<span style="color:red" >Invalid email format</span>'; 
		  
		  return;
	}
	/*
	* 	MAIL TO ADMIN
	*/
	$owner_email = get_user_by('id', 1)->user_email;
	$to = !empty($data['recipint']) ? $data['recipint'] : $owner_email ;
	$form = $data['email'];

	$subject = $data['subject'];

	$headers = "From: " . strip_tags($form) . "\r\n";
	$headers.= "Reply-To: The Reply To ".$data['name']." <". strip_tags($form) .">\r\n";
	$headers .= "CC: ".$form."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$message = '<html><table rules="all" style="border-color: #666;" cellpadding="10">
					<tr style="background: #eee;"><td>New Subscription</td></tr>
					<tr style="background: #999;"><td><strong>Name:</strong> </td><td>'.$data['name'].'</td></tr>
					<tr style="background: #999;"><td><strong>Email:</strong> </td><td>'.$data['email'].'</td></tr>
					
					
				</table><body>';
	
	mail($to, $subject, $message, $headers);
	/*
	* 	MAIL TO ADMIN
	*/
	$to =  $data['email'];
	$site_title = str_replace(' ', '-', get_bloginfo('name'));
	
	$form = 'no-reply@'.$site_title.'.com';
	$subject = 'Thank You For Subscription.';
	$headers = "From: " . strip_tags($form) . "\r\n";
	$headers.= "Reply-To: The Reply To ".get_bloginfo('name')." <". strip_tags($form) .">\r\n";
	$headers .= "CC: ".$form."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$message = '<html><table rules="all" style="border-color: #666;" cellpadding="10">
					<tr>
						Thank '.$data['email'].' For subscription.
					</tr>
					
				</table><body>';
	
	mail($to, $subject, $message, $headers);
	echo '<span style="color:green" >Thank You for subscription</span>'; 
	wp_die();
}
add_action('wp_ajax_nopriv_ns_form_action_function','ns_form_action_function');
add_action('wp_ajax_ns_form_action_function','ns_form_action_function');