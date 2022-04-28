<?php

get_header();
$idPost = get_the_ID();

$gallery = get_field('photo_gallery');
$categories = get_the_terms($idPost,'portfolio_category');
$listCategories = null;
foreach($categories as $category){
    $listCategories .= $category->name.' - ';
}
                
?>
<?php while(have_posts()): the_post(); ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero-portfolio" class="d-flex align-items-center">
        <div class="container">
            <div class="row align-items-start justify-content-center">
                <div class="col-12 col-lg-12 d-flex flex-column justify-content-center pt-2 pt-lg-0 order-2 order-lg-1">
                    <div class="page-title">
                        <h1><?php the_title(); ?></h1>
                        <p><?php echo get_post_meta($idPost,'sub_title', true); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <div class="container">
            <section id="page-home" class="page-home">
                <div class="container">

                        <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
          <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <?php foreach ($gallery as $image) : ?>
                            <div class="swiper-slide">
                            <img src="<?php echo $image['full_image_url']; ?>" alt="">
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                    <h3>Información del Proyecto</h3>
                    <ul>
                        <li><strong>Categoría</strong>: <?php echo $listCategories; ?></li>
                        <li><strong>Cliente</strong>: <?php echo get_field('customer'); ?></li>
                        <li><strong>Fecha del proyecto</strong>: <?php echo get_field('project_date'); ?></li>
                        <li><strong>URL del proyecto</strong>: <a target="_blank"  href="<?php echo get_field('project_url'); ?>"><?php echo get_field('project_url'); ?></a></li>
                    </ul>
                    </div>
                    <div class="portfolio-description">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                    </div>
                </div>

                </div>

            </div>
            </section><!-- End Portfolio Details Section -->

                    
                </div>
            </section>
        </div>
    </main><!-- End #main -->
<?php endwhile; ?>
<?php wp_reset_query(); ?>

<?php
get_footer();
