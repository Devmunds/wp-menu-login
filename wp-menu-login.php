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

function pointcom_user_name_menu( $pointcom_menu_item ) {
    
    foreach ( $pointcom_menu_item as $menu_item ) {
        if ( strpos($menu_item->title, '#saudacao#') !== false) {
            $menu_item->title =  str_replace("#saudacao#",  "Olá", $menu_item->title);
        }
        if ( strpos($menu_item->title, '#nome_usuario#') !== false) {
            $menu_item->title =  str_replace("#nome_usuario#",  wp_get_current_user()->user_firstname, $menu_item->title);
        }
        if ( strpos($menu_item->title, '#sobrenome_usuario#') !== false) {
            $menu_item->title =  str_replace("#sobrenome_usuario#",  wp_get_current_user()->user_lastname, $menu_item->title);
        }
    }
    return $pointcom_menu_item;
}
add_filter( 'wp_nav_menu_objects', 'pointcom_user_name_menu' );

function pointcom_exclude_items_menu( $items, $menu, $args )
{
    if (is_user_logged_in() == false) {
        foreach ($items as $key => $item) {
            if (in_array('menu_login', $item->classes)) {
                unset($items[$key]);
            }
        }
    }

    return $items;
}

add_filter( 'wp_get_nav_menu_items', 'pointcom_exclude_items_menu', null, 3 );