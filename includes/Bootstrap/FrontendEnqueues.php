<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       plugin_author_url
 * @since      1.0.0
 *
 * @package    Root
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Root
 * @author_name     plugin_author_name <plugin_author_email>
 */
namespace Root\Bootstrap;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class responsible for methods to do with frontend enqueing of JS and CSS.
 *
 * @package Root\Bootstrap
 * @since 1.0.0
 */
class FrontendEnqueues {

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
	 */
	public function __construct() {
		$this->plugin_name = PREFIX_PLUGIN_NAME;
		$this->version     = PREFIX_VERSION;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueueStyles() {
		wp_enqueue_style( $this->plugin_name, PREFIX_PLUGIN_ASSETS_PATH_URL . 'public/css/prefix-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueueScripts() {
		$path = ! ( PREFIX_DEBUG ) ? 'build/' : '';
		wp_enqueue_script( $this->plugin_name, PREFIX_PLUGIN_ASSETS_PATH_URL . 'public/js/' . $path . 'prefix-public.js', array( 'jquery' ), $this->version, false );
	}

}
