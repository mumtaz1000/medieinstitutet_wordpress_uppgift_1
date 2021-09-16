<?php

function mumtaz_theme_support(){
    add_theme_support( 'title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','mumtaz_theme_support');

function mumtaz_menus(){
    $locations = array(
        'primary' => "Desktop menu",
        'blog' => "Blog menu",
        'sidebar' => "Sidebar menu"
    );
    register_nav_menus($locations);
}
add_action('init','mumtaz_menus');

function mumtaz_register_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('mumtaz-bootrstrap',get_template_directory_uri(  )."/assets/css/bootstrap.css",array(),'v3.3.7','all');
    wp_enqueue_style('mumtaz-css',get_template_directory_uri(  )."/assets/css/style.css",array(),$version,'all');
    wp_enqueue_style('mumtaz-fontawsome',get_template_directory_uri(  )."/assets/css/font-awesome.css",array(),'4.6.3','all');
    
}
add_action('wp_enqueue_scripts','mumtaz_register_styles');

function mumtaz_register_scripts(){
    wp_enqueue_script('mumtaz-jquery',get_template_directory_uri(  )."/assets/js/jquery.js",array(),'3.1.0',false);
    wp_enqueue_script('mumtaz-script',get_template_directory_uri(  )."/assets/js/script.js",array(),'1.0',true);
}
add_action('wp_enqueue_scripts','mumtaz_register_scripts');

function mumtaz_widget_areas(){
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
        ),
        array(
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
        );
}

add_action('widgets_init', 'mumtaz_widget_areas');
?>