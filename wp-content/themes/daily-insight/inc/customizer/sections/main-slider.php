<?php
/**
 * Main Slider Customizer options
 *
 * @package Theme Palace
 * @subpackage Daily Insight
 * @since Daily Insight 0.1
 */


// Add Main Slider enable section
$wp_customize->add_section( 'daily_insight_main_slider_section', array(
	'title'             => esc_html__( 'Main Slider','daily-insight' ),
	'description'       => esc_html__( 'Main Slider section options.', 'daily-insight' ),
	'priority'			=> '10',
	'panel'             => 'daily_insight_sections_panel'
) );

// Add Main Slider enable setting and control.
$wp_customize->add_setting( 'daily_insight_theme_options[enable_main_slider]', array(
	'default'           => $options['enable_main_slider'],
	'sanitize_callback' => 'daily_insight_sanitize_select'
) );

$wp_customize->add_control( 'daily_insight_theme_options[enable_main_slider]', array(
	'label'             => esc_html__( 'Enable On', 'daily-insight' ),
	'section'           => 'daily_insight_main_slider_section',
	'type'              => 'select',
	'choices'			=> daily_insight_enable_disable_options(),
) );

// Add Main Slider content type setting and control.
$wp_customize->add_setting( 'daily_insight_theme_options[main_slider_type]', array(
	'default'           => $options['main_slider_type'],
	'sanitize_callback' => 'daily_insight_sanitize_select'
) );

$wp_customize->add_control( 'daily_insight_theme_options[main_slider_type]', array(
	'label'           	=> esc_html__( 'Content Type', 'daily-insight' ),
	'section'         	=> 'daily_insight_main_slider_section',
	'type'            	=> 'select',
	'active_callback' 	=> 'daily_insight_is_main_slider_active',
	'choices'         	=> array(
		'category'		=> esc_html__( 'Category', 'daily-insight' ),
	)
) );

// Add Main Slider category drop-down setting and control
$wp_customize->add_setting( 'daily_insight_theme_options[main_slider_category_type]', array(
	'default'			=> $options['main_slider_category_type'],
	'sanitize_callback'	=> 'daily_insight_sanitize_category_list',
) );

$wp_customize->add_control( new Daily_Insight_Dropdown_Category_Control( $wp_customize, 'daily_insight_theme_options[main_slider_category_type]', array(
	'active_callback' 	=> 'daily_insight_is_main_slider_active',
	'description'		=> esc_html__( 'If multiple category is selected, Recent Posts from those  Category will be shown.', 'daily-insight' ),
	'label'           	=> esc_html__( 'Select Category', 'daily-insight' ),
	'section'         	=> 'daily_insight_main_slider_section',
	'type'            	=> 'dropdown-category',
 ) ) );

