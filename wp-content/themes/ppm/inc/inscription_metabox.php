<?php

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function ppm_add_meta_box() {

	$screens = array( 'inscricao' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'ppm_sectionid',
			__( 'Informações sobre a inscrição', 'ppm_textdomain' ),
			'ppm_meta_box_callback',
			$screen,
			'side',
			'high'
		);
	}
}
add_action( 'add_meta_boxes', 'ppm_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function ppm_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'ppm_save_meta_box_data', 'ppm_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_my_meta_value_key', true ); ?>
	<?php
	$user = get_user_by( 'id', $post->post_author );
	$user_fullname = get_user_meta( $post->post_author, 'ppm_fullname' );
	if( !$user_fullname[0] ){
		$name = $user->user_nicename;
	}else{
		$name = $user_fullname[0];
	}
	$email = $user->user_email;
	?>
	<p>Nome: <?php echo $name; ?></p>
	<p>Email: <?php echo $email; ?></p>
	<p>Telefone: <?php echo get_user_meta( $post->post_author, 'phone_number' )[0]; ?></p>
	<p>País: <?php echo get_user_meta( $post->post_author, 'country' )[0]; ?></p>
	<p>Estado: <?php echo get_user_meta( $post->post_author, 'ppm_estado' )[0]; ?></p>
	<p>Cidade: <?php echo get_user_meta( $post->post_author, 'ppm_cidade' )[0]; ?></p>

	<?php 
	/* echo '<label for="ppm_new_field">';
	_e( 'Description for this field', 'ppm_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="ppm_new_field" name="ppm_new_field" value="' . esc_attr( $value ) . '" size="25" />';*/
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function ppm_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['ppm_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['ppm_meta_box_nonce'], 'ppm_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['ppm_new_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['ppm_new_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_my_meta_value_key', $my_data );
}
add_action( 'save_post', 'ppm_save_meta_box_data' ); ?>