<?php
/*
Plugin Name: Woo Donations
Description: A plugin to add donation for campaign
Author: Geek Web Solution
Version: 1.6
WC tested up to: 5.3.0
Author URI: http://www.geekwebsolution.com/
*/

if(!defined('ABSPATH')) exit;

if(!defined("wdgk_PLUGIN_DIR_PATH"))
	
	define("wdgk_PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));	
	
if(!defined("wdgk_PLUGIN_URL"))
	
	define("wdgk_PLUGIN_URL",plugins_url().'/'.basename(dirname(__FILE__)));	

define("wdgk_BUILD",'1.0');	


require_once( wdgk_PLUGIN_DIR_PATH .'functions.php' );

add_action('admin_menu', 'wdgk_admin_menu_donation_setting_page' );

add_action( 'admin_print_styles', 'wdgk_admin_style' );

register_activation_hook( __FILE__, 'wdgk_plugin_active_woocommerce_donation' );

function wdgk_plugin_active_woocommerce_donation(){
	$error='required <b>woocommerce</b> plugin.';	
	if ( !class_exists( 'WooCommerce' ) ) {
	   die('Plugin NOT activated: ' . $error);
	}
	if (is_plugin_active( 'woo-donations-pro/woo-donations-pro.php' ) ) {		
		deactivate_plugins('woo-donations-pro/woo-donations-pro.php');
   	} 
	$btntext="Add Donation"; 
	$textcolor="#FFFFFF";
	$btncolor="#289dcc";
	$options=array();
	$setting=get_option('wdgk_donation_settings');
	// echo "<pre>";
	// print_r($setting);

	// die;
	if(!isset($setting['Text']))  $options['Text'] = $btntext;
	if(!isset($setting['TextColor']))  $options['TextColor'] = $textcolor;
	if(!isset($setting['Color']))  $options['Color'] = $btncolor;


	if(!isset($setting['Product'])){
			$id=wp_insert_post(array('post_title'=>'Donation', 'post_name' => 'donation', 'post_type'=>'product', 'post_status'=>'publish'));
			$sku='donation-'.$id;
			update_post_meta($id,'_sku',$sku);
			update_post_meta($id,'_tax_status','none');
			update_post_meta($id,'_tax_class','zero-rate');
			update_post_meta($id, '_visibility', 'hidden' );
			update_post_meta($id, '_regular_price', 0 );
			update_post_meta($id, '_price', 0 );
			update_post_meta($id, '_sold_individually', 'yes' );
			$options['Product']=$id;
			$taxonomy = 'product_visibility';
			wp_set_object_terms($id, 'exclude-from-catalog', $taxonomy);
			wdgk_generate_featured_image( wdgk_PLUGIN_URL.'/assets/images/donation_thumbnail.jpg',$id);
	}
	if(count($options)>0)
	{
		update_option('wdgk_donation_settings', $options);
	}
}

add_action( 'wp_enqueue_scripts', 'wdgk_include_front_script' );
function wdgk_include_front_script() {
   wp_enqueue_style("wdgk_front_style",wdgk_PLUGIN_URL."/assets/css/wdgk_front_style.css",'');  
   wp_enqueue_script('wdgk_donation_script', plugins_url('/assets/js/script.js', __FILE__), array('jquery'), wdgk_BUILD);
   
}
function wdgk_admin_style() {

	if(is_admin()){
		$css=wdgk_PLUGIN_URL.'/assets/css/wdgk_admin_style.css';
		wp_enqueue_style( 'wdgk_admin_style',$css,'');
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'wp-color-picker');
	}
}
function wdgk_admin_menu_donation_setting_page(){
	
	add_submenu_page( 'woocommerce','Donation', 'Donation', 'manage_options', 'wdgk-donation-page', 'wdgk_donation_page_setting');

}

