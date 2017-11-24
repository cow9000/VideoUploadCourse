/* add a new tab called Membershipvideos

add_filter('um_account_page_default_tabs_hook', 'membership_tab_in_um', 100 );
function membership_tab_in_um( $tabs ) {
	$tabs[800]['video']['icon'] = 'um-faicon-video-camera';
	$tabs[800]['video']['title'] = 'Membership Videos';
	$tabs[800]['video']['custom'] = true;
	return $tabs;
}
	
/* make our new tab hookable */

add_action('um_account_tab__video', 'um_account_tab__membership');
function um_account_tab__membership( $info ) {
	global $ultimatemember;
	extract( $info );

	$output = $ultimatemember->account->get_tab_output('membership');
	if ( $output ) { echo $output; }
}

/* Finally we add some content in the tab */

add_filter('um_account_content_hook_membership', 'um_account_content_hook_membership');
function um_account_content_hook_membership( $output ){
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