<?php get_header(); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD06mJAQF4J4ip93rKkwbjaEQVJjyk9ntU"></script>
<script type="text/javascript">
(function( $ ) {

/**
 * initMap
 *
 * Renders a Google Map onto the selected jQuery element
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @return  object The map instance.
 */
function initMap( $el ) {

    // Find marker elements within map.
    var $markers = $el.find('.marker');

    // Create gerenic map.
    var mapArgs = {
        zoom        : $el.data('zoom') || 16,
        mapTypeId   : google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map( $el[0], mapArgs );

    // Add markers.
    map.markers = [];
    $markers.each(function(){
        initMarker( $(this), map );
    });

    // Center map based on markers.
    centerMap( map );

    // Return map instance.
    return map;
}

/**
 * initMarker
 *
 * Creates a marker for the given jQuery element and map.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @param   object The map instance.
 * @return  object The marker instance.
 */
function initMarker( $marker, map ) {

    // Get position from marker.
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = {
        lat: parseFloat( lat ),
        lng: parseFloat( lng )
    };

    // Create marker instance.
    var marker = new google.maps.Marker({
        position : latLng,
        map: map
    });

    // Append to reference for later use.
    map.markers.push( marker );

    // If marker contains HTML, add it to an infoWindow.
    if( $marker.html() ){

        // Create info window.
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });

        // Show info window when marker is clicked.
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open( map, marker );
        });
    }
}

/**
 * centerMap
 *
 * Centers the map showing all markers in view.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   object The map instance.
 * @return  void
 */
function centerMap( map ) {

    // Create map boundaries from all map markers.
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function( marker ){
        bounds.extend({
            lat: marker.position.lat(),
            lng: marker.position.lng()
        });
    });

    // Case: Single marker.
    if( map.markers.length == 1 ){
        map.setCenter( bounds.getCenter() );

    // Case: Multiple markers.
    } else{
        map.fitBounds( bounds );
    }
}

// Render maps on page load.
$(document).ready(function(){
    $('.acf-map').each(function(){
        var map = initMap( $(this) );
    });
});

})(jQuery);
</script>

<div class="rb-nav-pusher"></div>

<div class="rb-section-container">
    <div class="rb-container single-blog"><?php
        
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); ?>

            <h1 class="title"><?php echo get_the_title(); ?></h1>
            <h2 class="statue-subheading"><?php echo get_field('location'); ?></h2>

            <div class="map_and_thumbnail">
                
                <div class="thumbnail"><?php the_post_thumbnail('statue-full'); ?></div>
            
                <div class="map_details"><?php
                    $location = get_field('google_map');
                    if( $location ) { ?>
                        <div class="acf-map" data-zoom="16">
                            <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
                        </div><?php 
                    } ?>
                    <div class="details">
                        <p><strong>Lived:</strong> <?php echo get_field('lived'); ?></p>
                        <p><strong>Year Unveiled:</strong> <?php echo get_field('unveiled'); ?></p>
                        <p><strong>Famous for:</strong> <?php echo get_the_excerpt(); ?></p>
                        <p class="posted">Posted on <?php echo get_the_date(); ?></p>
                    </div>
                </div>
                
            </div>


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