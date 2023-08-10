<?php

/**
 * Class responsible for upsell notices.
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
class UpsellsNotices extends Notice {

	use PluginInfo;

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
	public function createProNotice() {

		$days_since_installed = $this->getDaysSinceInstalled();

		// Show notice after 4 days
		if ( $days_since_installed < 3 ) {
			return;
		}

		$content = array(
			'title' => __( '', 'text-domain' ),
			'body'  => __( '', 'text-domain' ),
			'link'  => '',
		);

		echo $this->createNoticeMarkup( 'initial_pro_launch_notice', $content );
	}
}
