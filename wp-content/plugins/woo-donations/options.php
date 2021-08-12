<?php

if(!defined('ABSPATH')) exit;

$default_tab = null;
$tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;

$options= wdgk_get_wc_donation_setting();
	
	if(isset($_POST['wdgk_add_form'])){
		//print_r($_POST); 
		$product_name="";
		$cart_product="";
		$checkout_product="";
		$checkout_note="";
		$btncolor="";
		$textcolor="";
		$btntext="";
		$btntext="";
		$campaign="";
		if(isset($_POST['wdgk_product']))  $product_name=sanitize_text_field($_POST['wdgk_product']);
		if(isset($_POST['wdgk_cart'])) $cart_product=sanitize_text_field($_POST['wdgk_cart']);
		if(isset($_POST['wdgk_checkout']))  $checkout_product=sanitize_text_field($_POST['wdgk_checkout']);
		if(isset($_POST['wdgk_note'])) $checkout_note=sanitize_text_field($_POST['wdgk_note']);
		if(isset($_POST['wdgk_btncolor'])) $btncolor=sanitize_text_field($_POST['wdgk_btncolor']);
		if(isset($_POST['wdgk_textcolor'])) $textcolor=sanitize_text_field($_POST['wdgk_textcolor']);
		if(isset($_POST['wdgk_btntext'])) $btntext=sanitize_text_field($_POST['wdgk_btntext']);
		if(isset($_POST['wdgk_campaign'])) $campaign=sanitize_text_field($_POST['wdgk_campaign']);
		$options['Product']=$product_name;
		$options['Cart']=$cart_product;
		$options['Checkout']=$checkout_product;
		$options['Note']=$checkout_note;
		$options['Color']=$btncolor;
		$options['Text']=$btntext;
		$options['TextColor']=$textcolor;
		$options['Campaign']=$campaign;
		
		$nonce=$_POST['wdgk_wpnonce'];
		
		if(wp_verify_nonce( $nonce, 'wdgk_nonce' ))
		{
			if(!empty($product_name)){
				update_option('wdgk_donation_settings', $options);
				$successmsg= success_option_msg_wdgk('Settings Saved!');
			}
			else{
				
				$errormsg= failure_option_msg_wdgk('Please Select Donation Product from List.');
			}
		}
		else
		{
			$errormsg= failure_option_msg_wdgk('An error has occurred.');
			
		}

	}


	$product="";
	$cart="";
	$checkout="";
	$note="";
	$color="";
	$text="";
	$textcolor="";
	$campaign="";
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
	if(isset($options['Color'])){
		$color = $options['Color'];
	}
	if(isset($options['Text'])){
		$text = $options['Text'];
	}
	if(isset($options['TextColor'])){
		$textcolor = $options['TextColor'];
	}
	if(isset($options['Campaign'])){
		$campaign = $options['Campaign'];
	}
	

?>


