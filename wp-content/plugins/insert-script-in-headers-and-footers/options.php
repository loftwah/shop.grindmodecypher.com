<?php 
if( !defined( 'ABSPATH' ) ) exit;
if(current_user_can('manage_options') && isset($_POST['submit_option'])){
	$header_script = sanitize_textarea_field(htmlentities($_POST['header_script']));
	$body_script = sanitize_textarea_field(htmlentities($_POST['body_script']));
	$footer_script = sanitize_textarea_field(htmlentities($_POST['footer_script']));
	$nonce=sanitize_text_field($_POST['insert_script_wpnonce']);

	if(wp_verify_nonce( $nonce, 'insert_script_option_nonce' ))
	{
		update_option('insert_header_script_gk',$header_script);
		update_option('insert_body_script_gk',$body_script);
		update_option('insert_footer_script_gk',$footer_script);
		$successmsg= ishf_success_option_msg('Settings Saved.');
	}
	else
	{
        $errormsg= ishf_failure_option_msg('Unable to save data!');
    }
}
$header_script= ishf_get_option_header_script();
$body_script=ishf_get_option_body_script();
$footer_script=ishf_get_option_footer_script();
?>


<div class="wrap ishf-script-wrap">

	<h2><?php _e('Insert Script In Headers And Footers &raquo; Settings','insert-script-in-headers-and-footers'); ?></h2>
	
	<?php
	if ( isset( $successmsg ) ) {
		?>
		<div class="ishf_updated fade"><p><?php _e($successmsg,'insert-script-in-headers-and-footers'); ?></p></div>
		<?php
	}
	if ( isset( $errormsg ) ) {
		?>
		<div class="error fade"><p><?php _e($errormsg,'insert-script-in-headers-and-footers'); ?></p></div>
		<?php
	}
	$nonce= wp_create_nonce('insert_script_option_nonce');
	?>
	<div class="row">
		<div class='col-6'>
		<div class="ishf-inner">
			<h4 class="heading-h4"><?php _e('Settings','insert-script-in-headers-and-footers'); ?></h4>
			
			<form method="post">
				<p>
					<label for="script_in_header"> <?php _e('Scripts in Header','insert-script-in-headers-and-footers'); ?> </label>
					<textarea name="header_script" rows="8" class="ishf-header-footer-textarea" ><?php esc_html_e($header_script); ?></textarea>
					<?php _e('These scripts will be printed in the <code>&lt;head&gt;</code> section.','insert-script-in-headers-and-footers'); ?>
				</p>
				<p>
					<label for="script_in_body"> <?php _e('Scripts in Body','insert-script-in-headers-and-footers'); ?> </label>
					<textarea name="body_script" rows="8" class="ishf-header-footer-textarea" ><?php esc_html_e($body_script); ?></textarea>
					<?php _e('These scripts will be printed below the <code>&lt;body&gt;</code> section.','insert-script-in-headers-and-footers'); ?>
				</p>
				<p>
					<label for="script_in_footer"> <?php _e('Scripts in Footer','insert-script-in-headers-and-footers'); ?> </label>
					<textarea name="footer_script" rows="8" class="ishf-header-footer-textarea" ><?php esc_html_e($footer_script); ?></textarea>
					<?php _e('These scripts will be printed above the <code>&lt;body&gt;</code> section.','insert-script-in-headers-and-footers'); ?>
				</p>
				<input type="hidden" name="insert_script_wpnonce" value="<?php esc_attr_e($nonce); ?>">
				<input type="submit" class="button button-primary " name="submit_option" value="Save">
				
			</form>
			</div>
			
		</div>
		<div class="col-6">
			
		</div>
	</div>
	

</div>
