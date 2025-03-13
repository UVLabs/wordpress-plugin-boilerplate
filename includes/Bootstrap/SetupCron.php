<?php
/**
 * Setup our various cron events.
 *
 * Author:          Uriahs Victor
 * Created on:      30/11/2022 (d/m/y)
 *
 * @link    https://uriahsvictor.com
 * @since   1.0.0
 * @package Bootstrap
 */

namespace Root\Bootstrap;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class SetupCron.
 *
 * @since 1.0.0
 */
class SetupCron {

	/**
	 * Create cron tasks that should be running on the website.
	 *
	 * Runs on admin init
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function setCronTasks() {
		/*
			if ( ! wp_next_scheduled( 'event-name', array() ) ) {
			wp_schedule_event( time(), 'daily', 'event-name' );
			}
		*/
	}

}