<div class="wdgk_wrap ">
	<nav class="nav-tab-wrapper">
		<a href="?page=wdgk-donation-page" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">General Setting</a>
		<a href="?page=wdgk-donation-page&tab=donation-pro-version" class="nav-tab <?php if($tab==='donation-pro-version'):?>nav-tab-active<?php endif; ?>">Get Pro Version <svg width="18" height="18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="crown" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-crown fa-w-20 fa-2x"><path fill="#F5BC3E" d="M528 448H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm64-320c-26.5 0-48 21.5-48 48 0 7.1 1.6 13.7 4.4 19.8L476 239.2c-15.4 9.2-35.3 4-44.2-11.6L350.3 85C361 76.2 368 63 368 48c0-26.5-21.5-48-48-48s-48 21.5-48 48c0 15 7 28.2 17.7 37l-81.5 142.6c-8.9 15.6-28.9 20.8-44.2 11.6l-72.3-43.4c2.7-6 4.4-12.7 4.4-19.8 0-26.5-21.5-48-48-48S0 149.5 0 176s21.5 48 48 48c2.6 0 5.2-.4 7.7-.8L128 416h384l72.3-192.8c2.5.4 5.1.8 7.7.8 26.5 0 48-21.5 48-48s-21.5-48-48-48z" class=""></path></svg></a>
	</nav>

	<div class="wdgk_donation_setting <?php if($tab==='donation-pro-version'){ echo 'wdgk-hidden'; } ?>">

		<h2>Woocommerce Donation Settings</h2>
		<?php
		if ( isset( $successmsg ) ) 
		{
			echo $successmsg; 
		}
		
		if ( isset( $errormsg ) ) 
		{
			echo $errormsg;
		}
		?>
	
	
		<div class='wdgk_inner'>	
			<form method="post">	
				<table class="form-table">	
					<tbody>	
						<tr valign="top">	
							<th scope="row">Select Donation Product</th>	
							<td>
								<select name="wdgk_product" id="wdgk-product">
									<option value="">--Select--</option>
									<?php									
										$wdgk_get_page = get_posts(array(
											'post_type'     => 'product',
											'post_status' =>'publish',
											'posts_per_page'=>-1
											
										));							
						
										foreach ( $wdgk_get_page as $wdgk_product ) {
											echo '<option value="'.$wdgk_product->ID.'"'.selected($wdgk_product->ID,$product,false).'>'.$wdgk_product->post_title.' ('.$wdgk_product->ID.')</option>';
										}
									?>
								</select>
								<span class="wdgk_note">Select woocommerce products for donation.</span>
							</td>	
						</tr>

						<tr valign="top">	
							<th scope="row">Add on Cart Page</th>	
							<td>
								<label class="wdgk-switch wdgk-switch-wdgk_cart_status">
									<input type="checkbox" class="wdgk-cart" name="wdgk_cart" value="on"
										<?php if($cart=='on'){echo "checked";}?>>
									<span class="wdgk-slider wdgk-round"></span>
								</label>
								<span class="wdgk_note">Enable to display donation on cart page.</span>
							</td>
						</tr>

						<tr valign="top">	
							<th scope="row">Add on Checkout Page</th>	
							<td>
								<label class="wdgk-switch wdgk-switch-wdgk_checkout_status">
									<input type="checkbox" class="wdgk-checkout" name="wdgk_checkout" value="on"
										<?php if($checkout=='on'){echo "checked";}?>>
									<span class="wdgk-slider wdgk-round"></span>
								</label>
								<span class="wdgk_note">Enable to display donation on checkout page.</span>
							</td>
						</tr>

						<tr valign="top">	
							<th scope="row">Add on Note</th>	
							<td>
								<label class="wdgk-switch wdgk-switch-wdgk_note_status">
									<input type="checkbox" class="wdgk-note wdgk-checkout" name="wdgk_note" value="on"
										<?php if($note=='on'){echo "checked";}?>>
									<span class="wdgk-slider wdgk-round"></span>
								</label>
								<span class="wdgk_note">Enable to display note on donation.</span>
							</td>
						</tr>

						<tr valign="top">	
							<th scope="row">Button Color</th>	
							<td>
								<input type="text" name="wdgk_btncolor" class="wdgk_colorpicker" value="<?php echo $color; ?>">
								<span class="wdgk_note">Select donation button color.</span>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row">Button Text</th>
							<td>
								<input type="text" name="wdgk_btntext" value="<?php echo $text; ?>">
								<span class="wdgk_note">Add Donation button text.</span>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row">Button Text Color</th>
							<td>
								<input type="text" name="wdgk_textcolor" class="wdgk_colorpicker" value="<?php echo $textcolor; ?>">
								<span class="wdgk_note">Select donation button text color.</span>
							</td>
						</tr>
	
					</tbody>
				</table>
	
				<input type="hidden" name="wdgk_wpnonce" value="<?php echo $nonce= wp_create_nonce('wdgk_nonce'); ?>">	
				<input class="button button-primary button-large wdgk_submit" type="submit" name="wdgk_add_form" id="wdgk_submit" value="Save Changes" />
	
			</form>
		</div>
	</div>
	<div class="wdgk_pro_details <?php if($tab===null){ echo "wdgk-hidden"; } ?>">
		<h2>Woocommerce Donation Pro Version </h2>
		<ul>
			<li>Display predefined donation amount options.</li>
			<li>Configurable screen position for donation form in cart page.</li>
			<li>Configurable screen position for donation form in checkout page.</li>
			<li>Display donation request popup.</li>
			<li>Add the donation widget on the website’s sidebar or footer.</li>
			<li>Show donation order listing.</li>
			<li>Download CSV file in donation order table.</li>
		</ul>
		<a href="https://geekcodelab.com/wordpress-plugins/woo-donation-pro/" title="Upgrade to Premium" class="wdgk_premium_btn" target="_blank">Upgrade to Premium</a>
	</div>
</div>

<script type='text/javascript'>
(function($) {
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.wdgk_colorpicker').wpColorPicker();
    });

})(jQuery);
</script>