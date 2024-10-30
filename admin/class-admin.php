<?php

/* If the file is hit directly, abort... */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @since      1.0.0
 * @package     coothemes-icons
 * @subpackage  coothemes-icons/includes
 * @author     coothemes <support@coothemes.com>
 * @link       https://www.coothemes.com/coothemes-icons/
 */

class CTIC_Icons_Admin {
	
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
	 * @var      string    $plugin_name       The name of this plugin.
	 * @var      string    $version    The version of this plugin.
	*/
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		// load our dependencies
		$this->include_dependencies();

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles') );
		add_action( 'admin_enqueue_scripts',  array( $this, 'enqueue_scripts' ) );		

	}
	
	// load our dependencies here
	private function include_dependencies() {
		/**
		* Load our Icons Page
		*/
		require_once CTIC_PLUGIN_PATH . 'admin/icons-page.php';

	}



	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'coothemes-icons' , CTIC_PLUGIN_URL . 'css/cts-icons/coothemes-icons.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'ctic-admin-styles' , CTIC_PLUGIN_URL . 'css/admin-style.css' );
		
		$custom_css ='';
		if( !(defined( 'CTIC_PRO' ) && CTIC_PRO) ){
			$custom_css .='.ctp-gray{color: #CCCCCC;    display: none;}	.ctp-gray:hover{cursor:auto;color: #CCCCCC;}';
		}

		wp_add_inline_style( 'ctic-admin-styles', $custom_css );	

	}

	/**
	 * Register the JavaScript for the dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		// enqueue our necessary JS and CSS files

		wp_register_script( 'ctic-admin-scripts', CTIC_PLUGIN_URL . 'js/admin-scripts.js', array( 'jquery' , 'jquery-ui-core' , 'jquery-ui-slider' ), $this->version , false );					
		$localized_data = array(
			'site_url' => site_url(),
			'default_icon_element' => get_option( 'ctic_icons_defualt_icon_container' , 'i' ),
		);
		wp_localize_script( 'ctic-admin-scripts' , 'localized_data' , $localized_data );
		wp_enqueue_script( 'ctic-admin-scripts' );
		

		// enqueue our color picker js + styles
		/* Enqueue the color picker dependencies */
		wp_enqueue_style( 'wp-color-picker' );		
		wp_enqueue_script( 'wp-color-picker' );
	}
}