<?php
/**
 * WBW Currency Switcher for WooCommerce - Switcher Simple Classic
 *
 * @version 2.4.0
 *
 * @author woobewoo
 */

defined( 'ABSPATH' ) || exit;

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
foreach($this->designTab as $p) {
	// create variable like param name with param value
	${$p} = $this->optionsParams['currency_switcher']['design_tab'][$p]['params']['value'];
}
foreach($this->displayRulesTab as $p) {
	// create variable like param name with param value
	${$p} = $this->optionsParams['currency_switcher']['display_rules_tab'][$p]['params']['value'];
}
?>

<style>

	<?php if ($show_on_screen && $show_on_screen_compare && $show_on_screen_value) {?>
	<?php if ($show_on_screen_compare === 'less') {
		$show_on_screen_compare = 'max-width';
	} else {
		$show_on_screen_compare = 'min-width';
	}?>
	.wcuCurrencySwitcher {
		display: none !important;
	}

	@media (  <?php echo $show_on_screen_compare ?>:<?php echo $show_on_screen_value?>px ) {
	.wcuCurrencySwitcher {
		display: inline-block !important;
	}

	<?php }?>
	<?php if (!wp_is_mobile()) { ?>
	.wcuCurrencySwitcher.left, .wcuCurrencySwitcher.right {
		top: <?php echo (float) $vertical_offset_desktop . esc_attr( $vertical_offset_desktop_dimension ); ?> !important;
	}

	.wcuCurrencySwitcher.left {
		left: <?php echo (float) $horizontal_offset_desktop . esc_attr( $horizontal_offset_desktop_dimension ); ?> !important;
	}

	.wcuCurrencySwitcher.right {
		right: <?php echo (float) $horizontal_offset_desktop . esc_attr( $horizontal_offset_desktop_dimension ); ?> !important;
	}

	<?php } else { ?>
	.wcuCurrencySwitcher.left, .wcuCurrencySwitcher.right {
		top: <?php echo (float) $vertical_offset_mobile . esc_attr( $vertical_offset_mobile_dimension ); ?> !important;
	}

	.wcuCurrencySwitcher.left {
		left: <?php echo (float) $horizontal_offset_mobile . esc_attr(  $horizontal_offset_mobile_dimension ); ?> !important;
	}

	.wcuCurrencySwitcher.right {
		right: <?php echo (float) $horizontal_offset_mobile . esc_attr(  $horizontal_offset_mobile_dimension ); ?> !important;
	}

	<?php } ?>
	.wcuCurrencySwitcher li {
		background-color: <?php echo esc_attr( $bg_color ); ?>;
		color: <?php echo esc_attr( $txt_color ); ?>;
		margin: <?php echo (float) $icon_spacing; ?>px;
	}

	.wcuCurrencySwitcher li:hover {
		background-color: <?php echo esc_attr( $bg_color_h ); ?>;
		color: <?php echo esc_attr( $txt_color_h ); ?>;
	}

	.wcuCurrencySwitcher .wcuCurrent {
		background-color: <?php echo esc_attr( $bg_color_cur ); ?>;
		color: <?php echo esc_attr( $txt_color_cur ); ?>;
	}

	.wcuCurrencySwitcher.wcuCscShowBorder_1 li {
		border: 1px solid<?php echo esc_attr( $bor_color ); ?>;
	}

	.wcuCurrencySwitcher.wcuCscShowBorder_1.wcuCscIconType_circle ul li {
		border-bottom: 1px solid <?php echo esc_attr( $bor_color ); ?> !important;
	}

	.wcuCurrencySwitcher.horizontal.wcuCscShowBorder_1 ul li {
		border-bottom: 1px solid <?php echo esc_attr( $bor_color ) ?> !important;
	}

	.wcuCurrencySwitcher.wcuCscIconType_rectangular li {
		border-radius: <?php echo (float) $border_radius . esc_attr( $border_radius_dimension ); ?>;
		-moz-border-radius: <?php echo (float) $border_radius . esc_attr( $border_radius_dimension ); ?>;
		-webkit-border-radius: <?php echo (float) $border_radius . esc_attr( $border_radius_dimension ); ?>;
	}

	.wcuCurrencySwitcher {
		opacity: <?php echo (float) $simple_opacity_panel * 0.01; ?>;
		transition: .4s;
	}

	.wcuCurrencySwitcher:hover {
		opacity: 1;
	}

	<?php if ($show_on_screen) {?>
	}
	<?php }?>

</style>
	<div
		id="wcuCurrencySwitcherSimpleClassic"
		class="wcuCurrencySwitcher <?php echo esc_attr( $side_simple ); ?> <?php echo esc_attr( $layout ); ?> wcuCscShow_<?php echo esc_attr( $show ); ?> wcuCscIconType_<?php echo esc_attr( $icon_type ); ?> wcuCscIconSize_<?php echo esc_attr( $icon_size ); ?> wcuCscShowBorder_<?php echo esc_attr( $show_border ); ?>"
		data-type="<?php echo esc_attr( $type ); ?>"
		style="display: none;"
	>
		<?php dispatcherWcu::doAction( 'beforeCurrencySwitcherList', $this->optionsParams ); ?>
		<ul>
			<?php foreach ( $this->currencies as $key => $currency ) { ?>
				<?php $current = $key == $this->currentCurrency ? 'wcuCurrent' : ''; ?>
				<li class="<?php echo esc_attr( $current ); ?>" data-currency="<?php echo esc_attr( $key ); ?>">
					<?php echo esc_html( $currency ); ?>
				</li>
			<?php } ?>
		</ul>
	</div>
<script type="text/javascript">
	jQuery('.ddChild').css('height', 'auto');
</script>
<?php
// phpcs:enable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound