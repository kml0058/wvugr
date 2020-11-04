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

$panel_id   = 'edulife_general_options';
$section_id = 'edulife_general_options_footer';


$wp_customize->add_section(
	$section_id,
	array(
		'title' => __( 'Footer', 'edulife' ),
		'panel' => $panel_id,
	)
);



edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'checkbox',
		'name'              => 'edulife_theme_options[enable_footer_widgets]',
		'default'           => $defaults['enable_footer_widgets'],
		'sanitize_callback' => 'wp_validate_boolean',
		'label'             => esc_html__( 'Enable Footer Widgets?', 'edulife' ),
		'section'           => $section_id,
	)
);



edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'checkbox',
		'name'              => 'edulife_theme_options[display_social_links]',
		'default'           => $defaults['display_social_links'],
		'sanitize_callback' => 'wp_validate_boolean',
		'label'             => esc_html__( 'Display Social Links?', 'edulife' ),
		'section'           => $section_id,
	)
);



edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'checkbox',
		'name'              => 'edulife_theme_options[display_payment_options]',
		'default'           => $defaults['display_payment_options'],
		'sanitize_callback' => 'wp_validate_boolean',
		'label'             => esc_html__( 'Display Payment Options?', 'edulife' ),
		'section'           => $section_id,
	)
);

