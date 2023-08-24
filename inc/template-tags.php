<?php

function tunqui_site_logo() {
    $custom_logo_id = get_theme_mod('custom_logo');
    $width = get_theme_mod('logo_width', 240);
    $urlHome = esc_url( get_home_url( null, '/' ) );
    if ($custom_logo_id) {
        $custom_logo = wp_get_attachment_image_src($custom_logo_id, 'full');

        if ($custom_logo) {
            $logo_url = $custom_logo[0];
            $output = '<a href="'.$urlHome.'"><img src="' . esc_url($logo_url) . '" alt="' . get_bloginfo('name') . '" width="' . esc_attr($width) . '" ></a>';
            echo $output;
        }
    }
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

