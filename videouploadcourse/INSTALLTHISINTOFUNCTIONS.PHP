/* add new tab called "videos" */

	function loadVideo($video){
		$target_url = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/uploads/';
		$target_file = $target_url . 'Week' . $video . '.mp4';
		
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
		
		$title = "";
		if($video == "1"){
			$title = $week_one;
		}else if(video == "2"){
			$title = $week_two;
		}else if(video == "3"){
			$title = $week_three;
		}else if(video == "4"){
			$title = $week_four;
		}else if(video == "5"){
			$title = $week_five;
		}else if(video == "6"){
			$title = $week_six;
		}else if(video == "7"){
			$title = $week_seven;
		}else if(video == "8"){
			$title = $week_eight;
		}else if(video == "9"){
			$title = $week_nine;
		}else if(video == "10"){
			$title = $week_ten;
		}else if(video == "11"){
			$title = $week_eleven;
		}else if(video == "12"){
			$title = $week_twelve;
		}
		
		
		if(file_exists($target_url)){
			echo "Week " . $video . " - " . $title;
			echo do_shortcode( "[video src='" . $target_file . "' width='640']" );
		}
	}

add_filter('um_account_page_default_tabs_hook', 'video_tab_in_um', 100 );
function video_tab_in_um( $tabs ) {
	$tabs[800]['video']['icon'] = 'um-faicon-video-camera';
	$tabs[800]['video']['title'] = 'Videos';
	$tabs[800]['video']['custom'] = true;
	return $tabs;
}
	
/* make our new tab hookable */

add_action('um_account_tab__video', 'um_account_tab__video');
function um_account_tab__video( $info ) {
	global $ultimatemember;
	extract( $info );

	$output = $ultimatemember->account->get_tab_output('video');
	if ( $output ) { echo $output; }
}

/* Finally we add some content in the tab */

add_filter('um_account_content_hook_video', 'um_account_content_hook_video');
function um_account_content_hook_video( $output ){
	ob_start();
	?>
		
	<div class="um-field">
		
		<!-- Here goes your custom content -->
		<?php
				$user = wp_get_current_user();

				$video1 = false;
				$video2 = false;
				$video3 = false;
				$video4 = false;
				$video5 = false;
				$video6 = false;
				$video7 = false;
				$video8 = false;
				$video9 = false;
				$video10 = false;
				$video11 = false;
				$video12 = false;

				if ( in_array( 'allVideos', (array) $user->roles ) || in_array( 'admin', (array) $user->roles ) ) {
					$video1 = true;
					$video2 = true;
					$video3 = true;
					$video4 = true;
					$video5 = true;
					$video6 = true;
					$video7 = true;
					$video8 = true;
					$video9 = true;
					$video10 = true;
					$video11 = true;
					$video12 = true;
				}

				if(in_array( 'week1', (array) $user->roles )){
					$video1 = true;
				}

				if(in_array( 'week2', (array) $user->roles )){
					$video2 = true;
				}

				if(in_array( 'week3', (array) $user->roles )){
					$video3 = true;
				}

				if(in_array( 'week4', (array) $user->roles )){
					$video4 = true;
				}

				if(in_array( 'week5', (array) $user->roles )){
					$video5 = true;
				}

				if(in_array( 'week6', (array) $user->roles )){
					$video6 = true;
				}

				if(in_array( 'week7', (array) $user->roles )){
					$video7 = true;
				}

				if(in_array( 'week8', (array) $user->roles )){
					$video8 = true;
				}

				if(in_array( 'week9', (array) $user->roles )){
					$video9 = true;
				}

				if(in_array( 'week10', (array) $user->roles )){
					$video10 = true;
				}

				if(in_array( 'week11', (array) $user->roles )){
					$video11 = true;
				}

				if(in_array( 'week12', (array) $user->roles )){
					$video12 = true;
				}

				if($video1){
					loadVideo("1");
				}
				if($video2){
					loadVideo("2");
				}
				if($video3){
					loadVideo("3");
				}
				if($video4){
					loadVideo("4");
				}
				if($video5){
					loadVideo("5");
				}
				if($video6){
					loadVideo("6");
				}
				if($video7){
					loadVideo("7");
				}
				if($video8){
					loadVideo("8");
				}
				if($video9){
					loadVideo("9");
				}
				if($video10){
					loadVideo("10");
				}
				if($video11){
					loadVideo("11");
				}
				if($video12){
					loadVideo("12");
				}
		?>
	</div>		
		
	<?php
		
	$output .= ob_get_contents();
	ob_end_clean();
	return $output;
}


/* add new tab called "logout" */

add_filter('um_account_page_default_tabs_hook', 'logout_tab_in_um', 100 );
function logout_tab_in_um( $tabs ) {
	$tabs[800]['logout']['icon'] = 'um-faicon-sign-out';
	$tabs[800]['logout']['title'] = 'Logout';
	$tabs[800]['logout']['custom'] = true;
	return $tabs;
}
	
/* make our new tab hookable */

add_action('um_account_tab__logout', 'um_account_tab__logout');
function um_account_tab__logout( $info ) {
	global $ultimatemember;
	extract( $info );

	$output = $ultimatemember->account->get_tab_output('logout');
	
	if ( $output ) { 
		echo $output;
		$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

		if (strpos($url,'account/logout') !== false) {
		    $location = get_site_url() . "/index.php/logout";
			wp_redirect( $location, 301 );
			exit;
		} else {
			
		}
	 }
}

add_filter('um_account_content_hook_logout', 'um_account_content_hook_logout');
function um_account_content_hook_logout( $output ){
	ob_start();
	?>
		
	<div class="um-field">
		
		<!-- Here goes your custom content -->
		
	</div>		
		
	<?php
		
	
	$output .= ob_get_contents();
	ob_end_clean();
	return $output;
}
