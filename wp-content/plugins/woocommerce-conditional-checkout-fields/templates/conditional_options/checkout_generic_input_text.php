<div class="wcccf_option_box_container">
	<label><?php _e('Value','woocommerce-conditional-checkout-fields');?><span class="wcccf_required_label"> *</span></label>
	<input type="text" 
		   name="wcccf_field_data[<?php echo $field_id; ?>][conditional_group_item][<?php echo $conditional_item_id; ?>][value]" 
		   value="<?php if(isset($coditional_item_data['value'])) echo $coditional_item_data['value']; else echo ""; ?>" 
		   required="required">
	</input>
</div>
<div class="wcccf_option_box_container"> 
	<label><?php _e('Operator','woocommerce-conditional-checkout-fields');?></label>
	<select name="wcccf_field_data[<?php echo $field_id; ?>][conditional_group_item][<?php echo $conditional_item_id; ?>][operator]" >
		<option value="equal" <?php if(isset($coditional_item_data['operator'])) selected( $coditional_item_data['operator'], 'equal' ); ?>><?php _e('Equal','woocommerce-conditional-checkout-fields');?></option>
		<option value="not_equal" <?php if(isset($coditional_item_data['operator'])) selected( $coditional_item_data['operator'], 'not_equal' ); ?>><?php _e('Not equal','woocommerce-conditional-checkout-fields');?></option>
	</select>
</div> 