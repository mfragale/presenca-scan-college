<?php

/**
 * Shortcode processing for presenca-scan-college
 * 
 * @since 1.0.0
 * @param array $atts The attributes in the shortcode
 */



/*
 * SET LOCAIS SHORTCODE [presenca-scan-college]
 */
function presenca_scan_college_shortcode($atts)
{
	// Enqueue JS when this shortcode loaded.
	wp_enqueue_script('presenca-scan-college-js');

	// enqueue jQuery library and the script you registered above
	wp_enqueue_script('jquery');

	// Enqueue CSS when this shortcode loaded. 
	wp_enqueue_style('presenca-scan-college-css');

	// Outputs the HTML to replace short code
	ob_start();
	include 'presenca-scan-college-loop.php';
	return ob_get_clean();
}
