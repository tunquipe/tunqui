<?php

function tunqui_site_logo( $args = array(), $echo = true ) {
    $logo       = get_custom_logo();
    $site_title = get_bloginfo( 'name' );
    $contents   = '';
    $classname  = '';

    $defaults = array(
        'logo'        => '%1$s<span class="screen-reader-text">%2$s</span>',
        'logo_class'  => 'site-logo',
        'title'       => '<a href="%1$s">%2$s</a>',
        'title_class' => 'site-title',
        'home_wrap'   => '<h1 class="%1$s">%2$s</h1>',
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
        $contents  = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
        $classname = $args['title_class'];
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

function cptui_register_my_cpts_slider() {

    /**
     * Post Type: Portadas.
     */

    $labels = [
        "name" => esc_html__( "Portadas", "tunqui.pe" ),
        "singular_name" => esc_html__( "Portada", "tunqui.pe" ),
        "menu_name" => esc_html__( "Portada", "tunqui.pe" ),
        "all_items" => esc_html__( "Todas las portadas", "tunqui.pe" ),
        "add_new" => esc_html__( "Añadir nueva portada", "tunqui.pe" ),
        "add_new_item" => esc_html__( "Añadir nueva portada", "tunqui.pe" ),
        "edit_item" => esc_html__( "Editar portada", "tunqui.pe" ),
        "new_item" => esc_html__( "Nueva portada", "tunqui.pe" ),
        "view_item" => esc_html__( "Ver portada", "tunqui.pe" ),
        "view_items" => esc_html__( "Ver portadas", "tunqui.pe" ),
        "search_items" => esc_html__( "Buscar portada", "tunqui.pe" ),
        "not_found" => esc_html__( "No se ha encontrado a portada", "tunqui.pe" ),
        "not_found_in_trash" => esc_html__( "No se ha encontrado la portada en la papelera", "tunqui.pe" ),
        "featured_image" => esc_html__( "Imagen destacada de la portada", "tunqui.pe" ),
    ];

    $args = [
        "label" => esc_html__( "Portadas", "tunqui.pe" ),
        "labels" => $labels,
        "description" => "",
        "public" => false,
        "publicly_queryable" => false,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => true,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "slider", "with_front" => false ],
        "query_var" => true,
        "menu_icon" => "dashicons-format-gallery",
        "supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "author", "page-attributes" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "slider", $args );
}

add_action( 'init', 'cptui_register_my_cpts_slider' );




