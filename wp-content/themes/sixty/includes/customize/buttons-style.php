<?php

if ( ! defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly


Kirki::add_field( 'sixty_customize', array(
	'type'        => 'radio-image',
	'settings'    => 'sixty_buttons_style',
	'label'       => __( 'Select your buttons style', 'sixty' ),
	'section'     => 'sixty_buttons_style',
	'default'     => 'buttons_solid',
	'priority'    => 10,
	'choices'     => array(
		'buttons_solid'  => get_template_directory_uri() . '/assets/icons/buttons_solid.svg',
		'buttons_border' => get_template_directory_uri() . '/assets/icons/buttons_ghost.svg',
		),
) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'toggle',
	'settings'    => 'sixty_buttons_round',
	'label'       => __( 'Rounded buttons?', 'sixty' ),
	'section'     => 'sixty_buttons_style',
	'default'     => '0',
	'priority'    => 10,
) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'radio',
	'settings'    => 'sixty_buttons_text_transform',
	'label'       => __( 'Buttons text transform', 'sixty' ),
	'section'     => 'sixty_buttons_style',
	'default'     => 'capitalize',
	'transport'		=> 'postMessage',
	'priority'    => 10,
	'choices'     => array(
		'capitalize' => __( 'Default',   'sixty' ),
		'lowercase'  => __( 'Lowercase', 'sixty' ),
		'uppercase'  => __( 'Uppercase', 'sixty' ),
		),
	'js_vars'	  => array(
			array(
				'element' => '.formatting input[type="submit"],
					.formatting button,
					.comment-respond  input[type="submit"],
					.post .read_more',
				'function' => 'css',
				'property' => 'text-transform'
			)
		),
	'output' => array(
			'element' => '.formatting input[type="submit"],
					.formatting button,
					.comment-respond  input[type="submit"],
					.post .read_more',
			'property' => 'text-transform'
		)
) );