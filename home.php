<?php

/**
 * Template Name: Home
 * Template Post Type: post, page
 */

get_header();
$show_hero_slider = get_theme_mod('show_hero_slider', true);

?>
<?php
    if (is_front_page()) :
    if($show_hero_slider):
        $sliders = tunqui_get_slider();
    ?>
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div id="carousel_slider" class="carousel slide" data-bs-ride="carousel">
                    <div class="stripe">

                    </div>
                    <div class="carousel-indicators">
                        <?php $counter = -1; ?>
                        <?php foreach ($sliders as $item) : ?>
                            <?php $counter++; ?>
                            <button type="button" data-bs-target="#carousel_slider" data-bs-slide-to="<?php echo $counter; ?>" class="<?php echo $item['active'] ?>" aria-label="Slide <?php echo $counter; ?>"></button>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel-inner">
                        <?php $counter = -1; ?>
                        <?php foreach ($sliders as $item) : ?>
                            <?php $counter++; ?>
                            <div class="carousel-item <?php echo $item['active'] ?>" style="background: url('<?php echo $item['slider_img_full'][0]; ?>') center center">
                                <div class="row">
                                    <div class="col-lg-6 d-flex flex-column justify-content-center pt-2 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                                        <div class="item-content">
                                            <h2><?php echo $item['slider_sub_title']; ?></h2>
                                            <h1><?php echo $item['slider_title']; ?></h1>
                                            <div class="d-grid gap-2 d-md-flex justify-content-center justify-content-lg-start">
                                                <?php if ($item['slider_url_target']) : ?>
                                                    <a href="<?php echo $item['slider_url_target']; ?>" class="btn-get-started scrollto">
                                                        <?php echo $item['slider_text_button']; ?> <i class='bx bxs-arrow-from-left'></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel_slider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel_slider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
    <?php
    endif;
    endif;
    ?>
    <main id="main">
        <div class="container-fluid">
            <section id="page-home" class="page-home">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </section>
        </div>
    </main><!-- End #main -->
<?php
get_footer();
