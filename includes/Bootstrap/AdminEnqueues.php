<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       plugin_author_url
 * @since      1.0.0
 *
 * @package    Root
 * @author_name     plugin_author_name <plugin_author_email>
 */

namespace Root\Bootstrap;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Root\Helpers\Functions;

/**
 * Class responsible for methods to do with admin enqueing of JS and CSS.
 *
 * @package Root\Bootstrap
 * @since 1.0.0
 */
class AdminEnqueues {

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
	 * Burst cache if on Local dev environment.
	 *
	 * @var int
	 * @since 1.0.0
	 */
	private $maybe_burst_cache;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->plugin_name       = PREFIX_PLUGIN_NAME;
		$this->version           = PREFIX_VERSION;
		$this->maybe_burst_cache = ( defined( 'PREFIX_DEBUG' ) && PREFIX_DEBUG ) ? time() : '';
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueueStyles() {
		wp_enqueue_style( $this->plugin_name, PREFIX_PLUGIN_ASSETS_PATH_URL . 'admin/css/prefix-admin.css', array(), $this->version . $this->maybe_burst_cache, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueueScripts() {
		$path = ! ( PREFIX_DEBUG ) ? 'build/' : '';
		wp_enqueue_script( $this->plugin_name, PREFIX_PLUGIN_ASSETS_PATH_URL . 'admin/js/' . $path . 'prefix-admin.js', array( 'jquery' ), $this->version . $this->maybe_burst_cache, false );
	}

	/**
	 * Turn a script into a module so that we can make use of JS components.
	 *
	 * @param string $tag
	 * @param string $handle
	 * @param string $src
	 * @return string
	 * @since 1.0.0
	 */
	public function getScriptsAsModules( string $tag, string $handle, string $src ) {

		if ( PREFIX_DEBUG === false ) { // Live scripts are built in Parcel so no need to make them modules.
			return $tag;
		}

		$modules_handlers = array(
			$this->plugin_name, // Name of default js handler
			// $this->plugin_name . '-my-other-script', // You can add other script handlers.
		);

		if ( ! in_array( $handle, $modules_handlers, true ) ) {
			return $tag;
		}

		return Functions::makeScriptsModules( $tag, $handle, $src );
	}

}