function wdgk_donation_page_setting(){

	if(!current_user_can('manage_options') ){
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	include( wdgk_PLUGIN_DIR_PATH . 'options.php' );
	
	
}

add_shortcode('wdgk_donation','wdgk_donation_shortcode');
function wdgk_donation_shortcode(){
	global $woocommerce;
	$product="";
	$text="";
	$note_html="";
	$options= wdgk_get_wc_donation_setting();
	if(isset($options['Product'])){
		$product = $options['Product'];
	}
	if(isset($options['Text'])){
		$text = $options['Text'];
	}
	if(isset($options['Note'])){
		$note = $options['Note'];
	}
	if(!empty($product) && $note=='on'){
		$note_html = '<textarea id="w3mission" rows="3" cols="20" placeholder="Note" name="donation_note" class="donation_note"></textarea>';
	}
	if(!empty($product)){	
		$cart_url = get_permalink( wc_get_page_id( 'cart' ) ); 
		$ajax_url= admin_url('admin-ajax.php');
		ob_start();
		echo '<div class="wdgk_donation_content"><input type="text" name="donation-price" class="wdgk_donation" placeholder="Ex.100">'.$note_html.'<a 
href="javascript:void(0)" class="button wdgk_add_donation" data-product-id="'.$product.'" data-product-url="'.$cart_url.'">'.$text.'</a><input 
type="hidden" name="wdgk_product_id" value="" class="wdgk_product_id"><input type="hidden" name="wdgk_ajax_url" value="'.$ajax_url.'" 
class="wdgk_ajax_url"><img src="'.wdgk_PLUGIN_URL.'/assets/images/ajax-loader.gif" class="wdgk_loader wdgk_loader_img"><div 
class="wdgk_error_front"></div></div>';
		return ob_get_clean();
	
	}
}
	$product="";
	$cart="";
	$checkout="";
	$options= wdgk_get_wc_donation_setting();
	if(isset($options['Product'])){
		$product = $options['Product'];
	}
	if(isset($options['Cart'])){
		$cart = $options['Cart'];
	}
	if(isset($options['Checkout'])){
		$checkout = $options['Checkout'];
	}
	if(isset($options['Note'])){
		$note = $options['Note'];
	}
	if(!empty($product) && $cart=='on'){
		add_action( 'woocommerce_proceed_to_checkout', 'wdgk_add_donation_on_cart_page');
	}
	if(!empty($product) && $checkout=='on'){	
		add_action( 'woocommerce_before_checkout_form', 'wdgk_add_donation_on_checkout_page' );
	}
function wdgk_add_donation_on_cart_page() {
	global $woocommerce;
	$product="";
	$text="";
	$note_html="";
	$options= wdgk_get_wc_donation_setting();
	if(isset($options['Product'])){
		$product = $options['Product'];
	}
	if(isset($options['Text'])){
		$text = $options['Text'];
	}
	// $note_html = $options['Note'];
	if(isset($options['Note'])){
		$note = $options['Note'];
	}
	if(!empty($product) && $note=='on'){
		$note_html = '<textarea id="w3mission" rows="3" cols="20" placeholder="Note" name="donation_note" class="donation_note"></textarea>';
	}
	// $cart_url = $woocommerce->cart->get_cart_url();
	$cart_page_id = wc_get_page_id( 'cart' );
	$cart_url = $cart_page_id ? get_permalink( $cart_page_id ) : ”;
	$ajax_url= admin_url('admin-ajax.php');
	$current_cur = get_woocommerce_currency();
	$cur_syambols = get_woocommerce_currency_symbols();
	echo '<div class="wdgk_donation_content">
	<div class="wdpgk_display_option"> <span>'.$cur_syambols[$current_cur].'</span><input type="text" name="donation-price" class="wdgk_donation" placeholder="Ex.100"></div>
	'.$note_html.'<a 
href="javascript:void(0)" class="button wdgk_add_donation" data-product-id="'.$product.'" data-product-url="'.$cart_url.'">'.$text.'</a><input 
type="hidden" name="wdgk_product_id" value="" class="wdgk_product_id"><input type="hidden" name="wdgk_ajax_url" value="'.$ajax_url.'" 
class="wdgk_ajax_url"><img src="'.wdgk_PLUGIN_URL.'/assets/images/ajax-loader.gif" class="wdgk_loader wdgk_loader_img"><div 
class="wdgk_error_front"></div></div>';
	
}

function wdgk_add_donation_on_checkout_page(){

	global $woocommerce;
	$product="";
	$text="";
	$note_html="";
	$options= wdgk_get_wc_donation_setting();
	if(isset($options['Product'])){
		$product = $options['Product'];
	}
	if(isset($options['Text'])){
		$text = $options['Text'];
	}
	if(isset($options['Note'])){
		$note = $options['Note'];
	}
	if(!empty($product) && $note=='on'){
		$note_html = '<textarea id="w3mission" rows="3" cols="20" placeholder="Note" name="donation_note" class="donation_note"></textarea>';
	}
	// $checkout_url = $woocommerce->cart->get_checkout_url();

	$checkout_url = function_exists( 'wc_get_checkout_url' ) ? wc_get_checkout_url() : $woocommerce->cart->get_checkout_url();


	$ajax_url= admin_url('admin-ajax.php');

	$current_cur = get_woocommerce_currency();
	$cur_syambols = get_woocommerce_currency_symbols();
	
	echo '<div class="wdgk_donation_content"><div class="wdpgk_display_option"> <span>'.$cur_syambols[$current_cur].'</span><input type="text" name="donation-price" class="wdgk_donation" placeholder="Ex.100"></div>'.$note_html.'<a 
href="javascript:void(0)" class="button wdgk_add_donation" data-product-id="'.$product.'" data-product-url="'.$checkout_url.'">'.$text.'</a><input 
type="hidden" name="wdgk_product_id" value="" class="wdgk_product_id"><input type="hidden" name="wdgk_ajax_url" value="'.$ajax_url.'" 
class="wdgk_ajax_url"><img src="'.wdgk_PLUGIN_URL.'/assets/images/ajax-loader.gif" class="wdgk_loader wdgk_loader_img"><div 
class="wdgk_error_front"></div></div>';
	
}
add_action('wp_head','wdgk_set_button_text_color');
function wdgk_set_button_text_color(){?>
	<style>
		<?php 
		$color="";
		$textcolor="";
		$options= wdgk_get_wc_donation_setting();
		if(isset($options['Color'])){
			$color = $options['Color'];
			echo '.wdgk_donation_content a.button.wdgk_add_donation {
			background-color: '.$color.' !important;}';
		}
		if(isset($options['TextColor'])){
			$textcolor = $options['TextColor'];
			echo '.wdgk_donation_content a.button.wdgk_add_donation {
			color: '.$textcolor.' !important;}';
		}
		 ?>
		
	</style> 

	<?php 
}

