<?php
/**
 * WBW Currency Switcher for WooCommerce - Option Admin Page
 *
 * @version 2.4.0
 *
 * @author woobewoo
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="wrap">
	<div class="woobewoo-plugin">
		<?php echo wp_kses_post( $this->breadcrumbs ); ?>
		<section class="woobewoo-content">
			<nav class="woobewoo-navigation woobewoo-sticky <?php dispatcherWcu::doAction( 'adminMainNavClassAdd' ) ?>">
				<ul>
					<?php foreach ( $this->tabs as $tabKey => $tab ) { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound ?>
						<?php if ( isset( $tab['hidden'] ) && $tab['hidden'] ) {
							continue;
						} ?>
						<li class="woobewoo-tab-<?php echo esc_attr( $tabKey ); ?> <?php echo( ( $this->activeTab == $tabKey || in_array( $tabKey, $this->activeParentTabs ) ) ? 'active' : '' ); ?>">
							<a href="<?php echo esc_url( $tab['url'] ); ?>"
							   title="<?php echo esc_html( $tab['label'] ); ?>">
								<?php if ( isset( $tab['fa_icon'] ) ) { ?>
									<i class="fa <?php echo esc_attr( $tab['fa_icon'] ); ?>"></i>
								<?php } elseif ( isset( $tab['wp_icon'] ) ) { ?>
									<i class="dashicons-before <?php echo esc_attr( $tab['wp_icon'] ); ?>"></i>
								<?php } elseif ( isset( $tab['icon'] ) ) { ?>
									<i class="<?php echo esc_attr( $tab['icon'] ); ?>"></i>
								<?php } ?>
								<span class="sup-tab-label"><?php echo esc_html( $tab['label'] ); ?></span>
							</a>
						</li>
					<?php } ?>
				</ul>
			</nav>
			<div class="woobewoo-container woobewoo-<?php echo esc_attr( $this->activeTab ); ?>">
				<?php htmlWcu::echo_escaped_html( $this->content ); ?>
				<div class="clear"></div>
			</div>
		</section>
	</div>
</div>
<!--Option available in PRO version Wnd-->
<div id="wcuOptInProWnd" style="display: none;" title="<?php esc_html_e( 'Improve Free version', 'woo-currency' ) ?>">
	<p id="wcuOptWndTemplateTxt" style="display: none;">
		<?php
		htmlWcu::echo_escaped_html(
			sprintf(
				/* Translators: %1$s: URL, %2$s: URL. */
				__(
					'Please be advised that this template with all other options and PRO templates is available only in <a target="_blank" href="%1$s">PRO version</a>. You can <a target="_blank" href="%2$s" class="button">Get PRO</a> today and get this and other PRO features!',
					'woo-currency'
				),
				esc_url( $this->mainLink ),
				esc_url( $this->mainLink )
			)
		);
		?>
	</p>
	<p id="wcuOptWndOptionTxt">
		<?php
		htmlWcu::echo_escaped_html(
			sprintf(
				/* Translators: %1$s: URL, %2$s: URL. */
				__(
					'Please be advised that this option is available only in <a target="_blank" href="%1$s">PRO version</a>. You can <a target="_blank" href="%2$s" class="button">Get PRO</a> today and get this and other PRO option!',
					'woo-currency'
				),
				esc_url( $this->mainLink ),
				esc_url( $this->mainLink )
			)
		);
		?>
	</p>
</div>
