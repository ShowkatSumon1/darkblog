<?php get_header(); ?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1><?php the_title();?></h1>
            </div>
        </div>
    </div>


    <div class="blog-entries">
        <div class="container">
            <?php the_content();?>
        </div>
    </div>

<?php get_footer();?>