function wdgk_add_cart_item_data( $cart_item_data, $product_id, $variation_id ) {
	$pid="";
	$options= wdgk_get_wc_donation_setting();
	if(isset($options['Product'])){
		$pid = $options['Product'];
	}
	if(isset($_COOKIE['product_price'])){
	
		$product = wc_get_product( $product_id );
		$price=$_GET['price'];
		//$note=$_GET['note'];

		// echo $product_id;
		// die;
		if($product_id == $pid){

			$cart_item_data['donation_price'] = $_COOKIE['product_price'];
			$cart_item_data['donation_note'] = $_COOKIE['donation_note'];
		
		}
	}
	return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'wdgk_add_cart_item_data', 10, 3 );
add_action( 'woocommerce_before_calculate_totals', 'wdgk_before_calculate_totals', 10, 1 );

function wdgk_before_calculate_totals( $cart_obj ) {
	
	$pid="";
	$options= wdgk_get_wc_donation_setting();
	if(isset($options['Product'])){
		$pid = $options['Product'];
	}
	if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
		return;
	}
 // Iterate through each cart item
	foreach( $cart_obj->get_cart() as $key=>$value ) {
		$id = $value['data'];
		
		if( isset( $value['donation_price'] ) && $id->get_id() == $pid) {
			$price = $value['donation_price']; 
			$value['data']->set_price( ( $price ) );
			
		}
        
 	}
}

add_action( 'wp_ajax_wdgk_donation_form', 'wdgk_donation_ajax_callback' );    // If called from admin panel
add_action( 'wp_ajax_nopriv_wdgk_donation_form', 'wdgk_donation_ajax_callback' ); 
function wdgk_donation_ajax_callback() {
	
	
	$product_id=sanitize_text_field($_POST['product_id']);
	$price=sanitize_text_field($_POST['price']);
	$redirect_url=sanitize_text_field($_POST['redirect_url']);
	wdgk_add_donation_product_to_cart($product_id);
	$response=array();
	$response['url']=$redirect_url;
	if(!preg_match("/^[0-9.]*$/", $price) || $price < 0.01){
		$response['error']="true";
	}
	echo json_encode($response);
	die;

 
}
add_action('admin_footer','wdgk_admin_script');
function wdgk_admin_script(){
	
	?>
	<script>
		jQuery('.wdgk-campaign').click(function(){
			//jQuery('<tr valign="top"><th scope="row">Campaign</th><td><input type="text" class="wdgk-add-campaign" name="wdgk_add_campaign" value="" ></td></tr>').appendTo('<tbody>');
		
		});
	</script>
	<?php
}

add_action('wp_footer','wdgk_footer_script');

