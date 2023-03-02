<?php

defined( 'ABSPATH' ) || exit;
$sent_to_admin = isset( $args['sent_to_admin'] ) ? $args['sent_to_admin'] : false;
$email         = isset( $args['email'] ) ? $args['email'] : (object) array();
$plain_text    = isset( $args['plain_text'] ) ? $args['plain_text'] : false;


if ( did_action( 'woocommerce_email_order_details' ) < 1 ) {
	do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );
}
