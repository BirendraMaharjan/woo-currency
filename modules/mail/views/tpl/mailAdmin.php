<?php
/**
 * WBW Currency Switcher for WooCommerce - Mail Admin
 *
 * @version 2.4.0
 *
 * @author woobewoo
 */

defined( 'ABSPATH' ) || exit;

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
?>
<form id="wcuMailTestForm">
	<label>
		<?php esc_html_e('Send test email to', 'woo-currency')?>
		<?php htmlWcu::echo_escaped_html( htmlWcu::text( 'test_email', array( 'value' => $this->testEmail ) ) ); ?>
	</label>
	<?php htmlWcu::echo_escaped_html( htmlWcu::hidden( 'mod', array( 'value' => 'mail' ) ) ); ?>
	<?php htmlWcu::echo_escaped_html( htmlWcu::hidden( 'action', array( 'value' => 'testEmail' ) ) ); ?>
	<button class="button button-primary">
		<i class="fa fa-paper-plane"></i>
		<?php esc_html_e('Send test', 'woo-currency')?>
	</button><br />
	<i><?php esc_html_e('This option allows you to check your server mail functionality', 'woo-currency')?></i>
</form>
<div id="wcuMailTestResShell" style="display: none;">
	<?php esc_html_e('Did you receive test email?', 'woo-currency')?><br />
	<button class="wcuMailTestResBtn button button-primary" data-res="1">
		<i class="fa fa-check-square-o"></i>
		<?php esc_html_e('Yes! It works!', 'woo-currency')?>
	</button>
	<button class="wcuMailTestResBtn button button-primary" data-res="0">
		<i class="fa fa-exclamation-triangle"></i>
		<?php esc_html_e('No, I need to contact my hosting provider with mail function issue.', 'woo-currency')?>
	</button>
</div>
<div id="wcuMailTestResSuccess" style="display: none;">
	<?php esc_html_e('Great! Mail function was tested and is working fine.', 'woo-currency')?>
</div>
<div id="wcuMailTestResFail" style="display: none;">
	<?php esc_html_e('Bad, please contact your hosting provider and ask them to setup mail functionality on your server.', 'woo-currency')?>
</div>
<div style="clear: both;"></div>
<form id="wcuMailSettingsForm">
	<table class="form-table" style="max-width: 450px;">
		<?php foreach($this->options as $optKey => $opt) { ?>
			<?php
				$htmlType = isset($opt['html']) ? $opt['html'] : false;
				if(empty($htmlType)) continue;
			?>
			<tr>
				<th scope="row" class="col-w-30perc">
					<?php echo esc_html( $opt['label'] ); ?>
					<?php if(!empty($opt['changed_on'])) {?>
						<br />
						<span class="description">
							<?php
							$opt['value'] ?
								printf(
									/* Translators: %s: Date. */
									esc_html__( 'Turned On %s', 'woo-currency' ),
									esc_html( dateWcu::_( $opt['changed_on'] ) )
								) :
								printf(
									/* Translators: %s: Date. */
									esc_html__( 'Turned Off %s', 'woo-currency' ),
									esc_html( dateWcu::_( $opt['changed_on'] ) )
								);
							?>
						</span>
					<?php }?>
				</th>
				<td class="col-w-10perc">
					<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_html( $opt['desc'] ); ?>"></i>
				</td>
				<td class="col-w-1perc">
					<?php
					htmlWcu::echo_escaped_html(
						htmlWcu::$htmlType(
							'opt_values[' . $optKey . ']',
							array(
								'value' => $opt['value'],
								'attrs' => 'data-optkey="' . $optKey . '"'
							)
						)
					);
					?>
				</td>
				<td class="col-w-50perc">
					<div id="wcuFormOptDetails_<?php echo esc_attr( $optKey ); ?>" class="wcuOptDetailsShell"></div>
				</td>
			</tr>
		<?php }?>
	</table>
	<?php htmlWcu::echo_escaped_html( htmlWcu::hidden( 'mod', array( 'value' => 'mail' ) ) ); ?>
	<?php htmlWcu::echo_escaped_html( htmlWcu::hidden( 'action', array( 'value' => 'saveOptions' ) ) ); ?>
	<button class="button button-primary">
		<i class="fa fa-fw fa-save"></i>
		<?php esc_html_e('Save', 'woo-currency')?>
	</button>
</form>
<?php
// phpcs:enable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound