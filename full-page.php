<?php

/**
 * Template Name: Theme Full Width
 * Template Post Type: post, page
 */

get_header();
$idPost = get_the_ID();

$gradient_start_color = get_theme_mod('cd_gradient_start_color', '#ff0000');
$gradient_end_color = get_theme_mod('cd_gradient_end_color', '#0000ff');

$subTitle = get_post_meta($idPost,'sub_title', true);
$imageID = get_post_meta($idPost,'sub_image_page', true);
$imagePage = wp_get_attachment_image_src($imageID, 'full');
$gradient = "linear-gradient(to right,".esc_attr($gradient_start_color)."8a,".esc_attr($gradient_end_color)."d4)";
$show_sub_bar = get_theme_mod('show_sub_header', true);
$height_sub_bar = get_theme_mod('height_sub_bar', '150');
$fixed_menu = get_theme_mod('fixed_navbar');
$fixed = '';
if($fixed_menu){
    $fixed = 'fixed-bar';
}
?>
<style>
    .overlay-container{
        position: relative;
        background-position: center center;
        background-size: cover;
    }
    .overlay-container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: <?php echo $gradient; ?>;
        z-index: 2; /* Colocar la superposición detrás del contenido */
    }
</style>
<?php while(have_posts()): the_post(); ?>
    <?php if ($show_sub_bar) :  ?>
    <section id="sub-header" class="page-internal <?php echo $fixed; ?> overlay-container" style="background-image: url(<?php echo $imagePage[0]; ?>); height: <?php echo $height_sub_bar.'px'; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if (!empty($subTitle)): ?>
                        <h1 class="page-title">
                            <?php  echo $subTitle; ?>
                        </h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <main id="main">
        <div class="container-fluid">
            <section id="page-home" class="page-home">

                    <?php the_content(); ?>

            </section>
        </div>
    </main><!-- End #main -->
<?php endwhile; ?>
<?php wp_reset_query(); ?>

<?php
get_footer();