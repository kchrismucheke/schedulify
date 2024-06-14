<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function schedulify_shortcode() {
	ob_start();
	?>
	<form method="post" id="appointment-booking-form">
		<p>
			<label for="name">Name</label>
			<input type="text" name="name" id="name" required>
		</p>
		<p>
			<label for="email">Email</label>
			<input type="email" name="email" id="email" required>
		</p>
		<p>
			<label for="phone">Phone</label>
			<input type="text" name="phone" id="phone" required>
		</p>
		<p>
			<label for="appointment_date">Appointment Date</label>
			<input type="datetime-local" name="appointment_date" id="appointment_date" required>
		</p>
		<p>
			<input type="submit" value="Book Appointment">
		</p>
	</form>
	<?php
	return ob_get_clean();
}

add_shortcode( 'schedulify', 'schedulify_shortcode' );

function handle_schedulify_form() {
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['name'] ) ) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'appointments';

		$wpdb->insert( $table_name, [ 
			'name' => sanitize_text_field( $_POST['name'] ),
			'email' => sanitize_email( $_POST['email'] ),
			'phone' => sanitize_text_field( $_POST['phone'] ),
			'appointment_date' => sanitize_text_field( $_POST['appointment_date'] ),
		] );

		// Send email notification
		$to = sanitize_email( $_POST['email'] );
		$subject = 'Appointment Confirmation';
		$message = 'Your appointment is confirmed for ' . sanitize_text_field( $_POST['appointment_date'] );
		wp_mail( $to, $subject, $message );

		// Redirect to thank you page
		wp_redirect( add_query_arg( 'booking', 'success', wp_get_referer() ) );
		exit;
	}
}

add_action( 'template_redirect', 'handle_schedulify_form' );
?>