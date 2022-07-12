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
    'name'          => __('Footer Izquierda', 'tunqui'),
    'id'            => 'footer-left',
    'description'   => 'Footer Lado Izquierdo',
    'before_widget' => '<div id="footer-%1$s" class="widget box-img %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="title-section">',
    'after_title'   => '</h4>',
));
register_sidebar(array(
    'name'          => __('Footer Derecha', 'tunqui'),
    'id'            => 'footer-right',
    'description'   => 'Footer Lado Derecho',
    'before_widget' => '<div id="footer-%1$s" class="widget box-img %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="title-section">',
    'after_title'   => '</h4>',
));
register_sidebar(array(
    'name'          => __('Footer Descripción', 'tunqui'),
    'id'            => 'footer-description',
    'description'   => 'Descripción del sitio',
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
        $tmp['slider_description'] = $item->post_content;
        $tmp['slider_url_target'] = get_post_meta($item->ID, 'slider_url_target', true);
        $tmp['slider_url_video'] = get_post_meta($item->ID, 'slider_url_video', true);
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

function tunqui_courses()
{
    $args = array(
        'post_type' => 'courses',
        'posts_per_page' => -1,
        'orderby' => 'rand'
    );
    $row = new WP_Query($args);
    $data = $row->get_posts();
    $courses = null;
    $counter = 0;
    foreach ($data as $item) {
        $counter++;
        $tmp['id'] = $item->ID;
        $tmp['course_level'] = get_tutor_course_level($item->ID);
        $tmp['course_duration'] = get_tutor_course_duration_context($item->ID);
        $tmp['course_author'] = $item->post_author;
        $tmp['course_date'] = $item->post_date;
        $tmp['course_title'] = $item->post_title;
        $tmp['course_excerpt'] = $item->post_excerpt;
        $tmp['course_url'] = get_permalink($item->ID);
        $categories = get_the_terms($item->ID, 'course-category');
        $categorySlug = $categories[0]->slug;
        $tmp['course_category_id'] = $categories[0]->term_id;
        $tmp['course_category_slug'] = $categorySlug;
        $tmp['course_category_name'] = $categories[0]->name;
        $thumbID = get_post_thumbnail_id($item->ID);
        $tmp['course_image_medium'] = wp_get_attachment_image_src($thumbID, 'thumbnail');
        $tmp['course_image_full'] = wp_get_attachment_image_src($thumbID, 'full');

        if ($counter == 1) {
            $tmp['active'] = 'active';
        } else {
            $tmp['active'] = null;
        }
        $courses[] = $tmp;
    }
    return $courses;
}
//Lista de paises.

function get_countries(){
    return array(
        array("code" => "AF", "name" => "Afganistán"),
        array("code" => "AX", "name" => "Islas Aland"),
        array("code" => "AL", "name" => "Albania"),
        array("code" => "DZ", "name" => "Argelia"),
        array("code" => "AS", "name" => "Samoa Americana"),
        array("code" => "AD", "name" => "Andorra"),
        array("code" => "AO", "name" => "Angola"),
        array("code" => "AI", "name" => "Anguila"),
        array("code" => "AQ", "name" => "Antártida"),
        array("code" => "AG", "name" => "Antigua y Barbuda"),
        array("code" => "AR", "name" => "Argentina"),
        array("code" => "AM", "name" => "Armenia"),
        array("code" => "AW", "name" => "Aruba"),
        array("code" => "AU", "name" => "Australia"),
        array("code" => "AT", "name" => "Austria"),
        array("code" => "AZ", "name" => "Azerbaiyán"),
        array("code" => "BS", "name" => "Bahamas"),
        array("code" => "BH", "name" => "Bahréin"),
        array("code" => "BD", "name" => "Bangladesh"),
        array("code" => "BB", "name" => "Barbados"),
        array("code" => "BY", "name" => "Bielorrusia"),
        array("code" => "BE", "name" => "Bélgica"),
        array("code" => "BZ", "name" => "Belice"),
        array("code" => "BJ", "name" => "Benin"),
        array("code" => "BM", "name" => "islas Bermudas"),
        array("code" => "BT", "name" => "Bután"),
        array("code" => "BO", "name" => "Bolivia"),
        array("code" => "BQ", "name" => "Bonaire, Sint Eustatius y Saba"),
        array("code" => "BA", "name" => "Bosnia y Herzegovina"),
        array("code" => "BW", "name" => "Botswana"),
        array("code" => "BV", "name" => "Isla Bouvet"),
        array("code" => "BR", "name" => "Brasil"),
        array("code" => "IO", "name" => "Territorio Británico del Océano Índico"),
        array("code" => "BN", "name" => "Brunei Darussalam"),
        array("code" => "BG", "name" => "Bulgaria"),
        array("code" => "BF", "name" => "Burkina Faso"),
        array("code" => "BI", "name" => "Burundi"),
        array("code" => "KH", "name" => "Camboya"),
        array("code" => "CM", "name" => "Camerún"),
        array("code" => "CA", "name" => "Canadá"),
        array("code" => "CV", "name" => "Cabo Verde"),
        array("code" => "KY", "name" => "Islas Caimán"),
        array("code" => "CF", "name" => "República Centroafricana"),
        array("code" => "TD", "name" => "Chad"),
        array("code" => "CL", "name" => "Chile"),
        array("code" => "CN", "name" => "porcelana"),
        array("code" => "CX", "name" => "Isla de Navidad"),
        array("code" => "CC", "name" => "Islas Cocos (Keeling)"),
        array("code" => "CO", "name" => "Colombia"),
        array("code" => "KM", "name" => "Comoras"),
        array("code" => "CG", "name" => "Congo"),
        array("code" => "CD", "name" => "Congo, República Democrática del Congo"),
        array("code" => "CK", "name" => "Islas Cook"),
        array("code" => "CR", "name" => "Costa Rica"),
        array("code" => "CI", "name" => "Costa de Marfil"),
        array("code" => "HR", "name" => "Croacia"),
        array("code" => "CU", "name" => "Cuba"),
        array("code" => "CW", "name" => "Curazao"),
        array("code" => "CY", "name" => "Chipre"),
        array("code" => "CZ", "name" => "Republica checa"),
        array("code" => "DK", "name" => "Dinamarca"),
        array("code" => "DJ", "name" => "Djibouti"),
        array("code" => "DM", "name" => "Dominica"),
        array("code" => "DO", "name" => "República Dominicana"),
        array("code" => "EC", "name" => "Ecuador"),
        array("code" => "EG", "name" => "Egipto"),
        array("code" => "SV", "name" => "El Salvador"),
        array("code" => "GQ", "name" => "Guinea Ecuatorial"),
        array("code" => "ER", "name" => "Eritrea"),
        array("code" => "EE", "name" => "Estonia"),
        array("code" => "ET", "name" => "Etiopía"),
        array("code" => "FK", "name" => "Islas Falkland (Malvinas)"),
        array("code" => "FO", "name" => "Islas Faroe"),
        array("code" => "FJ", "name" => "Fiyi"),
        array("code" => "FI", "name" => "Finlandia"),
        array("code" => "FR", "name" => "Francia"),
        array("code" => "GF", "name" => "Guayana Francesa"),
        array("code" => "PF", "name" => "Polinesia francés"),
        array("code" => "TF", "name" => "Territorios Franceses del Sur"),
        array("code" => "GA", "name" => "Gabón"),
        array("code" => "GM", "name" => "Gambia"),
        array("code" => "GE", "name" => "Georgia"),
        array("code" => "DE", "name" => "Alemania"),
        array("code" => "GH", "name" => "Ghana"),
        array("code" => "GI", "name" => "Gibraltar"),
        array("code" => "GR", "name" => "Grecia"),
        array("code" => "GL", "name" => "Groenlandia"),
        array("code" => "GD", "name" => "Granada"),
        array("code" => "GP", "name" => "Guadalupe"),
        array("code" => "GU", "name" => "Guam"),
        array("code" => "GT", "name" => "Guatemala"),
        array("code" => "GG", "name" => "Guernsey"),
        array("code" => "GN", "name" => "Guinea"),
        array("code" => "GW", "name" => "Guinea-Bissau"),
        array("code" => "GY", "name" => "Guayana"),
        array("code" => "HT", "name" => "Haití"),
        array("code" => "HM", "name" => "Islas Heard y McDonald"),
        array("code" => "VA", "name" => "Santa Sede (Estado de la Ciudad del Vaticano)"),
        array("code" => "HN", "name" => "Honduras"),
        array("code" => "HK", "name" => "Hong Kong"),
        array("code" => "HU", "name" => "Hungría"),
        array("code" => "IS", "name" => "Islandia"),
        array("code" => "IN", "name" => "India"),
        array("code" => "ID", "name" => "Indonesia"),
        array("code" => "IR", "name" => "Irán (República Islámica de"),
        array("code" => "IQ", "name" => "Irak"),
        array("code" => "IE", "name" => "Irlanda"),
        array("code" => "IM", "name" => "Isla del hombre"),
        array("code" => "IL", "name" => "Israel"),
        array("code" => "IT", "name" => "Italia"),
        array("code" => "JM", "name" => "Jamaica"),
        array("code" => "JP", "name" => "Japón"),
        array("code" => "JE", "name" => "Jersey"),
        array("code" => "JO", "name" => "Jordán"),
        array("code" => "KZ", "name" => "Kazajstán"),
        array("code" => "KE", "name" => "Kenia"),
        array("code" => "KI", "name" => "Kiribati"),
        array("code" => "KP", "name" => "República de Corea, Popular Democrática de"),
        array("code" => "KR", "name" => "Corea, república de"),
        array("code" => "XK", "name" => "Kosovo"),
        array("code" => "KW", "name" => "Kuwait"),
        array("code" => "KG", "name" => "Kirguistán"),
        array("code" => "LA", "name" => "República Democrática Popular Lao"),
        array("code" => "LV", "name" => "Letonia"),
        array("code" => "LB", "name" => "Líbano"),
        array("code" => "LS", "name" => "Lesoto"),
        array("code" => "LR", "name" => "Liberia"),
        array("code" => "LY", "name" => "Jamahiriya Arabe Libia"),
        array("code" => "LI", "name" => "Liechtenstein"),
        array("code" => "LT", "name" => "Lituania"),
        array("code" => "LU", "name" => "Luxemburgo"),
        array("code" => "MO", "name" => "Macao"),
        array("code" => "MK", "name" => "Macedonia, la ex República Yugoslava de"),
        array("code" => "MG", "name" => "Madagascar"),
        array("code" => "MW", "name" => "Malawi"),
        array("code" => "MY", "name" => "Malasia"),
        array("code" => "MV", "name" => "Maldivas"),
        array("code" => "ML", "name" => "Mali"),
        array("code" => "MT", "name" => "Malta"),
        array("code" => "MH", "name" => "Islas Marshall"),
        array("code" => "MQ", "name" => "Martinica"),
        array("code" => "MR", "name" => "Mauritania"),
        array("code" => "MU", "name" => "Mauricio"),
        array("code" => "YT", "name" => "Mayotte"),
        array("code" => "MX", "name" => "México"),
        array("code" => "FM", "name" => "Micronesia, Estados Federados de"),
        array("code" => "MD", "name" => "Moldavia, República de"),
        array("code" => "MC", "name" => "Mónaco"),
        array("code" => "MN", "name" => "Mongolia"),
        array("code" => "ME", "name" => "Montenegro"),
        array("code" => "MS", "name" => "Montserrat"),
        array("code" => "MA", "name" => "Marruecos"),
        array("code" => "MZ", "name" => "Mozambique"),
        array("code" => "MM", "name" => "Myanmar"),
        array("code" => "NA", "name" => "Namibia"),
        array("code" => "NR", "name" => "Nauru"),
        array("code" => "NP", "name" => "Nepal"),
        array("code" => "NL", "name" => "Países Bajos"),
        array("code" => "AN", "name" => "Antillas Holandesas"),
        array("code" => "NC", "name" => "Nueva Caledonia"),
        array("code" => "NZ", "name" => "Nueva Zelanda"),
        array("code" => "NI", "name" => "Nicaragua"),
        array("code" => "NE", "name" => "Níger"),
        array("code" => "NG", "name" => "Nigeria"),
        array("code" => "NU", "name" => "Niue"),
        array("code" => "NF", "name" => "Isla Norfolk"),
        array("code" => "MP", "name" => "Islas Marianas del Norte"),
        array("code" => "NO", "name" => "Noruega"),
        array("code" => "OM", "name" => "Omán"),
        array("code" => "PK", "name" => "Pakistán"),
        array("code" => "PW", "name" => "Palau"),
        array("code" => "PS", "name" => "Territorio Palestino, Ocupado"),
        array("code" => "PA", "name" => "Panamá"),
        array("code" => "PG", "name" => "Papúa Nueva Guinea"),
        array("code" => "PY", "name" => "Paraguay"),
        array("code" => "PE", "name" => "Perú"),
        array("code" => "PH", "name" => "Filipinas"),
        array("code" => "PN", "name" => "Pitcairn"),
        array("code" => "PL", "name" => "Polonia"),
        array("code" => "PT", "name" => "Portugal"),
        array("code" => "PR", "name" => "Puerto Rico"),
        array("code" => "QA", "name" => "Katar"),
        array("code" => "RE", "name" => "Reunión"),
        array("code" => "RO", "name" => "Rumania"),
        array("code" => "RU", "name" => "Federación Rusa"),
        array("code" => "RW", "name" => "Ruanda"),
        array("code" => "BL", "name" => "San Bartolomé"),
        array("code" => "SH", "name" => "Santa elena"),
        array("code" => "KN", "name" => "Saint Kitts y Nevis"),
        array("code" => "LC", "name" => "Santa Lucía"),
        array("code" => "MF", "name" => "San Martín"),
        array("code" => "PM", "name" => "San Pedro y Miquelón"),
        array("code" => "VC", "name" => "San Vicente y las Granadinas"),
        array("code" => "WS", "name" => "Samoa"),
        array("code" => "SM", "name" => "San Marino"),
        array("code" => "ST", "name" => "Santo Tomé y Príncipe"),
        array("code" => "SA", "name" => "Arabia Saudita"),
        array("code" => "SN", "name" => "Senegal"),
        array("code" => "RS", "name" => "Serbia"),
        array("code" => "CS", "name" => "Serbia y Montenegro"),
        array("code" => "SC", "name" => "Seychelles"),
        array("code" => "SL", "name" => "Sierra Leona"),
        array("code" => "SG", "name" => "Singapur"),
        array("code" => "SX", "name" => "San Martín"),
        array("code" => "SK", "name" => "Eslovaquia"),
        array("code" => "SI", "name" => "Eslovenia"),
        array("code" => "SB", "name" => "Islas Salomón"),
        array("code" => "SO", "name" => "Somalia"),
        array("code" => "ZA", "name" => "Sudáfrica"),
        array("code" => "GS", "name" => "Georgia del sur y las islas Sandwich del sur"),
        array("code" => "SS", "name" => "Sudán del Sur"),
        array("code" => "ES", "name" => "España"),
        array("code" => "LK", "name" => "Sri Lanka"),
        array("code" => "SD", "name" => "Sudán"),
        array("code" => "SR", "name" => "Surinam"),
        array("code" => "SJ", "name" => "Svalbard y Jan Mayen"),
        array("code" => "SZ", "name" => "Swazilandia"),
        array("code" => "SE", "name" => "Suecia"),
        array("code" => "CH", "name" => "Suiza"),
        array("code" => "SY", "name" => "República Árabe Siria"),
        array("code" => "TW", "name" => "Taiwan, provincia de China"),
        array("code" => "TJ", "name" => "Tayikistán"),
        array("code" => "TZ", "name" => "Tanzania, República Unida de"),
        array("code" => "TH", "name" => "Tailandia"),
        array("code" => "TL", "name" => "Timor-Leste"),
        array("code" => "TG", "name" => "Para llevar"),
        array("code" => "TK", "name" => "Tokelau"),
        array("code" => "TO", "name" => "Tonga"),
        array("code" => "TT", "name" => "Trinidad y Tobago"),
        array("code" => "TN", "name" => "Túnez"),
        array("code" => "TR", "name" => "pavo"),
        array("code" => "TM", "name" => "Turkmenistán"),
        array("code" => "TC", "name" => "Islas Turcas y Caicos"),
        array("code" => "TV", "name" => "Tuvalu"),
        array("code" => "UG", "name" => "Uganda"),
        array("code" => "UA", "name" => "Ucrania"),
        array("code" => "AE", "name" => "Emiratos Árabes Unidos"),
        array("code" => "GB", "name" => "Reino Unido"),
        array("code" => "US", "name" => "Estados Unidos"),
        array("code" => "UM", "name" => "Islas menores alejadas de los Estados Unidos"),
        array("code" => "UY", "name" => "Uruguay"),
        array("code" => "UZ", "name" => "Uzbekistan"),
        array("code" => "VU", "name" => "Vanuatu"),
        array("code" => "VE", "name" => "Venezuela"),
        array("code" => "VN", "name" => "Vietnam"),
        array("code" => "VG", "name" => "Islas Vírgenes Británicas"),
        array("code" => "VI", "name" => "Islas Vírgenes, EE. UU."),
        array("code" => "WF", "name" => "Wallis y Futuna"),
        array("code" => "EH", "name" => "Sahara Occidental"),
        array("code" => "YE", "name" => "Yemen"),
        array("code" => "ZM", "name" => "Zambia"),
        array("code" => "ZW", "name" => "Zimbabue")
    );
}


add_filter('tutor_student_registration_required_fields', 'required_extra_fields_no_callback');
if ( ! function_exists('required_extra_fields_no_callback')){
    function required_extra_fields_no_callback($atts){
        $atts['phone_no'] = 'Phone Number field is required';
        $atts['country_user'] = 'Phone Number field is required';
        $atts['dni_user'] = 'Phone Number field is required';
        return $atts;
    }
}
add_action('user_register', 'add_extra_fields_after_user_register');
add_action('profile_update', 'add_extra_fields_after_user_register');
if ( ! function_exists('add_extra_fields_after_user_register')) {
    function add_extra_fields_after_user_register($user_id){
        if ( ! empty($_POST['phone_no'])) {
            $phone_number = sanitize_text_field($_POST['phone_no']);
            update_user_meta($user_id, '_phone_number', $phone_number);
        }
        if ( ! empty($_POST['country_user'])) {
            $country_user = sanitize_text_field($_POST['country_user']);
            update_user_meta($user_id, '_country_user', $country_user);
        }
        if ( ! empty($_POST['dni_user'])) {
            $dni_user = sanitize_text_field($_POST['dni_user']);
            update_user_meta($user_id, '_dni_user', $dni_user);
        }
    }
}