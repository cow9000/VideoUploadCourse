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


function uploadVideo(){
	if(isset($_POST["videoUploadWeek"])){
		
		//echo "Week - " . $_POST["videoUploadWeek"];
		//echo "Video name - " . $_FILES["videoUploadVideo"]["name"];
		//echo "Video Title - " . $_POST["videoUploadTitle"];
		
		//Works.

		//Video uploaded
		$success = false;
		
		$fileName = $_FILES["videoUploadVideo"]["name"];
		
		//Get extension
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		
		$target_url = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/uploads/';
		$target_file = $target_url . 'Week' . $_POST[videoUploadWeek] . '.' . $ext;
		
		
		
		//echo "\n URL - " . $target_file;
		
		if(move_uploaded_file($_FILES['videoUploadVideo']['tmp_name'],$target_file)){
			$success = true;
		}
		
		
		if($success){
			echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
<p><strong>Video uploaded</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';	
		}else{
			echo '<div id="setting-error-settings_error" class="error settings-error notice is-dismissible"> 
<p><strong>There was an error uploading the video</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
		}
		
	
	}
}

uploadVideo();

?>
<!--https://scotch.io/tutorials/how-to-build-a-wordpress-plugin-part-1-->
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<!--id="<?php echo $this->plugin_name; ?>-videoUploadVideo" name="<?php echo $this->plugin_name; ?>[videoUploadVideo]"-->

<div class="wrap">
	<h2><?php echo esc_html(get_admin_page_title());?> - UPLOAD</h2>

	<form method="post" name="upload_video_course" id="upload_video_course" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
		<h4>What week is this video for?</h4>
		<fieldset>
			
			<legend class="screen-reader-text"><span>What week is this video for?</span></legend>
			<label for="<?php echo $this->plugin_name; ?>-videoUploadWeek" name="vuw">
				<select id="<?php echo $this->plugin_name; ?>-videoUploadWeek" name="videoUploadWeek">
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
			<label for="<?php echo $this->plugin_name; ?>-videoUploadVideo" name="vuv">
				<input type="file" accept="video/*" id="<?php echo $this->plugin_name; ?>-videoUploadVideo" name="videoUploadVideo" />
			</label>
		</fieldset>
		</fieldset>
		
		<?php submit_button('Upload Video', 'primary','submit', TRUE); ?>
	</form>
	<h2><?php echo esc_html(get_admin_page_title());?> - SETTINGS</h2>
	<form method="post" name="upload_video_course" action="options.php" enctype="multipart/form-data">
		
		<?php
		
			$options = get_option($this->plugin_name);

			// Cleanup
			$week_one = $options['week_one'];
			$week_two = $options['week_two'];
			$week_three = $options['week_three'];
			$week_four = $options['week_four'];
			$week_five = $options['week_five'];
			$week_six = $options['week_six'];
			$week_seven = $options['week_seven'];
			$week_eight = $options['week_eight'];
			$week_nine = $options['week_nine'];
			$week_ten = $options['week_ten'];
			$week_eleven = $options['week_eleven'];
			$week_twelve = $options['week_twelve'];
		
		?>
		
		<?php 
		
			settings_fields($this->plugin_name); 
			do_settings_sections($this->plugin_name);
			
		?>
		<h4>Week 1 - Video Title</h4>
		<fieldset>
			<input type="text" id="<?php echo $this->plugin_name; ?>-week_one" value="<?php if(!empty($week_one)) echo $week_one; ?>" name="<?php echo $this->plugin_name; ?>[week_one]">
		</fieldset>
		<h4>Week 2 - Video Title</h4>
		<fieldset>
			<input type="text" id="<?php echo $this->plugin_name; ?>-week_two" value="<?php if(!empty($week_two)) echo $week_two; ?>" name="<?php echo $this->plugin_name; ?>[week_two]">
		</fieldset>
		<h4>Week 3 - Video Title</h4>
		<fieldset>
			<input type="text" id="<?php echo $this->plugin_name; ?>-week_three" value="<?php if(!empty($week_three)) echo $week_three; ?>" name="<?php echo $this->plugin_name; ?>[week_three]">
		</fieldset>
		<h4>Week 4 - Video Title</h4>
		<fieldset>
			<input type="text" id="<?php echo $this->plugin_name; ?>-week_four" value="<?php if(!empty($week_four)) echo $week_four; ?>" name="<?php echo $this->plugin_name; ?>[week_four]">
		</fieldset>
		<h4>Week 5 - Video Title</h4>
		<fieldset>
			<input type="text" id="<?php echo $this->plugin_name; ?>-week_five" value="<?php if(!empty($week_five)) echo $week_five; ?>" name="<?php echo $this->plugin_name; ?>[week_five]">
		</fieldset>
		<h4>Week 6 - Video Title</h4>
		<fieldset>
			<input type="text" id="<?php echo $this->plugin_name; ?>-week_six" value="<?php if(!empty($week_six)) echo $week_six; ?>" name="<?php echo $this->plugin_name; ?>[week_six]">
		</fieldset>
		<h4>Week 7 - Video Title</h4>
		<fieldset>
			<input type="text" id="<?php echo $this->plugin_name; ?>-week_seven" value="<?php if(!empty($week_seven)) echo $week_seven; ?>" name="<?php echo $this->plugin_name; ?>[week_seven]">
		</fieldset>
		<h4>Week 8 - Video Title</h4>
		<fieldset>
			<input type="text" id="<?php echo $this->plugin_name; ?>-week_eight" value="<?php if(!empty($week_eight)) echo $week_eight; ?>" name="<?php echo $this->plugin_name; ?>[week_eight]">
		</fieldset>
		<h4>Week 9 - Video Title</h4>
		<fieldset>
			<input type="text" id="<?php echo $this->plugin_name; ?>-week_nine" value="<?php if(!empty($week_nine)) echo $week_nine; ?>" name="<?php echo $this->plugin_name; ?>[week_nine]">
		</fieldset>
		<h4>Week 10 - Video Title</h4>
		<fieldset>
			<input type="text" id="<?php echo $this->plugin_name; ?>-week_ten" value="<?php if(!empty($week_ten)) echo $week_ten; ?>" name="<?php echo $this->plugin_name; ?>[week_ten]">
		</fieldset>
		<h4>Week 11 - Video Title</h4>
		<fieldset>
			<input type="text" id="<?php echo $this->plugin_name; ?>-week_eleven" value="<?php if(!empty($week_eleven)) echo $week_eleven; ?>" name="<?php echo $this->plugin_name; ?>[week_eleven]">
		</fieldset>
		<h4>Week 12 - Video Title</h4>
		<fieldset>
			<input type="text" id="<?php echo $this->plugin_name; ?>-week_twelve" value="<?php if(!empty($week_twelve)) echo $week_twelve; ?>" name="<?php echo $this->plugin_name; ?>[week_twelve]">
		</fieldset>

		<?php submit_button('Save all Changes', 'primary','submit', TRUE); ?>
	</form>
</div>