<?php

add_action('customize_register', 'immobilien_customizer_settings');
function immobilien_customizer_settings($wp_customize)
{
    $wp_customize->add_section('cd_main_section', array(
        'title' => 'Personalización General',
        'priority' => 20,
    ));

    $wp_customize->add_setting('cd_color_one', array(
        'default' => '#AF2A31',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cd_color_one', array(
        'label' => 'Color principal uno',
        'section' => 'cd_main_section',
        'settings' => 'cd_color_one',
    )));

    $wp_customize->add_setting('cd_color_two', array(
        'default' => '#13110C',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cd_color_two', array(
        'label' => 'Color principal dos',
        'section' => 'cd_main_section',
        'settings' => 'cd_color_two',
    )));

    $wp_customize->add_setting('cd_color_three', array(
        'default' => '#FFFFFF',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cd_color_three', array(
        'label' => 'Color principal tres',
        'section' => 'cd_main_section',
        'settings' => 'cd_color_three',
    )));

    $wp_customize->add_setting('cd_color_four', array(
        'default' => '#3A3C3C',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cd_color_four', array(
        'label' => 'Color principal cuatro',
        'section' => 'cd_main_section',
        'settings' => 'cd_color_four',
    )));

    $wp_customize->add_setting('cd_color_five', array(
        'default' => '#78797D',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cd_color_five', array(
        'label' => 'Color principal cinco',
        'section' => 'cd_main_section',
        'settings' => 'cd_color_five',
    )));

    // Agregar control de radio button
    $wp_customize->add_setting('header_style', array(
        'default' => 'header-style-1', // Valor predeterminado
        'transport' => 'refresh', // Actualizar en tiempo real
    ));

    $wp_customize->add_control('header_style', array(
        'type' => 'radio',
        'label' => 'Seleccionar estilo de encabezado (Menú principal)',
        'section' => 'cd_main_section',
        'choices' => array(
            'header-style-1' => 'Estilo 1',
            'header-style-2' => 'Estilo 2',
            'header-style-3' => 'Estilo 3',
        ),
    ));

    // Agregar control de número
    $wp_customize->add_setting('logo_width', array(
        'default' => 240, // Valor predeterminado
        'transport' => 'refresh', // Actualizar en tiempo real
        'sanitize_callback' => 'absint', // Sanitizar el valor como un entero positivo
    ));

    $wp_customize->add_control('logo_width', array(
        'type' => 'number',
        'label' => 'Ancho del Logo',
        'section' => 'cd_main_section',
        'input_attrs' => array(
            'min' => 50, // Valor mínimo permitido
            'max' => 500, // Valor máximo permitido
            'step' => 10, // Paso de incremento/decremento
        ),
    ));

    $wp_customize->add_setting('fixed_navbar', array(
        'default' => false,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('fixed_navbar', array(
        'type' => 'checkbox',
        'label' => 'Volver menu fixed',
        'section' => 'cd_main_section',
    ));

    $wp_customize->add_setting('transparent_navbar', array(
        'default' => false,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('transparent_navbar', array(
        'type' => 'checkbox',
        'label' => 'Fondo transparente en el menú',
        'section' => 'cd_main_section',
    ));

    $wp_customize->add_setting('cd_color_menu', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cd_color_menu', array(
        'label' => 'Color de fondo del menú principal',
        'section' => 'cd_main_section',
        'settings' => 'cd_color_menu', // Corresponde al nombre de la configuración
    )));

    $wp_customize->add_setting('show_sub_header', array(
        'default' => true,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('show_sub_header', array(
        'type' => 'checkbox',
        'label' => 'Mostrar la barra de páginas internas',
        'section' => 'cd_main_section',
    ));

    $wp_customize->add_setting('height_sub_bar', array(
        'default' => 150, // Valor predeterminado
        'transport' => 'refresh', // Actualizar en tiempo real
        'sanitize_callback' => 'absint', // Sanitizar el valor como un entero positivo
    ));

    $wp_customize->add_control('height_sub_bar', array(
        'type' => 'number',
        'label' => 'Altura de la barra página internas',
        'section' => 'cd_main_section',
        'input_attrs' => array(
            'min' => 50, // Valor mínimo permitido
            'max' => 500, // Valor máximo permitido
            'step' => 10, // Paso de incremento/decremento
        ),
    ));


    $wp_customize->add_setting('show_hero_slider', array(
        'default' => true,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('show_hero_slider', array(
        'type' => 'checkbox',
        'label' => 'Mostrar el hero slider',
        'section' => 'cd_main_section',
    ));

    $wp_customize->add_setting('container_type', array(
        'default' => 'container',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('container_type', array(
        'type' => 'radio',
        'section' => 'cd_main_section',
        'label' => 'Tipo de contenedor para la página inicio.',
        'choices' => array(
            'container-fluid' => 'Contenedor ancho de página completo (container-fluid)',
            'container' => 'Contenedor ancho de página centrado (container)',
        ),
    ));

    $wp_customize->add_setting('cd_phone_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_phone_contact', array(
        'label' => 'Telefono de contacto',
        'section' => 'cd_main_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cd_mail_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_mail_contact', array(
        'label' => 'E-mail de contacto',
        'section' => 'cd_main_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cd_facebook_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_facebook_contact', array(
        'label' => 'URL de Facebook',
        'section' => 'cd_main_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cd_instagram_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_instagram_contact', array(
        'label' => 'URL de Instagram',
        'section' => 'cd_main_section',
        'type' => 'text',
    ));

    // Agregar una configuración para la URL de LinkedIn
    $wp_customize->add_setting('cd_linkedin_url', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    // Agregar un control de tipo texto para la URL de LinkedIn
    $wp_customize->add_control('cd_linkedin_url', array(
        'label' => 'URL de LinkedIn',
        'section' => 'cd_main_section', // Asegúrate de usar la ID correcta de la sección
        'type' => 'text',
    ));


    $wp_customize->add_setting('cd_url_brochure', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_url_brochure', array(
        'label' => 'URL de Brochure Corporativo',
        'section' => 'cd_main_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('cd_whatsapp_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_whatsapp_contact', array(
        'label' => 'Número de Whatsapp',
        'section' => 'cd_main_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('cd_message_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_message_contact', array(
        'label' => 'Mensaje personalizado para Whatsapp',
        'section' => 'cd_main_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('cd_url_book', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_url_book', array(
        'label' => 'URL de libro de reclamaciones',
        'section' => 'cd_main_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('show_top_bar', array(
        'default' => true,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('show_top_bar', array(
        'type' => 'checkbox',
        'label' => 'Mostrar Barra Superior',
        'section' => 'cd_main_section',
    ));

    $wp_customize->add_setting('cd_color_bar', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cd_color_bar', array(
        'label' => 'Color de fondo de la barra superior del menú',
        'section' => 'cd_main_section',
        'settings' => 'cd_color_bar', // Corresponde al nombre de la configuración
    )));

    // Agregar una configuración para la dirección
    $wp_customize->add_setting('cd_address', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    // Agregar un control de tipo texto para la dirección
    $wp_customize->add_control('cd_address', array(
        'label' => 'Dirección',
        'section' => 'cd_main_section', // Asegúrate de usar la ID correcta de la sección
        'type' => 'text',
    ));

    $wp_customize->add_setting('cd_gradient_start_color', array(
        'default' => '#ff0000', // Color de inicio predeterminado
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cd_gradient_start_color', array(
        'label' => 'Color de fin del degradado',
        'section' => 'cd_main_section', // Asegúrate de usar la sección correcta
    )));

    $wp_customize->add_setting('cd_gradient_end_color', array(
        'default' => '#0000ff', // Color de inicio predeterminado
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cd_gradient_end_color', array(
        'label' => 'Color de fin del degradado',
        'section' => 'cd_main_section', // Asegúrate de usar la sección correcta
    )));

    $wp_customize->add_setting('show_copyright', array(
        'default' => true,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('show_copyright', array(
        'type' => 'checkbox',
        'label' => 'Mostrar el copyright',
        'section' => 'cd_main_section',
    ));

    $wp_customize->add_setting('cd_copyright', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('cd_copyright', array(
        'label' => 'Texto del copyright',
        'section' => 'cd_main_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cd_color_footer', array(
        'default' => '#000000',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cd_color_footer', array(
        'label' => 'Color de fondo del footer',
        'section' => 'cd_main_section',
        'settings' => 'cd_color_footer',
    )));

    $wp_customize->add_setting('border-radius-btn', array(
        'default' => 50, // Valor predeterminado
        'transport' => 'refresh', // Actualizar en tiempo real
        'sanitize_callback' => 'absint', // Sanitizar el valor como un entero positivo
    ));

    $wp_customize->add_control('border-radius-btn', array(
        'type' => 'number',
        'label' => 'Radio de border de botón de subida',
        'section' => 'cd_main_section',
        'input_attrs' => array(
            'min' => 0, // Valor mínimo permitido
            'max' => 60, // Valor máximo permitido
            'step' => 10, // Paso de incremento/decremento
        ),
    ));

    $wp_customize->add_setting('background_page_single', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'background_image_control', array(
        'label' => 'Imagen de fondo del blog',
        'section' => 'cd_main_section',
        'settings' => 'background_page_single',
    )));

    $wp_customize->add_setting('cd_single_text', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('cd_single_text', array(
        'label' => 'Texto del titulo del blog',
        'section' => 'cd_main_section',
        'type' => 'text',
    ));

}