<?php

get_header();
$idPost = get_the_ID();
$featured_image = null;
$height = get_post_meta($idPost, 'height_header_page', true);
$position_bg = 'bottom center';
if($height=='400'){
    $position_bg = 'center center';
}
?>
<?php while (have_posts()): the_post(); ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero-page" class="d-flex align-items-center" style="height: <?php echo $height ?>px;">

        <div class="container">
            <?php if (has_post_thumbnail()) :
            $featured_image = get_the_post_thumbnail_url();
            endif;
            ?>
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="bg-image-page" style="height:<?php echo $height ?>px; background: url(<?php echo $featured_image; ?>) <?php echo $position_bg; ?>; background-size: cover;">
                        <?php if($height == '200') : ?>
                            <div class="page-title">
                            <h1><?php the_title(); ?>
                            <p><?php echo get_post_meta($idPost, 'sub_title_page', true); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
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
