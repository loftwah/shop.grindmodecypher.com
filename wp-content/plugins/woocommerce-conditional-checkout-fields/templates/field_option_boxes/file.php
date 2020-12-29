<div class="wcccf_option_box_container">
	<label><?php _e('Max size (MB)','woocommerce-conditional-checkout-fields');?></label>
	<input type="number" 
		   min="0"
		   step="1"
		   class="" 
		   required="required"
		   name="wcccf_field_data[<?php echo $field_id; ?>][options][file_max_size]" 
		   placeholder="<?php _e('Leave 0 for no limit','woocommerce-conditional-checkout-fields');?>"
		   value="<?php if(isset($field_data['options']['file_max_size'])) echo $field_data['options']['file_max_size']; else echo 0;?>"></input>
</div>
<div class="wcccf_option_box_container">
	<label><?php _e('File type(s) accepted','woocommerce-conditional-checkout-fields');?></label>
	<input type="text" 
		   class="" 
		   name="wcccf_field_data[<?php echo $field_id; ?>][options][file_accept]" 
		   placeholder="<?php _e('.xlsx,.doc,.mp3','woocommerce-conditional-checkout-fields');?>"
		   value="<?php if(isset($field_data['options']['file_accept'])) echo $field_data['options']['file_accept']; ?>"></input>
</div>