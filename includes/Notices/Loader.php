<?php
/**
* Load Notices to admin notices hook.
*
* Author:          author_name
*
* @link    author_url
* @since   1.0.0
* @package Notices
*/

namespace Root\Notices;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Root\Notices\Upsells_Notices;
use Root\Notices\Review_Notices;

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
	public function load_notices() {
		( new Upsells_Notices );
		( new Review_Notices );
	}
}
