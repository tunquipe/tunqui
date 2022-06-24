<?php

function tunqui_site_logo( $args = array(), $echo = true ) {
    $logo       = get_custom_logo();
    $site_title = get_bloginfo( 'name' );
    $contents   = '';
    $classname  = '';
    $urlhome = esc_url( get_home_url( null, '/' ) );
    if(empty($logo)){
        $logo = '<a href="'.$urlhome.'"><img width="180px" src="'.get_template_directory_uri().'/assets/img/blenderperu.svg'.'" ></a>';
    }
    $defaults = array(
        'logo'        => '%1$s<span class="screen-reader-text">%2$s</span>',
        'logo_class'  => 'site-logo',
        'title'       => '<a href="%1$s">%2$s</a>',
        'title_class' => 'site-title',
        'home_wrap'   => '<div class="%1$s">%2$s</div>',
        'single_wrap' => '<div class="%1$s faux-heading">%2$s</div>',
        'condition'   => ( is_front_page() || is_home() ) && ! is_page(),
    );

    $args = wp_parse_args( $args, $defaults );

    /**
     * Filters the arguments for `twentytwenty_site_logo()`.
     *
     * @since Twenty Twenty 1.0
     *
     * @param array $args     Parsed arguments.
     * @param array $defaults Function's default arguments.
     */
    $args = apply_filters( 'tunqui_site_logo_args', $args, $defaults );
    
    if ( has_custom_logo() ) {
        $contents  = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
        $classname = $args['logo_class'];
    } else {
        $contents  = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
        //$contents  = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
        $classname = $args['logo_class'];
    }

    $wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';

    $html = sprintf( $args[ $wrap ], $classname, $contents );

    /**
     * Filters the arguments for `twentytwenty_site_logo()`.
     *
     * @since Twenty Twenty 1.0
     *
     * @param string $html      Compiled HTML based on our arguments.
     * @param array  $args      Parsed arguments.
     * @param string $classname Class name based on current view, home or single.
     * @param string $contents  HTML for site title or logo.
     */

    $html = apply_filters( 'tunqui_site_logo', $html, $args, $classname, $contents );

    if ( ! $echo ) {
        return $html;
    }

    echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

function tunqui_slider_post() {
    $labels = array(
        'name'               => __( 'Portadas' ),
        'singular_name'      => __( 'Portada' ),
        'add_new'            => __( 'Agregar portada' ),
        'add_new_item'       => __( 'Agregar portada' ),
        'edit_item'          => __( 'Editar portada' ),
        'new_item'           => __( 'Agregar portada' ),
        'view_item'          => __( 'Visualizar portada' ),
        'search_items'       => __( 'Buscar portada' ),
        'not_found'          => __( 'No se encontro portada' ),
        'not_found_in_trash' => __( 'No se encontro portada en la papelera' )
    );
    $supports = array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
    );
    $args = array(
        'labels'               => $labels,
        'supports'             => $supports,
        'public'               => true,
        'capability_type'      => 'post',
        'rewrite'              => array( 'slug' => 'slider' ),
        'has_archive'          => true,
        'menu_position'        => 30,
        'menu_icon'            => 'dashicons-images-alt2',
    );
    register_post_type( 'slider', $args );
}
add_action( 'init', 'tunqui_slider_post' );

