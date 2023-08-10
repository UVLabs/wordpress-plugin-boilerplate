<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       plugin_author_url
 * @since      1.0.0
 *
 * @package    Root
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Root
 * @author_name     plugin_author_name <plugin_author_email>
 */
namespace Root\Bootstrap;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class I18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function loadPluginTextdomain() {

		load_plugin_textdomain(
			'text-domain',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}

}
