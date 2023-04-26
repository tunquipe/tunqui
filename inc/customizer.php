<?php

add_action( 'customize_register', 'immobilien_customizer_settings' );
function immobilien_customizer_settings($wp_customize)
{
    $wp_customize->add_section('cd_template', array(
        'title' => 'Personalización General',
        'priority' => 20,
    ));

    $wp_customize->add_setting('cd_phone_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_phone_contact', array(
        'label' => 'Telefono de contacto',
        'section' => 'cd_template',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cd_mail_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_mail_contact', array(
        'label' => 'E-mail de contacto',
        'section' => 'cd_template',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cd_facebook_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_facebook_contact', array(
        'label' => 'URL de Facebook',
        'section' => 'cd_template',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cd_youtube_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_youtube_contact', array(
        'label' => 'URL de youtube',
        'section' => 'cd_template',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cd_linkedin_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_linkedin_contact', array(
        'label' => 'URL de Linkedin',
        'section' => 'cd_template',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cd_url_webmail', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_url_webmail', array(
        'label' => 'URL de Webmail',
        'section' => 'cd_template',
        'type' => 'text',
    ));


    $wp_customize->add_setting('cd_url_brochure', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_url_brochure', array(
        'label' => 'URL de Brochure Corporativo',
        'section' => 'cd_template',
        'type' => 'text',
    ));
    $wp_customize->add_setting('cd_whatsapp_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_whatsapp_contact', array(
        'label' => 'Número de Whatsapp',
        'section' => 'cd_template',
        'type' => 'text',
    ));
    $wp_customize->add_setting('cd_message_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_message_contact', array(
        'label' => 'Mensaje personalizado para Whatsapp',
        'section' => 'cd_template',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('cd_url_book', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_url_book', array(
        'label' => 'URL de libro de reclamaciones',
        'section' => 'cd_template',
        'type' => 'text',
    ));

    /*$wp_customize->add_setting('cd_google_tag', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_google_tag', array(
        'label' => 'Código de Google Analytics',
        'section' => 'cd_template',
        'type' => 'textarea',
    ));*/
}