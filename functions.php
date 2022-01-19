<?php

add_action('after_setup_theme' , 'darkblog_basic_work');
function darkblog_basic_work(){
    load_theme_textdomain('darkblog' , get_template_directory().'/lang');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support( 'html5', array('search-form' ));
    add_theme_support('post-formats' , array('audio' , 'gallery'));

    //////////// menus

    register_nav_menus(array(
        'main-menu' => "Main Menu",
    ));
}

/////////// stylesheet call

add_action('wp_enqueue_scripts' , 'darkblog_stylesheet_call');
function darkblog_stylesheet_call(){
    wp_enqueue_style('bootstrap-min' , get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('foontawe' , get_template_directory_uri().'/css/fontAwesome.css');
    wp_enqueue_style('main' , get_template_directory_uri().'/css/main-style.css');

    wp_enqueue_style('stylesheet' , get_stylesheet_uri());
    wp_enqueue_style('fonts' , 'https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900');
}

////////scripts call

add_action('wp_enqueue_scripts' , 'darkblog_scripts_call');
function darkblog_scripts_call(){
    wp_enqueue_script('modernizr' , get_template_directory_uri().'/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array('jquery') , '' , false);
    wp_enqueue_script('bootstrap' , get_template_directory_uri().'/js/vendor/bootstrap.min.js', array('jquery', 'modernizr') , '' , true);
    wp_enqueue_script('plugins' , get_template_directory_uri().'/js/plugins.js', array('jquery', 'modernizr' , 'bootstrap') , '' , true);
    wp_enqueue_script('main' , get_template_directory_uri().'/js/main.js', array('jquery', 'modernizr', 'bootstrap', 'plugins') , '' , true);
}

/////////// sidebar

add_action('widgets_init' , 'darkblog_sidebar');
function darkblog_sidebar(){
    register_sidebar(array(
        'id'            => 'right-sidebar',
        'name'          => 'Right Sidebar',
        'description'   => 'Add you right sidebar widget',
        'before_title'  => '<div class="sidebar-heding"><h2>',
        'after_title'   => '</h2></div>',
    ));
}

//////////// customizer

if(file_exists(dirname(__FILE__).'/customizer.php')){
    require_once(dirname(__FILE__).'/customizer.php');
}

//////////// protected title

add_filter('protected_title_format' , 'darkblog_protected');
function darkblog_protected(){
    return '%s';
}

////////// body_class_check

add_filter('body_class', 'body_class_change');
function body_class_change($classes){
    unset($classes[array_search('admin-bar', $classes)]);

    $classes[] = 'new_class';
    return $classes;
}

//////////// search highlight

add_filter('the_content' , 'search_highlight');
add_filter('the_title' , 'search_highlight');
add_filter('the_excerpt' , 'search_highlight');

function search_highlight($text){
    if(is_search()){
        $pattern = '/('. join('|' , explode(' ' , get_search_query())).')/i';

        $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}

///////////////// file

if(file_exists(get_theme_file_path().'/inc/config.php')){
    require_once get_theme_file_path('/inc/config.php');
}