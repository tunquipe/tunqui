<?php

add_action('customize_register', 'immobilien_customizer_settings');
function immobilien_customizer_settings($wp_customize)
{
    $wp_customize->add_section('cd_main_section', array(
        'title' => 'Personalización General',
        'priority' => 20,
    ));

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
        'label' => 'Mostrar la sub barra de las páginas',
        'section' => 'cd_main_section',
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

}