<?php
/**
 * 
 *
 * @package   Rara
 * @author    Codewing.dk
 * @license   GPL-2.0+
 *
 *
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Don't load if optionsrara_init is already defined
if (is_admin() && ! function_exists( 'optionsrara_init' ) ) :

function optionsrara_init() {

	//  If user can't edit theme options, exit
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	// Loads the required Options rara classes.
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-rara.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-rara-admin.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-interface.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-media-uploader.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-sanitization.php';

	// Instantiate the options page.
	$options_rara_admin = new Options_rara_Admin;
	$options_rara_admin->init();

	// Instantiate the media uploader class
	$options_rara_media_uploader = new Options_rara_Media_Uploader;
	$options_rara_media_uploader->init();

}

add_action( 'init', 'optionsrara_init', 20 );

endif;


/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * Not in a class to support backwards compatibility in themes.
 */
if ( ! function_exists( 'of_get_option' ) ) :
function of_get_option( $name, $default = false ) {

	$option_name = '';

	// Gets option name as defined in the theme
	if ( function_exists( 'rara_option_name' ) ) {
		$option_name = rara_option_name();
	}

	// Fallback option name
	if ( '' == $option_name ) {
		$option_name = get_option( 'stylesheet' );
		$option_name = preg_replace( "/\W/", "_", strtolower( $option_name ) );
	}

	// Get option settings from database
	$options = get_option( $option_name );

	// Return specific option
	if ( isset( $options[$name] ) ) {
		return $options[$name];
	}

	return $default;
}
endif;