<div class="wcccf_conditional_option_item">
	<input type="hidden" name="wcccf_field_data[<?php echo $field_id; ?>][conditional_group_item][<?php echo $conditional_item_id; ?>][logic_operator]" value="<?php echo $operator; ?>"></input>
	<div class="wcccf_option_box_container">
		<label><?php _e('Select an option','woocommerce-conditional-checkout-fields');?></label>
		<select name="wcccf_field_data[<?php echo $field_id; ?>][conditional_group_item][<?php echo $conditional_item_id; ?>][condition_type]" 
				class="conditional_group_item_select"
				data-id="<?php echo $field_id; ?>" 
				data-conditional-id="<?php echo $conditional_item_id; ?>">
			<option value="product" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'product' );; ?>><?php _e('Product','woocommerce-conditional-checkout-fields');?></option>
			<option value="category" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'category' ); ?>><?php _e('Category','woocommerce-conditional-checkout-fields');?></option>
			<option value="cart" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'cart' ); ?>><?php _e('Cart','woocommerce-conditional-checkout-fields');?></option>
			<option value="user" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'user' ); ?>><?php _e('User role','woocommerce-conditional-checkout-fields');?></option>
			<?php if($this->current_field_type == 'fee'): ?>
				<option value="payment" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'payment' ); ?>><?php _e('Payment method','woocommerce-conditional-checkout-fields');?></option>
				<option value="shipping_method" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'shipping_method' ); ?>><?php _e('Shipping method','woocommerce-conditional-checkout-fields');?></option>
				<!-- <option value="billing_first_name" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'billing_first_name' ); ?>><?php _e('Billing first name','woocommerce-conditional-checkout-fields');?></option>
				<option value="billing_last_name" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'billing_last_name' ); ?>><?php _e('Billing last name','woocommerce-conditional-checkout-fields');?></option>
				<option value="billing_company" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'billing_company' ); ?>><?php _e('Billing company','woocommerce-conditional-checkout-fields');?></option>
				-->
				<option value="billing_state_country" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'billing_state_country' ); ?>><?php _e('Billing country & state','woocommerce-conditional-checkout-fields');?></option>
				<!--
				<option value="billing_address_1" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'billing_address_1' ); ?>><?php _e('Billing address','woocommerce-conditional-checkout-fields');?></option>
				<option value="billing_address_2" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'billing_address_2' ); ?>><?php _e('Billing second address','woocommerce-conditional-checkout-fields');?></option>
				-->
				<option value="billing_postcode" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'billing_postcode' ); ?>><?php _e('Billing postcode / ZIP','woocommerce-conditional-checkout-fields');?></option>
				<option value="billing_city" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'billing_city' ); ?>><?php _e('Billing Town / City','woocommerce-conditional-checkout-fields');?></option>
				<!--<option value="billing_email" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'billing_email' ); ?>><?php _e('Billing Email','woocommerce-conditional-checkout-fields');?></option>
				
				<option value="shipping_first_name" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'shipping_first_name' ); ?>><?php _e('Shipping first name','woocommerce-conditional-checkout-fields');?></option>
				<option value="shipping_last_name" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'shipping_last_name' ); ?>><?php _e('Shipping last name','woocommerce-conditional-checkout-fields');?></option>
				<option value="shipping_company" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'shipping_company' ); ?>><?php _e('Shipping company','woocommerce-conditional-checkout-fields');?></option>
				-->
				<option value="shipping_state_country" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'shipping_state_country' ); ?>><?php _e('Shipping country & state','woocommerce-conditional-checkout-fields');?></option>
				<!--<option value="shipping_address_1" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'shipping_address_1' ); ?>><?php _e('Shipping address','woocommerce-conditional-checkout-fields');?></option>
				<option value="shipping_address_2" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'shipping_address_2' ); ?>><?php _e('Shipping second address','woocommerce-conditional-checkout-fields');?></option>
				-->
				<option value="shipping_postcode" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'shipping_postcode' ); ?>><?php _e('Shipping postcode / ZIP','woocommerce-conditional-checkout-fields');?></option>
				<option value="shipping_city" <?php if(isset($coditional_item_data['condition_type'])) selected( $coditional_item_data['condition_type'], 'shipping_city' ); ?>><?php _e('Shipping Town / City','woocommerce-conditional-checkout-fields');?></option>
				
			<?php endif; ?>
		</select>
		<div class="wcccf_loader" ></div>
	</div>
	<div class="condition_sub_options_box">
		<?php 
				if(!empty($coditional_item_data))
				{
					$this->condition_sub_options_box($coditional_item_data['condition_type'], $field_id, $conditional_item_id, $coditional_item_data);
				}
				else
					$this->condition_sub_options_box('product', $field_id, $conditional_item_id ); ?>
	</div>
	<div class="wcccf_logic_operator_container">
		<div class="wcccf_loader" ></div>
		<button class="button button-secondary wcccf_add_conditional_option" data-id="<?php echo $field_id; ?>"><?php _e('And','woocommerce-conditional-checkout-fields');?></button>
		<button class="button button-secondary delete wcccf_remove_conditional_option" ><?php _e('Remove','woocommerce-conditional-checkout-fields');?></button>
	</div>
</div>