<?php

/*
Plugin Name: Test
Plugin URI: http://
Description: test plugin
Version: 1.0
Author: Maxim Alekhin
Author URI: http://
License: A "Slug" license name e.g. GPL2
*/

add_action( 'admin_menu', 'register_my_custom_menu_page' );
function register_my_custom_menu_page() {
    add_menu_page( 'WP Test Menu', 'WP Test Menu', 'manage_options', 'test/admin/lists.php', '', 'dashicons-media-spreadsheet', 99 );
}

add_action( 'plugins_loaded', 'test_init_ajax' );

function list_function() {
    global $wpdb;
    $current_val = esc_html( $_POST['input_val'] );
    if ( $current_val != null ) {
        $wpdb->query( "INSERT INTO wp_test_lists (value) VALUES ('" . $current_val . "');" );
        include( plugin_dir_path( __FILE__ ) . 'admin/ajax.php');
    }
    die();
}

function item_function() {
    global $wpdb;
    $current_val = esc_html( $_POST['input_val'] );
    if ( $current_val != null ) {
        $wpdb->query( "INSERT INTO wp_test_lists_items (parent_id, description) VALUES ('" . $_POST['single'] . "','" . $current_val . "');" );
        include( plugin_dir_path( __FILE__ ) . 'admin/ajax.php');
    }
    die();
}

function test_init_ajax() {
    add_action( 'wp_ajax_myaction', 'list_function' );
    add_action( 'wp_ajax_nopriv_myaction', 'list_function' );
    add_action( 'wp_ajax_myaction2', 'item_function' );
    add_action( 'wp_ajax_nopriv_myaction2', 'item_function' );
}

function do_some_modifications($post)
{
    if (is_singular('post')) {
        include( plugin_dir_path( __FILE__ ) . 'views/post.php');
    }
    return $post;
}
add_action('the_post', 'do_some_modifications');