<?php

/**
* Class responsible for upsell notices.
*
* Author:          author
*
* @link    author_url
* @since   1.0.0
* @package Notices
*/

namespace Root\Notices;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Root\Notices\Notice;
use Root\Traits\Plugin_Info;

/**
* Class Upsells_Notices.
*/
class Upsells_Notices extends Notice {

	use Plugin_Info;

	/**
	 * Class constructor
	 *
	 * @return void
	 */
	public function __construct() {
	}

	/**
	 * Create initial pro released notice.
	 *
	 * @return void
	 */
	public function create_pro_notice() {

		$days_since_installed = $this->get_days_since_installed();

		// Show notice after 4 days
		if ( $days_since_installed < 3 ) {
			return;
		}

		$content = array(
			'title' => __( '', 'text-domain' ),
			'body'  => __( '', 'text-domain' ),
			'link'  => '',
		);

		echo $this->create_notice_markup( 'initial_pro_launch_notice', $content );
	}
}
