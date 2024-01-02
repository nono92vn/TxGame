<?php
function my_enqueue_styles() {
    wp_enqueue_style( 'twentytwentyfour-child-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_styles' );