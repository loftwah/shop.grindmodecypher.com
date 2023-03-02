<?php

defined( 'ABSPATH' ) || exit;
use YayMail\Page\Source\CustomPostType;
use YayMail\Helper\Helper;

$is_preview                = Helper::isPreview( $this->preview_mail );
$text_align                = is_rtl() ? 'right' : 'left';
$sent_to_admin             = ( isset( $sent_to_admin ) ? $sent_to_admin : false );
$plain_text                = ( isset( $plain_text ) ? $plain_text : '' );
$email                     = ( isset( $email ) ? $email : '' );
$postID                    = CustomPostType::postIDByTemplate( $this->template );
$text_link_color           = get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) ? get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) : '#7f54b3';
$borderColor               = isset( $atts['bordercolor'] ) && $atts['bordercolor'] ? 'border-color:' . html_entity_decode( $atts['bordercolor'], ENT_QUOTES, 'UTF-8' ) : 'border-color:inherit';
$textColor                 = isset( $atts['textcolor'] ) && $atts['textcolor'] ? 'color:' . html_entity_decode( $atts['textcolor'], ENT_QUOTES, 'UTF-8' ) : 'color:inherit';
$order_item_download_title = get_post_meta( $postID, '_yaymail_email_order_item_download_title', true );
$product_title             = $is_preview ? '{{items_download_product_title}}' : ( false != $order_item_download_title ? $order_item_download_title['items_download_product_title'] : 'Product' );
$expires_title             = $is_preview ? '{{items_download_expires_title}}' : ( false != $order_item_download_title ? $order_item_download_title['items_download_expires_title'] : 'Expires' );
$download_title            = $is_preview ? '{{items_download_download_title}}' : ( false != $order_item_download_title ? $order_item_download_title['items_download_download_title'] : 'Download' );
$columns                   = apply_filters(
	'woocommerce_email_downloads_columns',
	array(
		'download-product' => __( 'Product', 'woocommerce' ),
		'download-expires' => __( 'Expires', 'woocommerce' ),
		'download-file'    => __( 'Download', 'woocommerce' ),
	)
);
?>

<!-- Table Items has Border -->
<?php
if ( isset( $downloads ) && ! empty( $downloads ) ) {
	?>
<table class="yaymail_builder_table_items_border yaymail_builder_table_item_download" cellspacing="0" cellpadding="6" border="1" style="width: 100% !important;<?php echo esc_attr( $borderColor ); ?>;color: inherit;flex-direction:inherit;" width="100%">
	<thead>
		<tr style="word-break: normal;<?php echo esc_attr( $textColor ); ?>">
			<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;<?php echo esc_attr( $borderColor ); ?>;">
				<?php esc_html_e( $product_title, 'woocommerce' ); ?>
			</th>
			<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;<?php echo esc_attr( $borderColor ); ?>;">
				<?php esc_html_e( $expires_title, 'woocommerce' ); ?>
			</th>
			<th class="td" scope="col" style="text-align:<?php echo esc_attr( $text_align ); ?>;<?php echo esc_attr( $borderColor ); ?>;">
				<?php esc_html_e( $download_title, 'woocommerce' ); ?>
			</th>
		</tr>
	</thead>
	<?php foreach ( $downloads as $download ) : ?>
		<tfoot>
			<tr style="<?php echo esc_attr( $textColor ); ?>">
				<?php foreach ( $columns as $column_id => $column_name ) : ?>
					<td class="td" style="<?php echo esc_attr( $borderColor ); ?>;text-align:<?php echo esc_attr( $text_align ); ?>">
						<?php
						if ( has_action( 'woocommerce_email_downloads_column_' . $column_id ) ) {
							do_action( 'woocommerce_email_downloads_column_' . $column_id, $download, $plain_text );
						} else {
							switch ( $column_id ) {
								case 'download-product':
									?>
									<a style="color:<?php echo esc_attr( $text_link_color ); ?>" href="<?php echo esc_url( get_permalink( $download['product_id'] ) ); ?>"><?php echo wp_kses_post( $download['product_name'] ); ?></a>
									<?php
									break;
								case 'download-file':
									?>
									<a style="color:<?php echo esc_attr( $text_link_color ); ?>" href="<?php echo esc_url( $download['download_url'] ); ?>"><?php echo esc_html( $download['download_name'] ); ?></a>
									<?php
									break;
								case 'download-expires':
									if ( ! empty( $download['access_expires'] ) ) {
										?>
										<time datetime="<?php echo esc_attr( gmdate( 'Y-m-d', strtotime( $download['access_expires'] ) ) ); ?>" title="<?php echo esc_attr( strtotime( $download['access_expires'] ) ); ?>"><?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $download['access_expires'] ) ) ); ?></time>
										<?php
									} else {
										esc_html_e( 'Never', 'woocommerce' );
									}
									break;
							}
						}
						?>
					</td>
				<?php endforeach; ?>
			</tr>
		</tfoot>
	<?php endforeach; ?>
</table>
	<?php
}
?>
