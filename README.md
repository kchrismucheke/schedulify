# Schedulify Plugin

A simple WordPress plugin for booking appointments. This plugin provides both admin and frontend interfaces to manage and book appointments.

## Features

- Admin interface for managing appointments.
- Frontend booking form with customizable fields.
- Email notifications for new appointments.
- Responsive design.
- Localization support.

## Installation

1. Download the plugin files and extract them.
2. Upload the `appointment-booking` folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

### Admin Interface

1. Navigate to `Appointments > Schedulify` in the WordPress admin menu.
2. Use the form to add new appointments.
3. View, edit, or delete existing appointments from the list.

### Frontend Booking Form

1. Create a new page or post in WordPress.
2. Add the shortcode `[appointment_booking]` to the content area.
3. Publish the page or post. The booking form will be displayed on the frontend.

## Shortcodes

- `[appointment_booking]`: Display the booking form on any page or post.

## Email Notifications

When a new appointment is booked, a confirmation email is sent to the email address provided in the booking form.

## Localization

This plugin supports localization. To translate the plugin:

1. Create a `.po` file for your language in the `languages` directory.
2. Use a tool like Poedit to add translations.
3. Save the file with the appropriate language code (e.g., `appointment-booking-de_DE.po` for German).

## Development

### File Structure

```
/wp-content/plugins/schedulify/

schedulify.php
includes/
admin.php
frontend.php
css/
style.css
languages/
```


### Main Files

- `schedulify.php`: Main plugin file, includes setup and activation code.
- `includes/admin.php`: Admin interface code.
- `includes/frontend.php`: Frontend booking form code.
- `css/style.css`: Styles for the booking form.

## Changelog

### 1.0
- Initial release.

## License

This plugin is licensed under the GPL2 license. See the LICENSE file for more information.


## Contributing

If you would like to contribute to the development of this plugin, please submit a pull request on the GitHub repository.

---

## Test Cases

### Test Case 1: Plugin Activation
1. **Action**: Activate the plugin from the WordPress admin dashboard.
2. **Expected Result**: The plugin activates without errors, and a new "Appointments" menu item appears in the admin menu.

### Test Case 2: Admin Interface - Add Appointment
1. **Action**: Navigate to `Appointments > Appointment Booking` and fill out the form to add a new appointment.
2. **Expected Result**: The new appointment is added to the database and appears in the list of appointments.

### Test Case 3: Admin Interface - Delete Appointment
1. **Action**: In the admin interface, click the "Delete" button next to an existing appointment.
2. **Expected Result**: The appointment is removed from the database and no longer appears in the list.

### Test Case 4: Frontend Booking Form - Display
1. **Action**: Create a new page or post and add the shortcode `[appointment_booking]`. Publish the page and view it on the frontend.
2. **Expected Result**: The booking form is displayed correctly with fields for name, email, phone, and appointment date.

### Test Case 5: Frontend Booking Form - Submit
1. **Action**: Fill out the booking form on the frontend and submit it.
2. **Expected Result**: The form data is submitted, an appointment is added to the database, and a confirmation email is sent to the provided email address.

### Test Case 6: Frontend Booking Form - Email Notification
1. **Action**: Submit a booking form with valid data.
2. **Expected Result**: The email address provided in the form receives a confirmation email with the appointment details.

### Test Case 7: Database Structure
1. **Action**: Check the WordPress database for the `wp_appointments` table.
2. **Expected Result**: The table exists with the correct structure (columns for id, name, email, phone, appointment_date, and created_at).

### Test Case 8: Form Validation
1. **Action**: Submit the booking form with invalid data (e.g., missing required fields).
2. **Expected Result**: The form should not submit, and validation messages should be displayed.

### Test Case 9: Localization
1. **Action**: Add a translation file for a different language and switch the WordPress site language.
2. **Expected Result**: The plugin text strings are displayed in the new language.

### Test Case 10: Styling and Responsiveness
1. **Action**: View the booking form on different devices (desktop, tablet, mobile).
2. **Expected Result**: The form is styled correctly and is fully responsive, adjusting to different screen sizes.

---

## Contact

For any questions or issues, please contact us at [muchekechris@gmail.com](mailto:muchekechris@gmail.com).

