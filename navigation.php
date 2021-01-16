<div id="rb-modal-menu">
        <div id="rb-modal-menu__close-button">
            <i class="fas fa-times"></i>
        </div>
    <?php
        wp_nav_menu( array( 
          'theme_location' => 'rb-handheld-menu', 
        ) );
    ?>
</div>

<div class="rb-desktop-navigation" id="rb-desktop-navigation">

    <div class="rb-desktop-navigation__logo">
        <span class="title"><a href="<?php echo get_site_url(); ?>">Chris Dann</a></span>
        <!--<div class="strapline">by Red Ballon</div>-->
    </div>
    <!--
    <div class="rb-desktop-navigation__menu">
        <?php
        wp_nav_menu( array( 
          'theme_location' => 'rb-main-menu', 
        ) );
        ?>
    </div>

    <div class="rb-desktop-navigation__hamburger" id="rb-desktop-navigation__hamburger">
        <i class="rb-desktop-navigation__hamburger-icon fas fa-bars"></i>
    </div>-->
</div>