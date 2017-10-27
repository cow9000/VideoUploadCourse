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
	<form method="post" name="upload_video_course" action="options.php" enctype="multipart/form-data">
		<h4>What week is this video for?</h4>
		<fieldset>
			
			<legend class="screen-reader-text"><span>What week is this video for?</span></legend>
			<label for="<?php echo $this->plugin_name; ?>-videoUploadWeek" name="<?php echo $this->plugin_name; ?>[videoUploadWeek]">
				<select id="<?php echo $this->plugin_name; ?>-videoUploadWeek" name="<?php echo $this->plugin_name; ?>[videoUploadWeek]">
					<option value="1">Week 1</option>
					<option value="2">Week 2</option>
					<option value="3">Week 3</option>
					<option value="4">Week 4</option>
					<option value="5">Week 5</option>
					<option value="6">Week 6</option>
					<option value="7">Week 7</option>
					<option value="8">Week 8</option>
					<option value="9">Week 9</option>
					<option value="10">Week 10</option>
					<option value="11">Week 11</option>
					<option value="12">Week 12</option>
				</select>
			</label>
		</fieldset>
		<h4>Upload the video for that week</h4>
		<fieldset>
			
			<legend class="screen-reader-text"><span>Upload Video</span></legend>
			<label for="<?php echo $this->plugin_name; ?>-videoUploadVideo" name="<?php echo $this->plugin_name; ?>[videoUploadVideo]">
				<input type="file" accept="video/*" id="<?php echo $this->plugin_name; ?>-videoUploadVideo" name="<?php echo $this->plugin_name; ?>[videoUploadVideo]" />
			</label>
		</fieldset>
		<h4>What's the video title?</h4>
		<fieldset>
			
			<legend class="screen-reader-text"><span>Video Title</span></legend>
			<label for="<?php echo $this->plugin_name; ?>-videoUploadTitle" name="<?php echo $this->plugin_name; ?>[videoUploadTitle]">
				<input type="text" id="<?php echo $this->plugin_name; ?>-videoUploadTitle" name="<?php echo $this->plugin_name; ?>[videoUploadTitle]">
			</label>
		</fieldset>
		<?php submit_button('Save Changes/Upload Video', 'primary','submit', TRUE); ?>
	</form>
</div>