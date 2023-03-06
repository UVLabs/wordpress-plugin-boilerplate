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

/**
 * Class responsible for methods to do with admin enqueing of JS and CSS.
 *
 * @package Root\Bootstrap
 * @since 1.0.0
 */
class Admin_Enqueues {

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
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct() {
		$this->plugin_name = PREFIX_PLUGIN_NAME;
		$this->version     = PREFIX_VERSION;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, PREFIX_PLUGIN_ASSETS_PATH_URL . 'admin/css/prefix-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, PREFIX_PLUGIN_ASSETS_PATH_URL . 'admin/js/prefix-admin.js', array( 'jquery' ), $this->version, false );
	}

}
