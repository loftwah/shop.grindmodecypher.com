<div class="wcccf_option_box_container">
	<label><?php _e('Which countries show','woocommerce-conditional-checkout-fields');?></label>
	<p><i><?php _e('<strong>Note:</strong> if the All option is selected, state/provinces dropdown selector will be properly showed only for the allowed selling location configured in the WooCommerce -> Settings -> General menu.','woocommerce-conditional-checkout-fields');?></i></p>
	<select  name="wcccf_field_data[<?php echo $field_id; ?>][options][country_selection_type]" placeholder=""> 
	<option value="all" <?php if(isset($field_data['options']['country_selection_type'])) selected( $field_data['options']['country_selection_type'], 'all'); ?>><?php _e('All','woocommerce-conditional-checkout-fields');?></option>
		<option value="allowed_countries" <?php if(isset($field_data['options']['country_selection_type'])) selected( $field_data['options']['country_selection_type'], 'allowed_countries'); ?>><?php _e('Selling location','woocommerce-conditional-checkout-fields');?></option>
		<option value="shipping_countries"<?php if(isset($field_data['options']['country_selection_type'])) selected( $field_data['options']['country_selection_type'], 'shipping_countries'); ?>><?php _e('Shipping location','woocommerce-conditional-checkout-fields');?></option>
	</select>
</div>
<div class="wcccf_option_box_container">
	<label><?php _e('Hide states/province/county selection','woocommerce-conditional-checkout-fields');?></label>
	<select  name="wcccf_field_data[<?php echo $field_id; ?>][options][country_hide_states]" placeholder="">
		<option value="no" <?php if(isset($field_data['options']['country_hide_states'])) selected( $field_data['options']['country_hide_states'], 'no'); ?>><?php _e('No','woocommerce-conditional-checkout-fields');?></option>
		<option value="yes" <?php if(isset($field_data['options']['country_hide_states'])) selected( $field_data['options']['country_hide_states'], 'yes'); ?>><?php _e('Yes','woocommerce-conditional-checkout-fields');?></option>
	</select>
</div>
<div class="wcccf_option_box_container">
	<label><?php _e('States/province/county selector width','woocommerce-conditional-checkout-fields');?></label>
	<select  name="wcccf_field_data[<?php echo $field_id; ?>][options][country_state_selector_width]" placeholder="">
		<option value="wide" <?php if(isset($field_data['options']['country_state_selector_width'])) selected( $field_data['options']['country_state_selector_width'], 'wide'); ?>><?php _e('Full width','woocommerce-conditional-checkout-fields');?></option>
		<option value="first" <?php if(isset($field_data['options']['country_state_selector_width'])) selected( $field_data['options']['country_state_selector_width'], 'first'); ?>><?php _e('Half left','woocommerce-conditional-checkout-fields');?></option>
		<option value="last" <?php if(isset($field_data['options']['country_state_selector_width'])) selected( $field_data['options']['country_state_selector_width'], 'last'); ?>><?php _e('Half right','woocommerce-conditional-checkout-fields');?></option>
	</select>
</div>