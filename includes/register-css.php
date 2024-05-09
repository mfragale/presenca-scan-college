<?php

/**
 * Register CSS files
 * @since 1.0.0
 */

function presenca_scan_college_css()
{
	wp_register_style(
		'presenca-scan-college-css',
		plugin_dir_url(__FILE__) . 'scss/dist/presenca-scan-college-styles-min.css',
		null,
		'1.0'
	);
}
