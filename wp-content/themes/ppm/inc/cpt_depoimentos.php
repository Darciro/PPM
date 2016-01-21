<?php

/*-----------------------------------------------------------------------------------*/
/* Custom post type => Depoimentos                                              */
/*-----------------------------------------------------------------------------------*/
function depoimentos_custom_type() {
	$labels = array(
		'name'           		=> _x('Depoimentos', 'post type general name'),
		'singular_name'     	=> _x('Depoimentos', 'post type singular name'),
		'add_new'         		=> _x('Criar novo depoimento', 'como chegamos la'),
		'add_new_item'       	=> __('Criar novo depoimento'),
		'edit_item'       		=> __('Editar depoimento'),
		'new_item'         		=> __('Novo'),
		'all_items'       		=> __('Todos os depoimentos'),
		'view_item'       		=> __('Visualizar depoimento'),
		'search_items'      	=> __('Pesquisar por depoimento'),
		'not_found'       		=> __('Nada encontrado'),
		'not_found_in_trash'   	=> __('Nada encontrado na lixeira'),
		'parent_item_colon'   	=> '',
		'menu_name'       		=> 'Depoimentos'
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
		'menu_icon'				=> 'dashicons-format-quote',
		'supports'				=> array( 'title', 'thumbnail' )
	);
	register_post_type( 'depoimentos', $args );
	// flush_rewrite_rules( false );
}
add_action( 'init', 'depoimentos_custom_type' );
  
// Columns to partners
function depoimentos_columns( $columns ) {
	$columns['url'] = __('Depoimentos');
	return $columns;
}
// add_filter( 'manage_edit-depoimentos_columns', 'depoimentos_columns' );

// Populating the Columns
function depoimentos_populate_columns( $column ) {
	global $post;
	switch( $column ) {
		case 'depoimentos_taxonomies' :
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
// add_action( 'manage_posts_custom_column', 'depoimentos_populate_columns' );