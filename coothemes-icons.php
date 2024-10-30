<?php
/**
 * Plugin Name:       Coothemes Icons
 * Plugin URI:        https://www.coothemes.com/coothemes-icons/
 * Description:       Quickly and effortlessly gain access to 2000 beautifully designed SVG font icons, available on the frontend and backend of your site.
 * Version:           1.0.2
 * Author:            Coothemes.com Team
 * Author URI:        http://www.coothemes.com
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       coothemes-icons
 * Domain Path:       /languages
 */
//Coothemes Icons - CTIC  ctic

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'CTIC_PLUGIN_URL' ,plugin_dir_url( __FILE__ ));
define( 'CTIC_PLUGIN_PATH' ,plugin_dir_path( __FILE__ ));

//define( 'CTIC_PRO' ,true);
/**
 * The code that runs during plugin activation.
 * 
 */
function activate_coothemes_icons() {
	require_once CTIC_PLUGIN_PATH . 'includes/class-activator.php';
	CTIC_Icons_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-deactivator.php
 */
function deactivate_coothemes_icons() {
	require_once CTIC_PLUGIN_PATH . 'includes/class-deactivator.php';
	CTIC_Icons_Deactivator::deactivate();
}

/**
 * The code that runs during plugin uninstall.
 * This action is documented in includes/class-uninstall.php
 */
function uninstall_coothemes_icons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-uninstall.php';
	CTIC_Icons_Uninstall::uninstall();
}

register_activation_hook( __FILE__, 'activate_coothemes_icons' );
register_deactivation_hook( __FILE__, 'deactivate_coothemes_icons' );
register_uninstall_hook( __FILE__ ,	'uninstall_coothemes_icons' );



/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-coothemes-icons.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
 
function ctic_icons_run() {
	$plugin = new Coothemes_Icons();
}
ctic_icons_run();


//Parsing short code display at the front end
include_once( plugin_dir_path(  __FILE__  ) . 'public/shortcodes.php' );