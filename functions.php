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


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active '; 
    }
    return $classes;
}

// get top ancestor

function  get_top_ancestor_id(){

    global $post;

    if($post->post_parent){
        $ancestors = array_reverse(get_post_ancestors( $post->ID ));
        return $ancestors[0];
    }

    return $post->ID;
}

function has_children(){
    global $post;

    $pages = get_pages( 'child_of=' . $post->ID );

    return count($pages);
}

function learningWordpress_setup(){
    // Navigation menus
    register_nav_menus( array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu'),
    ));
    
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'small-thumbnail', 180, 120, true );
    add_image_size( 'banner-image', 920, 210, array('left', 'top') );
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'video' ) );
}

add_action( 'after_setup_theme', 'learningWordpress_setup' );