<?php

get_header();

?>


    <main id="main">
        <div class="container">
            <section id="page-home" class="page-home">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <?php while (have_posts()): the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="title-single">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <?php if( has_excerpt()) : ?>
                                <div class="excerpt-single">
                                    <?php the_excerpt(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if( has_post_thumbnail()) : ?>
                                <div class="image-single">
                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                                </div>
                            <?php endif; ?>
                            <div class="container">
                                <?php the_content(); ?>
                            </div>
                        </article>
                        <div class="navigation">
                            <h5>También te puede interesar</h5>
                            <div class="row">
                                <div class="col-md-6">

                                    <?php
                                    $prevPost = get_previous_post(true);
                                    if($prevPost) { ?>
                                        <div class="nav-box previous">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                <?php
                                                $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(100,100) );
                                                echo $prevthumbnail;
                                                ?>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <div class="arrow"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Anterior</div>
                                                    <?php previous_post_link('%link',"<p>%title</p>", TRUE); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    $nextPost = get_next_post(true);
                                    if($nextPost) { ?>
                                        <div class="nav-box next" style="float:right;">
                                            <div class="d-flex align-items-end ">
                                                <div class="flex-grow-1 ms-3">
                                                    <div class="arrow">Siguiente <i class="fa fa-arrow-right" aria-hidden="true"></i></div>
                                                    <?php next_post_link('%link',"<p>%title</p>", TRUE); ?>
                                                </div>
                                                <div class="flex-shrink-0">
                                                <?php
                                                $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(100,100) );
                                                echo $nextthumbnail;
                                                ?>
                                                </div>
                                            </div>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                    <div class="col-md-4 col-12">
                        <?php get_sidebar(); ?>
                    </div>
                </div>



            </section>
        </div>
    </main><!-- End #main -->


<?php
get_footer();
