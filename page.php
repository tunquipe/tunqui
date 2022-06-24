<?php

get_header();
$idPost = get_the_ID();
?>
<?php while(have_posts()): the_post(); ?>
    <section id="sub-header" class="page-internal">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h5><?php echo get_post_meta($idPost,'sub_title', true); ?></h5>
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
