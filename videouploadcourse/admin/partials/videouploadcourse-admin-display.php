<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/cow9000
 * @since      1.0.0
 *
 * @package    Videouploadcourse
 * @subpackage Videouploadcourse/admin/partials
 */
?>
<!--https://scotch.io/tutorials/how-to-build-a-wordpress-plugin-part-1-->
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<!--id="<?php echo $this->plugin_name; ?>-videoUploadVideo" name="<?php echo $this->plugin_name; ?>[videoUploadVideo]"-->
<div class="wrap">
	<h2><?php echo esc_html(get_admin_page_title());?></h2>
	<form method="post" name="upload_video_course" action="options.php">
		<fieldset>
			<legend class="screen-reader-text"><span>What week is this video for?</span></legend>
			<label for="<?php echo $this->plugin_name; ?>-videoUploadWeek" name="<?php echo $this->plugin_name; ?>[videoUploadWeek]">
				<input list="<?php echo $this->plugin_name; ?>-videoUploadWeek" id="<?php echo $this->plugin_name; ?>-videoUploadWeek" name="<?php echo $this->plugin_name; ?>[videoUploadWeek]">
				<datalist id="<?php echo $this->plugin_name; ?>-videoUploadWeek">
					<option value="1">
					<option value="2">
					<option value="3">
					<option value="4">
					<option value="5">
					<option value="6">
					<option value="7">
					<option value="8">
					<option value="9">
					<option value="10">
					<option value="11">
					<option value="12">
				</datalist>
			</label>
		</fieldset>
		<fieldset>
			<legend class="screen-reader-text"><span>Upload Video</span></legend>
			<label for="<?php echo $this->plugin_name; ?>-videoUploadVideo" name="<?php echo $this->plugin_name; ?>[videoUploadVideo]">
				<input type="file" accept="video/*" id="<?php echo $this->plugin_name; ?>-videoUploadVideo" name="<?php echo $this->plugin_name; ?>[videoUploadVideo]" />
			</label>
		</fieldset>
		<fieldset>
			<legend class="screen-reader-text"><span>Video Title</span></legend>
			<label for="<?php echo $this->plugin_name; ?>-videoUploadTitle" name="<?php echo $this->plugin_name; ?>[videoUploadTitle]">
				<input type="text" id="<?php echo $this->plugin_name; ?>-videoUploadTitle" name="<?php echo $this->plugin_name; ?>[videoUploadTitle]">
			</label>
		</fieldset>
		<?php submit_button('Save Changes/Upload Video', 'primary','submit', TRUE); ?>
	</form>
</div>