<?php
/**
 * WBW Currency Switcher for WooCommerce - Currency Tab Content
 *
 * @version 2.4.0
 *
 * @author  woobewoo
 */

defined( 'ABSPATH' ) || exit;
?>

<?php $wcuShowPro = !empty($this->optionsProModule) ? '' : 'wcuShowPro'; ?>
<div class="wcuCurrenciesShell">
	<h3 style="margin-bottom: 1px;"><?php printf(__('WooCurrency %s', 'woo-currency'), WCU_VERSION) ?></h3>
	<div class="nav-tab-wrapper">
		<a href="#" data-target="wcuCurrenciesTab" class="nav-tab nav-tab-active" ><?php _e('Currencies', 'woo-currency')?></a>
		<a href="#" data-target="wcuOptionsTab" class="nav-tab"><?php _e('Options', 'woo-currency')?></a>
		<a href="#" data-target="wcuSwitcherTab" class="nav-tab"><?php _e('Frontend switcher', 'woo-currency')?></a>
		<a href="#" data-target="wcuTooltipTab" class="nav-tab <?php echo $wcuShowPro ?>"><?php _e('Tooltip', 'woo-currency')?></a>
		<a href="#" data-target="wcuConverterTab" class="nav-tab <?php echo $wcuShowPro ?>"><?php _e('Currency converter', 'woo-currency')?></a>
		<a href="#" data-target="wcuRatesTab" class="nav-tab <?php echo $wcuShowPro ?>"><?php _e('Currency rates', 'woo-currency')?></a>
		<a href="#" data-target="wcuCustomCssTab" class="nav-tab <?php echo $wcuShowPro ?>"><?php _e('Custom CSS', 'woo-currency')?></a>
		<a href="#" data-target="wcuGeoIpRulesTab" class="nav-tab <?php echo $wcuShowPro ?>"><?php _e('Geo IP Rules', 'woo-currency')?></a>
		<a href="#" data-target="wcuFlagsTab" class="nav-tab <?php echo $wcuShowPro ?>"><?php _e('Custom Flags', 'woo-currency')?></a>
		<a href="#" data-target="wcuCustomCurrencyTab" class="nav-tab <?php echo $wcuShowPro ?>"><?php _e('Custom Currencies', 'woo-currency')?></a>
		<a href="#" data-target="wcuManualPricesTab" class="nav-tab <?php echo $wcuShowPro ?>"><?php _e('Manual Prices', 'woo-currency')?></a>
	</div>
	<div class="wcuTabContent" data-tab="wcuCurrenciesTab" >
		<?php echo htmlWcu::button(array('attrs' => 'class="button wcuAddCurrency page-title-action"', 'value' => __('Add currency', 'woo-currency')))?>

		<?php dispatcherWcu::doAction('getChildrenOneTab', array('currencies')) ?>

		<div class="wcuCurrenciesList">
			<div class="wcuCurrencyHeader row">
				<div class="col-md-1" align="center"></div>
				<div class="col-md-1"><?php _e('Currency code', 'woo-currency') ?></div>
				<?php if (!empty($this->flagsModule)) {?>
				<div class="col-md-1" style="width:60px;"><?php _e('Flag', 'woo-currency') ?></div>
				<?php }?>
				<div class="col-md-1"><?php _e('Title', 'woo-currency') ?></div>
				<div class="col-md-1"><?php echo __('Symbol', 'woo-currency') . ' / ' . __('Position', 'woo-currency'); ?></div>
				<div class="col-md-1"><?php _e('Separators', 'woo-currency') ?> <i class="fa fa-question woobewoo-tooltip tooltipstered" title="<?php _e('You can set thousand and/or decimal separators for each currency separately. Leave the fields blank if you want the wooCommerce settings to be used.', 'woo-currency') ?>"></i></div>
				<div class="col-md-1"><?php _e('Cents', 'woo-currency') ?></div>
				<div class="col-md-1" style="min-width:140px;"><?php _e('Converter Rates ', 'woo-currency') ?><i class="fa fa-question woobewoo-tooltip tooltipstered" title="<?php _e('This rates is updated automatically with a selected Currency Aggregator.', 'woo-currency') ?>"></i></div>
				<div class="col-md-1" style="min-width:130px;"><?php _e('Manual Rates ', 'woo-currency') ?><i class="fa fa-question woobewoo-tooltip tooltipstered" title="<?php _e('This value overwrites the automatic rate from field Converter Rates. Input value in follow format example: 12.5035', 'woo-currency') ?>"></i></div>
				<?php if ( !empty($this->optionsProModule) ) {?>
					<div class="col-md-1"><?php _e('Exchange Fee', 'woo-currency') ?><i class="fa fa-question woobewoo-tooltip tooltipstered" title="<?php _e('The exchange fee only works with the automatic rate.', 'woo-currency') ?>"></i></div>
				<?php }?>
				<div style="clear: both;"></div>
			</div>
			<?php foreach($this->currencies as $params) {?>
			<?php
				$example = empty($params) ? 'wcuCurrencyItemExample' : '';
				$display = empty($params) ? 'display: none;' : '';
				$disabled = empty($params) ? 'disabled="disabled" ' : '';
				$etalon = !empty($params['etalon']) ? 'wcuCurrencyEtalonSelected' : '';
				?>
			<?php $currName = !empty($params['name']) ? $params['name'] : $this->defCur;?>
			<div class="<?php echo $example ?> wcuCurrencyItem row" <?php echo $example ? 'style="display: none;"' : '' ?>>
				<div class="col-md-1">
					<div class="col-xs-1" style="padding:0px;">
						<i class="fa fa-arrows-v woobewoo-tooltip tooltipstered" title="<?php echo sprintf(__('Hold the cursor on the row to change the position of the currency.', 'woo-currency'))?>" style="font-size: 20px; margin-top:5px;"></i>
					</div>
					<div class="col-xs-10" style="padding:0px;">
						<?php echo htmlWcu::button(array(
							'value' => !empty($params['etalon']) ? __('Main Currency', 'woo-currency') : __('Set as Main', 'woo-currency'),
							'attrs' => $disabled.' class="button wcuCurrencyEtalon '.$etalon.'" data-main="'.__('Main Currency', 'woo-currency').'" data-def="'.__('Set as Main', 'woo-currency').'"',
							))?>
						<?php echo htmlWcu::hidden("{$this->dbPrefix}[etalon][]", array(
							'value' => !empty($params['etalon']) ? $params['etalon'] : 0,
							'attrs' => $disabled . 'class="wcuIsEtalon"'
							))?>
					</div>
				</div>
				<div class="col-md-1">
					<?php echo htmlWcu::selectbox("{$this->dbPrefix}[name][]", array(
						'value' => !empty($params['name']) ? $params['name'] : $this->defCur,
						'options' => $this->getModule()->getCurrencyNames(),
						'attrs' => $disabled . '',
						'data-def' => $this->defCur,
						))?>
				</div>
				<?php if (!empty($this->flagsModule)) {?>
					<div class="col-md-1 wcuFlagsSelectBoxWrapper">
						<?php dispatcherWcu::doAction('flagsList', $params, $example) ?>
					</div>
				<?php } ?>
				<div class="col-md-1">
					<?php echo htmlWcu::input("{$this->dbPrefix}[title][]", array(
						'type' => 'text',
						'value' => !empty($params['title']) ? $params['title'] : $this->defCur,
						'attrs' => $disabled . '',
						))?>
				</div>
				<div class="col-md-1 wcuCurrencyCol">
					<?php echo htmlWcu::selectbox("{$this->dbPrefix}[symbol][]", array(
						'value' => !empty($params['symbol']) ? $params['symbol'] : $this->getModel()->getCurrencySymbol($this->defCur),
						'options' => $this->getModule()->getCurrencySymbolsList(true),
						'attrs' => $disabled . 'class="wcuCurrencySymbol"',
						))?>
					<?php if (!$example) {?>
						<?php dispatcherWcu::doAction('customSymbols', $currName) ?>
						<i class="wcuCurrencySymbolEdit dashicons dashicons-edit woobewoo-tooltip tooltipstered"
							<?php if ( !$this->customSymbolsModule ) { ?> title="<?php echo esc_html(sprintf(__('Type your symbol for this currency. Only in PRO version.', 'woo-currency'), $this->pluginLink, $this->pluginLink))?>"<?php } ?>>
						</i>
					<?php }?>
					<?php echo htmlWcu::selectbox("{$this->dbPrefix}[position][]", array(
						'value' => !empty($params['position']) ? $params['position'] : $this->defPos,
						'options' => $this->getModule()->getCurrencyPositions(),
						'attrs' => $disabled . '',
						'data-def' => $this->defPos,
						))?>
				</div>
				<div class="col-md-1">
					<?php echo htmlWcu::input("{$this->dbPrefix}[tho_separator][]", array(
						'type' => 'text',
						'value' => !empty($params['tho_separator']) ? $params['tho_separator'] : '',
						'attrs' => $disabled . '',
						))?>
					<?php echo htmlWcu::input("{$this->dbPrefix}[dec_separator][]", array(
						'type' => 'text',
						'value' => !empty($params['dec_separator']) ? $params['dec_separator'] : '',
						'attrs' => $disabled . '',
						))?>
				</div>
				<div class="col-md-1">
					<?php echo htmlWcu::selectbox("{$this->dbPrefix}[decimals][]", array(
						'value' => isset($params['decimals']) ? $params['decimals'] : $this->defCur,
						'options' => $this->getModule()->getCurrencyDecimalsList(),
						'attrs' => $disabled . '',
						'data-def' => $this->defCur,
						))?>
					<?php if ( !empty($this->optionsProModule) ) {?>
						<?php dispatcherWcu::doAction('afterPointOption', $params) ?>
					<?php }?>
				</div>
				<div class="col-md-1" style="min-width:140px;">
					<?php echo htmlWcu::input("{$this->dbPrefix}[rate][]", array(
						'type' => 'text',
						'value' => !empty($params['rate']) ? $params['rate'] : 1,
						'attrs' => $disabled . 'class="wcuRate" readonly',
						))?>
				</div>
				<div class="col-md-1" style="min-width:130px;">
					<?php echo htmlWcu::input("{$this->dbPrefix}[rate_custom][]", array(
						'type' => 'text',
						'value' => !empty($params['rate_custom']) ? $params['rate_custom'] : '',
						'attrs' => $disabled . 'class="wcuRateCustom wcuOnlyNumbers"',
						))?>
				</div>
				<?php if ( !empty($this->optionsProModule) ) {?>
					<div class="col-md-1 wcuExchangeFeeWrapper" style="min-width:130px;">
						<?php dispatcherWcu::doAction('exchangeFeeOption', $params) ?>
					</div>
				<?php }?>
				<div class="col-md-2">
					<?php echo htmlWcu::button(array(
						'value' => __('Get rate', 'woo-currency'),
						'attrs' => $disabled . 'class="button wcuCurrencyConvert"',
						))?>
					<?php echo htmlWcu::button(array(
						'value' => __('Remove', 'woo-currency'),
						'attrs' => $disabled . 'class="button wcuCurrencyRemove"',
						))?>
				</div>
				<div style="clear: both;"></div>
			</div>
			<?php }?>
		</div>
	</div>
	<div class="wcuTabContent" data-tab="wcuOptionsTab" >
		<?php dispatcherWcu::doAction('getChildrenOneTab', array('options')) ?>
	</div>
	<div class="wcuTabContent" data-tab="wcuSwitcherTab">
		<div class="nav-tab-wrapper-child">
			<a href="#" data-target-child="wcuSwitcherDesignTab" class="nav-tab-child" ><?php _e('Design', 'woo-currency')?></a>
			<a href="#" data-target-child="wcuSwitcherDisplayRulesTab" class="nav-tab-child"><?php _e('Display rules', 'woo-currency')?></a>
		</div>
		<div class="wcuTabContentChild"  data-tab-child="wcuSwitcherDesignTab">
			<div class="wcuTabContentInner">
				<?php dispatcherWcu::doAction('getChildrenMultipleTab', array('currency_switcher','design_tab',false,true)) ?>
			</div>
		</div>
		<div class="wcuTabContentChild wcuDisplayRulesTab"  data-tab-child="wcuSwitcherDisplayRulesTab">
			<div class="wcuTabContentInner">
				<?php dispatcherWcu::doAction('getChildrenMultipleTab', array('currency_switcher','display_rules_tab',false,false)) ?>
			</div>
		</div>
	</div>
	<div class="wcuTabContent" data-tab="wcuTooltipTab" >
		<div class="nav-tab-wrapper-child">
			<a href="#" data-target-child="wcuTooltipDesignTab" class="nav-tab-child" ><?php _e('Design', 'woo-currency')?></a>
			<a href="#" data-target-child="wcuTooltipDisplayRulesTab" class="nav-tab-child"><?php _e('Display rules', 'woo-currency')?></a>
		</div>
		<div class="wcuTabContentChild"  data-tab-child="wcuTooltipDesignTab">
			<div class="wcuTabContentInner">
				<?php if ( !empty($this->optionsProModule) ) {?>
					<?php dispatcherWcu::doAction('getChildrenMultipleTab', array('currency_tooltip','design_tab',true,false)) ?>
				<?php } else { ?>
					<a class="wcuProPreviewLink" href="<?php echo $this->pluginLink ?>?utm_source=plugin&utm_medium=currency_tooltip_tab&utm_campaign=woocurrency" target="_blank"><img class="wcuPreviewProOptions" src="<?php echo $this->modulePath?>img/module-tooltip-design.png"></a>
				<?php }?>
			</div>
		</div>
		<div class="wcuTabContentChild wcuDisplayRulesTab"  data-tab-child="wcuTooltipDisplayRulesTab">
			<div class="wcuTabContentInner">
				<?php if ( !empty($this->optionsProModule) ) {?>
					<?php dispatcherWcu::doAction('getChildrenMultipleTab', array('currency_tooltip','display_rules_tab',true,false)) ?>
				<?php } else { ?>
					<a class="wcuProPreviewLink" href="<?php echo $this->pluginLink ?>?utm_source=plugin&utm_medium=currency_tooltip_tab&utm_campaign=woocurrency" target="_blank"><img class="wcuPreviewProOptions" src="<?php echo $this->modulePath?>img/module-rules.png"></a>
				<?php }?>
			</div>
		</div>
	</div>
	<div class="wcuTabContent" data-tab="wcuConverterTab" >
		<div class="nav-tab-wrapper-child">
			<a href="#" data-target-child="wcuConverterDesignTab" class="nav-tab-child" ><?php _e('Design', 'woo-currency')?></a>
			<a href="#" data-target-child="wcuConverterDisplayRulesTab" class="nav-tab-child"><?php _e('Display rules', 'woo-currency')?></a>
		</div>
		<div class="wcuTabContentChild"  data-tab-child="wcuConverterDesignTab">
			<div class="wcuTabContentInner">
				<?php if ( !empty($this->optionsProModule) ) {?>
					<?php dispatcherWcu::doAction('getChildrenMultipleTab', array('currency_converter','design_tab',true,true)) ?>
				<?php } else { ?>
					<a class="wcuProPreviewLink" href="<?php echo $this->pluginLink ?>?utm_source=plugin&utm_medium=currency_converter_tab&utm_campaign=woocurrency" target="_blank"><img class="wcuPreviewProOptions" src="<?php echo $this->modulePath?>img/module-converter-design.png"></a>
				<?php }?>
			</div>
		</div>
		<div class="wcuTabContentChild wcuDisplayRulesTab"  data-tab-child="wcuConverterDisplayRulesTab">
			<div class="wcuTabContentInner">
				<?php if ( !empty($this->optionsProModule) ) {?>
					<?php dispatcherWcu::doAction('getChildrenMultipleTab', array('currency_converter','display_rules_tab',true,false)) ?>
				<?php } else { ?>
					<a class="wcuProPreviewLink" href="<?php echo $this->pluginLink ?>?utm_source=plugin&utm_medium=currency_converter_tab&utm_campaign=woocurrency" target="_blank"><img class="wcuPreviewProOptions" src="<?php echo $this->modulePath?>img/module-rules.png"></a>
				<?php }?>
			</div>
		</div>
	</div>
	<div class="wcuTabContent" data-tab="wcuRatesTab" >
		<div class="nav-tab-wrapper-child">
			<a href="#" data-target-child="wcuRatesDesignTab" class="nav-tab-child" ><?php _e('Design', 'woo-currency')?></a>
			<a href="#" data-target-child="wcuRatesDisplayRulesTab" class="nav-tab-child"><?php _e('Display rules', 'woo-currency')?></a>
		</div>
		<div class="wcuTabContentChild"  data-tab-child="wcuRatesDesignTab">
			<div class="wcuTabContentInner">
				<?php if ( !empty($this->optionsProModule) ) {?>
					<?php dispatcherWcu::doAction('getChildrenMultipleTab', array('currency_rates','design_tab',true,true)) ?>
				<?php } else { ?>
					<a class="wcuProPreviewLink" href="<?php echo $this->pluginLink ?>?utm_source=plugin&utm_medium=currency_rates_tab&utm_campaign=woocurrency" target="_blank"><img class="wcuPreviewProOptions" src="<?php echo $this->modulePath?>img/module-rates-design.png"></a>
				<?php }?>
			</div>
		</div>
		<div class="wcuTabContentChild wcuDisplayRulesTab"  data-tab-child="wcuRatesDisplayRulesTab">
			<div class="wcuTabContentInner">
				<?php if ( !empty($this->optionsProModule) ) {?>
					<?php dispatcherWcu::doAction('getChildrenMultipleTab', array('currency_rates','display_rules_tab',true,false)) ?>
				<?php } else { ?>
					<a class="wcuProPreviewLink" href="<?php echo $this->pluginLink ?>?utm_source=plugin&utm_medium=currency_rates_tab&utm_campaign=woocurrency" target="_blank"><img class="wcuPreviewProOptions" src="<?php echo $this->modulePath?>img/module-rules.png"></a>
				<?php }?>
			</div>
		</div>
	</div>
	<div class="wcuTabContent" data-tab="wcuCustomCssTab" >
		<div class="wcuTabContentInner">
			<?php if ( !empty($this->optionsProModule) ) {?>
				<?php dispatcherWcu::doAction('getChildrenOneTab', array('custom_css',true)) ?>
			<?php } else { ?>
				<a class="wcuProPreviewLink" href="<?php echo $this->pluginLink ?>?utm_source=plugin&utm_medium=custom_css_tab&utm_campaign=woocurrency" target="_blank"><img class="wcuPreviewProOptions" src="<?php echo $this->modulePath?>img/module-css.png"></a>
			<?php }?>
		</div>
	</div>
	<div class="wcuTabContent wcuDisplayRulesTab" data-tab="wcuGeoIpRulesTab" >
		<div class="wcuTabContentInner">
			<?php if ( !empty($this->optionsProModule) ) {?>
				<?php dispatcherWcu::doAction('getChildrenOneTab', array('geoip_rules',true)) ?>
				<?php dispatcherWcu::doAction('geoIpRules') ?>
			<?php } else { ?>
				<a class="wcuProPreviewLink" href="<?php echo $this->pluginLink ?>?utm_source=plugin&utm_medium=geoip_rules_tab&utm_campaign=woocurrency" target="_blank"><img class="wcuPreviewProOptions" src="<?php echo $this->modulePath?>img/module-geoiprules.png"></a>
			<?php }?>
		</div>
	</div>
	<div class="wcuTabContent wcuDisplayRulesTab" data-tab="wcuFlagsTab" >
		<div class="wcuTabContentInner">
			<?php if ( !empty($this->optionsProModule) ) {?>
				<?php dispatcherWcu::doAction('getChildrenOneTab', array('flags',true)) ?>
				<?php dispatcherWcu::doAction('wcuFlagsSetting') ?>
			<?php } else { ?>
				<a class="wcuProPreviewLink" href="<?php echo $this->pluginLink ?>?utm_source=plugin&utm_medium=geoip_rules_tab&utm_campaign=woocurrency" target="_blank"><img class="wcuPreviewProOptions" src="<?php echo $this->modulePath?>img/module-custom-flags.png"></a>
			<?php }?>
		</div>
	</div>
	<div class="wcuTabContent wcuDisplayRulesTab" data-tab="wcuCustomCurrencyTab" >
		<div class="wcuTabContentInner">
			<?php if ( !empty($this->optionsProModule) ) {?>
				<?php dispatcherWcu::doAction('getChildrenOneTab', array('custom_currency',true)) ?>
				<?php dispatcherWcu::doAction('wcuCustomCurrency') ?>
			<?php } else { ?>
				<a class="wcuProPreviewLink" href="<?php echo $this->pluginLink ?>?utm_source=plugin&utm_medium=geoip_rules_tab&utm_campaign=woocurrency" target="_blank"><img class="wcuPreviewProOptions" src="<?php echo $this->modulePath?>img/module-custom-currency.png"></a>
			<?php }?>
		</div>
	</div>
	<div class="wcuTabContent wcuDisplayRulesTab" data-tab="wcuManualPricesTab" >
		<div class="wcuTabContentInner">
			<?php if ( !empty($this->optionsProModule) ) {?>
				<?php dispatcherWcu::doAction('getChildrenOneTab', array('manual_prices',true)) ?>
			<?php } else { ?>
				<a class="wcuProPreviewLink" href="<?php echo $this->pluginLink ?>?utm_source=plugin&utm_medium=manual_prices_tab&utm_campaign=woocurrency" target="_blank">PRO option</a>
			<?php }?>
		</div>
	</div>
	<div class="wcuTabContentCurrencyError">
		<div class="wcuTabContentCurrencyErrorItem wcuTabContentCurrencyErrorSetMain alert alert-danger-background" style="display:none">
			<?php echo __('Please set a main currency before getting the exchange rate.', 'woo-currency');?>
		</div>
		<div class="wcuTabContentCurrencyErrorItem wcuTabContentCurrencyErrorSetMainSave alert alert-danger-background" style="display:none">
			<?php echo __('Please set a main currency before saving.', 'woo-currency');?>
		</div>
		<div class="wcuTabContentCurrencyErrorItem wcuTabContentCurrencyErrorRemoveDuplicate alert alert-danger-background" style="display:none">
			<?php echo __('Please remove duplicate currencies before saving.', 'woo-currency');?>
		</div>
		<div class="wcuTabContentCurrencyErrorItem wcuTabContentCurrencyErrorSetRateFormat alert alert-danger-background" style="display:none">
			<?php echo __('Please set current rate format before saving. Example: 1.584', 'woo-currency');?>
		</div>
		<div class="wcuTabContentCurrencyErrorItem wcuTabContentCurrencyErrorSetCustomFormat alert alert-danger-background" style="display:none">
			<?php echo __('Please input value in string format. Example: ASD', 'woo-currency');?>
		</div>
		<div class="wcuTabContentCurrencyEtalonNotice" style="display:none">
			<?php echo __('Prices in this currency are shown on frontend when user first time visits store.', 'woo-currency');?>
		</div>
	</div>

	<?php echo htmlWcu::hidden('mod', array('value' => 'currency'))?>
	<?php echo htmlWcu::hidden('action', array('value' => 'saveCurrencyTab'))?>
	<?php echo htmlWcu::hidden('pl', array('value' => WCU_CODE))?>
	<?php wp_nonce_field('wbw_currency_nonce', '_wbw_currency_nonce'); ?>
</div>
