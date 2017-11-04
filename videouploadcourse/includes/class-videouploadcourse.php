<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/cow9000
 * @since      1.0.0
 *
 * @package    Videouploadcourse
 * @subpackage Videouploadcourse/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Videouploadcourse
 * @subpackage Videouploadcourse/includes
 * @author     Derek Vawdrey <flyingpiechicken@gmail.com>
 */
class Videouploadcourse {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Videouploadcourse_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->version = PLUGIN_NAME_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'videouploadcourse';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Videouploadcourse_Loader. Orchestrates the hooks of the plugin.
	 * - Videouploadcourse_i18n. Defines internationalization functionality.
	 * - Videouploadcourse_Admin. Defines all hooks for the admin area.
	 * - Videouploadcourse_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-videouploadcourse-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-videouploadcourse-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-videouploadcourse-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-videouploadcourse-public.php';

		$this->loader = new Videouploadcourse_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Videouploadcourse_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Videouploadcourse_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Videouploadcourse_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action('admin_init', $plugin_admin, 'options_update');
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'add_user_roles' );
		
		// Add Settings link to the plugin
		$plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' );
		$this->loader->add_filter( 'plugin_action_links_' . $plugin_basename, $plugin_admin, 'add_action_links' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Videouploadcourse_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Videouploadcourse_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
	
	/* add new tab called "videos"  FOR UltimateMember*/

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

	
	function loadVideo($video){
		$target_url = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/uploads/';
		$target_file = $target_url . 'Week' . $video . '.mp4';
		
		if(file_exists($target_url)){
			echo "Week " . $video . 
			echo do_shortcode( "[video src='" . $target_file . "' width='640']" );
		}
	}
		
	add_filter('um_account_content_hook_logout', 'um_account_content_hook_logout');
	function um_account_content_hook_logout( $output ){
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


}
