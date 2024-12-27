<?php

function custom_theme_customizer($wp_customize)
{
    $wp_customize->add_section(
        'theme_settings_section',
        array(
            'title' => 'Ustawienia ogólne',
            'priority' => 30,
        )
    );

    $wp_customize->add_setting(
        'custom_logo',
        array(
            'default' => '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'custom_logo',
            array(
                'label' => 'Wgraj nowe logo',
                'section' => 'theme_settings_section',
                'settings' => 'custom_logo',
            )
        )
    );
}

add_action('customize_register', 'custom_theme_customizer');