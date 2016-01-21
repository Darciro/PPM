<?php
// update_option( 'siteurl', 'http://ppm.local/' );
// update_option( 'home', 'http://ppm.local/' );

/**
 * Add suport to Feed links
 */
if (function_exists('add_theme_support')) add_theme_support('automatic-feed-links');

/**
 * Register menus
 */
if (function_exists('register_nav_menus')) register_nav_menus(
	array(
		'nav_menu' => 'Menu de navegação principal',
		'sec_menu' => 'Menu secundário',
		'suport_menu' => 'Menu de suporte',
		'footer_menu' => 'Menu rodapé'
	)
);


/**
 * Enable support for Post Thumbnails
 */
add_theme_support('post-thumbnails');
add_image_size('archive-thumb', 200, 125, true);
add_image_size('post-cover', 300, 160, true);
add_image_size('slider-thumb', 1280, 600, true);

/**
 * Register and enqueue scripts and stylesheets
 */
function ppm_scripts()
{

	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
	wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.css');
	wp_enqueue_style('print', get_template_directory_uri() . '/assets/css/print.css', '', '', 'print');
	wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.css');

	wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), false, true);
	wp_enqueue_script('jquery-mask', get_template_directory_uri() . '/assets/js/jquery.mask.min.js', array('jquery'), false, true);
	wp_enqueue_script('jquery-fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.pack.js', array('jquery'), false, true);
	wp_enqueue_script('jquery.cycle2', get_template_directory_uri() . '/assets/js/jquery.cycle2.min.js', array('jquery'), false, true);
	wp_enqueue_script('jquery.cycle2.carousel', get_template_directory_uri() . '/assets/js/jquery.cycle2.carousel.min.js', array('jquery'), false, true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), false, true);


	$creation_choices = get_field_object( 'field_5626c03dc0803' );
	$production_choices = get_field_object( 'field_5626d2f421b80' );
	$distribution_choices = get_field_object( 'field_5626d33421b81' );
	$clean_choices = [];
	foreach( $creation_choices['choices'] as $choice ):
		array_push( $clean_choices, create_slug($choice) );
	endforeach;
	foreach( $production_choices['choices'] as $choice ):
		array_push( $clean_choices, create_slug($choice) );
	endforeach;
	foreach( $distribution_choices['choices'] as $choice ):
		array_push( $clean_choices, create_slug($choice) );
	endforeach;
	$creation_choices = $clean_choices;
	$ppm_settings= array(
		'templatePath' => get_bloginfo('template_url'),
		'creationChoices' => $creation_choices
	);

	wp_localize_script( 'scripts', 'ppmSettings', $ppm_settings );
}

add_action('wp_enqueue_scripts', 'ppm_scripts');

/**
 * Register widgetized areas
 */
function theme_widgets_init()
{
	// Homepage Right Sidebar
	register_sidebar(array(
		'name' => 'Right Sidebar',
		'id' => 'right_sidebar',
		'before_widget' => '<div id="%1$s" class="widget widget-container %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>',
	));

	// Right Sidebar
	/*register_sidebar( array (
		'name' => 'Right Sidebar',
		'id' => 'right_sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-box white widget-container %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );*/

}

add_action('init', 'theme_widgets_init');

/**
 * The Pagination
 */
if (!function_exists('rm_pagination')) {

	function rm_pagination($the_query = NULL)
	{
		global $wp_query;
		$the_query = $the_query ? $the_query : $wp_query;
		$total = $the_query->max_num_pages;

		/*$prev_arrow = is_rtl() ? "&rarr;" : "&larr;";
		$next_arrow = is_rtl() ? "&larr;" : "&rarr;";*/

		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if ($total > 1) {
			if (!$current_page = get_query_var('paged'))
				$current_page = 1;
			if (get_option('permalink_structure')) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo paginate_links(array(
				'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format' => $format,
				'current' => max(1, get_query_var('paged')),
				'total' => $total,
				'show_all' => false,
				'mid_size' => 3,
				'type' => 'list',
				'prev_text' => '<i class="fa fa-angle-left"></i>',
				'next_text' => '<i class="fa fa-angle-right"></i>',
			));
		}
	}

}

/**
 * Modify The Read More Link Text
 */
function modify_read_more_link()
{
	return '<div class="clearfix"><a class="more-link" href="' . get_permalink() . '">Leia mais</a></div>';
}

add_filter('the_content_more_link', 'modify_read_more_link');

/**
 * Return current language
 */
function current_lang()
{
	$lang = pll_current_language();
	return $lang;
}

/**
 * Redirect users to auth page on specific pages
 */
function redirect_to_auth()
{
	$auth_required = get_field('auth_required', $post->ID);

	if ($auth_required || is_page() && !is_user_logged_in() && is_page('inscricao')) {
		$redirect_to = home_url() . '/profile/register/';
		wp_redirect($redirect_to);
		exit;
	} elseif ($auth_required || is_page() && !is_user_logged_in() && is_page('inscription')) {
		$redirect_to = home_url() . '/register';
		wp_redirect($redirect_to);
		exit;
	}
}

add_action('template_redirect', 'redirect_to_auth');

function create_slug ( $var ){
	// strip out all whitespace
	$var = preg_replace('/\s+/', '-', $var);
	// strip out all special chars
	$var = preg_replace('/[^A-Za-z0-9]/', '-', $var);
	// convert the string to all lowercase
	$var = strtolower($var);
	return $var;
}


/**
 * I18n
 */
function ppm_lang()
{
	load_theme_textdomain('ppm_lang', get_template_directory() . '/lang');
}

add_action('after_setup_theme', 'ppm_lang');

/**
 * Include Custom post type - Depoimentos
 */
require(get_template_directory() . '/inc/cpt_depoimentos.php');

/**
 * Get controll
 */
// require( get_template_directory() . '/inc/get_control.php' );

/**
 * Include Custom post type - Talkshows
 */
require(get_template_directory() . '/inc/cpt_talkshows.php');

/**
 * Include Custom post type - Gallery
 */
require(get_template_directory() . '/inc/cpt_gallery.php');

/**
 * Include Custom post type - Gallery
 */
require(get_template_directory() . '/inc/inscription_metabox.php');

function ppm_insert_vote($userID, $choices_arr) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'ppm_votation';
	$choices = json_encode( $choices_arr );

	/*$wpdb->insert(
		$table_name,
		array(
			'user_id' => $userID,
			'time' => 'John'
		),
		array(
			'%d',
			'%s'
		)
	);*/

	$wpdb->insert(
		$table_name,
		array(
			'user_id' 	=> $userID,
			'time' 		=> date("Y-m-d H:i:s"),
			'choices' 	=> $choices
		)
	);
}


/**
 * Check if subscription has ended
 */
function subscription_ended()
{
	if ( is_page('inscricao') ) {
		$redirect_to = home_url() . '/inscricoes-encerradas';
		wp_redirect($redirect_to);
		exit;
	} elseif( is_page('inscription') ){
		$redirect_to = home_url() . '/registration-is-closed';
		wp_redirect($redirect_to);
		exit;
	}
}

add_action('template_redirect', 'subscription_ended');

    acf_add_options_page(array(
        'page_title' 	=> 'Configurações PPM',
        'menu_title'	=> 'Configurações PPM',
        'menu_slug' 	=> 'ppm-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    )

);