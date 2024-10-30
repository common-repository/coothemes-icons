<?php

/* If the file is hit directly, abort... */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * The file that defines the core plugin class
 *
 * @since      1.0.0
 * @package    coothemes-icons
 * @subpackage coothemes-icons/includes
 * @author     Coothemes Team <coothemes@gmail.com>
 * @link       https://www.coothemes.com/coothemes-icons/
 */


class Coothemes_Icons {
	
	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Plugin_Name_Loader    $loader    Maintains and registers all hooks for the plugin.
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
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */	
	
	
	public function __construct() {

		$this->plugin_name = 'coothemes-icons';
		$this->version = '1.0.0';

		if(is_admin() ){
				$this->load_dependencies();
				$this->define_admin_hooks();
		}
		//for Front page
		add_action( 'wp_enqueue_scripts', array( $this, 'ctic_enqueue_styles') );
		add_action( 'wp_enqueue_scripts',  array( $this, 'ctic_enqueue_scripts' ) );

	}


	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - WP_CTIC_Icons_Admin. Defines all hooks for the dashboard.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {


		/**
		 * The class responsible for defining all actions that occur in the Dashboard.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-admin.php';

	}


	/**
	 * Register all of the hooks related to the dashboard functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new CTIC_Icons_Admin( $this->get_plugin_name(), $this->get_version() );


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
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}


	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    1.0.0
	 */
	public function ctic_enqueue_styles() {
		wp_enqueue_style( 'coothemes-icons' , CTIC_PLUGIN_URL . 'css/coothemes-icons/coothemes-icons.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'ctic-styles' , CTIC_PLUGIN_URL . 'css/style.css' );

	}

	/**
	 * Register the JavaScript for the dashboard.
	 *
	 * @since    1.0.0
	 */
	public function ctic_enqueue_scripts() {
		// enqueue our necessary JS and CSS files

	}

}