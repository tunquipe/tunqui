<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
wp_body_open();
?>
<!-- ======= Header ======= -->
<?php
$css_header = null;
if (is_front_page() && is_page()) {
    $css_header = 'page-primary';
} else {
    $css_header = 'page-internal';
}
?>
<div class="<?php echo $css_header; ?>">
    <header id="header" >
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <?php tunqui_site_logo(); ?>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu-root" aria-controls="menu-root" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="menu-root">
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
                    <div class="d-inline-flex mt-2 mt-md-0 ms-auto">
                        <div class="d-flex flex-row">
                            <?php if(!empty(get_theme_mod('cd_linkedin_contact'))) : ?>
                                <div class="p-2"><a target="_blank" href="<?php echo get_theme_mod('cd_linkedin_contact'); ?>" class="btn-social"><i class='bx bxl-linkedin'></i></a></div>
                            <?php endif; ?>
                            <?php if(!empty(get_theme_mod('cd_facebook_contact'))) : ?>
                                <div class="p-2"><a target="_blank" href="<?php echo get_theme_mod('cd_facebook_contact'); ?>" class="btn-social"><i class='bx bxl-facebook-circle' ></i></a></div>
                            <?php endif; ?>
                            <?php if(!empty(get_theme_mod('cd_youtube_contact'))) : ?>
                                <div class="p-2"><a target="_blank" href="<?php echo get_theme_mod('cd_youtube_contact'); ?>" class="btn-social"><i class='bx bxl-youtube' ></i></a></div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <?php if(!empty(get_theme_mod('cd_popup_elementor'))) : ?>
                        <a href="<?php echo get_theme_mod('cd_popup_elementor'); ?>" class="btn btn-primary btn-quote">
                            <span> Empieza Ahora </span> <i class='bx bx-right-arrow-alt bx-sm'></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header><!-- End Header -->
