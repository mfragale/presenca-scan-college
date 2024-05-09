<?php

/**
 * Register Javascript scripts and localize variables.
 * @since 1.0.0
 */
function presenca_scan_college_js()
{
	wp_register_script(
		'presenca-scan-college-js',
		plugin_dir_url(__FILE__) . 'js/dist/presenca-scan-college-functions-min.js',
		array('jquery'),
		'1.1',
		true
	);

	// localize the script to your domain name, so that you can reference the url to admin-ajax.php file easily
	wp_localize_script('presenca-scan-college-js', 'scanStudentAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
}
