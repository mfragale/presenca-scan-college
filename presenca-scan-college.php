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



/***************
 * includes
 ***************/

//locaisdanova
include_once dirname(__FILE__) . '/includes/register-shortcodes.php';
include_once dirname(__FILE__) . '/includes/register-js.php';
include_once dirname(__FILE__) . '/includes/register-css.php';
include_once dirname(__FILE__) . '/includes/shortcodes.php';
include_once dirname(__FILE__) . '/includes/functions.php';
include_once dirname(__FILE__) . '/includes/add-actions.php';
