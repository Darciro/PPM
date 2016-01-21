<?php

/*-----------------------------------------------------------------------------------*/
/* Custom post type => Talkshows                                              */
/*-----------------------------------------------------------------------------------*/
function talkshows_custom_type() {
	$labels = array(
		'name'           		=> _x('Talkshows', 'post type general name'),
		'singular_name'     	=> _x('Talkshows', 'post type singular name'),
		'add_new'         		=> _x('Criar novo talkshow', 'como chegamos la'),
		'add_new_item'       	=> __('Criar novo talkshow'),
		'edit_item'       		=> __('Editar talkshow'),
		'new_item'         		=> __('Novo'),
		'all_items'       		=> __('Todos os talkshows'),
		'view_item'       		=> __('Visualizar talkshow'),
		'search_items'      	=> __('Pesquisar por talkshow'),
		'not_found'       		=> __('Nada encontrado'),
		'not_found_in_trash'   	=> __('Nada encontrado na lixeira'),
		'parent_item_colon'   	=> '',
		'menu_name'       		=> 'Talkshows'
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
		'menu_icon'				=> 'dashicons-video-alt',
		'supports'				=> array( 'title', 'thumbnail' )
	);
	register_post_type( 'talkshows', $args );
	// flush_rewrite_rules( false );
}
add_action( 'init', 'talkshows_custom_type' );
  
// Columns to partners
function talkshows_columns( $columns ) {
	$columns['url'] = __('Talkshows');
	return $columns;
}
// add_filter( 'manage_edit-talkshows_columns', 'talkshows_columns' );

// Populating the Columns
function talkshows_populate_columns( $column ) {
	global $post;
	switch( $column ) {
		case 'talkshows_taxonomies' :
			/* Get the taxonomy_depoimentoss for the post. */
			$terms = get_the_terms( $post_id, 'taxonomy_depoimentos' );

			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'taxonomy_depoimentos' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'taxonomy_depoimentos', 'display' ) )
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
// add_action( 'manage_posts_custom_column', 'talkshows_populate_columns' );