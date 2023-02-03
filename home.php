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
            <div class="top-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="info">
                            <h3 class="title">Tu lote en Huaral</h3>
                            <h2 class="sub-title">Obras terminadas</h2>
                            <ul class="props">
                                <li>Titulos de propiedad</li>
                                <li>Saneamiento completo</li>
                                <li>Credito directo</li>
                            </ul>
                            <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/wMl_GVF_9YM" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-register">
                            <h2 class="title">!Quiero que me contacten!</h2>
                            <div class="description">Estas a un click de tu nuevo lote en Huaral</div>
                            <form action="">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Nombres">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="lastname" aria-describedby="lastname" placeholder="Apellidos">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="phone" aria-describedby="phone" placeholder="Telefono">
                                </div>
                                <div class="mb-3">
                                    <h2 class="question">¿Visitarás nuestra residencial?</h2>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-primary btn-green">Siguiente</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section><!-- End Hero -->

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
            $(".vegasHere").vegas({
                overlay: true,
                transition: 'fade',
                transitionDuration: 4000,
                delay: 10000,
                animation: 'random',
                animationDuration: 20000,
                slides: [
                    <?php
                    foreach ($sliders as $item) :
                        echo "{ src:'" . $item['slider_img_full'][0] . "', fade:1000 }";
                    endforeach;
                    ?>
                ]
            });
        })
    })(jQuery);

</script>