function wdgk_footer_script(){
		?>
		<script>
		function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays*24*60*60*1000));
			var expires = "expires="+ d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}
		jQuery(".wdgk_donation").on('keyup', function (e) {
			if (e.keyCode == 13) {    
				jQuery( ".wdgk_add_donation").trigger( "click" );
			} 
		});
		jQuery('.wdgk_add_donation').click(function(){
		 var note= "";
		 var price= jQuery('.wdgk_donation').val();
		 if(jQuery('.donation_note').val())
		 {
			var note= jQuery('.donation_note').val();
		 }
		 var ajaxurl= jQuery('.wdgk_ajax_url').val();
		 var product_id=jQuery(this).attr('data-product-id');
		 var redirect_url=jQuery(this).attr('data-product-url');
		 if(price=="")
		 {
			jQuery(".wdgk_error_front").text("Please enter value!!");
			return false;
		 }
		 else{
		 	var pattern = new RegExp(/^[0-9.*]/);
            if (!pattern.test(price) || price < 0.01) {
            	jQuery(".wdgk_error_front").text("Please enter valid value!!");
				return false;
            }
		 }
		 if(!jQuery.isNumeric(price))
		 {	
			jQuery(".wdgk_error_front").text("Please enter numeric value !!");	
			  return false;
		 }
		  jQuery('.wdgk_loader').removeClass("wdgk_loader_img");
			setCookie('product_price',price,1);
			setCookie('donation_note',note,2);
					
			  jQuery.ajax({
					url: ajaxurl,
					data: {
						action: 'wdgk_donation_form',
						product_id: product_id,
						price: price,
						note:note,
						redirect_url: redirect_url
					},
					type: 'POST',
					success: function(data){
						var redirect=jQuery.parseJSON(data);
						if(redirect.error == "true"){
							jQuery(".wdgk_error_front").text("Please enter valid value!!");
							jQuery('.wdgk_loader').addClass("wdgk_loader_img");
							return false;
						}else{

						document.location.href=redirect.url;
						}
						
					}
				
			});
		});
		</script>
		<?php 


}
function wdgk_plugin_add_settings_link( $links ) { 	
	$settings_link = '<a href="admin.php?page=wdgk-donation-page">' . __( 'Settings' ) . '</a>'; 
	array_push( $links, $settings_link );	
	return $links;	
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'wdgk_plugin_add_settings_link');



/**
 * Display custom item data in the cart
 */
function wdgk_plugin_republic_get_item_data( $item_data, $cart_item_data ) {
 	if( isset( $cart_item_data['donation_note'] )  && isset( $cart_item_data['donation_price']) && !empty($cart_item_data['donation_note']) && 
!empty($cart_item_data['donation_note'])) {
 		$item_data[] = array(
		 	'key' => __( 'Description1', 'plugin-republic' ),
		 	'value' => wc_clean( $cart_item_data['donation_note'] )
	 	);
 	}
 	return $item_data;
}
add_filter( 'woocommerce_get_item_data', 'wdgk_plugin_republic_get_item_data', 10, 2 );




/**
 * Add custom meta to order
 */
function wdgk_plugin_republic_checkout_create_order_line_item( $item, $cart_item_key, $values, $order ) {
 	if( isset( $values['donation_note'] ) ) {
 		$item->add_meta_data(__( 'Description', 'plugin-republic' ),
 		$values['donation_note'],
 		true );
 	}
}
add_action( 'woocommerce_checkout_create_order_line_item', 'wdgk_plugin_republic_checkout_create_order_line_item', 10, 4 );




/**
 * Add custom cart item data to emails
 */
function wdgk_plugin_republic_order_item_name( $product_name, $item ) {
 	if( isset( $item['donation_note'] ) && isset( $item['donation_price']) ) {

 		$product_name .= sprintf(
 			'<ul><li>%s: %s</li></ul>',
 			__( 'Description', 'plugin_republic' ),
 			esc_html( $item['donation_note'] )
 		);
 	}
 	return $product_name;
}
add_filter( 'woocommerce_order_item_name', 'wdgk_plugin_republic_order_item_name', 10, 2 );	

/* Add "Donation" column on admin side order list */ 

add_filter('manage_edit-shop_order_columns', 'misha_order_items_column' );
function misha_order_items_column( $order_columns ) {
    $order_columns['order_products'] = "Donation";
    return $order_columns;
}
 
add_action( 'manage_shop_order_posts_custom_column' , 'misha_order_items_column_cnt' );
function misha_order_items_column_cnt( $colname ) {
	global $the_order; // the global order object
 
 	if( $colname == 'order_products' ) {
 
		// get items from the order global object
		$order_items = $the_order->get_items();
		$product="";
		$options= wdgk_get_wc_donation_setting();
		if(isset($options['Product'])){
			$product = $options['Product'];
		}
		if ( !is_wp_error( $order_items ) ) {
			$donation_flag=false;
			foreach( $order_items as $order_item ) {
				
			
				if($product==$order_item['product_id'])
				{	
					$donation_flag=true;
				}
				
 
			}
			if($donation_flag==true) echo '<span class="dashicons dashicons-yes-alt wdgk_right_icon"></span>';
		}
 
	}
 
}












