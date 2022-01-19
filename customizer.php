<?php

add_action('customize_register' , 'darkblog_customizer');
function darkblog_customizer($customize){
    $customize-> add_panel('theme_options' , array(
        'title'    => 'Theme Options',
        'priority' => '30',
    ));

    //////// Header section
    $customize-> add_section('header_section' , array(
        'panel'    => 'theme_options',
        'title'    => 'Header Options',
        'priority' => '10',
    ));

    /////////Logo
    $customize-> add_setting('set_logo', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $customize-> add_control(new Wp_customize_image_control($customize , 'set_logo' , array(
        'section' => 'header_section',
        'label'   => 'Upload your logo here',
        'setting' => 'set_logo',
    )));

    ////////Blog section
    $customize-> add_section('blog_section' , array(
        'panel'    => 'theme_options',
        'title'    => 'Blog Section',
        'priority' => '20',
    ));

    ////////blog text
    $customize-> add_setting('blog_text' , array(
        'default'   => 'Our Blog',
        'transport' => 'refresh',
    ));
    $customize-> add_control('blog_text' , array(
        'section' => 'blog_section',
        'label'   => 'Add blog title',
        'type'    => 'text',
    ));

    ///////blog bg image
    $customize-> add_setting('bg_image' , array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $customize-> add_control(new Wp_Customize_image_control($customize, 'bg_image' , array(
        'section'   => 'blog_section',
        'label'     => 'Change banner image',
        'setting'   => 'bg_image',
    )));

    /////////// footer section
    $customize-> add_section('footer_section' , array(
        'panel'    => 'theme_options',
        'title'    => 'Footer Section',
        'priority' => '20',
    ));

    ////// footer text
    $customize-> add_setting('footer_text' , array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $customize-> add_control('footer_text' , array(
        'section' => 'footer_section',
        'label'   => 'Add Copyright Text',
        'type'    => 'text',
    ));
} ?>

<style>
    .page-heading {
        background-image: url(<?php if(empty(get_theme_mod('bg_image'))){
            echo get_template_directory_uri().'/img/heading_bg.png';
        }else{
            echo get_theme_mod('bg_image');
        };?>); 
    }
</style>