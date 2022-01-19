<?php
/*
Template Name: custom
*/

get_header(); ?>

<body <?php body_class();?>>
    <div class="container">
        <div class="posts">
            <?php 
            $my = new Wp_query(array(
                'post_type'    => 'post',
                'posts_per_page' => -1,
                'orderby'        => 'post__in',
                'tax_query'      => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'post-format',
                        'field'    => 'slug',
                        'terms'    => array('post-format-audio' , 'post-format-video'),
                    ),
                ),
            ));
            while($my->have_posts()) : $my->the_post(); ?>

                <div class="post-data">
                    <h2><?php the_title();?></h2>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>


<?php get_footer();