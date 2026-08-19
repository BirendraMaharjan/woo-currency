<?php
/**
 * WBW Currency Switcher for WooCommerce - currency_switcherControllerWcu Class
 *
 * @version 2.4.0
 *
 * @author  woobewoo
 */

defined( 'ABSPATH' ) || exit;

class currency_switcherControllerWcu extends controllerWcu { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedClassFound

	public function drawCurrencySwitcherAjax() {
		$res  = new responseWcu();
		$data = escHtmlRecursively( reqWcu::get( 'post' ) );

		if ( isset( $data ) && $data ) {
			$res->setHtml( frameWcu::_()->getModule( 'currency' )->drawModuleAjax( 'currency_switcher', $data ) );
		} else {
			$res->pushError( $this->getModule( 'currency' )->getErrors() );
		}

		$res->ajaxExec();
	}

	public function getPermissions() {
		return array(
			WCU_USERLEVELS => array(
				WCU_ADMIN => array('drawCurrencySwitcherAjax')
			),
		);
	}
}
