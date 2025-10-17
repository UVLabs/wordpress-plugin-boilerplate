<?php
/**
 * Fired during plugin activation
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
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Root
 * @author     plugin_author_name <plugin_author_email>
 */
class RootActivator {

	/**
	 * Method fired on plugin activation.
	 *
	 * @since    1.0.0
	 */
	public static function activate(): void {
		self::addDefaultSettings();
	}

	/**
	 * Add our default settings to the site DB.
	 *
	 * @return void
	 */
	private static function addDefaultSettings(): void {

		$installed_at = get_option( 'prefix_installed_at_version' );
		$install_date = get_option( 'prefix_first_install_date' );
		$db_version   = get_option( 'prefix_db_version' );

		// Create date timestamp when plugin was first installed.
		if ( empty( $install_date ) ) {
			add_option( 'prefix_first_install_date', time(), '', 'yes' );
		}

		// Create entry for plugin first install version.
		if ( empty( $installed_at ) ) {
			add_option( 'prefix_installed_at_version', PREFIX_VERSION, '', false );
		}

		// Create db version.
		if ( empty( $db_version ) ) {
			add_option( 'prefix_db_version', PREFIX_DB_VERSION, '', false );
		}
	}
}
