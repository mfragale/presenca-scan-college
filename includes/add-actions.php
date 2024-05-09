<?php

/**
 * Plugin init hook
 */
add_action('init', 'presenca_scan_college_init', 10);


/**
 * Add wp_enqueue_scripts hook for Javascript files
 */
add_action('wp_enqueue_scripts', 'presenca_scan_college_js', true);
/**
 * Add wp_enqueue_scripts hook for CSS files
 */
add_action('wp_enqueue_scripts', 'presenca_scan_college_css');



// define the actions for the two hooks created, first for logged in users and the next for logged out users
add_action('wp_ajax_scan_student', 'scan_student'); // This is for authenticated users
add_action('wp_ajax_nopriv_scan_student', 'scan_student'); // This is for unauthenticated users.
