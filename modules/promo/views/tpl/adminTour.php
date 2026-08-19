<?php
/**
 * WBW Currency Switcher for WooCommerce - Admin Tour
 *
 * @version 2.4.0
 *
 * @author  woobewoo
 */

defined( 'ABSPATH' ) || exit;

?>
<div id="woobewoo-admin-tour" class="">
	<div id="woobewoo-welcome-first_welcome">
		<div class="woobewoo-tour-content">
			<h3><?php printf(__('Welcome to %s plugin!', 'woo-currency'), WCU_WP_PLUGIN_NAME)?></h3>
			<p><?php printf(__('Thank you for choosing our %s plugin. Just click here to start using it - and we will show you it\'s possibilities and powerfull features.', 'woo-currency'), WCU_WP_PLUGIN_NAME)?></p>
		</div>
		<div class="woobewoo-tour-btns">
			<a href="#" class="close"><?php _e('Close', 'woo-currency')?></a>
			<a href="<?php echo frameWcu::_()->getModule('options')->getTabUrl();?>" class="button button-primary woobewoo-tour-next-btn"><?php _e('Next', 'woo-currency')?></a>
		</div>
	</div>
</div>