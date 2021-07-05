<?php 
if( !defined( 'ABSPATH' ) ) exit;
if(isset($_POST['submit_option'])){

	$header_script = $_POST['header_script'];
	$body_script = $_POST['body_script'];
	$footer_script = $_POST['footer_script'];


	// die;
	$nonce=$_POST['insert_script_wpnonce'];

	if(wp_verify_nonce( $nonce, 'insert_script_option_nonce' ))
	{
		update_option('insert_header_script_gk',$header_script);
		update_option('insert_body_script_gk',$body_script);
		update_option('insert_footer_script_gk',$footer_script);
		$successmsg= ishf_success_option_msg_header_footer_script('Settings Saved.');
		
	}
	else
	{
        $errormsg= ishf_failure_option_msg_header_footer_script('Unable to save data!');
    }
}

$header_script= ishf_get_option_header_script();

$body_script=ishf_get_option_body_script();

$footer_script=ishf_get_option_footer_script();

?>

<div class="wrap">

		<h2>Insert Script In Headers And Footers &raquo; <?php _e( 'Settings', 'Insert Script In Headers And Footers' ); ?></h2>
		
    <?php
    if ( isset( $successmsg ) ) {
        ?>
        <div class="ishf_updated fade"><p><?php echo $successmsg; ?></p></div>
        <?php
    }
    if ( isset( $errormsg ) ) {
        ?>
        <div class="error fade"><p><?php echo $errormsg; ?></p></div>
        <?php
    }
    ?>
		
	<div class='ishf_inner'>
	
		<h4 class="heading-h4">Settings</h4>
		
		<form method="post">
			<p>
				<label for="script_in_header"> Scripts in Header </label>
				<textarea name="header_script" rows="8" class="header-footer-textarea" ><?php  echo $header_script; ?></textarea>
				These scripts will be printed in the <code>&lt;head&gt;</code> section.
			</p>
			<p>
				<label for="script_in_body"> Scripts in Body </label>
				<textarea name="body_script" rows="8" class="header-footer-textarea" ><?php  echo $body_script; ?></textarea>
				These scripts will be printed below the <code>&lt;body&gt;</code> section.
			</p>
			<p>
				<label for="script_in_footer"> Scripts in Footer </label>
				<textarea name="footer_script" rows="8" class="header-footer-textarea" ><?php  echo $footer_script; ?></textarea>
				These scripts will be printed above the <code>&lt;body&gt;</code> section.
			</p>
			<input type="hidden" name="insert_script_wpnonce" value="<?php echo $nonce= wp_create_nonce('insert_script_option_nonce'); ?>">
			<input type="submit" class="button button-primary " name="submit_option" value="Save">
			
		</form>
		
		
	</div>
	

</div>