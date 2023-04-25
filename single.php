<?php

get_header();
$idPost = get_the_ID();

// Obtener el autor de la entrada
$author_id = get_post_field( 'post_author', $idPost );
$author_name = get_the_author_meta( 'display_name', $author_id );

// Obtener la fecha de la entrada
$date = get_the_time( 'j \d\e F \d\e Y', $idPost );

// Obtener la categoría de la entrada
$category = get_the_category( $idPost );
$category_link = get_category_link( $category[0]->cat_ID );
$category_name = $category[0]->name;
?>
<?php while(have_posts()): the_post(); ?>
    <main id="main">
        <div class="container">
            <section id="page-single" class="page-single">
                <div class="container">
                    <div class="post-content">
                        <div class="breadcrumb">
                            <a href="<?php echo home_url(); ?>">Inicio</a>
                            <span> > </span>
                            <?php echo '<a href="' . $category_link . '">' . $category_name . '</a>'; ?>
                            <span> > </span>
                            <?php echo '<span>' . the_title() . '</span>'; ?>
                        </div>
                        <div class="page-title">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <ul class="entry-meta">
                           <li><?php echo $author_name; ?> / </li>
                            <li><?php echo $date; ?> / </li>
                            <li><?php echo $category_name; ?></li>
                        </ul>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main><!-- End #main -->
<?php endwhile; ?>
<?php wp_reset_query(); ?>

<?php
get_footer();
