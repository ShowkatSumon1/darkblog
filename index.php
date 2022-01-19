<?php get_header(); ?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1><?php if(empty(get_theme_mod('blog_text'))){
                    echo "Our Blog";
                }else{
                    echo get_theme_mod('blog_text');
                } ?></h1>
            </div>
        </div>
    </div>

    <div class="blog-entries">
        <div class="container">
            <div class="col-md-9">
                <div class="search-form">
                    <?php get_search_form();?>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-md-9">
                <div class="blog-posts">
                    <div class="row">
                        <?php while(have_posts()) : the_post();
                            get_template_part('content', get_post_format());
                        endwhile;
                        ?>
                        <div class="col-md-12">
                            <ul class="page-number">
                                <li><?php the_posts_pagination(array(
                                    'prev_text' => '<',
                                    'next_text' => '>',
                                ));?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <?php get_sidebar();?>
            </div>
        </div>
    </div>

<?php get_footer();?>