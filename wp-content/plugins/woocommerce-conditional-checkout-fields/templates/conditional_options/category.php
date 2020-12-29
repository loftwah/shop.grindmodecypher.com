<div class="wcccf_option_box_container">
	<label><?php _e('Select categories','woocommerce-conditional-checkout-fields');?><span class="wcccf_required_label"> *</span></label>
	<select class="js-data-category-ajax" 
			name="wcccf_field_data[<?php echo $field_id; ?>][conditional_group_item][<?php echo $conditional_item_id; ?>][category_id][]" 
			multiple="multiple" 
			required="required">
			<?php 
			 foreach( $coditional_item_data['category_id'] as $category_id)
				{
					echo '<option value="'.$category_id.'" selected="selected" >'.$wcccf_product_model->get_product_category_name($category_id).'</option>';
				} 
			?>
				
	</select>
</div>
<div class="wcccf_option_box_container">
	<label><?php _e('Type','woocommerce-conditional-checkout-fields');?></label>
	<select name="wcccf_field_data[<?php echo $field_id; ?>][conditional_group_item][<?php echo $conditional_item_id; ?>][category_condition_type]" >
		<option value="cart" <?php if(isset($coditional_item_data['category_condition_type']) && $coditional_item_data['category_condition_type'] == 'cart') echo ' selected="selected" '; ?>><?php _e('Cart quantity','woocommerce-conditional-checkout-fields');?></option>
		<option value="amount_spent" <?php if(isset($coditional_item_data['category_condition_type']) && $coditional_item_data['category_condition_type'] == 'amount_spent') echo ' selected="selected" '; ?>><?php _e('Amount spent','woocommerce-conditional-checkout-fields');?></option>
		<option value="amount_spent_ex_taxes" <?php if(isset($coditional_item_data['category_condition_type']) && $coditional_item_data['category_condition_type'] == 'amount_spent_ex_taxes') echo ' selected="selected" '; ?>><?php _e('Amount spent excluding taxes','woocommerce-conditional-checkout-fields');?></option>
		<option value="stock" <?php if(isset($coditional_item_data['category_condition_type']) && $coditional_item_data['category_condition_type'] == 'stock') echo ' selected="selected" '; ?>><?php _e('Stock quantity','woocommerce-conditional-checkout-fields');?></option>
		<option value="stock_status" <?php if(isset($coditional_item_data['category_condition_type']) && $coditional_item_data['category_condition_type'] == 'stock_status') echo ' selected="selected" '; ?>><?php _e('Stock status (values: instock, outofstock)','woocommerce-conditional-checkout-fields');?></option>
		<option value="weight" <?php if(isset($coditional_item_data['category_condition_type']) && $coditional_item_data['category_condition_type'] == 'weight') echo ' selected="selected" '; ?>><?php _e('Weight','woocommerce-conditional-checkout-fields');?></option>
		<option value="height" <?php if(isset($coditional_item_data['category_condition_type']) && $coditional_item_data['category_condition_type'] == 'height') echo ' selected="selected" '; ?>><?php _e('Height','woocommerce-conditional-checkout-fields');?></option>
		<option value="length" <?php if(isset($coditional_item_data['category_condition_type']) && $coditional_item_data['category_condition_type'] == 'length') echo ' selected="selected" '; ?>><?php _e('Lenght','woocommerce-conditional-checkout-fields');?></option>
		<option value="width" <?php if(isset($coditional_item_data['category_condition_type']) && $coditional_item_data['category_condition_type'] == 'width') echo ' selected="selected" '; ?>><?php _e('Width','woocommerce-conditional-checkout-fields');?></option>
		<option value="volume" <?php if(isset($coditional_item_data['category_condition_type']) && $coditional_item_data['category_condition_type'] == 'volume') echo ' selected="selected" '; ?>><?php _e('Volume','woocommerce-conditional-checkout-fields');?></option>
		<?php if($wcccf_is_woocommerce_booking_active): ?>
			<option value="booking_person" <?php if(isset($coditional_item_data['product_condition_type']) && $coditional_item_data['product_condition_type'] == 'booking_person') echo ' selected="selected" '; ?>><?php _e('Booking - Person','woocommerce-conditional-checkout-fields');?></option>
		<?php endif; ?>
	</select>
</div>
<div class="wcccf_option_box_container">
	<label><?php _e('Value','woocommerce-conditional-checkout-fields');?><span class="wcccf_required_label"> *</span></label>
	<input type="text" 
		   class="wcccf_bigger_input" 
		   min="1" 
		   name="wcccf_field_data[<?php echo $field_id; ?>][conditional_group_item][<?php echo $conditional_item_id; ?>][category_value]" 
		   value="<?php if(isset($coditional_item_data['category_value'])) echo $coditional_item_data['category_value']; else echo 1; ?>" 
		   placeholder="" 
		   required="required"></input>
