<?php
/**
 * WBW Currency Switcher for WooCommerce - Options Tab
 *
 * @version 2.4.0
 *
 * @author woobewoo
 */

defined( 'ABSPATH' ) || exit;

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
?>
<table class="form-table">
	<tbody>
	<?php foreach($this->optionsParams as $index => $optBlock) {?>
		<?php if($index != 'options') continue;?>
		<?php foreach($optBlock as $key => $opt) {?>
			<?php
			$display = !empty($opt['row_parent']) ? $this->isDislayElem($optBlock[$opt['row_parent']]['params']['value'], $opt) : '';
			?>
			<tr valign="top" class="single_select_page <?php echo esc_attr( $opt['row_classes']);?>" data-target-show="<?php echo esc_attr( $opt['row_show'] ); ?>" style="<?php echo esc_attr( $display ); ?>">
				<th scope="row" class="titledesc">
					<label for=""><?php echo esc_html( $opt['label'] ); ?></label>
				</th>
				<td class="forminp">
					<?php $htmlField = $opt['html'];?>
					<?php htmlWcu::echo_escaped_html( htmlWcu::$htmlField("{$this->getModule()->optionsDbOpt}[{$index}][{$key}]", $opt['params']) ); ?>
				</td>
			</tr>
		<?php }?>
	<?php }?>
	</tbody>
</table>
<?php
// phpcs:enable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound