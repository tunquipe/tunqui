<?php
get_header();
?>
    <div id="page-single" class="blog-post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <div class="page-title">
                                    <h2><?php the_title() ?></h2>
                                </div>
                                <div class="sub-title">
                                    <?php the_excerpt(); ?>
                                </div>
                                <hr>
                                <div class="content-post">
                                    <?php the_content(); ?>
                                </div>
                            </div><!-- .entry-content -->



                            <?php if ( get_edit_post_link() ) : ?>
                                <footer class="entry-footer">
                                    <?php
                                    edit_post_link(
                                        sprintf(
                                        /* translators: %s: Name of current post */
                                            esc_html__( 'Edit %s', 'excellence' ),
                                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                        ),
                                        '<span class="edit-link">',
                                        '</span>'
                                    );
                                    ?>
                                </footer><!-- .entry-footer -->
                            <?php endif; ?>
                        </article><!-- #post-## -->

                        <div class="navigation">
                            <h5>También te puede interesar</h5>
                            <div class="row">
                                <div class="col-md-6">

                                    <?php
                                    $prevPost = get_previous_post(true);
                                    if($prevPost) { ?>
                                        <div class="nav-box previous">
                                            <div class="media">
                                                <?php
                                                $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(100,100) );
                                                echo $prevthumbnail;
                                                ?>
                                                <div class="media-body">
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
                                            <div class="media">
                                                <div class="media-body">
                                                    <div class="arrow">Siguiente <i class="fa fa-arrow-right" aria-hidden="true"></i></div>
                                                    <?php next_post_link('%link',"<p>%title</p>", TRUE); ?>
                                                </div>
                                                <?php
                                                $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(100,100) );
                                                echo $nextthumbnail;
                                                ?>
                                            </div>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                        ?>
                    <?php endwhile; ?>

                </div>
               <!-- <div class="col-md-4">
                    <?php /*get_sidebar(); */?>
                </div>-->
            </div>
        </div>

    </div>

    <script>
        (function($) {
            $(document).ready(function() {

                if ( $("#page-single").length ) {
                    $("#header").removeClass('fixed-top');
                    $("#header").addClass('single');
                }
            })
        })(jQuery);
    </script>
<?php get_footer(); ?>