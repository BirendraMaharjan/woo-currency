<?php
/**
 * WBW Currency Switcher for WooCommerce - Deactivate Page
 *
 * @version 2.4.0
 *
 * @author  woobewoo
 */

defined( 'ABSPATH' ) || exit;

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
$title = WCU_WP_PLUGIN_NAME;
?>
<html>
    <head>
        <title><?php echo esc_html( $title )?></title>
    </head>
    <body>
<div style="position: fixed; margin-left: 40%; margin-right: auto; text-align: center; background-color: #fdf5ce; padding: 10px; margin-top: 10%;">
    <div><?php echo esc_html( $title )?></div>
    <?php echo htmlWcu::formStart('deactivatePlugin', array('action' => $this->REQUEST_URI, 'method' => $this->REQUEST_METHOD))?>
    <?php
        $formData = array();
        switch($this->REQUEST_METHOD) {
            case 'GET':
                $formData = $this->GET;
                break;
            case 'POST':
                $formData = $this->POST;
                break;
        }
        foreach($formData as $key => $val) {
            if(is_array($val)) {
                foreach($val as $subKey => $subVal) {
                    echo htmlWcu::hidden($key. '['. $subKey. ']', array('value' => $subVal));
                }
            } else
                echo htmlWcu::hidden($key, array('value' => $val));
        }
    ?>
        <table width="100%">
            <tr>
                <td><?php _e('Delete Plugin Data (options, setup data, database tables, etc.)', 'woo-currency')?>:</td>
                <td><?php echo htmlWcu::radiobuttons('deleteOptions', array('options' => array('No', 'Yes')))?></td>
            </tr>
        </table>
    <?php echo htmlWcu::submit('toeGo', array('value' => __('Done', 'woo-currency')))?>
    <?php echo htmlWcu::formEnd()?>
    </div>
</body>
</html>
<?php
// phpcs:enable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound