<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              plugin_author_url
 * @since             1.0.0
 * @package           Root
 *
 * @wordpress-plugin
 * Plugin Name:       my_plugin_name
 * Plugin URI:
 * Description:       Plugin Description
 * Version:           1.0.0
 * Author:            plugin_author_name
 * Author URI:        plugin_author_url
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Requires PHP: 7.3
 * Text Domain:       text-domain
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! defined( 'PREFIX_VERSION' ) ) {
	define( 'PREFIX_VERSION', '1.0.0' );
}


/**
 * Check PHP version
 */
if ( function_exists( 'phpversion' ) ) {

	if ( version_compare( phpversion(), '7.4', '<' ) ) {
		add_action(
			'admin_notices',
			function() {
				echo "<div class='notice notice-error is-dismissible'>";
				/* translators: 1: Opening <p> HTML element 2: Opening <strong> HTML element 3: Closing <strong> HTML element 4: Closing <p> HTML element  */
				echo sprintf( esc_html__( '%1$s%2$s my_plugin_name NOTICE:%3$s PHP version too low to use this plugin. Please change to at least PHP 7.4. You can contact your web host for assistance in updating your PHP version.%4$s', 'text-domain' ), '<p>', '<strong>', '</strong>', '</p>' );
				echo '</div>';
			}
		);
		return;
	}
}

/**
 * Check PHP versions
 */
if ( defined( 'PHP_VERSION' ) ) {
	if ( version_compare( PHP_VERSION, '7.4', '<' ) ) {
		add_action(
			'admin_notices',
			function() {
				echo "<div class='notice notice-error is-dismissible'>";
				/* translators: 1: Opening <p> HTML element 2: Opening <strong> HTML element 3: Closing <strong> HTML element 4: Closing <p> HTML element  */
				echo sprintf( esc_html__( '%1$s%2$s my_plugin_name NOTICE:%3$s PHP version too low to use this plugin. Please change to at least PHP 7.4. You can contact your web host for assistance in updating your PHP version.%4$s', 'text-domain' ), '<p>', '<strong>', '</strong>', '</p>' );
				echo '</div>';
			}
		);
		return;
	}
}

// Composer autoload
require dirname( __FILE__ ) . '/vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-prefix-activator.php
 */
if ( ! function_exists( 'activate_prefix' ) ) {
	function activate_prefix() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-prefix-activator.php';
		Root_Activator::activate();
	}
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-prefix-deactivator.php
 */
if ( ! function_exists( 'deactivate_prefix' ) ) {
	function deactivate_prefix() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-prefix-deactivator.php';
		Root_Deactivator::deactivate();
	}
}

register_activation_hook( __FILE__, 'activate_prefix' );
register_deactivation_hook( __FILE__, 'deactivate_prefix' );

define( 'PREFIX_BASE_FILE', basename( plugin_dir_path( __FILE__ ) ) );
define( 'PREFIX_PLUGIN_NAME', 'my_plugin_shortname' );
define( 'PREFIX_PLUGIN_DIR', __DIR__ . '/' );
define( 'PREFIX_PLUGIN_ASSETS_DIR', __DIR__ . '/assets/' );
define( 'PREFIX_PLUGIN_ASSETS_PATH_URL', plugin_dir_url( __FILE__ ) . 'assets/' );
define( 'PREFIX_PLUGIN_PATH_URL', plugin_dir_url( __FILE__ ) );

$debug = false;

if ( function_exists( 'wp_get_environment_type' ) ) {
	/* File will only exist in local installation */
	if ( wp_get_environment_type() === 'local' ) {
		$debug = true;
	}
}

define( 'PREFIX_DEBUG', $debug );

use Root\Bootstrap\Main as Plugin;
$plugin = Plugin::get_instance();
$plugin->run();
