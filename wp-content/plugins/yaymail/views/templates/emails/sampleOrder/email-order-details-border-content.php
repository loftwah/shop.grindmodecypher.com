<?php
defined( 'ABSPATH' ) || exit;
use YayMail\Page\Source\CustomPostType;
use YayMail\Helper\Helper;
$is_preview           = Helper::isPreview( $this->preview_mail );
$text_align           = is_rtl() ? 'right' : 'left';
$postID               = CustomPostType::postIDByTemplate( $this->template );
$order_item_title     = get_post_meta( $postID, '_yaymail_email_order_item_title', true );
$yaymail_template     = get_post_meta( $postID, '_yaymail_template', true );
$product_title        = $is_preview ? '{{product_title}}' : ( false != $order_item_title ? $order_item_title['product_title'] : 'Product' );
$quantity_title       = $is_preview ? '{{quantity_title}}' : ( false != $order_item_title ? $order_item_title['quantity_title'] : 'Quantity' );
$price_title          = $is_preview ? '{{price_title}}' : ( false != $order_item_title ? $order_item_title['price_title'] : 'Price' );
$subtoltal_title      = false != $order_item_title ? $order_item_title['subtoltal_title'] : 'Subtotal:';
$payment_method_title = false != $order_item_title ? $order_item_title['payment_method_title'] : 'Payment method:';
$total_title          = false != $order_item_title ? $order_item_title['total_title'] : 'Total:';
$borderColor          = isset( $atts['bordercolor'] ) && $atts['bordercolor'] ? 'border-color:' . html_entity_decode( $atts['bordercolor'], ENT_QUOTES, 'UTF-8' ) : 'border-color:inherit';
$textColor            = isset( $atts['textcolor'] ) && $atts['textcolor'] ? 'color:' . html_entity_decode( $atts['textcolor'], ENT_QUOTES, 'UTF-8' ) : 'color:inherit';
?>
		<tr style="word-break: normal">
			<th colspan="<?php echo wp_kses_post( apply_filters( 'yaymail_order_item_product_title_colspan', 1, $yaymail_template ) ); ?>" class="td yaymail_item_product_title" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;vertical-align: middle;padding: 12px;font-size: 14px;border-width: 1px;border-style: solid;<?php echo esc_attr( $borderColor ); ?>;<?php echo esc_attr( $textColor ); ?>">
				<?php esc_html_e( $product_title, 'woocommerce' ); ?>
			</th>
			<th colspan="<?php echo wp_kses_post( apply_filters( 'yaymail_order_item_quantity_colspan', 1, $yaymail_template ) ); ?>" class="td yaymail_item_quantity_title" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;vertical-align: middle;padding: 12px;font-size: 14px;border-width: 1px;border-style: solid;<?php echo esc_attr( $borderColor ); ?>;<?php echo esc_attr( $textColor ); ?>">
				<?php esc_html_e( $quantity_title, 'woocommerce' ); ?>
			</th>
			<th colspan="<?php echo wp_kses_post( apply_filters( 'yaymail_order_item_price_colspan', 1, $yaymail_template ) ); ?>" class="td yaymail_item_price_title" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;vertical-align: middle;padding: 12px;font-size: 14px;border-width: 1px;border-style: solid;<?php echo esc_attr( $borderColor ); ?>;<?php echo esc_attr( $textColor ); ?>">
				<?php esc_html_e( $price_title, 'woocommerce' ); ?>
			</th>
		</tr>
		<tr>
			<th colspan="<?php echo wp_kses_post( apply_filters( 'yaymail_order_item_product_title_colspan', 1, $yaymail_template ) ); ?>" class="td yaymail_item_product_content" scope="row" style="font-weight: normal;text-align:<?php echo esc_attr( $text_align ); ?>;vertical-align: middle;padding: 12px;font-size: 14px;border-width: 1px;border-style: solid;<?php echo esc_attr( $borderColor ); ?>;<?php echo esc_attr( $textColor ); ?>">
				<?php esc_html_e( 'Happy YayCommerce', 'yaymail' ); ?>
			</th>
			<th colspan="<?php echo wp_kses_post( apply_filters( 'yaymail_order_item_quantity_colspan', 1, $yaymail_template ) ); ?>" class="td yaymail_item_quantity_content" scope="row" style="font-weight: normal;text-align:<?php echo esc_attr( $text_align ); ?>;vertical-align: middle;padding: 12px;font-size: 14px;border-width: 1px;border-style: solid;<?php echo esc_attr( $borderColor ); ?>;<?php echo esc_attr( $textColor ); ?>">
				<?php esc_html_e( 1, 'yaymail' ); ?>
			<th colspan="<?php echo wp_kses_post( apply_filters( 'yaymail_order_item_price_colspan', 1, $yaymail_template ) ); ?>" class="td yaymail_item_price_content" scope="row" style="font-weight: normal;text-align:<?php echo esc_attr( $text_align ); ?>;vertical-align: middle;padding: 12px;font-size: 14px;border-width: 1px;border-style: solid;<?php echo esc_attr( $borderColor ); ?>;<?php echo esc_attr( $textColor ); ?>">
				<?php esc_html_e( '£18.00', 'yaymail' ); ?>
			</th>
		</tr>
		<tr>
			<th class="td yaymail_item_subtoltal_title" scope="row" colspan="2" style="text-align:<?php echo esc_attr( $text_align ); ?>;font-weight: bold;vertical-align: middle;padding: 12px;font-size: 14px;border-width: 1px;border-style: solid;<?php echo esc_attr( $borderColor ); ?>;<?php echo esc_attr( $textColor ); ?> ;border-top-width: 4px;">
				<?php esc_html_e( $subtoltal_title, 'woocommerce' ); ?>
			</th>
			<th class="td yaymail_item_subtoltal_content" scope="row" colspan="1" style="font-weight: normal;text-align:<?php echo esc_attr( $text_align ); ?>;vertical-align: middle;padding: 12px;font-size: 14px;border-width: 1px;border-style: solid;<?php echo esc_attr( $borderColor ); ?>;<?php echo esc_attr( $textColor ); ?>; border-top-width: 4px;">
				<?php esc_html_e( '£18.00', 'yaymail' ); ?>
			</th>
		</tr>
		<tr>
			<th class="td yaymail_item_payment_method_title" scope="row" colspan="2" style="text-align:<?php echo esc_attr( $text_align ); ?>; font-weight: bold;vertical-align: middle;padding: 12px;font-size: 14px;border-width: 1px;border-style: solid;<?php echo esc_attr( $borderColor ); ?>;<?php echo esc_attr( $textColor ); ?>">
				<?php esc_html_e( $payment_method_title, 'woocommerce' ); ?>
			</th>
			<th class="td yaymail_item_payment_method_content" scope="row" colspan="1" style="font-weight: normal;text-align:<?php echo esc_attr( $text_align ); ?>;vertical-align: middle;padding: 12px;font-size: 14px;border-width: 1px;border-style: solid;<?php echo esc_attr( $borderColor ); ?>;<?php echo esc_attr( $textColor ); ?>">
				<?php esc_html_e( 'Direct bank transfer', 'woocommerce' ); ?>
			</th>
		</tr>
		<tr>
			<th class="td yaymail_item_total_title" scope="row" colspan="2" style="text-align:<?php echo esc_attr( $text_align ); ?>; font-weight: bold;vertical-align: middle;padding: 12px;font-size: 14px;border-width: 1px;border-style: solid;<?php echo esc_attr( $borderColor ); ?>;<?php echo esc_attr( $textColor ); ?>">
				<?php esc_html_e( $total_title, 'woocommerce' ); ?>
			</th>
			<th class="td yaymail_item_total_content" scope="row" colspan="1" style="font-weight: normal;text-align:<?php echo esc_attr( $text_align ); ?>;vertical-align: middle;padding: 12px;font-size: 14px;border-width: 1px;border-style: solid;<?php echo esc_attr( $borderColor ); ?>;<?php echo esc_attr( $textColor ); ?>">
				<?php esc_html_e( '£18.00', 'yaymail' ); ?>
			</th>
		</tr>
