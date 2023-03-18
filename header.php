<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <meta name="facebook-domain-verification" content="eewqda6jsh8qfnj7rgo96zgdjnpzo5" />
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php
wp_body_open();
?>
<!-- ======= Widget ======= -->



<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <?php if ( is_active_sidebar('header-html') ) : ?>
        <div class="widget-header">
            <?php dynamic_sidebar('header-html'); ?>
        </div>
    <?php endif; ?>
    <div class="header-menu">
        <div class="container d-flex align-items-center">
        <div>
            <?php tunqui_site_logo(); ?>
        </div>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <div class="d-inline-flex mt-2 mt-md-0 ms-auto">

                <?php

                if (is_single()) {
                    echo '<a class="btn-home" href="'.home_url().'"><i class="bx bxs-left-arrow"></i>Regresar</a>';
                } else {
                    echo '<nav id="navbar" class="navbar">';
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container' => false,
                            'menu_class' => 'nav-desktop',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class=" %2$s">%3$s</ul>',
                            'depth' => 2,
                            'walker' => new bootstrap_5_wp_nav_menu_walker()
                        ));
                    }
                    if (has_nav_menu('mobile')) {
                        wp_nav_menu(array(
                            'theme_location' => 'mobile',
                            'container' => false,
                            'menu_class' => 'nav-mobile',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class=" %2$s">%3$s</ul>',
                            'depth' => 2,
                            'walker' => new bootstrap_5_wp_nav_menu_walker()
                        ));
                    }
                    echo '<i class="bi bi-list mobile-nav-toggle"></i>';
                    echo '</nav>';
                }

                ?>
        </div>
    </div>
    </div>
</header><!-- End Header -->