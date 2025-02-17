<?php

add_action('init', function () {

    add_action('wp_footer', function () {
        //wp_deregister_script('wp-embed');
        wp_deregister_script('password-strength-meter');
    });

    add_action('wp_enqueue_scripts', function () {
        wp_dequeue_style('classic-theme-styles');
    }, 20);

    remove_action('wp_head', 'print_emoji_detection_script', 7);
    // remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    /**
     * Uncomment the below line to disable Gutenburg Frontend Stylesheets.
     */
    // remove_action('wp_enqueue_scripts', 'wp_common_block_scripts_and_styles'); // Uncomment this line
});
