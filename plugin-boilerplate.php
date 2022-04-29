<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              author_url
 * @since             1.0.0
 * @package           Root
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Name
 * Plugin URI:
 * Description:       Plugin Description
 * Version:           1.0.0
 * Author:            author_name
 * Author URI:        author_url
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Requires PHP: 7.3
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! defined( 'PREFIX_VERSION' ) ) {
	define( 'PREFIX_VERSION', '1.0.0' );
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

/**
 * Check PHP version
 */
if ( function_exists( 'phpversion' ) ) {

	if ( version_compare( phpversion(), '7.3', '<' ) ) {
		add_action( 'admin_notices', array( ( new Root\Notices\Admin ), 'output_php_version_notice' ) );
		return;
	}
}

/**
 * Check PHP versions
 */
if ( defined( 'PHP_VERSION' ) ) {
	if ( version_compare( PHP_VERSION, '7.3', '<' ) ) {
		add_action( 'admin_notices', array( ( new Root\Notices\Admin ), 'output_php_version_notice' ) );
		return;
	}
}

define( 'PREFIX_BASE_FILE', basename( plugin_dir_path( __FILE__ ) ) );
define( 'PREFIX_PLUGIN_NAME', 'our_plugin_name' );
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

use Root\Bootstrap\Main as Plugin;
$plugin = Plugin::get_instance();
$plugin->run();
