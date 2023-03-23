<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
          rel="stylesheet">
    <meta name="facebook-domain-verification" content="eewqda6jsh8qfnj7rgo96zgdjnpzo5"/>

    <?php wp_head(); ?>

    <?php echo getMetaTagsHeader(); ?>

</head>

<body <?php body_class(); ?>>
<?php
wp_body_open();
?>
<!-- ======= Header ======= -->
<?php
$css_header = null;
if (is_front_page() && is_page()) {
    $css_header = 'page-home';
} else {
    $css_header = 'page-internal';
}
?>
<header id="header" class="<?php echo $css_header; ?> block-menu">
    <div class="top-header">
        <div class="container d-flex align-items-center">
            <?php tunqui_site_logo(); ?>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            <div class="d-inline-flex mt-2 mt-md-0 ms-auto social-header">
                <div class="d-flex flex-row mb-3">
                    <div class="p-2"><a href="<?php echo get_theme_mod('cd_phone_contact'); ?>" class="btn btn-primary btn-border"><i class='bx bxs-phone-call'></i> <?php echo get_theme_mod('cd_phone_contact'); ?></a></div>
                    <div class="p-2"><a href="mailto:<?php echo get_theme_mod('cd_mail_contact'); ?>" class="btn btn-primary btn-border"><i class='bx bx-envelope' ></i> <?php echo get_theme_mod('cd_mail_contact'); ?></a></div>
                    <div class="p-2"><a target="_blank" href="<?php echo get_theme_mod('cd_instagram_contact'); ?>" class="btn-social"><i class='bx bxl-instagram' ></i></a></div>
                    <div class="p-2"><a target="_blank" href="<?php echo get_theme_mod('cd_facebook_contact'); ?>" class="btn-social"><i class='bx bxl-facebook-circle' ></i></a></div>
                    <div class="p-2"><a target="_blank" href="<?php echo get_theme_mod('cd_url_webmail'); ?>" class="btn btn-primary btn-webmail"><i class='bx bx-mail-send' ></i>Webmail</a></div>
                </div>

            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-md navbar-light bg-blue">
        <div class="container">

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
            </div>
        </div>
    </nav>


</header><!-- End Header -->