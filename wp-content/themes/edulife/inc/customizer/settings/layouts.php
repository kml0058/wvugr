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
$section_id = 'edulife_general_options_layouts';

$layouts = array(
	'no-sidebar'    => __( 'No Sidebar', 'edulife' ),
	'left-sidebar'  => __( 'Left Sidebar', 'edulife' ),
	'right-sidebar' => __( 'Right Sidebar', 'edulife' ),
);


$wp_customize->add_section(
	$section_id,
	array(
		'title' => __( 'Layouts', 'edulife' ),
		'panel' => $panel_id,
	)
);




edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'edulife_theme_options[layout_archives_blogs]',
		'sanitize_callback' => 'edulife_customizer_sanitize_select',
		'label'             => esc_html__( 'Archives Layout', 'edulife' ),
		'description'       => __( 'Select sidebar layout for archives and blogs.', 'edulife' ),
		'default'           => $defaults['layout_archives_blogs'],
		'section'           => $section_id,
		'choices'           => $layouts,
	)
);





edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'edulife_theme_options[layout_posts]',
		'sanitize_callback' => 'edulife_customizer_sanitize_select',
		'label'             => esc_html__( 'Posts Layouts', 'edulife' ),
		'description'       => __( 'Select sidebar layout for single posts.', 'edulife' ),
		'default'           => $defaults['layout_posts'],
		'section'           => $section_id,
		'choices'           => $layouts,
	)
);





edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'edulife_theme_options[layout_pages]',
		'sanitize_callback' => 'edulife_customizer_sanitize_select',
		'label'             => esc_html__( 'Pages Layouts', 'edulife' ),
		'description'       => __( 'Select sidebar layout for single pages.', 'edulife' ),
		'default'           => $defaults['layout_pages'],
		'section'           => $section_id,
		'choices'           => $layouts,
	)
);

