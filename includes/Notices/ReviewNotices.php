<?php
/**
 * Review Notices.
 *
 * Notices to review the plugin.
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

use Root\Notices\Notice;
use Root\Traits\PluginInfo;

/**
 * Class UpsellsNotices.
 */
class ReviewNotices extends Notice {

	use PluginInfo;

	/**
	 * Class constructor
	 *
	 * @return void
	 */
	public function __construct() {
		$this->createReviewPluginNotice();
	}

	/**
	 * Create leave review for plugin notice.
	 *
	 * @return void
	 */
	public function createReviewPluginNotice() {

		$days_since_installed = $this->getDaysSinceInstalled();

		// Show notice after 3 weeks.
		if ( $days_since_installed < 21 ) {
			return;
		}

		$content = array(
			'title' => __( 'Has my_plugin_name Helped You?', 'text-domain' ),
			'body'  => __( 'Hey! its plugin_author_name, Sole Developer working on my_plugin_name. Has the plugin benefitted your website? If yes, then would you mind taking a few seconds to leave a kind review? Reviews go a long way and they really help keep me motivated to continue working on the plugin and making it better.', 'text-domain' ),
			'cta'   => __( 'Sure!', 'text-domain' ),
			'link'  => 'https://wordpress.org/support/plugin/text-domain/reviews/#new-post',
		);

		$this->createNoticeMarkup( 'leave_review_notice_1', $content );
	}


}
