<?php
/*
* Plugin Name: RB Simple Blog
* Description: Simple Archive and Post pages with shortcodes
* Author: Red Balloon
* Version: 1.0.0
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: red-balloon

*/

// register sidebar
function register_widgets() {
 
    register_sidebar( array(
        'name'          => 'Blog Sidebar',
        'id'            => 'blog-sidebar',
        /*'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="chw-title">',
        'after_title'   => '</h2>', */
    ) );
 
}
add_action( 'widgets_init', 'register_widgets' );

// enqueue js and css
function rb_simple_blog_enqueue_css() {
    wp_enqueue_style( 'rb_simple_blog_blog-css', plugin_dir_url( __FILE__ ) . 'rb-simple-blog-blog.css');
}
add_action( 'wp_enqueue_scripts', 'rb_simple_blog_enqueue_css');

// shortcode
function rb_simple_blog_shortcode( $atts ) {
?>
<div class="rb-simple-blog">
    <div class="rb-simple-blog__main">

        <?php
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
                
                if ( $atts['page'] == 'archive' ) {                
                    include('rb-template-parts/archive.php');
                } else if ( $atts['page'] == 'single') {
                    include('rb-template-parts/single.php');
                    include('rb-template-parts/comments.php');
                }

            endwhile; 
        endif; ?>
    </div>

    <div class="rb-simple-blog__sidebar">
        <?php dynamic_sidebar('blog-sidebar'); ?>
    </div>
</div>

<?php }

add_shortcode( 'rb-simple-blog', 'rb_simple_blog_shortcode' );


