<?php
declare(strict_types=1);

/**
 * Inmode UK Child Theme functions
 * - Enqueue parent stylesheet
 * - Load child text domain
 */

if (!defined('INMODE_UK_CHILD_VERSION')) {
    define('INMODE_UK_CHILD_VERSION', '0.1.0');
}

add_action('wp_enqueue_scripts', static function (): void {
    // Enqueue parent stylesheet only (parent enqueues get_stylesheet_uri which resolves to child when active)
    $parent_style_path = get_template_directory() . '/style.css';
    $parent_style_ver  = file_exists($parent_style_path) ? (string) filemtime($parent_style_path) : INMODE_UK_CHILD_VERSION;

    wp_enqueue_style(
        'inmode-parent-style',
        get_template_directory_uri() . '/style.css',
        [],
        $parent_style_ver
    );
}, 20);

add_action('after_setup_theme', static function (): void {
    load_child_theme_textdomain('client-theme-uk', get_stylesheet_directory() . '/languages');
});
