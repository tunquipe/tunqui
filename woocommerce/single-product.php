<?php

get_header();

?>

<?php while(have_posts()): the_post(); ?>
    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <section id="product-single" class="product-single">
                        <div class="product-title">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <?php the_content(); ?>
                    </section>
                </div>
            </div>
        </div>
    </main><!-- End #main -->
<?php endwhile; ?>
<?php wp_reset_query(); ?>

<?php
get_footer();
