<?php
declare(strict_types=1);
/**
 * File responsible for Model methods that handle base logic required by other models.
 *
 * Author: Uriahs Victor
 * Created on: 18/07/2025 (d/m/y)
 *
 * @link    https://uriahsvictor.com
 * @package \BaseModel
 * @since   1.0.0
 */

namespace Root\Models;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use wpdb;

/**
 * Class which defines methods that handle base logic required by other models.
 *
 * @package \Root\Models\BaseModel
 * @since   1.0.0
 */
class BaseModel {

	/**
	 * wpdb instance.
	 *
	 * @var wpdb
	 * @since 1.0.0
	 */
	public wpdb $wpdb;

	/**
	 * Class constructor.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct() {
		global $wpdb;
		$this->wpdb = $wpdb;
	}
}
