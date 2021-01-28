<?php
/**
 * Plugin Name:			Wp Menu Login
 * Plugin URI:			https://devmunds,com.br/
 * Description:			Exibe usuário logodo em uma determinada posição do menu.
 * Version:				1.0.0
 * Author:				Devmunds
 * Author URI:			https://devmunds,com.br/
 * Requires at least:	5.3
 * Tested up to:		5.6
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include plugin_dir_path(__FILE__) . 'includes/wpme-functions.php';
include plugin_dir_path(__FILE__) . 'includes/wpme-hooks.php';