<?php
/**
 * Class responsible for creating notices markup.
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

/**
 * Class Notice.
 */
class Notice {

	/**
	 * Get the current user id
	 *
	 * @return int
	 */
	protected function getUserID() {
		return get_current_user_id();
	}

	/**
	 * Get the notice ids that have been dismissed by user.
	 *
	 * @return mixed
	 */
	protected function getDismissedNotices() {
		return get_user_meta( $this->getUserID(), 'prefix_dismissed_notices', true );
	}

	/**
	 * Create the dismiss URL for a notice.
	 *
	 * @param string $notice_id The ID of the particular notice.
	 * @return string
	 */
	protected function createDismissUrl( string $notice_id ) {

		if ( ! function_exists( 'wp_create_nonce' ) ) {
			require_once ABSPATH . 'wp-includes/pluggable.php';
		}
		$nonce = wp_create_nonce( 'prefix_notice_nonce_value' );

		return admin_url( 'admin-ajax.php?action=prefix_dismissNotice&prefix_notice_id=' . $notice_id . '&prefix_notice_nonce=' . $nonce );
	}

	/**
	 * Create the markup for a notice
	 *
	 * @param string $notice_id The ID of the particular notice.
	 * @param array  $content The content to add to the notice.
	 * @return string
	 */
	protected function createNoticeMarkup( string $notice_id, array $content ) {

		// Only show the Notice to Admins.
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$dismissed_notices = $this->getDismissedNotices();

		// Bail if this notice has been dismissed.
		if ( is_array( $dismissed_notices ) && in_array( $notice_id, $dismissed_notices, true ) ) {
			return;
		}

		$title             = $content['title'] ?? '';
		$body              = $content['body'] ?? '';
		$cta_text          = esc_html( $content['cta'] ?? __( 'Learn more', 'text-domain' ) );
		$learn_more_link   = esc_attr( $content['link'] ?? '' );
		$learm_more_output = '';

		if ( ! empty( $learn_more_link ) ) {
			$learm_more_output = "<li id='prefix-notice-cta'><a target='_blank' href='$learn_more_link' style='color: #2b4fa3'><span class='dashicons dashicons-share-alt2'></span>$cta_text</a></li>";
		}

		$dismiss_url  = esc_html( $this->createDismissUrl( $notice_id ) );
		$dismiss_text = esc_html__( 'Dismiss', 'text-domain' );
		?>
			<!-- TODO Add styles for this notice logo -->
			<div class="update-nag prefix-admin-notice" data-notice-title="<?php echo esc_attr( $title ); ?>">
			<div class="prefix-notice-logo"></div> 
			<p class="prefix-notice-title"><?php echo esc_html( $title ); ?></p> 
			<p class="prefix-notice-body"><?php echo esc_html( $body ); ?></p>
			<ul class="prefix-notice-body">
			<?php echo $learm_more_output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- We already escaped the individual contents $learm_more_output above. ?>
			<li id="prefix-notice-dismiss"><a href="<?php echo esc_attr( $dismiss_url ); ?>" style="color: #2b4fa3"> <span class="dashicons dashicons-dismiss"></span><?php echo esc_html( $dismiss_text ); ?></a></li>
			</ul>
			</div>

		<?php
	}

	/**
	 * Get the ID of a notice from the URL.
	 *
	 * @return mixed
	 */
	protected function getNoticeID() {

		$nonce = sanitize_text_field( wp_unslash( $_REQUEST['prefix_notice_nonce_value'] ?? '' ) );

		if ( ! wp_verify_nonce( $nonce, 'prefix_notice_nonce_value' ) ) {
			exit( esc_html__( 'Failed to verify nonce. Please try going back and refreshing the page to try again.', 'text-domain' ) );
		}

		$notice_id = sanitize_text_field( wp_unslash( $_REQUEST['prefix_notice_id'] ?? '' ) );

		if ( empty( $notice_id ) ) {
			return;
		}

		return $notice_id;
	}

	/**
	 * Dismiss a notice so it doesn't show again.
	 *
	 * @return void
	 */
	public function dismissNotice() {

		$nonce = sanitize_text_field( wp_unslash( $_REQUEST['prefix_notice_nonce'] ?? '' ) );

		if ( ! wp_verify_nonce( $nonce, 'prefix_notice_nonce_value' ) ) {
			exit( esc_html__( 'Failed to verify nonce. Please try going back and refreshing the page to try again.', 'text-domain' ) );
		}

		$notice_id = $this->getNoticeID();

		if ( empty( $notice_id ) ) {
			return;
		}

		$dismissed_notices = $this->getDismissedNotices();

		if ( empty( $dismissed_notices ) ) {
			$dismissed_notices = array();
		}

		// Add our new notice ID to the currently dismissed ones.
		array_push( $dismissed_notices, $notice_id );

		$dismissed_notices = array_unique( $dismissed_notices );

		update_user_meta( $this->getUserID(), 'prefix_dismissed_notices', $dismissed_notices );

		wp_safe_redirect( sanitize_text_field( wp_unslash( $_SERVER['HTTP_REFERER'] ?? get_admin_url() ) ) );
		exit;
	}

}
