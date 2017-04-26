<?php

if ( ! defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly


Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_header_site_title',
	'label'       => __( 'Site title', 'sixty' ),
	'section'     => 'sixty_header_colors',
	'alpha'       => true,
	'default'	  => '#1a1a1a',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => '#header_part_default h1',
				'function' => 'css',
				'property' => 'color',
			)
		),
	'output'	  => array(
			array(
				'element'  => '#header_part_default h1',
				'property' => 'color',
			)
		)
) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_header_tagline',
	'label'       => __( 'Tagline', 'sixty' ),
	'section'     => 'sixty_header_colors',
	'alpha'       => true,
	'default'	  => '#f96c5a',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => '#header_part_default h2',
				'property' => 'color',
			)
		),
	'output'	  => array(
			array(
				'element'  => '#header_part_default h2',
				'property' => 'color',
			)
		)
) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_header_background',
	'label'       => __( 'Header Background', 'sixty' ),
	'section'     => 'sixty_header_colors',
	'alpha'       => true,
	'default'	  => '#fff',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => '#header_part_default',
				'property' => 'background-color',
			)
		),
	'output'	  => array(
			array(
				'element'  => '#header_part_default',
				'property' => 'background-color',
			)
		)
) );