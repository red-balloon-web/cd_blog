<div class="rb-simple-blog__single-post">
    <h2 class="rb-simple-blog__single-post-title"><?php echo get_the_title(); ?></h2>
    <p class="rb-simple-blog__single-post-meta">Posted on <?php echo get_the_date(); ?> by <?php echo get_the_author(); ?></p>
    <p class="rb-simple-blog__single-post-categories">Categories: <?php
    
    $rb_categories = get_the_category();
    $category_counter = 0;
    foreach ($rb_categories as $rb_category) {
        if ($category_counter != 0) {
            echo ", ";
        }
        echo ('<a href="' . get_site_url() . '/category/' . $rb_category->slug . '">' . $rb_category->name . '</a>');
        $category_counter++;
    }

    ?>
    </p>
    <div class="rb-simple-blog__single-post-thumbnail">
        <?php the_post_thumbnail( 'large' ); ?>
    </div>
    <div class="rb-simple-blog__single-post-content">
        <?php the_content(); ?>
    </div>

</div>


