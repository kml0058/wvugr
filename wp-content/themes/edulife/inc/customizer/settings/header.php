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
$section_id = 'edulife_general_options_header';


$wp_customize->add_section(
	$section_id,
	array(
		'title' => __( 'Header', 'edulife' ),
		'panel' => $panel_id,
	)
);


edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'checkbox',
		'name'              => 'edulife_theme_options[enable_header_cta_btn]',
		'default'           => $defaults['enable_header_cta_btn'],
		'sanitize_callback' => 'wp_validate_boolean',
		'label'             => esc_html__( 'Enable Call To Action?', 'edulife' ),
		'section'           => $section_id,
	)
);




edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'text',
		'name'              => 'edulife_theme_options[header_cta_btn_label]',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Button Label', 'edulife' ),
		'section'           => $section_id,
		'active_callback'   => 'edulife_customizer_is_header_cta_enabled',
	)
);


edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'url',
		'name'              => 'edulife_theme_options[header_cta_btn_link]',
		'sanitize_callback' => 'esc_url_raw',
		'label'             => esc_html__( 'Button Link', 'edulife' ),
		'section'           => $section_id,
		'active_callback'   => 'edulife_customizer_is_header_cta_enabled',
	)
);


