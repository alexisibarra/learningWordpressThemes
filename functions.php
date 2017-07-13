<?php

function learningWordpressResources(){
    wp_enqueue_style( 'style', get_stylesheet_uri());

    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", false, null);
    wp_enqueue_script('jquery');

    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.min.js');
}

add_action( 'wp_enqueue_scripts', learningWordpressResources );

// Navigation menus
register_nav_menus( array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu'),
));

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}