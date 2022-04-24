<?php

get_header();
$idPost = get_the_ID();
?>
<?php while(have_posts()): the_post(); ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero-page" class="d-flex align-items-center">
        <div class="container">
            <div class="row align-items-start justify-content-center">
                <div class="col-12 col-lg-7 d-flex flex-column justify-content-center pt-2 pt-lg-0 order-2 order-lg-1">
                    <div class="page-title">
                        <h1><?php the_title(); ?></h1>
                        <p><?php echo get_post_meta($idPost,'sub_title', true); ?></p>
                    </div>
                </div>
                <div class="col-12 col-lg-5 order-1 order-lg-2 hero-img">
                    <?php if ( has_post_thumbnail() ) :
                        $featured_image = get_the_post_thumbnail_url();

                        ?>
                        <img class="img-fluid" src="<?php echo $featured_image; ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <div class="container">
            <section id="page-home" class="page-home">
                <div class="container">
                    <?php the_content(); ?>
                </div>
            </section>
        </div>
    </main><!-- End #main -->
<?php endwhile; ?>
<?php wp_reset_query(); ?>

<?php
get_footer();
