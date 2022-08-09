<?php

/**
 * Template Name: Home
 * Template Post Type: post, page
 */

get_header();
$sliders = tunqui_get_slider();

?>
<?php if (is_front_page()): ?>
    <!-- ======= Hero Section ======= -->
    <!--<div id="videotv" data-vbg="https://youtu.be/4shm_VQdYbw"></div>-->

    <section id="hero" class="d-flex align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div id="carousel_slider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php $counter = -1; ?>
                        <?php if ($counter >= 1): ?>
                            <?php foreach ($sliders as $item) : ?>
                                <?php $counter++; ?>
                                <button type="button" data-bs-target="#carousel_slider"
                                        data-bs-slide-to="<?php echo $counter; ?>" class="<?php echo $item['active'] ?>"
                                        aria-label="Slide <?php echo $counter; ?>"></button>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="carousel-inner">
                        <?php $counter = -1; ?>
                        <?php foreach ($sliders as $item) : ?>
                            <?php $counter++; ?>

                                <div  class="carousel-item <?php echo $item['active'] ?>">
                                    <div class="carousel-item-img" style="background-image: url('<?php echo $item['slider_img_full'][0]; ?>')">
                                        <div class="_pattern-overlay"></div>
                                        <div class="carousel-item-text">
                                            <div class="row">
                                                <div class="col-lg-12 d-flex flex-column justify-content-center pt-2 pt-lg-0 order-2 order-lg-1"
                                                     data-aos="fade-up" data-aos-delay="200">
                                                    <div class="item-content">
                                                        <h1><?php echo $item['slider_title']; ?></h1>
                                                        <?php if ($item['slider_description']): ?>
                                                            <h2><?php echo $item['slider_description']; ?></h2>
                                                        <?php endif; ?>
                                                        <div class="d-grid gap-2 d-md-flex justify-content-center"
                                                             style="text-align: center;">
                                                            <?php if ($item['slider_url_target']): ?>
                                                                <a href="<?php echo $item['slider_url_target']; ?>"
                                                                   class="btn-get-started scrollto"><?php echo $item['slider_text_btn']; ?></a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    <?php if ($counter >= 1): ?>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel_slider"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel_slider"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

<?php endif; ?>
    <main id="main">

            <section id="page-home" class="page-home">
                <div class="container-fluid">

                    <?php while (have_posts()): the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </section>

    </main><!-- End #main -->

<?php
get_footer();
