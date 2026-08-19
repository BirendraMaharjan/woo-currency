<?php
/**
 * WBW Currency Switcher for WooCommerce - Currencies Tab
 *
 * @version 2.4.0
 *
 * @author woobewoo
 */

defined( 'ABSPATH' ) || exit;

echo htmlWcu::button(array('attrs' => 'class="wcuAddCurrency"', 'value' => __('Add currency', 'woo-currency')))?>
<div class="wcuCurrenciesList">
	<div class="wcuCurrencyHeader row">
		<div class="col-md-1"></div>
		<div class="col-md-1"><?php _e('Name', 'woo-currency') ?></div>
		<div class="col-md-1"><?php _e('Title', 'woo-currency') ?></div>
		<div class="col-md-1"><?php _e('Symbol', 'woo-currency') ?></div>
		<div class="col-md-1"><?php _e('Symbol', 'woo-currency') ?></div>
		<div class="col-md-1"><?php _e('Position', 'woo-currency') ?></div>
		<div class="col-md-2"><?php _e('Actions', 'woo-currency') ?></div>
		<div style="clear: both;"></div>
	</div>

	<?php foreach($this->currencies as $params) {?>
		<?php
		$example = empty($params) ? 'wcuCurrencyItemExample' : '';
		$display = empty($params) ? 'display: none;' : '';
		$disabled = empty($params) ? 'disabled="disabled" ' : '';
		?>
		<div class="<?php echo $example ?> wcuCurrencyItem row" <?php echo $example ? 'style="display: none;"' : '' ?>>
			<div class="col-md-1">
				<?php echo htmlWcu::button(array(
					'value' => !empty($params['etalon']) ? __('Main Currency', 'woo-currency') : __('Set as Main', 'woo-currency'),
					'attrs' => $disabled.' class="wcuCurrencyEtalon" data-main="'.__('Main Currency', 'woo-currency').'" data-def="'.__('Set as Main', 'woo-currency').'"',
				))?>
				<?php echo htmlWcu::hidden("{$this->dbPrefix}[etalon][]", array(
					'value' => !empty($params['etalon']) ? $params['etalon'] : 0,
					'attrs' => $disabled . 'class="wcuIsEtalon"'
				))?>
			</div>
			<div class="col-md-1">
				<?php echo htmlWcu::selectbox("{$this->dbPrefix}[name][]", array(
					'value' => !empty($params['name']) ? $params['name'] : $this->defCur,
					'options' => $this->getModule()->getCurrencyNames(),
					'attrs' => $disabled . '',
					'data-def' => $this->defCur,
				))?>
			</div>
			<div class="col-md-1">
				<?php echo htmlWcu::input("{$this->dbPrefix}[title][]", array(
					'type' => 'text',
					'value' => !empty($params['title']) ? $params['title'] : $this->defCur,
					'attrs' => $disabled . '',
				))?>
			</div>
			<div class="col-md-1">
				<?php echo htmlWcu::selectbox("{$this->dbPrefix}[symbol][]", array(
					'value' => !empty($params['symbol']) ? $params['symbol'] : $this->getModel()->getCurrencySymbol($this->defCur),
					'options' => $this->getModule()->getCurrencySymbolsList(),
					'attrs' => $disabled . ''
				))?>
			</div>
			<div class="col-md-1">
				<?php echo htmlWcu::selectbox("{$this->dbPrefix}[position][]", array(
					'value' => !empty($params['position']) ? $params['position'] : $this->defPos,
					'options' => $this->getModule()->getCurrencyPositions(),
					'attrs' => $disabled . '',
					'data-def' => $this->defPos,
				))?>
			</div>
			<div class="col-md-1">
				<?php echo htmlWcu::input("{$this->dbPrefix}[rate][]", array(
					'type' => 'text',
					'value' => !empty($params['rate']) ? $params['rate'] : 1,
					'attrs' => $disabled . 'class="wcuRate"',
				))?>
			</div>
			<div class="col-md-2">
				<?php echo htmlWcu::button(array(
					'value' => __('Get rate', 'woo-currency'),
					'attrs' => $disabled . 'class="wcuCurrencyConvert"',
				))?>
				<?php echo htmlWcu::button(array(
					'value' => __('Remove', 'woo-currency'),
					'attrs' => $disabled . 'class="wcuCurrencyRemove"',
				))?>
			</div>
			<div style="clear: both;"></div>
		</div>
	<?php }?>
</div>
