<div class="comments">
    <div class="comments-title">
        <h2><?php
            $total = get_comments_number();
            if(1==$total){
                echo '1 Comment';
            }else{
                echo $total.' Comments';
            }
        ?></h2>
    </div>

    <div class="comments-list">
        <?php wp_list_comments();?>
    </div>

    <div class="comments-pagination">
        <?php the_comments_pagination(array(
            'screen_reader_text' => '',
            'prev_text'          => '< prev',
            'next_text'          => '> next',
        ));?>
    </div>

    <?php if(!comments_open()){
        echo '<h4>Comments are closed</h4>';
    }else{ ?>
        <div class="comments-form">
            <?php comment_form(); ?>
        </div>
    <?php } ?>
</div>