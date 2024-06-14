<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function schedulify_menu() {
	add_menu_page(
		'Appointment Booking',
		'Appointments',
		'manage_options',
		'appointment-booking',
		'schedulify_admin_page',
		'dashicons-calendar-alt',
		6
	);
}

add_action( 'admin_menu', 'schedulify_menu' );

function schedulify_admin_page() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'appointments';

	if ( $_POST['action'] === 'add' ) {
		$wpdb->insert( $table_name, [ 
			'name' => sanitize_text_field( $_POST['name'] ),
			'email' => sanitize_email( $_POST['email'] ),
			'phone' => sanitize_text_field( $_POST['phone'] ),
			'appointment_date' => sanitize_text_field( $_POST['appointment_date'] ),
		] );
	} elseif ( $_POST['action'] == 'delete' ) {
		$wpdb->delete( $table_name, [ 'id' => intval( $_POST['id'] ) ] );
	}

	$appointments = $wpdb->get_results( "SELECT * FROM $table_name" );

	echo '<div class="wrap">';
	echo '<h1>Appointment Booking</h1>';
	echo '<form method="post">';
	echo '<input type="hidden" name="action" value="add">';
	echo '<table class="form-table">';
	echo '<tr><th scope="row"><label for="name">Name</label></th><td><input name="name" type="text" id="name" class="regular-text"></td></tr>';
	echo '<tr><th scope="row"><label for="email">Email</label></th><td><input name="email" type="email" id="email" class="regular-text"></td></tr>';
	echo '<tr><th scope="row"><label for="phone">Phone</label></th><td><input name="phone" type="text" id="phone" class="regular-text"></td></tr>';
	echo '<tr><th scope="row"><label for="appointment_date">Appointment Date</label></th><td><input name="appointment_date" type="datetime-local" id="appointment_date" class="regular-text"></td></tr>';
	echo '</table>';
	echo '<p class="submit"><input type="submit" class="button-primary" value="Add Appointment"></p>';
	echo '</form>';
	echo '<h2>All Appointments</h2>';
	echo '<table class="wp-list-table widefat fixed striped">';
	echo '<thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Appointment Date</th><th>Actions</th></tr></thead>';
	echo '<tbody>';
	foreach ( $appointments as $appointment ) {
		echo '<tr>';
		echo '<td>' . esc_html( $appointment->name ) . '</td>';
		echo '<td>' . esc_html( $appointment->email ) . '</td>';
		echo '<td>' . esc_html( $appointment->phone ) . '</td>';
		echo '<td>' . esc_html( $appointment->appointment_date ) . '</td>';
		echo '<td><form method="post" style="display:inline;"><input type="hidden" name="id" value="' . intval( $appointment->id ) . '"><input type="hidden" name="action" value="delete"><input type="submit" class="button-link-delete" value="Delete"></form></td>';
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';
	echo '</div>';
}
?>