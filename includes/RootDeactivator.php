<?php
/**
 * Fired during plugin deactivation
 *
 * @link       plugin_author_url
 * @since      1.0.0
 *
 * @package    Root
 */

namespace Root;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Root
 * @author     plugin_author_name <plugin_author_email>
 */
class RootDeactivator {

	/**
	 * Method fired on plugin deactivation.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
	}
}
