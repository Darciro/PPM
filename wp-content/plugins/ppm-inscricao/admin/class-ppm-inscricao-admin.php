<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Ppm_Inscricao
 * @subpackage Ppm_Inscricao/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ppm_Inscricao
 * @subpackage Ppm_Inscricao/admin
 * @author     Your Name <email@example.com>
 */
class Ppm_Inscricao_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->templates = array();
		$this->add_ppm_shortcode();
		$this->add_ppm_performed_subscriptions_shortcode();
		$this->add_ppm_voting_shortcode();
		$this->add_ppm_subscriptions_shortcode();
		$this->add_ppm_get_votes_shortcode();
		// $this->add_ppm_subscriptions_link();

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ppm_Inscricao_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ppm_Inscricao_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ppm-inscricao-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ppm_Inscricao_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ppm_Inscricao_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ppm-inscricao-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
     * This function provide a template design for subscribe page
     *
     */
	public function ppm_template_include($template){
		$plugindir = dirname( __FILE__ );

        if ( is_page_template( 'inscricao-template.php' )) {
            $template = $plugindir . '/partials/inscricao-template.php';
        }

        return $template;
	}

	/**
     * Create a shortcode [ppm_subscription]
     *
     */
	public function add_ppm_shortcode(){
		function ppm_subscription_shortcode(){
			$lang = pll_current_language();
			if( $lang == 'en' ){
				$thx_url = home_url('thank-you');
			}else{
				$thx_url = home_url('obrigado');
			}

			return acf_form(array(
						'post_id'		=> 'new_post',
						// 'post_title'	=> 'Some Text',
						'new_post'		=> array(
							'post_type'		=> 'inscricao',
							'post_status'	=> 'publish'
						),
						'return'		=> $thx_url,
						'submit_value'	=> 'Enviar Inscrição'
					));
		}
		add_shortcode( 'ppm_subscription', 'ppm_subscription_shortcode' );
	}

	/**
     * Create a shortcode [ppm_performed_subscriptions]
     *
     */
	public function add_ppm_performed_subscriptions_shortcode(){
		function ppm_performed_subscriptions_shortcode(){
			$current_user = wp_get_current_user();
			if (0 != $current_user->ID) {
				$args = array(
					'post_type' => 'inscricao',
					'author' 	=> $current_user->ID
				);
				$subscriptions_query = new WP_Query( $args );
				if ( $subscriptions_query->have_posts() ) : while ( $subscriptions_query->have_posts() ) : $subscriptions_query->the_post();
					if( have_rows('inscricao') ):
						echo '<div class="inscription-box">';
						echo '<small>Data da inscrição: '. get_the_date() .'</small>';
						echo '<h3>'. get_the_title() .'</h3>';

						// loop through the rows of data
						while ( have_rows('inscricao') ) : the_row();
							$user = get_user_by( 'id', $current_user->ID );
							$email = $user->user_email;
							$user_fullname = get_user_meta( $current_user->ID, 'ppm_fullname' );
							if( !$user_fullname[0] ){
								$name = $user->user_nicename;
							}else{
								$name = $user_fullname[0];
							}
							$inscription_name = '';
							if( get_sub_field('inscricao_terceiros') ){
								$inscription_name = get_sub_field('nome_terceiro');
							}else{
								$inscription_name = $name;
							}

							$body .= '<p>Nome do inscrito: ' . $inscription_name . '</p>';
							/* $body .= '<p>Email: ' . $email . '</p>';
							$body .= '<p>Telefone: ' . get_user_meta( $current_user->ID, 'phone_number' )[0] . '</p>';
							$body .= '<p>País: ' . get_user_meta( $current_user->ID, 'country' )[0] . '</p>';
							$body .= '<p>Estado: ' . get_user_meta( $current_user->ID, 'ppm_estado' )[0] . '</p>';
							$body .= '<p>Cidade: ' . get_user_meta( $current_user->ID, 'ppm_cidade' )[0] . '</p>'; */
							$body .= '<p>Modalidade: ' . get_sub_field('modalidades') . '</p>';
							if( get_sub_field('modalidades') == 'Criação' ){
								$body .= '<p>Categoria: ' . get_sub_field('categorias_de_criacao') . '</p>';
							}else if( get_sub_field('modalidades') == 'Produção' ){
								$body .= '<p>Categoria: ' . get_sub_field('categorias_de_producao') . '</p>';
							}else if( get_sub_field('modalidades') == 'Convergência' ){
								$body .= '<p>Categoria: ' . get_sub_field('categorias_de_convergencia') . '</p>';
							}
							if( have_rows('links_para_avaliacao') ):
								// loop through links
								while ( have_rows('links_para_avaliacao') ) : the_row();
									$body .= '<p>Com o(s) link(s): <a href="'. get_sub_field('link')  .'" target="_blank">' . get_sub_field('link') . '</a></p>';
								endwhile;
							else :
								// No links found
							endif;
							$body .= '<br/>';

							echo $body;
						endwhile;
						echo '</div>';

					else :
						// no rows found
					endif;
				endwhile; else:
					echo '<h2>Você não tem inscrições realizadas</h2>';
				endif;
			}else{
				echo '<h2>Você não tem inscrições realizadas</h2>';
			}

			// $code = $current_user->ID;

			// return $code;
		}
		add_shortcode( 'ppm_performed_subscriptions', 'ppm_performed_subscriptions_shortcode' );
	}

	/**
	 * Create a shortcode for voting [ppm_voting_shortcode]
	 *
	 */
	public function add_ppm_voting_shortcode(){
		function the_ppm_voting_shortcode(){
			global $post;
			$current_user = wp_get_current_user();
			$check_if_user_voted = get_user_meta( $current_user->ID, '_already_voted', true );

			function clean_name ( $var ){
				// strip out all whitespace
				$var = preg_replace('/\s+/', '-', $var);
				// strip out all special chars
				$var = preg_replace('/[^A-Za-z0-9]/', '-', $var);
				// convert the string to all lowercase
				$var = strtolower($var);
				return $var;
			}

			/*if( $check_if_user_voted ):
				echo 'Usuário já votou';
			endif;
			if(isset($_POST['votation-submitted'])) {
				echo '<pre>';
				var_dump($_POST);
				echo '</pre>';
				add_user_meta( $current_user->ID, '_already_voted', true);
				add_user_meta( $current_user->ID, '_votation_result', $_POST);
			}*/

			$args = array(
				'post_type' => 'inscricao',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key' => 'inscricao_0_modalidades',
						// 'value'   => 'Criação',
						// 'value' => 'Produção',
						// 'value'   => 'Convergência',
						'compare' => 'LIKE',
					),
				),
				'orderby' => 'meta_value',
				// 'meta_key' => 'inscricao_0_categorias_de_criacao',
				'order' => 'ASC',
			);

			$i = 1;
			$all_creation_query = new WP_Query($args);
			// echo $all_creation_query->found_posts . '<br/>'; ?>
			<!--<form action="<?php /*echo plugin_dir_url( __FILE__ ) . 'partials/voting-process.php'; */?>" id="votation-form" method="post">-->
			<!--<form action="<?php /*the_permalink(); */?>" id="votation-form" method="post">-->
			<?php if ($all_creation_query->have_posts()) : while ($all_creation_query->have_posts()) : $all_creation_query->the_post(); ?>
				<?php
				$metas = get_post_meta( $post->ID );
				$metas_cat_1 = get_post_meta( $post->ID, 'inscricao_0_categorias_de_criacao' );
				// echo '<pre>'; var_dump( $metas ); echo '</pre>';
				/*if( $metas_cat_1[0] == 'Melhor	Artista	Instrumental' ){
					echo 'Melhor	Artista	Instrumental';
				}*/

				$user = get_user_by('id', $post->post_author);
				$user_fullname = get_user_meta($post->post_author, 'ppm_fullname');
				if (!$user_fullname[0]) {
					$name = $user->user_nicename;
				} else {
					$name = $user_fullname[0];
				}
				$email = $user->user_email;
				?>
				<?php
				if (have_rows('inscricao', $post->ID)):

					// loop through the rows of data
					while (have_rows('inscricao', $post->ID)) : the_row();
						// echo '<p>Modalidade: ' . get_sub_field('modalidades') . '</p>';
						if (get_sub_field('modalidades') == 'Criação') {
							// echo '<p>Categoria: ' . get_sub_field('categorias_de_criacao') . '</p>';
							$modal_cat = get_sub_field('categorias_de_criacao');
						} else if (get_sub_field('modalidades') == 'Produção') {
							// echo '<p>Categoria: ' . get_sub_field('categorias_de_producao') . '</p>';
							$modal_cat = get_sub_field('categorias_de_producao');
						} else if (get_sub_field('modalidades') == 'Convergência') {
							// echo '<p>Categoria: ' . get_sub_field('categorias_de_convergencia') . '</p>';
							$modal_cat = get_sub_field('categorias_de_convergencia');
						}

						?>
						<div class="<?php echo clean_name( $modal_cat ); ?>">
						<?php if( get_sub_field('inscricao_terceiros') ){
							$subscribed_name = get_sub_field('nome_terceiro');
						}else{
							$subscribed_name = $name;
						} ?>
							<label>
								<input type="radio" name="<?php echo clean_name($modal_cat); ?>" data-cat-name="<?php echo $modal_cat; ?>" value="<?php echo $subscribed_name; ?>">
								<?php /*echo $subscribed_name; */?><!--, na categoria --><?php /*echo $modal_cat; */?>
								<?php echo $subscribed_name; ?>
							</label>
						<?php if (have_rows('links_para_avaliacao')):
							// loop through links
							while (have_rows('links_para_avaliacao')) : the_row();
								echo '<p><a class="btn btn-default btn-xs" href="' . get_sub_field('link') . '" target="_blank">' . get_sub_field('link') . '</a></p>';
							endwhile;
						else :
							// No links found
						endif;
						echo '<br/></div>';
					endwhile;

				else :

					// no rows found

				endif;

				?>

				<?php $i++; endwhile;
			else: ?>
				<p>Sorry, no posts to list</p>
			<?php endif; ?>
				<!--<button type="submit">Enviar</button>
				<input type="hidden" name="votation-submitted" id="votation-submitted" value="true" />
			</form>-->
		<?php }
		add_shortcode( 'ppm_voting_shortcode', 'the_ppm_voting_shortcode' );
	}

	/**
	 * Create a shortcode for list subscriptions [ppm_subscriptions_shortcode]
	 *
	 */
	public function add_ppm_subscriptions_shortcode(){
		function the_ppm_subscriptions_shortcode(){
			global $post;
			$current_user = wp_get_current_user();
			$check_if_user_voted = get_user_meta( $current_user->ID, '_already_voted', true );

			function clean_name ( $var ){
				// strip out all whitespace
				$var = preg_replace('/\s+/', '-', $var);
				// strip out all special chars
				$var = preg_replace('/[^A-Za-z0-9]/', '-', $var);
				// convert the string to all lowercase
				$var = strtolower($var);
				return $var;
			}

			/*if( $check_if_user_voted ):
				echo 'Usuário já votou';
			endif;
			if(isset($_POST['votation-submitted'])) {
				echo '<pre>';
				var_dump($_POST);
				echo '</pre>';
				add_user_meta( $current_user->ID, '_already_voted', true);
				add_user_meta( $current_user->ID, '_votation_result', $_POST);
			}*/

			$args = array(
				'post_type' => 'inscricao',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key' => 'inscricao_0_modalidades',
						// 'value'   => 'Criação',
						// 'value' => 'Produção',
						// 'value'   => 'Convergência',
						'compare' => 'LIKE',
					),
				),
				'orderby' => 'meta_value',
				// 'meta_key' => 'inscricao_0_categorias_de_criacao',
				'order' => 'ASC',
			);

			$i = 1;
			$all_creation_query = new WP_Query($args); ?>
			<?php if ($all_creation_query->have_posts()) : while ($all_creation_query->have_posts()) : $all_creation_query->the_post(); ?>
				<?php
				$metas = get_post_meta( $post->ID );
				$metas_cat_1 = get_post_meta( $post->ID, 'inscricao_0_categorias_de_criacao' ); 

				$user = get_user_by('id', $post->post_author);
				$user_fullname = get_user_meta($post->post_author, 'ppm_fullname');
				if (!$user_fullname[0]) {
					$name = $user->user_nicename;
				} else {
					$name = $user_fullname[0];
				}
				$email = $user->user_email;
				?>
				<?php
				if (have_rows('inscricao', $post->ID)):

					// loop through the rows of data
					while (have_rows('inscricao', $post->ID)) : the_row();
						// echo '<p>Modalidade: ' . get_sub_field('modalidades') . '</p>';
						if (get_sub_field('modalidades') == 'Criação') {
							// echo '<p>Categoria: ' . get_sub_field('categorias_de_criacao') . '</p>';
							$modal_cat = get_sub_field('categorias_de_criacao');
						} else if (get_sub_field('modalidades') == 'Produção') {
							// echo '<p>Categoria: ' . get_sub_field('categorias_de_producao') . '</p>';
							$modal_cat = get_sub_field('categorias_de_producao');
						} else if (get_sub_field('modalidades') == 'Convergência') {
							// echo '<p>Categoria: ' . get_sub_field('categorias_de_convergencia') . '</p>';
							$modal_cat = get_sub_field('categorias_de_convergencia');
						}

						?>
						<div class="<?php echo clean_name( $modal_cat ); ?>">
						<?php if( get_sub_field('inscricao_terceiros') ){
							$subscribed_name = get_sub_field('nome_terceiro');
						}else{
							$subscribed_name = $name;
						} ?>
							<label>
								<?php echo $subscribed_name; ?>
							</label>
						<?php if (have_rows('links_para_avaliacao')):
							// loop through links
							while (have_rows('links_para_avaliacao')) : the_row();
								echo '<p class="hidden"><a class="btn btn-default btn-xs" href="' . get_sub_field('link') . '" target="_blank">' . get_sub_field('link') . '</a></p>';
							endwhile;
						else :
							// No links found
						endif;
						echo '<br/></div>';
					endwhile;

				else :

					// no rows found

				endif;

				?>

				<?php $i++; endwhile;
			else: ?>
				<p>Sorry, no posts to list</p>
			<?php endif; ?>
				<!--<button type="submit">Enviar</button>
				<input type="hidden" name="votation-submitted" id="votation-submitted" value="true" />
			</form>-->
		<?php }
		add_shortcode( 'ppm_subscriptions_shortcode', 'the_ppm_subscriptions_shortcode' );
	}

	/**
	 * Create a shortcode [ppm_subscription]
	 *
	 */
	public function add_ppm_get_votes_shortcode(){
		function ppm_get_votes_shortcode(){
			function clean_name ( $var ){
				// strip out all whitespace
				$var = preg_replace('/\s+/', '-', $var);
				// strip out all special chars
				$var = preg_replace('/[^A-Za-z0-9]/', '-', $var);
				// convert the string to all lowercase
				$var = strtolower($var);
				return $var;
			}
			global $wpdb;
			$table_name = $wpdb->prefix . 'ppm_votation';
			$results = $wpdb->get_results( "SELECT * FROM $table_name", ARRAY_A  );

			$creation_choices = get_field_object( 'field_5626c03dc0803' );
			$creation_votes = [];
			foreach( $creation_choices['choices'] as $choice ){
				$creation_votes[clean_name($choice)] = [];
				foreach( $results as $voto ){
					$voto = (array) json_decode( $voto['choices'] );
					foreach( $voto as $i => $v ){
						if( clean_name($choice) == $i ){
							array_push($creation_votes[clean_name($choice)], $v);
						}
					}
				}
			}

			echo '<h1>VOTOS PARA CRIAÇÃO</h1>';

			foreach ( $creation_votes as $i => $creation_vote ){
				foreach( $creation_choices['choices'] as $choice_name ){
					if( clean_name($choice_name) == $i ){
						echo '<h2>'. $choice_name .'</h2>';
					}
				}
				$array = array_count_values( $creation_vote );
				arsort($array);
				if( !empty( $array ) ){
					foreach( $array as $vote => $number_of_votes) {
						echo '<strong>' . $vote . '</strong>, obteve ' . $number_of_votes. ' votos.<br/>';
					}
				}else{
					echo '<strong>Nenhum voto nessa categoria.</strong><br/>';
				}
			}

			$production_choices = get_field_object( 'field_5626d2f421b80' );
			$production_votes = [];
			foreach( $production_choices['choices'] as $choice ){
				$production_votes[clean_name($choice)] = [];
				foreach( $results as $voto ){
					$voto = (array) json_decode( $voto['choices'] );
					foreach( $voto as $i => $v ){
						if( clean_name($choice) == $i ){
							array_push($production_votes[clean_name($choice)], $v);
						}
					}
				}
			}

			echo '<br/><br/><h1>VOTOS PARA PRODUÇÃO</h1>';

			foreach ( $production_votes as $i => $production_vote ){
				foreach( $production_choices['choices'] as $choice_name ){
					if( clean_name($choice_name) == $i ){
						echo '<h2>'. $choice_name .'</h2>';
					}
				}
				$array = array_count_values( $production_vote );
				arsort($array);
				if( !empty( $array ) ){
					foreach( $array as $vote => $number_of_votes) {
						echo '<strong>' . $vote . '</strong>, obteve ' . $number_of_votes. ' votos.<br/>';
					}
				}else{
					echo '<strong>Nenhum voto nessa categoria.</strong><br/>';
				}
			}

			$distribution_choices = get_field_object( 'field_5626d33421b81' );
			$distribution_votes = [];
			foreach( $distribution_choices['choices'] as $choice ){
				$distribution_votes[clean_name($choice)] = [];
				foreach( $results as $voto ){
					$voto = (array) json_decode( $voto['choices'] );
					foreach( $voto as $i => $v ){
						if( clean_name($choice) == $i ){
							array_push($distribution_votes[clean_name($choice)], $v);
						}
					}
				}
			}

			echo '<br/><br/><h1>VOTOS PARA CONVERGÊNCIA</h1>';

			foreach ( $distribution_votes as $i => $distribution_vote ){
				foreach( $distribution_choices['choices'] as $choice_name ){
					if( clean_name($choice_name) == $i ){
						echo '<h2>'. $choice_name .'</h2>';
					}
				}
				$array = array_count_values( $distribution_vote );
				arsort($array);
				if( !empty( $array ) ){
					foreach( $array as $vote => $number_of_votes) {
						echo '<strong>' . $vote . '</strong>, obteve ' . $number_of_votes. ' votos.<br/>';
					}
				}else{
					echo '<strong>Nenhum voto nessa categoria.</strong><br/>';
				}
			}

		}
		add_shortcode( 'ppm_get_votes', 'ppm_get_votes_shortcode' );
	}

	public function add_ppm_subscriptions_link(){
		function subscriptions_link($content) {
			// assuming you have created a page/post entitled 'debug'
			if ($GLOBALS['post']->post_name == 'inscricao') {
				if (get_usernumposts($post->post_author)) {
					$subscriptions_link = '<a href="#">Visualizar inscrições anteriores</a>';
				} else{
					$subscriptions_link = '';
				};
				// $subscriptions_link = '<a href="#">Visualizar inscrições anteriores</a>';
				$content .= $subscriptions_link;
			}
			// otherwise returns the database content
			return $content;
		}
		add_filter( 'the_content', 'subscriptions_link' );
	}

	/**
     * Create our generic custom post type
     * This will handle all of dynamic content
     *
     */
    public function register_ppm_cpt() {
        $labels = array(
            'name' 					=> _x('Inscrições', 'post type general name'),
            'singular_name' 		=> _x('Inscrição', 'post type singular name'),
            'add_new' 				=> _x('Criar nova inscrição', 'CPT'),
            'add_new_item' 			=> __('Criar nova inscrição'),
            'edit_item' 			=> __('Editar'),
            'new_item' 				=> __('Nova inscrição'),
            'all_items' 			=> __('Todas as inscrições'),
            'view_item' 			=> __('Visualizar inscrição'),
            'search_items' 			=> __('Buscar'),
            'not_found' 			=> __('Nada encontrado'),
            'not_found_in_trash'	=> __('Nada encontrado na lixeira'),
            'parent_item_colon' 	=> '',
            'menu_name' 			=> __('Inscrições PPM')
        );

        $args = array(
            'labels' 				=> $labels,
            'public' 				=> false,
			'menu_icon'  			=> 'dashicons-welcome-write-blog',
            'publicly_queryable' 	=> true,
            'show_ui' 				=> true,
            // 'show_in_menu'       => 'galtica/admin/partials/galtica-admin-display.php',
            'show_in_menu' 			=> true,
            'query_var' 			=> false,
            'rewrite' 				=> true,
            'capability_type' 		=> 'post',
            'has_archive' 			=> false,
            'hierarchical' 			=> false,
            'menu_position' 		=> null,
            'supports' 				=> array('title')
        );
        register_post_type('inscricao', $args);
		flush_rewrite_rules();

		require_once plugin_dir_path( __FILE__ ) . 'import/subscriber-acf-form.php';
		$init_form = new Subscriber_ACF_Form;
		// $init_form->register_form();

		// Columns for admin area
		function inscricao_columns( $columns ) {
			$columns['nome'] 	= __('Nome');
			$columns['email'] 	= __('Email');
			return $columns;
		}
		add_filter( 'manage_edit-inscricao_columns', 'inscricao_columns' );

		// Populating the Columns
		function populate_columns_inscricao( $column ) {
			global $post;
			$user = get_user_by( 'id', $post->post_author );
			switch( $column ) {
				case 'nome':
					if( userpro_profile_data('ppm_fullname', $post->post_author) ){
						echo userpro_profile_data('ppm_fullname', $post->post_author);
					}else{
						echo $user->user_nicename;
					}
					break;
				case 'email':
					// global $userpro;
					// var_dump($userpro);
					echo $user->user_email;
					break;
			}
		}
		add_action( 'manage_posts_custom_column', 'populate_columns_inscricao' );
	}

	/**
     * Get data from subscriber and send a confirmation email
     *
     */
	public function save_subscribe($post_id){
		// Check if is a subscribe
		if( get_post_type($post_id) !== 'inscricao' ) {
			return;
		}

		if( is_admin() ) {
			return;
		}
		$post = get_post( $post_id );

		$new_title = 'Inscrição - ' . $post_id;
		$my_post = array(
			'ID'         => $post_id,
			'post_title' => $new_title
			// 'post_name'  => $post_id //originally $new_slug
		);
		wp_update_post( $my_post );

		$user = get_user_by( 'id', $post->post_author );
		$user_fullname = get_user_meta( $post->post_author, 'ppm_fullname' );
		if( !$user_fullname[0] ){
			$name = $user->user_nicename;
		}else{
			$name = $user_fullname[0];
		}
		$email = $user->user_email;


		add_filter( 'wp_mail_content_type', 'set_html_content_type' );
		function set_html_content_type() {
			return 'text/html';
		}

		$to = $email;
		$from_email = 'ppm@ppm.art.br';

		// Require polylang plugin
		$lang = pll_current_language();
		if( $lang == 'en' ){
			$headers = 'From: Music Pro Awards 2016 <' . $from_email . '>' . "\r\n";
			$subject = 'Registration confirmation';
			require_once plugin_dir_path( __FILE__ ) . 'partials/subscription-email_EN.php';

		}else{
			$headers = 'From: Prêmio profissionais da música 2016 <' . $from_email . '>' . "\r\n";
			$subject = 'Confirmação de inscrição';
			require_once plugin_dir_path( __FILE__ ) . 'partials/subscription-email_PT.php';
		}

		// $body  = '<h1>Confirmação de inscrição</h1>';
		// $body .= '<p>Olá <strong>'. $name .'</strong>, sua inscrição no Prêmio profissionais da música 2015 foi realizada com sucesso.</p>';

		$notice_to = 'internet@grv.art.br';
		$subject_to = 'Nova inscrição no PPM';
		$headers_notice = 'From: Nova inscrição no PPM <' . $from_email . '>' . "\r\n";
		require_once plugin_dir_path( __FILE__ ) . 'partials/notice-email.php';
		// $body_notice  = '<h1>O usuário '. $name .' acaba de fazer uma inscrição.</h1>';



		wp_mail($to, $subject, $body, $headers );
		wp_mail($notice_to, $subject_to, $body_notice, $headers_notice );

		// Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
		remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

		// send email
		// wp_mail($to, $subject, $body, $headers );
	}

}
