<?php

get_header();
$idPost = get_the_ID();

?>
<?php while(have_posts()): the_post(); ?>
    <main id="main">
        <div class="container">
            <section id="page-single" class="page-single">
                <div class="page-title">
                    <h1><?php the_title(); ?></h1>
                </div>
                <?php the_content(); ?>
            </section>
        </div>
    </main><!-- End #main -->
<?php endwhile; ?>
<?php wp_reset_query(); ?>

<?php
get_footer();
