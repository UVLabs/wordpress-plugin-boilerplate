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
 * Requires at least: 6.8
 * Requires PHP: 7.4
 * Text Domain:       text-domain
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! defined( 'PREFIX_VERSION' ) ) {
	define( 'PREFIX_VERSION', '1.0.0' );
}

if ( ! defined( 'PREFIX_DB_VERSION' ) ) {
	define( 'PREFIX_DB_VERSION', '1.0.0' );
}

/**
 * Check PHP version
 */
if ( function_exists( 'phpversion' ) ) {

	if ( version_compare( phpversion(), '7.4', '<' ) ) {
		add_action(
			'admin_notices',
			function () {
				echo "<div class='notice notice-error is-dismissible'>";
				/* translators: 1: Opening <p> HTML element 2: Opening <strong> HTML element 3: Closing <strong> HTML element 4: Closing <p> HTML element  */
				printf( esc_html__( '%1$s%2$s my_plugin_name NOTICE:%3$s PHP version too low to use this plugin. Please change to at least PHP 7.4. You can contact your web host for assistance in updating your PHP version.%4$s', 'text-domain' ), '<p>', '<strong>', '</strong>', '</p>' );
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
			function () {
				echo "<div class='notice notice-error is-dismissible'>";
				/* translators: 1: Opening <p> HTML element 2: Opening <strong> HTML element 3: Closing <strong> HTML element 4: Closing <p> HTML element  */
				printf( esc_html__( '%1$s%2$s my_plugin_name NOTICE:%3$s PHP version too low to use this plugin. Please change to at least PHP 7.4. You can contact your web host for assistance in updating your PHP version.%4$s', 'text-domain' ), '<p>', '<strong>', '</strong>', '</p>' );
				echo '</div>';
			}
		);
		return;
	}
}

// Composer autoload.
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor-prefixed/autoload.php';

if ( ! function_exists( 'prefix_activate' ) ) {
	/**
	 * Code to run when plugin is activated.
	 *
	 * @return void
	 */
	function prefix_activate(): void {
		require_once plugin_dir_path( __FILE__ ) . 'includes/RootActivator.php';
		\Root\RootActivator::activate();
	}
}

if ( ! function_exists( 'prefix_deactivate' ) ) {
	/**
	 * Code to run when plugin is deactivated.
	 *
	 * @return void
	 */
	function prefix_deactivate(): void {
		require_once plugin_dir_path( __FILE__ ) . 'includes/RootDeactivator.php';
		\Root\RootDeactivator::deactivate();
	}
}

register_activation_hook( __FILE__, 'prefix_activate' );
register_deactivation_hook( __FILE__, 'prefix_deactivate' );

define( 'PREFIX_BASE_FILE', basename( plugin_dir_path( __FILE__ ) ) );
define( 'PREFIX_PLUGIN_NAME', 'my_plugin_shortname' );
define( 'PREFIX_PLUGIN_DIR', __DIR__ . '/' );
define( 'PREFIX_PLUGIN_ASSETS_DIR', __DIR__ . '/assets/' );
define( 'PREFIX_PLUGIN_ASSETS_PATH_URL', plugin_dir_url( __FILE__ ) . 'assets/' );
define( 'PREFIX_PLUGIN_PATH_URL', plugin_dir_url( __FILE__ ) );

// Debug mode is on when SL_DEV_DEBUGGING is defined in the wp-config.php file of your test environment. Feel free to rename the constant.
define( 'PREFIX_DEBUG', defined( 'SL_DEV_DEBUGGING' ) );

if ( ! function_exists( 'prefix_init' ) ) {
	/**
	 * Bootstrap plugin.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	function prefix_init(): void {
		$plugin_instance = \Root\Bootstrap\Main::getInstance();
		$plugin_instance->run();
	}
}
add_action( 'init', 'prefix_init' );
