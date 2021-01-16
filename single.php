<?php get_header(); ?>
<div class="rb-nav-pusher"></div>

<div class="rb-section-container">
    <div class="rb-container single-blog"><?php
        
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); ?>

            <h1 class="title"><?php echo get_the_title(); ?></h1>
            <h2 class="author"><?php echo get_field('author'); ?></h2>
            <div class="thumbnail"><?php the_post_thumbnail('book-cover-full'); ?></div>
            <p class="posted-on">Posted on <?php echo get_the_date(); ?></p>
            <div class="content">
                <?php the_content(); ?>
            </div>
        
        </div><?php
                    // include('rb-template-parts/comments.php');

            endwhile; 
        endif; ?>
    </div>

</div>
    </div>
</div>



<?php get_footer(); ?>