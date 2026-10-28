<?php
/**
 * WBW Currency Switcher for WooCommerce - Switcher Floating
 *
 * @version 2.4.0
 *
 * @author woobewoo
 */

defined( 'ABSPATH' ) || exit;

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
foreach ($this->designTab as $p) {
    // create variable like param name with param value
    ${$p} = $this->optionsParams['currency_switcher']['design_tab'][$p]['params']['value'];
}
foreach ($this->displayRulesTab as $p) {
    // create variable like param name with param value
    ${$p} = $this->optionsParams['currency_switcher']['display_rules_tab'][$p]['params']['value'];
}
?>

<style>

<?php if ($show_on_screen && $show_on_screen_compare && $show_on_screen_value) {
    ?>
	<?php if ($show_on_screen_compare === 'less') {
        $show_on_screen_compare = 'max-width';
    } else {
        $show_on_screen_compare = 'min-width';
    } ?>
	.wcuCurrencySwitcher {
		display:none !important;
	}
	@media (<?php echo $show_on_screen_compare ?>:<?php echo $show_on_screen_value?>px) {
		.wcuCurrencySwitcher {
			display:inline-block !important;
		}
<?php
}?>
	<?php if (!wp_is_mobile()) {
        ?>
		.wcuCurrencySwitcher.left, .wcuCurrencySwitcher.right {
			top: <?php echo (float) $vertical_offset_desktop . esc_attr( $vertical_offset_desktop_dimension ); ?> !important;
		}
		.wcuCurrencySwitcher.top {
			top:0;
			left: <?php echo (float) $horizontal_offset_desktop . esc_attr( $horizontal_offset_desktop_dimension ); ?> !important;
		}
		.wcuCurrencySwitcher.bottom {
			bottom:0;
			left: <?php echo (float) $horizontal_offset_desktop . esc_attr( $horizontal_offset_desktop_dimension ); ?> !important;
		}
	<?php
    } else {
        ?>
		.wcuCurrencySwitcher.left, .wcuCurrencySwitcher.right {
			top: <?php echo (float) $vertical_offset_mobile . esc_attr( $vertical_offset_mobile_dimension ); ?> !important;
		}
		.wcuCurrencySwitcher.top {
			top: 0;
			left: <?php echo (float) $horizontal_offset_mobile . esc_attr( $horizontal_offset_mobile_dimension ); ?> !important;
		}
		.wcuCurrencySwitcher.bottom {
			bottom: 0;
			left: <?php echo (float) $horizontal_offset_mobile . esc_attr( $horizontal_offset_mobile_dimension ); ?> !important;
		}
	<?php
    } ?>
	.wcuCurrencySwitcher .wcuHeader {
		background-color: <?php echo esc_attr( $bg_color ); ?>;
        background: <?php echo esc_attr( $bg_color ); ?>;
		color: <?php echo esc_attr( $txt_color ); ?>;
	}
	.wcuCurrencySwitcher tr, .wcuCurrencySwitcher tr.wcuHeader:hover {
		background-color: <?php echo esc_attr( $bg_color ); ?>;
        background: <?php echo esc_attr( $bg_color ); ?>;
		color: <?php echo esc_attr( $txt_color ); ?>;
		border: none;
	}
	.wcuCurrencySwitcher table.wcuCurrencySwitcherFloatingTableCurrencies tr:hover td {
		background-color: <?php echo esc_attr( $bg_color_h ); ?>;
        background: <?php echo esc_attr( $bg_color_h ); ?>;
		color: <?php echo esc_attr( $txt_color_h ); ?>;
	}
	.wcuCurrencySwitcher table.wcuCurrencySwitcherFloatingTableCurrencies tr.wcuCurrent td, .wcuCurrencySwitcher table.wcuCurrencySwitcherFloatingTableButton tr td.wcuCurrent {
		border: none;
		background-color: <?php echo esc_attr( $bg_color_cur ); ?>;
        background: <?php echo esc_attr( $bg_color_cur ); ?>;
		color: <?php echo esc_attr( $txt_color_cur ); ?>;
	}
	.wcuCurrencySwitcher.wcuFloatShowBorder_1 {
		border:1px solid <?php echo esc_attr( $bor_color ); ?>;
	}
	.wcuCurrencySwitcher.wcuFloatToggleSwitcher_on_click .wcuCurrencySwitcherButtonClose {
		background-color: <?php echo esc_attr( $bg_color ); ?>;
        background: <?php echo esc_attr( $bg_color ); ?>;
		color: <?php echo esc_attr( $txt_color ); ?>;
		border: none;
	}
	.wcuCurrencySwitcher.wcuFloatToggleSwitcher_on_click .wcuCurrencySwitcherButtonClose:hover {
		background-color: <?php echo esc_attr(  $bg_color_h ); ?>;
        background: <?php echo esc_attr( $bg_color_h ); ?>;
		color: <?php echo esc_attr( $txt_color_h ); ?>;
	}
	.wcuCurrencySwitcher table, .wcuCurrencySwitcher table.wcuCurrencySwitcherFloatingTableCurrencies tbody tr td, .wcuCurrencySwitcher table.wcuCurrencySwitcherFloatingTableButton tr td {
		background-color: <?php echo esc_attr( $bg_color ); ?>;
        background: <?php echo esc_attr( $bg_color ); ?>;
	}
	#wcuCurrencySwitcherFloating {
		background-color: <?php echo esc_attr( $bg_color ); ?>;
        background: <?php echo esc_attr( $bg_color ); ?>;
	}
    .wcuCurrencySwitcher table.wcuCurrencySwitcherFloatingTableButton tr td:hover  {
		background-color: <?php echo esc_attr( $bg_color_h ); ?>;
        background: <?php echo esc_attr( $bg_color_h ); ?>;
		color: <?php echo esc_attr( $txt_color_h ); ?>;
	}
	.wcuFloatToggleSwitcher_full_size {
		opacity: <?php echo esc_attr( $floating_opacity_panel ) * 0.01; ?>;
		transition:.4s;
	}
	.wcuFloatToggleSwitcher_full_size:hover {
		opacity:1;
	}
	.wcuCurrencySwitcherButton {
		opacity: <?php echo esc_attr( $floating_opacity_button ) * 0.01; ?>;
		transition:.4s;
	}
	.wcuCurrencySwitcherButton:hover {
		opacity:1;
	}
	.wcuFloatToggleSwitcherClick {
		opacity: <?php echo esc_attr(  $floating_opacity_panel ) * 0.01; ?>;
		transition:.4s;
	}
	.wcuFloatToggleSwitcherClick:hover {
		opacity:1;
	}
	.wcuCurrencySwitcher .wcuCurrencySwitcherButton,
	.wcuCurrencySwitcherFloatingTableButton tr td {
		font-family:'<?php echo esc_attr( $floating_opening_btn_font ); ?>', sans-serif !important;
		font-size:<?php echo (float) $floating_opening_btn_size; ?>px !important;
		<?php if (!empty($floating_opening_btn_bold)) {?>
			font-weight:bold !important;
		<?php }?>
		<?php if (!empty($floating_opening_btn_italic)) {?>
			font-style:italic !important;
		<?php }?>
	}
	.wcuCurrencySwitcher .wcuCurrencySwitcherFloatingTableCurrencies {
		font-family:'<?php echo esc_attr( $floating_panel_txt_font ); ?>', sans-serif !important;
		font-size:<?php echo (float) $floating_panel_txt_size; ?>px !important;
		<?php if (!empty($floating_panel_txt_bold)) {?>
			font-weight:bold !important;
		<?php }?>
		<?php if (!empty($floating_panel_txt_italic)) {?>
			font-style:italic !important;
		<?php }?>
	}
	.wcuCurrencySwitcher .wcuHeader {
		font-family:'<?php echo esc_attr(  $floating_panel_header_font ); ?>', sans-serif !important;
		font-size:<?php echo (float) $floating_panel_header_size; ?>px !important;
		<?php if (!empty($floating_panel_header_bold)) {?>
			font-weight:bold !important;
		<?php }?>
		<?php if (!empty($floating_panel_header_italic)) {?>
			font-style:italic !important;
		<?php }?>
		color: <?php echo esc_attr( $floating_panel_header_txt_color ) ?> !important;
		background: <?php echo esc_attr( $floating_panel_header_bg_color ) ?> !important;
	}
	<?php if ($show_on_screen) { ?>
	}
	<?php }?>
