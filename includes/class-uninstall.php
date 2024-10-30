<?php

/* If the file is hit directly, abort... */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Fired during plugin uninstall.
 *
 * This class defines all code necessary to run during the plugin's uninstall.
 *
 * @since      1.0.0
 * @package    coothemes-icon
 * @subpackage coothemes-icon/includes
 * @author     Coothemes Team <coothemes@gmail.com>
 * @link       https://www.coothemes.com/coothemes-icons/
 */

class CTIC_Icons_Uninstall {

	/**
	 * Clean up our plugin options so we leave no orphan settings
	 * in the users database. No one likes useless data floating around.
	 *
	 * @since    1.0.0
	 */
	public static function uninstall() {



	}


}
