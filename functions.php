<?php

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';

function tunqui_register_styles() {
    $theme_version = wp_get_theme()->get( 'Version' );
    //añadiendo css
    wp_enqueue_style( 'aos-css', get_template_directory_uri() .'/assets/vendor/aos/aos.css', '', $theme_version);
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() .'/assets/vendor/bootstrap/css/bootstrap.min.css', '', $theme_version);
    wp_enqueue_style( 'bootstrap-icons-css', get_template_directory_uri() .'/assets/vendor/bootstrap-icons/bootstrap-icons.css', '', $theme_version);
    wp_enqueue_style( 'boxicons-css', get_template_directory_uri() .'/assets/vendor/boxicons/css/boxicons.min.css', '', $theme_version);
    wp_enqueue_style( 'glightbox-css', get_template_directory_uri() .'/assets/vendor/glightbox/css/glightbox.min.css', '', $theme_version);
    wp_enqueue_style( 'remixicon-css', get_template_directory_uri() .'/assets/vendor/remixicon/remixicon.css', '', $theme_version);
    wp_enqueue_style( 'swiper-bundle-css', get_template_directory_uri() .'/assets/vendor/swiper/swiper-bundle.min.css', '', $theme_version);

    wp_enqueue_style( 'tunqui-style', get_stylesheet_uri(), array(), $theme_version );
    //añadiendo css print
    wp_enqueue_style( 'tunqui-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );

}
add_action( 'wp_enqueue_scripts', 'tunqui_register_styles' );

function tunqui_register_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script( 'aos-js', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), $theme_version, true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), $theme_version, true );
    wp_enqueue_script( 'glightbox-js', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), $theme_version, true );
    wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array(), $theme_version, true );
    wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), $theme_version, true );
    wp_enqueue_script( 'noframework-waypoints-js', get_template_directory_uri() . '/assets/vendor/waypoints/noframework.waypoints.js', array(), $theme_version, true );
    wp_enqueue_script( 'validate-js', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array(), $theme_version, true );
    wp_enqueue_script( 'tunqui-js', get_template_directory_uri() . '/assets/js/main.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'tunqui_register_scripts' );

//Agregamos los menus
function tunqui_menus() {
    $locations = array(
        'primary'  => __( 'Desktop Horizontal Menu', 'tunqui' ),
        'expanded' => __( 'Desktop Expanded Menu', 'tunqui' ),
        'mobile'   => __( 'Mobile Menu', 'tunqui' ),
        'footer'   => __( 'Footer Menu', 'tunqui' ),
        'social'   => __( 'Social Menu', 'tunqui' ),
    );
    register_nav_menus( $locations );
}
add_action( 'init', 'tunqui_menus' );

//Agregamos logo
add_theme_support( 'custom-logo' );

register_sidebar( array(
    'name'          => __( 'Footer Izquierda', 'tunqui' ),
    'id'            => 'footer-left',
    'description'   => 'Footer Lado Izquierdo',
    'before_widget' => '<div id="footer-%1$s" class="widget box-img %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="title-section">',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => __( 'Footer Derecha', 'tunqui' ),
    'id'            => 'footer-right',
    'description'   => 'Footer Lado Derecho',
    'before_widget' => '<div id="footer-%1$s" class="widget box-img %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="title-section">',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => __( 'Footer Descripción', 'tunqui' ),
    'id'            => 'footer-description',
    'description'   => 'Descripción del sitio',
    'before_widget' => '<div id="footer-%1$s" class="widget box-img %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="title-section">',
    'after_title'   => '</h4>',
) );

// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_class[] = '';
        foreach ($this->current_item->classes as $class) {
            if (in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ", $dropdown_menu_class)) . " depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array)$item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ($args->walker->has_children) ? ' class="' . $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="' . $nav_link_class . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

function tunqui_get_slider(){
    $args = array(
        'post_type' => 'slider',
        'posts_per_page' => 3,
        'orderby'=> 'rand'
    );
    $row = new WP_Query($args);
    $data = $row->get_posts();
    $post = null;
    $counter = 0;
    foreach ($data as $item){
        $counter++;
        $tmp['id'] = $item->ID;
        $tmp['slider_author'] = $item->post_author;
        $tmp['slider_date'] = $item->post_date;
        $tmp['slider_title'] = $item->post_title;
        $tmp['slider_description'] = $item->post_content;
        $tmp['slider_url_target'] = get_post_meta($item->ID,'slider_url_target', true);
        $tmp['slider_url_video'] = get_post_meta($item->ID,'slider_url_video', true);
        //$tmp['slider_target'] = get_post_meta($item->ID,'slider_target', true);
        $imageID = get_post_meta($item->ID,'slider_url_image', true);
        $thumbID = get_post_thumbnail_id($item->ID);
        $tmp['slider_img_thumbnail'] = wp_get_attachment_image_src( $thumbID, 'thumbnail' );
        $tmp['slider_img_full'] = wp_get_attachment_image_src( $thumbID, 'full' );
        $tmp['slider_url_image'] = wp_get_attachment_image_src( $imageID, 'full' );

        if($counter==1){
            $tmp['active'] = 'active';
        }else{
            $tmp['active'] = null;
        }
        $post[] = $tmp;
    }
    return  $post;
}

add_theme_support( 'post-thumbnails' );

function theme_slug_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );