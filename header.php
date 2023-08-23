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

</head>

<body <?php body_class(); ?>>
<?php
wp_body_open();
?>
<!-- ======= Header ======= -->
<?php
$color_bar = get_theme_mod('cd_color_bar', '');

$linkedin_url = get_theme_mod('cd_linkedin_url', '');
$facebook_url = get_theme_mod('cd_facebook_contact', '');
$instagram_url = get_theme_mod('cd_instagram_contact', '');

$email_contact = get_theme_mod('cd_mail_contact', '');
$phone_contact = get_theme_mod('cd_phone_contact', '');
$address_contact = get_theme_mod('cd_address', '');

$css_header = null;
if (is_front_page() && is_page()) {
    $css_header = 'page-home';
} else {
    $css_header = 'page-internal';
}
?>

<header id="header" class="<?php echo $css_header; ?> block-menu">

    <div class="black-bar d-none d-lg-block" style="background-color: <?php echo esc_attr($color_bar); ?>">
        <div class="container  d-flex align-items-center">
            <div class="direction">
                <div class="d-flex flex-row">
                    <?php if (!empty($phone_contact)): ?>
                        <div class="p-2"><a href="<?php echo esc_html($phone_contact); ?>" class=""><i
                                        class='bx bxs-phone-call'></i> <?php echo esc_html($phone_contact); ?></a></div>
                    <?php endif; ?>
                    <?php if (!empty($email_contact)): ?>
                        <div class="p-2"><a href="mailto:<?php echo esc_html($email_contact); ?>" class=""><i
                                        class='bx bx-envelope'></i> <?php echo esc_html($email_contact); ?></a></div>
                    <?php endif; ?>
                    <?php if (!empty($address_contact)): ?>
                        <div class="p-2"><i class='bx bxs-map'></i> <?php echo esc_html($address_contact); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="d-inline-flex mt-2 mt-md-0 ms-auto social-header">
                <div class="d-flex flex-row">
                    <?php if (!empty($instagram_url)): ?>
                        <div class="p-2"><a target="_blank" href="<?php echo esc_url($instagram_url); ?>"
                                            class="btn-social"><i class='bx bxl-instagram'></i></a></div>
                    <?php endif; ?>
                    <?php if (!empty($facebook_url)): ?>
                        <div class="p-2"><a target="_blank" href="<?php echo esc_url($facebook_url); ?>"
                                            class="btn-social"><i class='bx bxl-facebook-circle'></i></a></div>
                    <?php endif; ?>
                    <?php if (!empty($linkedin_url)): ?>
                        <div class="p-2"><a target="_blank" href="<?php echo esc_url($linkedin_url); ?>"
                                            class="btn-social"><i class='bx bxl-linkedin'></i></a></div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <?php get_template_part('templates/header', '1'); ?>
</header>

