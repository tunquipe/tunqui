<div class="sidebar">
    <?php do_action( 'before_sidebar' ); ?>
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

        <aside id="search" class="widget widget_search">
            <?php get_search_form(); ?>
        </aside>
        <aside id="archives" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'sparkling' ); ?></h3>
            <ul>
                <?php
                $archives_args = array(
                    'type' => 'monthly',
                );
                wp_get_archives( $archives_args );
                ?>
            </ul>
        </aside>

    <?php endif; // end sidebar widget area ?>
</div>
