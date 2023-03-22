<?php

/**
 * REQUIRED FILES
 * Include required files.
 */

require 'inc/template-tags.php';

function tunqui_register_styles()
{
    $theme_version = wp_get_theme()->get('Version');
    //añadiendo css
    wp_enqueue_style('aos-css', get_template_directory_uri() . '/assets/vendor/aos/aos.css', '', $theme_version);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', '', $theme_version);
    wp_enqueue_style('bootstrap-icons-css', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', '', $theme_version);
    wp_enqueue_style('boxicons-css', get_template_directory_uri() . '/assets/vendor/boxicons/css/boxicons.min.css', '', $theme_version);
    wp_enqueue_style('glightbox-css', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css', '', $theme_version);
    wp_enqueue_style('remixicon-css', get_template_directory_uri() . '/assets/vendor/remixicon/remixicon.css', '', $theme_version);
    wp_enqueue_style('swiper-bundle-css', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', '', $theme_version);
    wp_enqueue_style('owlcarousel-css', get_template_directory_uri() . '/assets/vendor/owlcarousel/dist/assets/owl.carousel.min.css', '', $theme_version);
    wp_enqueue_style('owlcarousel-default-css', get_template_directory_uri() . '/assets/vendor/owlcarousel/dist/assets/owl.theme.default.css', '', $theme_version);
    wp_enqueue_style('tunqui-style', get_stylesheet_uri(), array(), $theme_version);
    wp_enqueue_style('animate-css', get_template_directory_uri() . '/assets/css/animate.min.css', '', $theme_version);
    wp_enqueue_style('hover-css', get_template_directory_uri() . '/assets/vendor/hover/css/hover-min.css', '', $theme_version);

    //añadiendo css print
    wp_enqueue_style('tunqui-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print');
}
add_action('wp_enqueue_scripts', 'tunqui_register_styles');

function tunqui_register_scripts()
{
    $theme_version = wp_get_theme()->get('Version');
    wp_enqueue_script('jquery');
    wp_enqueue_script('aos-js', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), $theme_version, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), $theme_version, true);
    wp_enqueue_script('glightbox-js', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), $theme_version, true);
    wp_enqueue_script('isotope-js', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array(), $theme_version, true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), $theme_version, true);
    wp_enqueue_script('noframework-waypoints-js', get_template_directory_uri() . '/assets/vendor/waypoints/noframework.waypoints.js', array(), $theme_version, true);
    wp_enqueue_script('validate-js', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array(), $theme_version, true);
    wp_enqueue_script('owlcarousel-js', get_template_directory_uri() . '/assets/vendor/owlcarousel/dist/owl.carousel.min.js', array(), $theme_version, true);
    wp_enqueue_script('youtube-background', get_template_directory_uri() . '/assets/vendor/youtube-background/jquery.youtube-background.js', array(), $theme_version, true);
    wp_enqueue_script('tunqui-js', get_template_directory_uri() . '/assets/js/main.js', array(), $theme_version, true);
}
add_action('wp_enqueue_scripts', 'tunqui_register_scripts');

//Agregamos los menus
function tunqui_menus()
{
    $locations = array(
        'primary'  => __('Desktop Horizontal Menu', 'tunqui'),
        'expanded' => __('Desktop Expanded Menu', 'tunqui'),
        'logged'   => __('Logged', 'tunqui'),
        'not_logged'   => __('Not Logged', 'tunqui'),
        'social'   => __('Social Menu', 'tunqui'),
    );
    register_nav_menus($locations);
}
add_action('init', 'tunqui_menus');

//Agregamos logo
add_theme_support('custom-logo');

