<?php
/*
 * Plugin Name:		Presença Scan do College
 * Plugin URI:		https://novaigreja.com/college
 * Description:		Plataforma do Nova College para scanear a presença dos alunos.
 * Version:			1.0
 * Author:			Nova Digital Team
 * Author URI:		https://novaigreja.com
 * License:			GPL-2.0+
 * License URI:		http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Not called within Wordpress framework
if (!defined('WPINC')) {
    die;
}


/***************
 * global variables
 ***************/

$presencascancollege_prefix = 'presencascancollege_';
$presencascancollege_plugin_name = 'Presença Scan do College';



ini_set('error_log', $_SERVER['DOCUMENT_ROOT'] . '../../logs/error.log');
error_log('Presença Scan do College WordPress plugin');




// function load_me_on_header()
// {
//     echo "<h1>Presença Scan do College is live, baby!</h1>";
// }

// add_action('wp_head', 'load_me_on_header');
