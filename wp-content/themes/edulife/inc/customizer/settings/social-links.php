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
$section_id = 'edulife_general_options_social_links';


$social_links = edulife_social_links();

$wp_customize->add_section(
	$section_id,
	array(
		'title' => __( 'Social Links', 'edulife' ),
		'panel' => $panel_id,
	)
);


if ( is_array( $social_links ) && ! empty( $social_links ) ) {
	foreach ( $social_links as $social_link ) {

		$name = "edulife_theme_options[social_link_{$social_link}]";

		edulife_register_option(
			$wp_customize,
			array(
				'type'              => 'url',
				'name'              => $name,
				'sanitize_callback' => 'esc_url_raw',
				'label'             => ucwords( $social_link ),
				'section'           => $section_id,
			)
		);

	}
}
