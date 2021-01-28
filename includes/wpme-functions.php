<?php

//This function add menu user shortcode
function wpme_menu_user(){
    $current_user = wp_get_current_user();

    if (!is_user_logged_in() == false) {
        $wpme_user = '<div id="wpme-login"><span>Olá, ' . $current_user->user_firstname . '</span></div>';
    }

    if (is_user_logged_in() == false) {
        $wpme_user = '
            <div class="nav-menu-login">
            <ul class="wpme-menu-login">
                <li><a href="#">Área do Associado</a>
                    <ul>
                        <li><a href="/admin">Entrar</a></li>
                        <li><a href="/wp-login.php?action=logout">Sair</a></li>
                    </ul>                
                </li>
            </ul>
            </div>'

        ;
    }    
    return    $wpme_user;
}

//This function load styles

function wpme_enqueue_styles(){
    wp_enqueue_style('wpme-style','/wp-content/plugins/wp-menu-login/views/assets/css/wpme-style.css');
}

?>