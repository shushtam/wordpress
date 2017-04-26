<?php

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'radio-image',
	'settings'    => 'sixty_layout_type',
	'label'       => __( 'Select your layout type', 'sixty' ),
	'description' => __( 'Fuild layout stretches along the display while boxed layout width is fixed and centred.', 'sixty' ),
	'section'     => 'sixty_layout_settings',
	'default'     => 'container',
	'priority'    => 10,
	'choices'     => array(
		'container' => get_template_directory_uri() . '/assets/icons/layout_fixed.svg',
		'container-fluid' => get_template_directory_uri() . '/assets/icons/layout_fluid.svg',
		),
) );