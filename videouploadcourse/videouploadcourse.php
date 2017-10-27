<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/cow9000
 * @since             1.0.0
 * @package           Videouploadcourse
 *
 * @wordpress-plugin
 * Plugin Name:       Video Upload Course
 * Plugin URI:        https://github.com/cow9000/VideoUploadCourse
 * Description:       This plugin allows you to upload the 12 week video course.
 * Version:           1.0.0
 * Author:            Derek Vawdrey
 * Author URI:        https://github.com/cow9000
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       videouploadcourse
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-videouploadcourse-activator.php
 */
function activate_videouploadcourse() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-videouploadcourse-activator.php';
	Videouploadcourse_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-videouploadcourse-deactivator.php
 */
function deactivate_videouploadcourse() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-videouploadcourse-deactivator.php';
	Videouploadcourse_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_videouploadcourse' );
register_deactivation_hook( __FILE__, 'deactivate_videouploadcourse' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-videouploadcourse.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_videouploadcourse() {

	$plugin = new Videouploadcourse();
	$plugin->run();

}
run_videouploadcourse();
