<?php
$blog_url = home_url();
header("refresh: 5; url=$blog_url"); // Redirecciona a "nueva_pagina.php" después de 10 segundos
?>
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
$image404 = get_theme_mod('image_page_404', '');
$logo_color = get_theme_mod('logo_color', '');
wp_body_open();
?>
<main id="main">
    <div class="container">
        <section id="page-404" class="page-404">
            <div class="container">
                <?php if($logo_color): ?>
                    <div class="logo-404">
                        <img class="img-fluid" src="<?php echo $logo_color; ?>" alt="">
                    </div>
                <?php endif; ?>
                <h1 class="page-title-404">Página <strong>no encontrada</strong></h1>
                <h5 class="page-subtitle-404">Parece que el recurso a buscar ya no se encuentra, se direccionara en <span id="count">5</span> segundos a la pagina principal</h5>
                <?php if($image404): ?>
                    <div class="img-404">
                        <img class="img-fluid" src="<?php echo $image404; ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>
</main><!-- End #main -->
<?php  wp_footer(); ?>
<script>
    (function($) {
        $(document).ready(function () {
            let seconds = 5;
            function updateCounter() {
                $('#count').text(seconds);
                seconds--;
                if (seconds >= 0) {
                    setTimeout(updateCounter, 1000); // Llama a la función nuevamente después de 1 segundo
                }
            }
            setTimeout(updateCounter, 1000); // Inicializa la cuenta regresiva
        });
    })(jQuery);
</script>
</body>
</html>