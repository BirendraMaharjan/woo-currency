<?php
/**
 * WBW Currency Switcher for WooCommerce - pagesWcu Class
 *
 * @version 2.4.0
 *
 * @author  woobewoo
 */

defined( 'ABSPATH' ) || exit;

class pagesWcu extends moduleWcu {
    /**
     * Check if current page is Login page
     */
    public function isLogin() {
		return (basename($_SERVER['SCRIPT_NAME']) == 'wp-login.php' 
				|| strpos($_SERVER['REQUEST_URI'], '/login/') === 0);	// Some plugins create login page by this address
    }
}

