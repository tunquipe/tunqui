<?php
get_header();
$sliders = tunqui_get_slider();

?>
<?php if (is_home()): ?>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div id="carousel_slider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php $counter = -1; ?>
                        <?php foreach ($sliders as $item) : ?>
                            <?php $counter++; ?>
                            <button type="button" data-bs-target="#carousel_slider"
                                    data-bs-slide-to="<?php echo $counter; ?>" class="<?php echo $item['active'] ?>"
                                    aria-label="Slide <?php echo $counter; ?>"></button>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel-inner">
                        <?php $counter = -1; ?>
                        <?php foreach ($sliders as $item) : ?>
                            <?php $counter++; ?>
                            <div class="carousel-item <?php echo $item['active'] ?>">
                                <div class="row">
                                    <div class="col-lg-7 d-flex flex-column justify-content-center pt-2 pt-lg-0 order-2 order-lg-1"
                                         data-aos="fade-up" data-aos-delay="200">
                                        <div class="p-5">
                                            <h1><?php echo $item['slider_title']; ?></h1>
                                            <h2><?php echo $item['slider_description']; ?></h2>
                                            <div class="d-flex justify-content-center justify-content-lg-start">
                                                <a href="#about" class="btn-get-started scrollto">Conoce el servicio</a>
                                                <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q"
                                                   class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Video informativo</span></a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-in"
                                         data-aos-delay="200">
                                        <img src="<?php echo $item['slider_img_full'][0]; ?>" class="img-fluid animated"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
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
