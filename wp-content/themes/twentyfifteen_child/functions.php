<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'validate', get_stylesheet_directory_uri() . '/js/validate.js', array(), '1.0.0', true );
}

add_action('acf/save_post', 'my_save_post');
function my_save_post( $post_id ) {
	
	// bail early if not a contact_form post
	if( get_post_type($post_id) !== 'inscricao' ) {
		
		return;
		
	}
	
	
	// bail early if editing in admin
	if( is_admin() ) {
		
		return;
		
	}
	
	
	// vars
	$post = get_post( $post_id );
	
	
	// get custom fields (field group exists for content_form)
	$name = get_field('name', $post_id);
	$email = get_field('email', $post_id);
	
	
	// email data
	$to = 'contact@website.com';
	$headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
	$subject = $post->post_title;
	$body = $post->post_content;
	
	$new_title = 'Inscrição - ' . $post_id;
	$my_post = array(
		'ID'         => $post_id,
		'post_title' => $new_title
		// 'post_name'  => $post_id //originally $new_slug
	);
	wp_update_post( $my_post );
	
	// send email
	// wp_mail($to, $subject, $body, $headers );
	
}

function update_inscricao_meta( $value, $post_id, $field ) {
	global $_POST;
	$new_title = 'Foo';
	// vars

//	$new_title_first_name = get_field('first-name', $post_id);
//	$new_title_last_name = get_field('last-name', $post_id);
//  $new_title = "$new_title_last_name, $new_title_first_name";
	//$new_slug = sanitize_title( $new_title );

    // $result = 

	// update post
	// http://codex.wordpress.org/Function_Reference/wp_update_post
	$my_post = array(
		'ID'         => $post_id,
		'post_title' => $new_title
		// 'post_name'  => $post_id //originally $new_slug
	);

// Update the post into the database
  wp_update_post( $my_post );
}

// add_filter('acf/update_value', 'update_inscricao_meta', 10, 3);

?>