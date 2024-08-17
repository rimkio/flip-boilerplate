<?php

add_action( 'wp_enqueue_scripts', function () {
	// Path to your theme directory
    $theme_dir = get_template_directory();

    // Version based on file modification time
	$style_version = filemtime($theme_dir . '/dist/css/style.css');
    $script_version = filemtime($theme_dir . '/dist/js/main.bundle.js');

	// Check if files exist before using filemtime
    $style_version = file_exists($style_version) ? filemtime($style_version) : '1.0';
    $script_version = file_exists($script_version) ? filemtime($script_version) : '1.0';

	wp_enqueue_style('theme-styles', get_template_directory_uri() . '/dist/css/style.css', array(), $style_version);
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/dist/js/main.bundle.js', array('jquery'), $script_version, true);	

	wp_localize_script( 'app-scripts', 'php_data', [
		'admin_logged' => in_array( 'administrator', wp_get_current_user()->roles ) ? 'yes' : 'no',
		'ajax_url'     => admin_url( 'admin-ajax.php' ),
		'site_url'     => site_url(),
		'rest_url'     => get_rest_url(),
		
	] );
} );

if ( ! function_exists( 'flip_load_fonts' ) ) {
	/**
	 * Load custom font family
	 */
	function flip_load_fonts() {
		wp_enqueue_style( 'primary-font', get_template_directory_uri() . '/assets/fonts/fonts.css', [], FLIP_WP_TOOLKIT_VER );
	}
}

add_action( 'admin_enqueue_scripts', 'flip_load_fonts' );

