<?php
/**
 * File responsible for removing plugin settings during uninstall.
 *
 * Author:          Uriahs Victor
 * Created on:      10/08/2023 (d/m/y)
 *
 * @link    https://uriahsvictor.com
 * @since   1.0.0
 * @package Uninstall
 */

// WordPress defines this constant only while it is deleting the plugin. Checking it (instead
// of ABSPATH) means this file can't run any other way, such as being loaded directly.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
