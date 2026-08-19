<?php
/**
 * WBW Currency Switcher for WooCommerce - dateWcu Class
 *
 * @version 2.4.0
 *
 * @author  woobewoo
 */

defined( 'ABSPATH' ) || exit;

class dateWcu {
	static public function _($time = NULL) {
		if(is_null($time)) {
			$time = time();
		}
		return date(WCU_DATE_FORMAT_HIS, $time);
	}
}