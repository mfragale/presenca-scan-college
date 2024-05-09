<?php

/**
 * Init hook. Registers shortcode presenca-scan-college.
 * @since 1.0.0
 */
function presenca_scan_college_init()
{
	add_shortcode('presenca-scan-college', 'presenca_scan_college_shortcode');
}
