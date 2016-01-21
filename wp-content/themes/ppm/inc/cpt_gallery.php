<?php

/*-----------------------------------------------------------------------------------*/
/* Custom post type => Galerias                                              */
/*-----------------------------------------------------------------------------------*/
function galleries_custom_type() {
	$labels = array(
		'name'           		=> _x('Galerias', 'post type general name'),
		'singular_name'     	=> _x('Galeria', 'post type singular name'),
		'add_new'         		=> _x('Criar nova galeria', 'como chegamos la'),
		'add_new_item'       	=> __('Criar nova galeria'),
		'edit_item'       		=> __('Editar galeria'),
		'new_item'         		=> __('Nova'),
		'all_items'       		=> __('Todos as galerias'),
		'view_item'       		=> __('Visualizar galeria'),
		'search_items'      	=> __('Pesquisar por galeria'),
		'not_found'       		=> __('Nada encontrado'),
		'not_found_in_trash'   	=> __('Nada encontrado na lixeira'),
		'parent_item_colon'   	=> '',
		'menu_name'       		=> 'Galerias'
	);

	$args = array(
		'labels'         		=> $labels,
		'public'         		=> true,
		'publicly_queryable'  	=> true,
		'show_ui'        		=> true,
		'show_in_menu'       	=> true,
		'show_in_nav_menus'   	=> true,
		'query_var'       		=> true,
		'capability_type'     	=> 'post',
		'has_archive'       	=> true,
		'hierarchical'       	=> false,
		'menu_position'     	=>  _( 5 ),
		'menu_icon'				=> 'dashicons-format-gallery',
		'supports'				=> array( 'title', 'thumbnail', 'excerpt' )
	);
	register_post_type( 'gallery', $args );
	// flush_rewrite_rules( false );
}
add_action( 'init', 'galleries_custom_type' );
  
// Columns to partners
function galleries_columns( $columns ) {
	$columns['url'] = __('Galerias');
	return $columns;
}
// add_filter( 'manage_edit-galleries_columns', 'galleries_columns' );

// Populating the Columns
function galleries_populate_columns( $column ) {
	global $post;
	switch( $column ) {
		case 'galleries_taxonomies' :
			/* Get the taxonomy_galleriess for the post. */
			$terms = get_the_terms( $post_id, 'taxonomy_galleries' );

			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'taxonomy_galleries' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'taxonomy_galleries', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}

			/* If no terms were found, output a default message. */
			else {
				_e( 'Sem categorias' );
			}

		break;
	}
}
// add_action( 'manage_posts_custom_column', 'galerias_populate_columns' );