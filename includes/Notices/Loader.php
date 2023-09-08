<?php
/**
 * Load Notices to admin notices hook.
 *
 * Author:          plugin_author_name
 *
 * @link    plugin_author_url
 * @since   1.0.0
 * @package Notices
 */

namespace Root\Notices;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Root\Notices\UpsellsNotices;
use Root\Notices\ReviewNotices;

/**
 * The Loader class.
 */
class Loader {

	/**
	 * Load our notices.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function loadNotices() {
		if ( get_current_user_id() !== 1 ) { // Show only to main admin.
			return;
		}
		( new UpsellsNotices() );
		( new ReviewNotices() );
	}
}
