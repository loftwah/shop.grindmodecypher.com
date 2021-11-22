<?php

defined( 'ABSPATH' ) || exit;
$sent_to_admin = ( isset( $sent_to_admin ) ? true : false );
$text_align    = is_rtl() ? 'right' : 'left';
?>

<!-- Title Table Order -->
<h2 class="yaymail_builder_order">
<?php
$before = '<a style="color: inherit" class="yaymail_builder_link" href="">';
$after  = '</a>';
/* translators: %s: Order ID. */
echo wp_kses_post( $before . sprintf( __( '[Order #%s]', 'woocommerce' ) . $after . ' (<time datetime="%s">%s</time>)', 1, new WC_DateTime(), wc_format_datetime( new WC_DateTime() ) ) );
?>
</h2>

<!-- Table Itemsr -->
<table class="yaymail_builder_table_items" cellspacing="0" cellpadding="6" style="width: 100% !important;" width="100%">
	<thead>
		<tr style="word-break: normal">
			<th class="td" scope="col" style="text-align:left;">
				<?php esc_html_e( 'Product', 'woocommerce' ); ?>
			</th>
			<th class="td" scope="col" style="text-align:left;">
				<?php esc_html_e( 'Quantity', 'woocommerce' ); ?>
			</th>
			<th class="td" scope="col" style="text-align:left;">
				<?php esc_html_e( 'Price', 'woocommerce' ); ?>
			</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td class="td" scope="row" style="text-align:left;">
				<?php esc_html_e( 'Happy YayCommerce', 'yaymail' ); ?>
			</td>
			<td class="td" scope="row" style="text-align:left;">
				<?php esc_html_e( 1, 'yaymail' ); ?>
			</td>
			<td class="td" scope="row" style="text-align:left;">
				<?php esc_html_e( '£18.00', 'yaymail' ); ?>
			</td>
		</tr>

	<tr>
		<td class="td" scope="row" colspan="2" style="text-align:left;">
			<?php esc_html_e( 'Payment method:', 'yaymail' ); ?>
		</td>
		<td class="td" scope="row" colspan="1" style="text-align:left;">
			<?php esc_html_e( 'Direct bank transfer', 'yaymail' ); ?>
		</td>
	</tr>
	<tr>
		<td class="td" scope="row" colspan="2" style="text-align:left;">
			<?php esc_html_e( 'Total:', 'yaymail' ); ?>
		</td>
		<td class="td" scope="row" colspan="1" style="text-align:left;">
			<?php esc_html_e( '£18.00', 'yaymail' ); ?>
		</td>
	</tr>
	</tbody>

	<tfoot>
			<tr>
		<td class="td" scope="row" colspan="2" style="text-align:left;">
			<?php esc_html_e( 'Payment method:', 'yaymail' ); ?>
		</td>
		<td class="td" scope="row" colspan="1" style="text-align:left;">
			<?php esc_html_e( 'Direct bank transfer', 'yaymail' ); ?>
		</td>
	</tr>
	<tr>
		<td class="td" scope="row" colspan="2" style="text-align:left;">
			<?php esc_html_e( 'Total:', 'yaymail' ); ?>
		</td>
		<td class="td" scope="row" colspan="1" style="text-align:left;">
			<?php esc_html_e( '£18.00', 'yaymail' ); ?>
		</td>
	</tr>
	</tfoot>
</table>
