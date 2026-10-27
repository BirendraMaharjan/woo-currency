<?php
/**
 * WBW Currency Switcher for WooCommerce - mailModelWcu Class
 *
 * @version 2.4.0
 *
 * @author woobewoo
 */

defined( 'ABSPATH' ) || exit;
class mailModelWcu extends modelWcu { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedClassFound

	/**
	 * testEmail.
	 *
	 * @version 2.4.0
	 */
	public function testEmail( $email ) {
		$email = trim( $email );
		if ( ! empty( $email ) ) {
			if (
				$this->getModule()->send(
					$email,
					__( 'Test email functionality', 'woo-currency' ),
					sprintf(
						/* Translators: %s: URL. */
						__( 'This is a test email for testing email functionality on your site, %s.', 'woo-currency' ),
						WCU_SITE_URL
					)
				)
			) {
				return true;
			} else {
				$this->pushError( $this->getModule()->getMailErrors() );
			}
		} else {
			$this->pushError( __( 'Empty email address', 'woo-currency' ), 'test_email' );
		}

		return false;
	}
}