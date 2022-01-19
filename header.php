<!DOCTYPE html>
<html lang="<?php language_attributes();?>">
    <head>
        <meta charset="<?php bloginfo('charset');?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <meta name="description" content="<?php bloginfo('description');?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php wp_head();?>
    </head>

<body <?php body_class();?>>

    <nav class="main-nav">
        <div class="logo">
            <a href="<?php echo home_url();?>"><?php 
              if(empty(get_theme_mod('set_logo'))){
                bloginfo('title');
              }else{ ?>
                <img src="<?php echo get_theme_mod('set_logo');?>" alt="">
              <?php }
            ?></a>
        </div>
      <div class="menu-icon">
        <span></span>
      </div>
    </nav>

    <section class="overlay-menu">
      <div class="container">
        <div class="row">
          <div class="main-menu">
              <?php wp_nav_menu(array(
                  'theme_location'  => 'main-menu',
                  'container'       => '',
              )) ?>
          </div>
        </div>
      </div>
    </section>