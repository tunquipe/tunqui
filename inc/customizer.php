<?php
add_action( 'customize_register', 'tunqui_customizer_settings' );
function tunqui_customizer_settings($wp_customize)
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

    $wp_customize->add_setting('cd_facebook_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_facebook_contact', array(
        'label' => 'URL de Facebook',
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
    $wp_customize->add_setting('cd_instagram_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_instagram_contact', array(
        'label' => 'URL de Instagram',
        'section' => 'cd_template',
        'type' => 'text',
    ));
    $wp_customize->add_setting('cd_twitter_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_twitter_contact', array(
        'label' => 'URL de Twitter',
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
    $wp_customize->add_setting('cd_intranet_contact', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_intranet_contact', array(
        'label' => 'URL de Intranet',
        'section' => 'cd_template',
        'type' => 'text',
    ));
    $wp_customize->add_setting('cd_url_blog', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('cd_url_blog', array(
        'label' => 'URL de BLog',
        'section' => 'cd_template',
        'type' => 'text',
    ));
}