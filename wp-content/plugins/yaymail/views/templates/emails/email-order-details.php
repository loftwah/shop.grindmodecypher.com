<?php

defined( 'ABSPATH' ) || exit;
use YayMail\Helper\Helper;

$sent_to_admin = ( isset( $sent_to_admin ) ? $sent_to_admin : false );
$email         = ( isset( $email ) ? $email : '' );
$plain_text    = ( isset( $plain_text ) ? $plain_text : '' );
$text_align    = is_rtl() ? 'right' : 'left';
// Instructions Payment
$paymentGateways  = wc_get_payment_gateway_by_order( $order );
$yaymail_settings = get_option( 'yaymail_settings' );
$cash_on_delivery = esc_html__( 'Cash on delivery', 'woocommerce' );
if ( 'customer_on_hold_order' === $this->template
	&& 2 == $yaymail_settings['payment']
	|| ( Helper::checkKeyExist( $paymentGateways, 'method_title', false ) == $cash_on_delivery
	&& 'cancelled_order' != $this->template
	&& 'new_order' != $this->template
	&& 'failed_order' != $this->template
	&& 'customer_refunded_order' != $this->template
	&& 'customer_new_account' != $this->template
	&& 'customer_reset_password' != $this->template )
) {?>

	<p class="yaymail_builder_instructions"><?php esc_html_e( isset( $paymentGateways->instructions ) ? $paymentGateways->instructions : '', 'woocommerce' ); ?></p>

	<?php
} elseif ( 1 == $yaymail_settings['payment'] ) {
	?>

	<p class="yaymail_builder_instructions"><?php esc_html_e( isset( $paymentGateways->instructions ) ? $paymentGateways->instructions : '', 'woocommerce' ); ?></p>

	<?php
}

/*
Our bank details
payment: Direct bank transfer
 */
if ( false != $paymentGateways && isset( $paymentGateways->account_details ) ) {
	$account_details      = $paymentGateways->account_details;
	$texts                = array(
		'bank_name'      => 'Bank',
		'account_number' => 'Account number',
		'sort_code'      => 'Sort code',
		'iban'           => 'IBAN',
		'bic'            => 'BIC',
	);
	$direct_bank_transfer = esc_html__( 'Direct bank transfer', 'woocommerce' );
	if ( 'customer_on_hold_order' === $this->template
		&& Helper::checkKeyExist( $paymentGateways, 'method_title', false ) == $direct_bank_transfer
		&& is_array( $account_details )
		&& count( $account_details ) > 0
		&& 1 == $yaymail_settings['payment']
	) {
		?>

		<section class="yaymail_builder_wrap_account">
			<h2 class="yaymail_builder_bank_details"><?php esc_html_e( 'Our bank details', 'woocommerce' ); ?></h2>
		<?php
		foreach ( $account_details as $accounts ) {
			foreach ( $accounts as $label_name => $infor_account ) {
				if ( 'account_name' === $label_name && ! empty( $infor_account ) ) {
					?>
						<h3 class="yaymail_builder_account_name"> <?php esc_html_e( $infor_account, 'woocommerce' ); ?> </h3>
					<?php
				}
			}
			?>

				<ul>
			<?php
			foreach ( $accounts as $label_name => $infor_account ) {
				if ( 'account_name' !== $label_name && ! empty( $infor_account ) ) {
					?>
							<li><?php esc_html_e( $texts[ $label_name ], 'woocommerce' ); ?>:
								<strong><?php esc_html_e( $infor_account, 'woocommerce' ); ?></strong>
							</li>
					<?php
				}
			}
			?>
				</ul>

		<?php } ?>
		</section>
		<?php
	}
}
?>

<!-- Title Table Order -->
<h2 class="yaymail_builder_order">
<?php
if ( $sent_to_admin ) {
	$before = '<a class="yaymail_builder_link" href="' . esc_url( $order->get_edit_order_url() ) . '">';
	$after  = '</a>';
	/* translators: %s: Order ID. */
	echo wp_kses_post( $before . sprintf( __( '[Order #%s]', 'woocommerce' ) . $after . ' (<time datetime="%s">%s</time>)', $order->get_order_number(), $order->get_date_created()->format( 'c' ), wc_format_datetime( $order->get_date_created() ) ) );
} else {
	$before = '<h2 class="yaymail_builder_link" >';
	$after  = '</h2>';
	/* translators: %s: Order ID. */
	echo wp_kses_post( $before . sprintf( __( '[Order #%s]', 'woocommerce' ) . ' (<time datetime="%s">%s</time>)', $order->get_order_number(), $order->get_date_created()->format( 'c' ), wc_format_datetime( $order->get_date_created() ) ) . $after );
}

?>
</h2>

<!-- Table Items not border -->
<table class="yaymail_builder_table_items" cellspacing="0" cellpadding="6" style="width: 100% !important;" width="100%">
	<thead>
		<tr style="word-break: normal">
			<th class="td" scope="col" style="text-align:left;">
				<?php esc_html_e( 'Product', 'woocommerce' ); ?>
			</th>
			<th class="td" scope="col" style="text-align:left;">
				<?php esc_html_e( 'Quantity', 'woocommerce' ); ?>
			</th>
			<th class="td" scope="col" style="text-align:left; width: 30%;">
				<?php esc_html_e( 'Price', 'woocommerce' ); ?>
			</th>
		</tr>
	</thead>

	<tbody>
		<?php
		echo wp_kses_post(
			$this->ordetItemTables(
				$order,
				array(
					'show_sku'      => $sent_to_admin,
					'show_image'    => false,
					'image_size'    => array( 32, 32 ),
					'plain_text'    => $plain_text,
					'sent_to_admin' => $sent_to_admin,
				)
			)
		);


		?>
	</tbody>

  <tfoot>
		<?php
		$totalItem = $order->get_order_item_totals();
		$i         = 0;
		foreach ( $totalItem as $key => $total ) {
			$i++;
			?>

			<tr>
				<th class="td" scope="row" colspan="2" style="text-align:left; <?php echo esc_attr( ( 1 === $i ) ? 'border-top-width: 4px;' : '' ); ?>">
			<?php echo esc_html( $total['label'] ); ?>
				</th>
				<td class="td" style="text-align:left; <?php echo esc_attr( ( 1 === $i ) ? 'border-top-width: 4px;' : '' ); ?>">
			<?php echo wp_kses_post( $total['value'] ); ?>
				</td>
			</tr>

			<?php
		}


		if ( ! empty( $order->get_customer_note() ) ) {
			$note = $order->get_customer_note();
			?>

			<tr>
					<th class="td" scope="row" colspan="2" style="text-align:left; <?php echo esc_attr( ( 1 === $i ) ? 'border-top-width: 4px;' : '' ); ?>">
			<?php esc_html_e( 'Note:', 'woocommerce' ); ?>
					</th>
					<td class="td" style="text-align:left; <?php echo esc_attr( ( 1 === $i ) ? 'border-top-width: 4px;' : '' ); ?>">
			<?php echo esc_html( $note ); ?>
					</td>
			</tr>

		<?php } ?>
	</tfoot>
</table>
