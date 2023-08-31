<?php
$transparent = get_theme_mod('transparent_navbar');
$color_menu = get_theme_mod('cd_color_menu', '');
if($transparent==true){
    $color_menu = 'transparent';
}
?>

<div class="top-header" style="background-color: <?php echo esc_attr($color_menu); ?>">
    <div class="container d-flex align-items-center">
        <nav class="navbar navbar-expand-lg navbar-light py-lg-0">
            <?php tunqui_site_logo(); ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new bootstrap_5_wp_nav_menu_walker()
                    ));
                }
                ?>
                <!--<butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                <a href="https://htmlcodex.com/startup-company-website-template" class="btn btn-primary py-2 px-4 ms-3">Download Pro Version</a>-->
            </div>
        </nav>
    </div>
</div>