</div>
<div class="wcccf_option_box_container">
	<label><?php _e('Operator','woocommerce-conditional-checkout-fields');?></label>
	<select name="wcccf_field_data[<?php echo $field_id; ?>][conditional_group_item][<?php echo $conditional_item_id; ?>][category_operator]" >
			<option value="greater_equal" <?php if(isset($coditional_item_data['category_operator']) && $coditional_item_data['category_operator'] == 'greater_equal') echo ' selected="selected" '; ?>><?php _e('Greater or equal','woocommerce-conditional-checkout-fields');?></option>
			<option value="lesser_equal" <?php if(isset($coditional_item_data['category_operator']) && $coditional_item_data['category_operator'] == 'lesser_equal') echo ' selected="selected" '; ?>><?php _e('Lesser or equal','woocommerce-conditional-checkout-fields');?></option>
	</select>
</div>
<div class="wcccf_option_box_container">
	<label><?php _e('Value has to be considered as','woocommerce-conditional-checkout-fields');?></label>
	<select name="wcccf_field_data[<?php echo $field_id; ?>][conditional_group_item][<?php echo $conditional_item_id; ?>][category_value_considered]" >
		<option value="each_value" <?php if(isset($coditional_item_data['category_value_considered']) && $coditional_item_data['category_value_considered'] == 'each_value') echo ' selected="selected" '; ?>><?php _e('Each product value','woocommerce-conditional-checkout-fields');?></option>
		<option value="sum_of_values" <?php if(isset($coditional_item_data['category_value_considered']) && $coditional_item_data['category_value_considered'] == 'sum_of_values') echo ' selected="selected" '; ?>><?php _e('The sum of product values','woocommerce-conditional-checkout-fields');?></option>
		<option value="max_value" <?php if(isset($coditional_item_data['category_value_considered']) && $coditional_item_data['category_value_considered'] == 'max_value') echo  ' selected="selected" '; ?>><?php _e('Max value of the selected products','woocommerce-conditional-checkout-fields');?></option>
		<option value="min_value" <?php if(isset($coditional_item_data['category_value_considered']) && $coditional_item_data['category_value_considered'] == 'min_value') echo  ' selected="selected" '; ?>><?php _e('Min value of the selecte products','woocommerce-conditional-checkout-fields');?></option>
		<!-- <option value="at_least_one" <?php if(isset($coditional_item_data['category_value_considered']) && $coditional_item_data['category_value_considered'] == 'at_least_one') echo ' selected="selected" '; ?>><?php _e('At least one product','woocommerce-conditional-checkout-fields');?></option> -->
	</select>
</div>
<div class="wcccf_option_box_container">
	<label><?php _e('Cart presence policy. The field is showed if','woocommerce-conditional-checkout-fields');?></label>
	<select name="wcccf_field_data[<?php echo $field_id; ?>][conditional_group_item][<?php echo $conditional_item_id; ?>][category_cart_presence_policy]" >
		<option value="items_actually_present" <?php if(isset($coditional_item_data['category_cart_presence_policy']) && $coditional_item_data['category_cart_presence_policy'] == 'items_actually_present') echo ' selected="selected" '; ?>><?php _e('Any product belonging to any of the selected categories is in cart','woocommerce-conditional-checkout-fields');?></option>
		<option value="selected_items_must_be_present" <?php if(isset($coditional_item_data['category_cart_presence_policy']) && $coditional_item_data['category_cart_presence_policy'] == 'selected_items_must_be_present') echo ' selected="selected" '; ?>><?php _e('At least one product per each selected category is in cart','woocommerce-conditional-checkout-fields');?></option>
	</select>
</div>
<?php if($wcccf_is_woocommerce_booking_active): ?>
	<div class="wcccf_option_box_container">
		<label><?php _e('Display one field for each person','woocommerce-conditional-checkout-fields');?></label>
		<p><?php _e('For each Bookable product, the plugin will show N fields where N is the number of the persons the user selected. For other product type the field will not be showed. The field value will be lately always showed on both Order page and Emails (ignoring the <i>Show in emails</i> and <i>Show in order details page</i> settings). <strong>NOTE:</strong> note this option is unavailable for Contry and State fields.','woocommerce-conditional-checkout-fields');?></p>
		<select name="wcccf_field_data[<?php echo $field_id; ?>][conditional_group_item][<?php echo $conditional_item_id; ?>][category_display_one_field_for_each_person]">
			<option value="no" <?php if(isset($coditional_item_data['category_display_one_field_for_each_person'])) selected( $coditional_item_data['category_display_one_field_for_each_person'], 'no' ); ?>><?php _e('No','woocommerce-conditional-checkout-fields');?></option>
			<option value="yes" <?php if(isset($coditional_item_data['category_display_one_field_for_each_person'])) selected( $coditional_item_data['category_display_one_field_for_each_person'], 'yes' ); ?>><?php _e('Yes','woocommerce-conditional-checkout-fields');?></option>
		</select>
	</div>
<?php endif; ?>