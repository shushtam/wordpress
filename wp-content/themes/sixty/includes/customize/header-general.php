<?php

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'radio-image',
	'settings'    => 'sixty_header_layout',
	'label'       => __( 'Select your header layout', 'sixty' ),
	'section'     => 'sixty_header_settings_general',
	'default'     => 'default',
	'priority'    => 10,
	'choices'     => sixty_get_header_layouts(true),
) );