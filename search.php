<?php get_header(); ?>
    <div class="blog-entries">
        <div class="container">
            <div class="text text-center">
                <h4 class="date-title">You Search For: <?php 
                    echo get_search_query();
                ?></h4>
            </div>
            <div class="col-md-9 search-form">
                <?php get_search_form();?>
            </div>

            <div class="col-md-9">
                <div class="blog-posts">
                    <div class="row">

                        <?php if(!have_posts()) : ?>
                            <div class="col-md-12">
                                <div class="blog-post">
                                    <div class="container text-center text-primary">
                                        <h2>Page not found</h2>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>
                        
                        <?php while(have_posts()) : the_post(); ?>
                        <div class="col-md-12">
                            <div class="blog-post">
                                <div class="text-content">
                                    <span><a href=""><?php the_author_posts_link();?></a> / <a href="<?php the_permalink();?>"><?php the_time('d M Y');?></a> </span>
                                    <a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
                                    <p class="blog-content">
                                        <?php if(!post_password_required()){
                                         echo wp_trim_words(get_the_content(), 60); 
                                        }else{
                                         echo get_the_password_form();  
                                        }?>
                                    </p>
                                    <div class="simple-btn">
                                        <a href="<?php the_permalink();?>">continue reading</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <?php endwhile;
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