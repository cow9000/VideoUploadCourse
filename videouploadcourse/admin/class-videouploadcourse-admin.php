<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/cow9000
 * @since      1.0.0
 *
 * @package    Videouploadcourse
 * @subpackage Videouploadcourse/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Videouploadcourse
 * @subpackage Videouploadcourse/admin
 * @author     Derek Vawdrey <flyingpiechicken@gmail.com>
 */
class Videouploadcourse_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Videouploadcourse_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Videouploadcourse_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/videouploadcourse-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Videouploadcourse_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Videouploadcourse_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/videouploadcourse-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	*
	*Register the administration menu for this plugin into the WordPress Dashboard menu
	*@since 1.0.0
	*
	**/

	public function add_plugin_admin_menu() {

	    /*
	     * Add a settings page for this plugin to the Settings menu.
	     *
	     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
	     *
	     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
	     *
	     */
	    add_options_page( 'Video Course Upload and Settings', 'Video Course Settings', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
	    );
	}

	 /**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */

	public function add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */

	public function display_plugin_setup_page() {
	    include_once( 'partials/videouploadcourse-admin-display.php' );
	}

	public function options_update(){
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}

	public function validate($input){
		$valid = array();
		$valid['week_one'] = sanitize_text_field( $input['week_one'] );
		$valid['week_two'] = sanitize_text_field( $input['week_two'] );
		$valid['week_three'] = sanitize_text_field( $input['week_three'] );
		$valid['week_four'] = sanitize_text_field( $input['week_four'] );
		$valid['week_five'] = sanitize_text_field( $input['week_five'] );
		$valid['week_six'] = sanitize_text_field( $input['week_six'] );
		$valid['week_seven'] = sanitize_text_field( $input['week_seven'] );
		$valid['week_eight'] = sanitize_text_field( $input['week_eight'] );
		$valid['week_nine'] = sanitize_text_field( $input['week_nine'] );
		$valid['week_ten'] = sanitize_text_field( $input['week_ten'] );
		$valid['week_eleven'] = sanitize_text_field( $input['week_eleven'] );
		$valid['week_twelve'] = sanitize_text_field( $input['week_twelve'] );
		
		return $valid;
		
	}

		public function add_user_roles(){
		add_role('allVideos', __(
			'12WeekVideo'),
			array(
			'read' => true, // Allows a user to read
			'week1' => true, // Allows user to view video
			'week2' => true,
			'week3' => true,
			'week4' => true,
			'week5' => true,
			'week6' => true,
			'week7' => true,
			'week8' => true,
			'week9' => true,
			'week10' => true,
			'week11' => true,
			'week12' => true,
			)
		);
		add_role('week1', __(
			'Week1'),
			array(
			'read' => true, // Allows a user to read
			'week1' => true, // Allows user to view video
			)
		);
		add_role('week2', __(
			'Week2'),
			array(
			'read' => true, // Allows a user to read
			'week2' => true, // Allows user to view video
			)
		);
		add_role('week3', __(
			'Week3'),
			array(
			'read' => true, // Allows a user to read
			'week3' => true, // Allows user to view video
			)
		);
		add_role('week4', __(
			'Week4'),
			array(
			'read' => true, // Allows a user to read
			'week4' => true, // Allows user to view video
			)
		);
		add_role('week5', __(
			'Week5'),
			array(
			'read' => true, // Allows a user to read
			'week5' => true, // Allows user to view video
			)
		);
		add_role('week6', __(
			'Week6'),
			array(
			'read' => true, // Allows a user to read
			'week6' => true, // Allows user to view video
			)
		);
		add_role('week7', __(
			'Week7'),
			array(
			'read' => true, // Allows a user to read
			'week7' => true, // Allows user to view video
			)
		);
		add_role('week8', __(
			'Week8'),
			array(
			'read' => true, // Allows a user to read
			'week8' => true, // Allows user to view video
			)
		);
		add_role('week9', __(
			'Week9'),
			array(
			'read' => true, // Allows a user to read
			'week9' => true, // Allows user to view video
			)
		);
		add_role('week10', __(
			'Week10'),
			array(
			'read' => true, // Allows a user to read
			'week10' => true, // Allows user to view video
			)
		);
		add_role('week11', __(
			'Week11'),
			array(
			'read' => true, // Allows a user to read
			'week11' => true, // Allows user to view video
			)
		);
		add_role('week12', __(
			'Week12'),
			array(
			'read' => true, // Allows a user to read
			'week12' => true, // Allows user to view video
			)
		);
	}
	
	
	//ADD THE VIDEO PAGES FOR THE VIDEOS!!!!
	
}


