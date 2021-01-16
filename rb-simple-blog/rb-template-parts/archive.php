<div class="rb-simple-blog__archive-item">
    <div class="rb-simple-blog__archive-item-image">
        <?php the_post_thumbnail( 'thumbnail' ); ?>
    </div>
    
    <div class="rb-simple-blog__archive-item-description">
        <div class="rb-simple-blog__archive-item-description-header">
            <div class="rb-simple-blog__archive-item-date-box">
                <div class="rb-simple-blog__archive-item-date-box--date"><?php echo get_the_date('d'); ?></div>
                <div class="rb-simple-blog__archive-item-date-box--month"><?php echo get_the_date('M'); ?></div>
            </div>
            <div class="rb-simple-blog__archive-item-description-header-text">
                <a class="rb-simple-blog__archive-item-post-title" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                <p class="rb-simple-blog__archive-item-post-author">by <?php echo get_the_author(); ?> in <a href="<?php echo get_site_url(); ?>/category/<?php echo (get_the_category()[0]->slug); ?>"><?php echo(get_the_category()[0]->name); ?></a></p>
                
            </div>
        </div>
        <p class="rb-simple-blog__archive-item-post-excerpt"><?php echo get_the_excerpt(); ?></p> 
        <p class="rb-simple-blog__archive-item-comment-count">
                    <?php if (get_comments_number()) {
                        if (get_comments_number() === '1') {
                            echo ('<i class="fas fa-comments"></i> '. get_comments_number() . ' comment');
                        } else {
                            echo ('<i class="fas fa-comments"></i> '. get_comments_number() . ' comments');
                        }
                    }
                    ?>
                </p>
        <p class="rb-simple-blog__archive-item-read-more"><a href="<?php echo get_the_permalink(); ?>">Read More</a></p>
    </div>
</div>