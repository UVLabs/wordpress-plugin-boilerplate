<?php
/**
 * Admin Notices.
 *
 * Houses all the notices to show in admin dashboard.
 *
 * @link    plugin_author_url
 * @since    1.0.0
 *
 * @package    Root
 */

namespace Root\Notices;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin notices class.
 *
 * @package Root\Notices
 */
class Admin {

	/**
	 * Detect if site has HTTPS support.
	 *
	 * @since    1.0.0
	 */
	public function siteNotHttps() {

		if ( is_ssl() ) {
			return;
		}

		if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO'] ) {
			return;
		}

		?>

		<div class="notice notice-error is-dismissible">
		<?php
		/* translators: 1: Opening <p> HTML element 2: Opening <strong> HTML element 3: Closing <strong> HTML element 4: Closing <p> HTML element  */
		echo sprintf( __( '%1$s%2$s my_plugin_name NOTICE:%3$s HTTPS not detected on this website. The plugin will not work. Please enable HTTPS on this website.%4$s', 'text-domain' ), '<p>', '<strong>', '</strong>', '</p>' );
		?>
		</div>
		<?php
	}

}
