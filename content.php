    <div class="col-md-12">
        <div class="blog-post">
            <div class="blog-thumb" <?php post_class();?>>
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('', 'class="img-fluid"');?></a>
            </div>
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