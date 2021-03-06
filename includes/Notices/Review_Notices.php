<?php

/**
* Review Notices.
*
* Notices to review the plugin.
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

use Root\Notices\Notice;
use Root\Traits\Plugin_Info;

/**
* Class Upsells_Notices.
*/
class Review_Notices extends Notice {

	use Plugin_Info;

	/**
	 * Class constructor
	 *
	 * @return void
	 */
	public function __construct() {
		$this->create_review_plugin_notice();
	}

	/**
	 * Create leave review for plugin notice.
	 *
	 * @return void
	 */
	public function create_review_plugin_notice() {

		$days_since_installed = $this->get_days_since_installed();

		// Show notice after 3 weeks
		if ( $days_since_installed < 21 ) {
			return;
		}

		$content = array(
			'title' => __( 'Has our_plugin_name Helped You?', 'text-domain' ),
			'body'  => __( 'Hey! its author_name, Sole Developer working on our_plugin_name. Has the plugin benefitted your website? If yes, then would you mind taking a few seconds to leave a kind review? Reviews go a long way and they really help keep me motivated to continue working on the plugin and making it better.', 'text-domain' ),
			'cta'   => __( 'Sure!', 'text-domain' ),
			'link'  => 'https://wordpress.org/support/plugin/text-domain/reviews/#new-post',
		);

		echo $this->create_notice_markup( 'leave_review_notice_1', $content );
	}


}
