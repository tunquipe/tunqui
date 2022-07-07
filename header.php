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
<!-- ======= Header ======= -->
<?php
    $css_header = null;
    if(is_front_page() && is_page()){
        $css_header = 'page-home fixed-top';
    } else {
        $css_header = 'page-internal';
    }
?>
<header id="header" class="<?php echo $css_header; ?>  ">
    <div class="container d-flex align-items-center">
       
            <?php 
            
            tunqui_site_logo();
            
            ?>

        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <div class="d-inline-flex mt-2 mt-md-0 ms-auto">
            <nav id="navbar" class="navbar">
                <?php
                    if ( has_nav_menu( 'primary' ) ) {
                ?>

                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container' => false,
                            'menu_class' => '',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class=" %2$s">%3$s</ul>',
                            'depth' => 2,
                            'walker' => new bootstrap_5_wp_nav_menu_walker()
                        ));
                        ?>
                <ul>
                    <?php if(is_user_logged_in()): ?>
                        <li>
                            <a class="btn-login" href="/escritorio">Mi cuenta</a>
                        </li>
                    <?php else: ?>
                    <li>
                        <a id="login-modal" class="btn-login" href="#" >Iniciar sesión</a>
                    </li>
                    <li>
                        <a class="btn-register" href="/register">Registrate</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php } ?>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>


    </div>
</header><!-- End Header -->