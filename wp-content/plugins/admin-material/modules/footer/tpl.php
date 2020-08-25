<div class="box">
	<h4><span>Footer</span></h4>
	<div class="box-body b-t hide">
		<p>
			<label>Text
				<input name="<?php echo $this->setting->setting_name; ?>[footer_text]" value="<?php esc_html_e( $this->setting->get_setting('footer_text') ); ?>" type="text" class="widefat">
			</label>
		</p>
		<p>
			<label>
				<input name="<?php echo $this->setting->setting_name; ?>[footer_text_hide]" type="checkbox" <?php if ($this->setting->get_setting('footer_text_hide') == true) echo 'checked="checked" '; ?>> 
				Hide 'Text'
			</label>
		</p>
		<p>
			<label>Version
				<input name="<?php echo $this->setting->setting_name; ?>[footer_version]" value="<?php esc_html_e( $this->setting->get_setting('footer_version') ); ?>" type="text" class="widefat">
			</label>
		</p>
		<p>
			<label>
				<input name="<?php echo $this->setting->setting_name; ?>[footer_version_hide]" type="checkbox" <?php if ($this->setting->get_setting('footer_version_hide') == true) echo 'checked="checked" '; ?>> 
				Hide 'Version'
			</label>
		</p>
	</div>
	<?php if ( is_multisite() && get_current_blog_id() == 1 && current_user_can( 'manage_options' ) ) { ?>
	<h4 class="b-t"><span>Network</span></h4>
	<div class="box-body b-t hide">
		<p>
			<label>
				<input name="<?php echo $this->setting->setting_name; ?>[network]" type="checkbox" <?php if ($this->setting->get_setting('network') == true) echo 'checked="checked" '; ?>> 
				Disable on sub sites
			</label>
		</p>
	</div>
	<?php } ?>
	<h4 class="b-t"><span>Custom css</span></h4>
	<div class="box-body b-t hide">
		<p>
			<label>
				<textarea name="<?php echo $this->setting->setting_name; ?>[admin_css]" class="widefat" rows="4" placeHolder="a{color: #888}"><?php esc_html_e( $this->setting->get_setting('admin_css') ); ?></textarea>
			</label>
		</p>
	</div>
	<h4 class="b-t"><span>Custom js</span></h4>
	<div class="box-body b-t hide">
		<p>
			<label>
				<textarea name="<?php echo $this->setting->setting_name; ?>[admin_js]" class="widefat" rows="4" placeHolder="alert(1);"><?php esc_html_e( $this->setting->get_setting('admin_js') ); ?></textarea>
			</label>
		</p>
	</div>
</div>
