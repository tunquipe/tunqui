<?php
/*
Template Name: Blog
*/

get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 10,
    'paged' => $paged,
);
$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();
        ?>

        <article <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="meta">
                <span><?php _e('Publicado el', 'my-theme'); ?> <?php the_time(get_option('date_format')); ?></span>
                <span><?php _e('por', 'my-theme'); ?> <?php the_author_posts_link(); ?></span>
            </div>
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
            <?php endif; ?>
            <div class="content">
                <?php the_excerpt(); ?>
            </div>
        </article>

    <?php
    endwhile;

    // Paginación
    blog_pagination($query);

    wp_reset_postdata();
else :
    echo __('No se encontraron entradas.', 'my-theme');
endif;

get_footer();
?>
