<?php

/**
 * Template Name: Home
 * Template Post Type: post, page
 */

get_header();
$sliders = tunqui_get_slider_img();
?>
<?php if (is_front_page()): ?>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="vegasHere">
        </div>
        <div class="container">
            <div id="header-slider" class="top-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="info">

                            <?php if ( is_active_sidebar('slider-green') ) : ?>
                                <div class="slider-green-content">
                                    <?php dynamic_sidebar('slider-green'); ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-register">
                            <?php if ( is_active_sidebar('form-contact') ) : ?>
                                <div class="widget-form">
                                    <?php dynamic_sidebar('form-contact'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
    <section>
        <div class="container text-center">
            <div class="advertisements row justify-content-center">
                <div class="col-12 col-md-4 p-2">
                    <h1 class="quote"><strong>¡</strong>Cotiza ya<strong>!</strong></h1>
                </div>
                <div class="col-12 col-md-4 p-2">
                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        924 980 002
                    </div>
                </div>
                <div class="col-12 col-md-4 p-2">
                    <div class="d-flex flex-row justify-content-center mb-3">
                        <div class="p-2 line-left">Separa tu lote desde 90m2</div>
                        <div class="p-2 line-right">$21.600</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>
    <main id="main">
        <div class="container">
            <section id="page-home" class="page-home">
                <div class="container">

                    <?php while(have_posts()): the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </section>
        </div>
    </main><!-- End #main -->

<?php
get_footer();

?>
<script>

    (function($) {
        $(document).ready(function() {

            if ( $(".widget-header").length ) {
                console.log('existe el contenido del widget');
                $("#header-slider").addClass('p-slider');
            }

            $(".vegasHere").vegas({
                overlay: false,
                transition: 'fade2',
                transitionDuration: 3000,
                delay: 10000,
                animationDuration: 20000,
                slides: [
                    <?php
                    foreach ($sliders as $item) :
                        echo "{ src:'" . $item['slider_img_full'][0] . "', fade:1000 },";
                    endforeach;
                    ?>
                ]
            });
        })
    })(jQuery);

</script>
