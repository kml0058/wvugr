<?php
/**
 * This file contains required settings for the general options panel.
 *
 * @package edulife
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! edulife_get_newsletter_form( 0, false ) ) {
	return;
}

$panel_id   = 'edulife_general_options';
$section_id = 'edulife_general_options_newsletter';


$wp_customize->add_section(
	$section_id,
	array(
		'title' => __( 'Newsletter', 'edulife' ),
		'panel' => $panel_id,
	)
);



edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'text',
		'name'              => 'edulife_theme_options[newsletter_heading]',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Newsletter Heading', 'edulife' ),
		'section'           => $section_id,
	)
);



edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'textarea',
		'name'              => 'edulife_theme_options[newsletter_description]',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Newsletter Description', 'edulife' ),
		'section'           => $section_id,
	)
);

