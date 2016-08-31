<?php

add_action( 'wp_enqueue_scripts', 'boston_parent_theme_enqueue_styles' );

function boston_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'boston-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'cutecrack-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'boston-style' )
    );

}
