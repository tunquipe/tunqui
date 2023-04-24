<?php

get_header();
$idPost = get_the_ID();
$thumbID = get_post_thumbnail_id($idPost);
$imagePage = wp_get_attachment_image_src($thumbID, 'full');

?>
<?php while(have_posts()): the_post(); ?>
    <section id="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-title">
                        <div class="page-image" style="background-image: url('<?php echo $imagePage[0]; ?>')">
                            <h1><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
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
