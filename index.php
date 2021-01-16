<?php get_header(); ?>
<div class="rb-nav-pusher"></div>

<div class="rb-section-container">
    <div class="rb-container blog-books"><?php

        $args = array(
            'post_type' => 'post',
            'category_name' => 'books'
        );
        $query = new WP_Query($args);

        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post(); ?>

            <div class="archive-item">
                
                <a href="<?php echo get_the_permalink(); ?>">
                    <div class="post-image">
                        <?php the_post_thumbnail( 'book-cover-thumb' ); ?>
                        <!--<div class="datebox"><?php echo get_the_date('d') . ' ' . get_the_date('M') . ' ' . get_the_date('Y'); ?></div>-->
                    </div>
                </a>

                <p class="title"><?php echo get_the_title(); ?></p>
                <p class="author"><?php echo get_field('author'); ?></p>

                <!--
                <div class="metabox rbveq rbveq--blogmeta rbveq-breakpoint--992">
                    <p class="meta">By <?php echo get_the_author(); ?></p>
                    <p class="meta">
                    <?php if (get_comments_number()) {
                        if (get_comments_number() === '1') {
                            echo ('<i class="fas fa-comments"></i> '. get_comments_number() . ' comment');
                        } else {
                            echo ('<i class="fas fa-comments"></i> '. get_comments_number() . ' comments');
                        }
                    }
                    ?>
                    <p class="meta">
                        <?php
                            $categorylist = get_the_category();
                            $isfirst = true;
                            foreach ($categorylist as $category) {
                                if (!$isfirst) {
                                    echo ", ";
                                } else {
                                    $isfirst = false;
                                }
                                echo $category->name;
                            }
                        ?>
                    </p>
                </div>

                <hr>

                <div class="contentbox rbveq rbveq--contentbox">
                    <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                    <p><?php echo get_the_excerpt(); ?></p>
                </div>-->
                <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
            </div><?php 
            endwhile; 
        endif; ?>

        <!--<div class="rb-grid-blog__sidebar">
            <?php dynamic_sidebar('blog-sidebar'); ?>
        </div>-->
        
    </div>
</div>

<?php get_footer(); ?>