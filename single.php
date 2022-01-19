<?php get_header();?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1>Single <em>Post</em></h1>
            </div>
        </div>
    </div>

    <?php the_post(); 
    $sidebar_class = "col-md-12";
    if(is_active_sidebar('right-sidebar')){
        $sidebar_class = 'col-md-9';
    }
    
    ?>

    <div class="blog-entries">
        <div class="container">
            <div class="<?php echo $sidebar_class ?>">
                <div class="blog-posts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-blog-post">
                                <div class="single_thumb">
                                    <?php the_post_thumbnail();?>
                                </div>
                                <div class="text-content">
                                    <h2><?php the_title();?></h2>
                                    <span><a href="<?php the_author();?>"><?php the_author();?></a> / <a href="<?php the_permalink();?>"><?php the_time('d F Y');?></a></span>
                                    <div class="blog-content">
                                        <?php the_content();?>
                                        <?php wp_link_pages();?>
                                    </div>
                                    <div class="tags-share">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="tags">
                                                    <li><?php the_tags();?></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="share">
                                                    <li>Share:</li>
                                                    <li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>">facebook</a>,</li>
                                                    <li><a href="https://twitter.com/intent/tweet/?url=<?php the_permalink();?>">twitter</a>,</li>
                                                    <li><a href="#">behance</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
                <?php if(!post_password_required()){ ?>
                    <div class="col-md-12">
                        <?php comments_template();?>
                    </div>
                <?php }?>
            </div>
            <?php if(is_active_sidebar('right-sidebar')) : ?>
                <div class="col-md-3">
                    <?php get_sidebar();?>
                </div>
            <?php endif; ?>
        </div>
    </div>


<?php get_footer();?>