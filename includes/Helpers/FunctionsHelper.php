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
	 * Edits the tag WordPress already built for the enqueued script, instead of writing a new
	 * one, so everything else in it (other attributes, inline scripts) is kept.
	 *
	 * @param string $tag    Full HTML WordPress prints for the script, inline scripts included.
	 * @param string $handle Handle the script was enqueued with.
	 * @param string $src    URL of the script (unused, part of the script_loader_tag signature).
	 * @return string
	 * @since 1.0.0
	 */
	public static function makeScriptsModules( string $tag, string $handle, string $src ): string {
		$processor = new \WP_HTML_Tag_Processor( $tag );

		while ( $processor->next_tag( 'script' ) ) {
			// WordPress gives the script itself the ID "{handle}-js"; its inline scripts have
			// other IDs and must stay normal scripts.
			if ( $processor->get_attribute( 'id' ) === $handle . '-js' && $processor->get_attribute( 'src' ) !== null ) {
				$processor->set_attribute( 'type', 'module' );
			}
		}

		return $processor->get_updated_html();
	}
}
