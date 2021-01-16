<?php

// enqueue stylesheet
function enqueue_stylesheet() {
    wp_enqueue_style('style', get_stylesheet_uri() );
}      
add_action( 'wp_enqueue_scripts', 'enqueue_stylesheet' ); 

// theme support
add_theme_support( 'post-thumbnails' ); 

//custom excerpt length
add_filter( 'excerpt_length', function($length) {
    return 20;
} );

// register menus
function register_menus() {
    register_nav_menus(
        array(
            'rb-main-menu' => 'RB Main Menu',
            'rb-handheld-menu' => 'RB Handheld Menu'
        )
    );
}
add_action( 'init', 'register_menus' );

/**
 * Add a sidebar.
 */
function create_sidebar() {
    register_sidebar( array(
        'name'          => 'blog-sidebar',
        'id'            => 'blog-sidebar',
        'description'   => 'Blog Sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'create_sidebar' );

// Add image size
add_image_size( 'book-cover-thumb', 200 );
add_image_size( 'book-cover-full', 300 );
add_image_size( 'statue-full', 500 );


// Add post category templates

add_filter('single_template', 'my_single_template');
function my_single_template($single) {
    
    global $wp_query, $post;

    foreach((array)get_the_category() as $cat) {
        if(file_exists(TEMPLATEPATH . '/single-cat-' . $cat->slug . '.php')) {
            return TEMPLATEPATH . '/single-cat-' . $cat->slug . '.php';
        } else {
            return TEMPLATEPATH . '/single.php';
        }
    }

}


// GOOGLE MAPS API

function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyD06mJAQF4J4ip93rKkwbjaEQVJjyk9ntU';
	return $api;
	
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

wp_enqueue_script("jquery");