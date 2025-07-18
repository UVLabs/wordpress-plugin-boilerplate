<?php
/**
 * Helper functions.
 *
 * @link       plugin_author_url
 * @since      1.0.0
 *
 * @package    Root
 * @author_name     plugin_author_name <plugin_author_email>
 */

namespace Root\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class responsible for creating helper static methods.
 *
 * @package Root\Helpers
 * @since 1.0.0
 */
class FunctionsHelper {

	/**
	 * Turn a script into a module so that we can make use of JS components.
	 *
	 * @param string $tag
	 * @param string $handle
	 * @param string $src
	 * @return string
	 * @since 1.0.0
	 */
	public static function makeScriptsModules( string $tag, string $handle, string $src ): string {

		$id    = $handle . '-js';
		$parts = explode( '</script>', $tag ); // Break up our string

		foreach ( $parts as $key => $part ) {
			if (str_contains($part, $src)) { // Make sure we're only altering the tag for our module script.
				$parts[ $key ] = '<script type="module" src="' . esc_url( $src ) . '" id="' . esc_attr( $id ) . '">';
			}
		}

		$tags = implode( '</script>', $parts ); // Bring everything back together

		return $tags;
	}
}
