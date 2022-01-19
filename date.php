<?php get_header(); ?>
    <div class="blog-entries">
        <div class="container">
            <div class="col-md-9">
                <div class="blog-posts">
                    <div class="text text-center">
                        <h4 class="date-title">Post in <?php 
                            if(is_month()){
                                $month = get_query_var('monthnum');
                                $show = DateTime::createFromFormat('!m' , $month);
                                echo $show->format('F');
                            }elseif(is_year()){
                                echo esc_html(get_query_var('year'));
                            }elseif(is_day()){
                                $day = esc_html(get_query_var('day'));
                                $month = esc_html(get_query_var('monthnum'));
                                $year = esc_html(get_query_var('year'));
                                printf('%s/%s/%s' , $day,$month,$year);
                            }
                        ?></h4>
                    </div>
                    <div class="row">
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