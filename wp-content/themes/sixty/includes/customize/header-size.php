<?php

if ( ! defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly


Kirki::add_field( 'sixty_customize', array(
	'type'        => 'radio',
	'settings'    => 'sixty_header_size_field',
	'label'       => __( 'Select your header size', 'sixty' ),
	'section'     => 'sixty_header_size',
	'default'     => 'large',
	'transport'	  => 'postMessage',
	'choices'     => array(
		'large' => __( 'Large', 'sixty' ),
		'small' => __( 'Small', 'sixty' ),
		),
	'partial_refresh' => array(
		'header_size' => array(
			'selector'        => '.header_wrapper',
			'render_callback' => function() {
				return sixty_the_header_part();
			},
		),
	),
) );