<?php
/**
 * Trait which holds information about the plugin.
 *
 * Author:          plugin_author_name
 *
 * @link    plugin_author_url
 * @since   1.0.0
 * @package Notices
 */

namespace Root\Traits;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use DateTime;

/**
* Trait Plugin_Info.
*/
trait PluginInfo {

	/**
	 * Returns the number of days since the plugin has been installed.
	 *
	 * If the prefix_first_install_date option is not found. We return 2 days.
	 *
	 * @since    1.0.0
	 * @return int Days since plugin has been installed.
	 */
	private function getDaysSinceInstalled() {

		// Get the installed date.
		// If option does not exist then set installed date as two days ago.
		$installed_date = get_option( 'prefix_first_install_date' );

		if ( ! empty( $installed_date ) ) {
			$installed_date = '@' . $installed_date;
		} else {
			$installed_date = '@' . mktime( 0, 0, 0, date( 'm' ), date( 'd' ) - 2, date( 'Y' ) );
		}

		$installed_date       = new DateTime( $installed_date, wp_timezone() );
		$today                = new DateTime( 'today', wp_timezone() );
		$date_difference      = $installed_date->diff( $today );
		$days_since_installed = $date_difference->format( '%a' );
		return (int) $days_since_installed;
	}

	/**
	 * Get the version the plugin was installed at.
	 *
	 * @return mixed
	 */
	private function getInstalledAtVersion() {
		return get_option( 'prefix_installed_at_version' );
	}
}
