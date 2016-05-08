<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/menu-walkers.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/protocol-relative-theme-assets.php' );


function action_function_name( $field ) {
	echo $field['_name'];
}

if( !current_user_can('editor') ) {
	add_action( 'acf/render_field', 'action_function_name', 10, 1 );
}

/**
 * Advanced Custom Fields
 */

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'site-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
}

/**
 * Days remaining
 */

function daysRemaining( $month, $day, $year ) {

	// Today's date and time
	$today = time();

	// Date and time of event
	$event = mktime( 0,0,0, $month, $day, $year );

	// Compute days until event
	$days_remaining = round( ( $event - $today) / 86400 );

	$days = $days_remaining + 1;

	echo $days;

}

/**
 * Move Yoast to bottom
 */

function yoasttobottom() {
	return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

/**
 * Split Gravity Forms into Two Columns
 */

/**
 * Gravity Forms - Columns
 */
function gform_column_splits($content, $field, $value, $lead_id, $form_id) {
	if(!is_admin()) { // only perform on the front end
		if($field['type'] == 'section') {
			$form = RGFormsModel::get_form_meta($form_id, true);

			// check for the presence of multi-column form classes
			$form_class = explode(' ', $form['cssClass']);
			$form_class_matches = array_intersect($form_class, array('two-column', 'three-column'));

			// check for the presence of section break column classes
			$field_class = explode(' ', $field['cssClass']);
			$field_class_matches = array_intersect($field_class, array('gform_column'));

			// if field is a column break in a multi-column form, perform the list split
			if(!empty($form_class_matches) && !empty($field_class_matches)) { // make sure to target only multi-column forms

				// retrieve the form's field list classes for consistency
				$form = RGFormsModel::add_default_properties($form);
				$description_class = rgar($form, 'descriptionPlacement') == 'above' ? 'description_above' : 'description_below';

				// close current field's li and ul and begin a new list with the same form field list classes
				return '</li></ul><ul class="gform_fields '.$form['labelPlacement'].' '.$description_class.' '.$field['cssClass'].'"><li class="gfield gsection empty">';

			}
		}
	}

	return $content;
}

add_filter('gform_field_content', 'gform_column_splits', 100, 5);