register_sidebar(array(
    'name'          => __('Direccion', 'tunqui'),
    'id'            => 'footer-address',
    'description'   => 'Aqui escribe la direccion de la empresa',
    'before_widget' => '<div id="footer-%1$s" class="widget box-img %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="title-section">',
    'after_title'   => '</h4>',
));
register_sidebar(array(
    'name'          => __('Horarios', 'tunqui'),
    'id'            => 'footer-schedule',
    'description'   => 'Aca escribe el horario de la empresa',
    'before_widget' => '<div id="footer-%1$s" class="widget box-img %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="title-section">',
    'after_title'   => '</h4>',
));


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
        foreach($this->current_item->classes as $class) {
            if(in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
// register a new menu
register_nav_menu('main-menu', 'Main menu');

function tunqui_get_slider()
{
    $args = array(
        'post_type' => 'slider',
        'posts_per_page' => 3,
        'orderby' => 'rand'
    );
    $row = new WP_Query($args);
    $data = $row->get_posts();
    $post = null;
    $counter = 0;
    foreach ($data as $item) {
        $counter++;
        $tmp['id'] = $item->ID;
        $tmp['slider_author'] = $item->post_author;
        $tmp['slider_date'] = $item->post_date;
        $tmp['slider_title'] = $item->post_title;
        $tmp['slider_sub_title'] = get_post_meta($item->ID, 'slider_sub_title', true);
        $tmp['slider_description'] = $item->post_content;
        $tmp['slider_url_target'] = get_post_meta($item->ID, 'slider_url_target', true);
        $tmp['slider_text_button'] = get_post_meta($item->ID, 'slider_text_button', true);
        //$tmp['slider_target'] = get_post_meta($item->ID,'slider_target', true);
        $imageID = get_post_meta($item->ID, 'slider_url_image', true);
        $thumbID = get_post_thumbnail_id($item->ID);
        $tmp['slider_img_thumbnail'] = wp_get_attachment_image_src($thumbID, 'thumbnail');
        $tmp['slider_img_full'] = wp_get_attachment_image_src($thumbID, 'full');
        $tmp['slider_url_image'] = wp_get_attachment_image_src($imageID, 'full');

        if ($counter == 1) {
            $tmp['active'] = 'active';
        } else {
            $tmp['active'] = null;
        }
        $post[] = $tmp;
    }
    return  $post;
}

add_theme_support('post-thumbnails');

function theme_slug_setup()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'theme_slug_setup');

//Detectamos el plugin
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
}
function tunqui_portfolio()
{
    if (is_plugin_active('portfolio-post-type/portfolio-post-type.php')) {
        $terms = get_terms('portfolio_category');
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => -1,
            'orderby' => 'rand'
        );
        $row = new WP_Query($args);
        $data = $row->get_posts();
        $posts = null;
        $counter = 0;
        foreach ($data as $item) {
            $counter++;
            $tmp['id'] = $item->ID;
            $tmp['project_author'] = $item->post_author;
            $tmp['project_date'] = $item->post_date;
            $tmp['project_title'] = $item->post_title;
            $tmp['project_excerpt'] = $item->post_excerpt;
            $tmp['project_url'] = get_permalink($item->ID);
            $categories = get_the_terms($item->ID, 'portfolio_category');
            $categorySlug = $categories[0]->slug;
            $tmp['project_category_id'] = $categories[0]->term_id;
            $tmp['project_category_slug'] = $categorySlug;
            $tmp['project_category_name'] = $categories[0]->name;
            $thumbID = get_post_thumbnail_id($item->ID);
            $tmp['project_image_medium'] = wp_get_attachment_image_src($thumbID, 'thumbnail');
            $tmp['project_image_full'] = wp_get_attachment_image_src($thumbID, 'full');
            if ($counter == 1) {
                $tmp['active'] = 'active';
            } else {
                $tmp['active'] = null;
            }
            $posts[] = $tmp;
        }
?>
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">Todo</li>
                    <?php foreach ($terms as $term) : ?>
                        <li data-filter=".filter-<?php echo $term->term_id; ?>"><?php echo $term->name;  ?></li>
                    <?php endforeach; ?>
                </ul>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    <?php foreach ($posts as $project) : ?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $project['project_category_id'] ?>">
                            <div class="portfolio-img">
                                <img src="<?php echo $project['project_image_full'][0] ?>" class="img-fluid" alt="">
                            </div>
                            <div class="portfolio-info">
                                <h4><?php echo $project['project_title']; ?></h4>
                                <p><?php echo $project['project_excerpt']; ?></p>
                                <a href="<?php echo $project['project_image_full'][0] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?php echo $project['project_title']; ?>">
                                    <i class="bx bx-plus"></i>
                                </a>
                                <a href="<?php echo $project['project_url']; ?>" class="details-link" title="Ver más detalles">
                                    <i class="bx bx-link"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section><!-- End Portfolio Section -->
        <?php
    } else {
        return "El plugin no esta activo";
    }
}
function getPriceCourse($id)
{
    $product_id = tutor_utils()->get_course_product_id($id);
    $product = wc_get_product($product_id);
    $html = null;

    if ($product) {
        if (tutor_utils()->is_course_added_to_cart($product_id, true)) {

        } else {
            $sale_price = $product->get_sale_price();
            $regular_price = $product->get_regular_price();
            $html = '<div class="price">
                    <span class="tutor-fs-4 tutor-fw-bold">'.
                    wc_price($sale_price ? $sale_price : $regular_price).'
                </span>';
        if ($regular_price && $sale_price && $sale_price != $regular_price) {
            $html .= '<del class="tutor-fs-7 tutor-ml-8">'.
                    wc_price($regular_price).'
                    </del>';
        }
        $html .='</div>';
        }
    }
    return $html;
}
function wpc_elementor_shortcode_portfolio($atts)
{
    tunqui_portfolio();
}
add_shortcode('portfolio', 'wpc_elementor_shortcode_portfolio');

/**
 * Include default theme options.
 */
require get_template_directory() . '/inc/customizer.php';

function getUrlWhatsapp(): string
{
    $message = get_theme_mod('cd_message_contact');
    $phone = get_theme_mod('cd_whatsapp_contact');
    return "https://api.whatsapp.com/send?phone=" . $phone . "&text=" . $message;
}

function getMetaTagsHeader(){
    $idPost = get_the_ID();
    $metaDescription = get_post_meta($idPost, 'meta_description_page', true);
    $metaTitleSocial = get_post_meta($idPost, 'meta_title_social', true);
    $metaUrlSocial = get_post_meta($idPost, 'meta_url_social', true);
    $metaImageSocial = get_post_meta($idPost, 'meta_image_social', true);

    $maxlength = 160;

    if(empty($metaDescription)){
        $description = get_bloginfo('description');
        // description of article or page
        if (is_page() || is_single()) {
            $description = get_the_excerpt();
        }
        // clean description
        $description = strip_tags($description);
        $description = trim($description);
        // limit description to max characters
        if (strlen($description) > $maxlength) {
            $subtext = substr($description, 0, $maxlength - 3);
            $endspace = strrpos($subtext, ' ');
            $description = substr($subtext, 0, $endspace) . '...';
        }
    } else {
        $description = strip_tags($metaDescription);
        $description = trim($description);
    }

    return '
        <meta name="description" content="'.$description.'" />
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="'.$metaTitleSocial.'">
        <meta name="twitter:description" content="'.$description.'">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content=" <a href="'.$metaImageSocial.'">'.$metaImageSocial.'</a>">
        <meta property="og:title" content="'.$metaTitleSocial.'" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="'.$metaUrlSocial.'" />
        <meta property="og:image" content="'.$metaImageSocial.'" />
        <meta property="og:description" content="'.$description.'" />
            
    ';
}