</style>

<?php if ( ($switcher_opening_button === 'flags') && !$this->proModule ) {
    $switcher_opening_button = 'currency_codes';
} ?>

<div
	id="wcuCurrencySwitcherFloating"
	class="wcuCurrencySwitcher <?php echo esc_attr( $side_floating ); ?>  wcuFloatToggleSwitcher_<?php echo esc_attr( $toggle_switcher ); ?> wcuFloatOpeningButtonIconSize_<?php echo esc_attr( $floating_icon_size ); ?> wcuFloatOpeningButton_<?php echo esc_attr( $switcher_opening_button ); ?> wcuFloatShowBorder_<?php echo esc_attr( $show_border ); ?> "
	data-type="<?php echo esc_attr( $type ); ?>"
	style="display:none;"
>
	<?php dispatcherWcu::doAction('beforeCurrencySwitcherList', $this->optionsParams); ?>
	   <?php if ( isset($floating_panel_header_show) && ($floating_panel_header_show) ) {?>
			<div class="wcuHeader">
				<?php if ( isset( $floating_panel_header_text ) ) { ?>
					<?php echo esc_html( $floating_panel_header_text ); ?>
				<?php } ?>
			</div>
		<?php }?>

		<div class="wcuCurrencySwitcherFloatingTableCurrenciesBox">
            <table class="wcuCurrencySwitcherFloatingTableCurrencies" cellspacing="0" cellpadding="0">
                <tbody>
                <?php if ($cur_currency_top) {
                    $top[$this->currentCurrency] = $this->currencies[$this->currentCurrency];
                    unset($this->currencies[$this->currentCurrency]);
                    $this->currencies = $top + $this->currencies;
                }?>
                <?php foreach ($this->currencies as $key => $currency) { ?>
                    <?php $current = $key == $this->currentCurrency ? 'wcuCurrent' : ''; ?>
                    <tr class="<?php echo esc_attr( $current )?>" data-currency="<?php echo esc_attr( $key ); ?>">
                        <?php foreach ($currency as $key => $option) { ?>
                            <?php if ( ( ($key === 'flag') || ($key === 'rate') ) && !$this->proModule ) continue; ?>
                            <td><div class="wcuCurrencySwitcherFloatingDiv wcuCurrencySwitcherFloating_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $option  ); ?></div></td>
                        <?php } ?>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>

		<?php if ( !empty($toggle_switcher) && ($toggle_switcher !== 'full_size') ) { ?>

		<div class="wcuCurrencySwitcherButton">
			<table class="wcuCurrencySwitcherFloatingTableButton" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<?php if (!empty($switcher_opening_button) && ($switcher_opening_button !== 'text')) { ?>
							<?php if ($cur_currency_top) { ?>
								<td class="wcuCurrent">
									<div class="wcuCurrencySwitcherButtonDiv"><?php echo esc_html(  $this->currenciesButton[$this->currentCurrency] ); ?></div>
								</td>
							<?php } ?>
							<?php foreach ($this->currenciesButton as $key => $currency) { ?>
								<?php $current = $key == $this->currentCurrency ? 'wcuCurrent' : ''; ?>
								<?php if ( ($switcher_button_show_current && empty($current)) || ($cur_currency_top && !empty($current)) ) { ?>
									<?php continue; ?>
								<?php } ?>
								<td class="<?php echo esc_attr( $current ); ?>">
									<div class="wcuCurrencySwitcherButtonDiv wcuCurrencySwitcherFloating_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $currency ); ?></div>
								</td>
							<?php } ?>
						<?php } else { ?>
							<td nowrap>
								<div class="wcuCurrencySwitcherButtonDiv wcuCurrencySwitcherButtonStaticText"><?php echo esc_html( $switcher_opening_button_text ); ?></div>
							</td>
						<?php } ?>
					</tr>
				</tbody>
			</table>
		</div>

		<?php if (!empty($toggle_switcher) && ($toggle_switcher == 'on_click')) { ?>
			<div class="wcuCurrencySwitcherButtonClose" style="display:none;">
				<i class="fa fa-times" aria-hidden="true"></i>
			</div>
		<?php } ?>

		<?php } ?>

</div>
<script type="text/javascript">
	jQuery('.ddChild').css('height', 'auto');
    jQuery(document).ready(function(){
        var wcuTableBoxHeight = jQuery('#wcuCurrencySwitcherFloating').height();
        if (wcuTableBoxHeight > 250) {
            jQuery('.wcuCurrencySwitcherFloatingTableCurrenciesBox').slimScroll({
                height: '250px'
                , railVisible: true
                , alwaysVisible: true
                , allowPageScroll: false
            });
        }
    });
</script>
<?php
// phpcs:enable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound