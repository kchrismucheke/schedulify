<?php
/*
Plugin Name: Schedulify
Plugin URI: https://yourwebsite.com
Description: A simple appointment booking plugin.
Version: 1.0
Author: Christopher Mucheke
Author URI: https://yourwebsite.com
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Include required files
include_once ( plugin_dir_path( __FILE__ ) . 'includes/admin.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'includes/frontend.php' );

// Activation hook
register_activation_hook( __FILE__, 'schedulify_install' );

function schedulify_install() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'appointments';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        email varchar(100) NOT NULL,
        phone varchar(20) NOT NULL,
        appointment_date datetime NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

	require_once ( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

function schedulify_scripts() {
	wp_enqueue_style( 'appointment-booking-css', plugin_dir_url( __FILE__ ) . 'css/style.css' );
}

add_action( 'wp_enqueue_scripts', 'schedulify_scripts' );

function schedulify_load_textdomain() {
	load_plugin_textdomain( 'appointment-booking', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

add_action( 'plugins_loaded', 'schedulify_load_textdomain' );
?>