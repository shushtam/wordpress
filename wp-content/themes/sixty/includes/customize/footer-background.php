<?php

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'cropped_image',
	'settings'    => 'sixty_footer_image',
	'label'       => __( 'Background', 'sixty' ),
	'description' => __( 'Add a background image on footer', 'sixty' ),
	'section'     => 'sixty_footer_background',
	'flex_width'  => true,
	'height'	  => 204,
	'output'	  => array(
			array(
				'element' => '#main_footer',
				'property' => 'background-image'
			)
		)
) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'radio',
	'settings'    => 'sixty_color_footer_background_repeat',
	'label'       => __( 'Background Repeat', 'sixty' ),
	'section'     => 'sixty_footer_background',
	'alpha'       => true,
	'default'	  => 'no-repeat',
	'transport'	  => 'postMessage',
	'choices'	  => array(
			'no-repeat' => esc_attr__( 'No Repeat', 'sixty' ),
			'repeat' => esc_attr__( 'Tile', 'sixty' ),
			'repeat-x' => esc_attr__( 'Tile Horizontally', 'sixty' ),
			'repeat-y' => esc_attr__( 'Tile Vertically', 'sixty' )
		),
	'js_vars'	  => array(
			array(
				'element'  => '#main_footer',
				'function' => 'css',
				'property' => 'background-repeat',
			)
		),
	'output'	  => array(
			array(
				'element'  => '#main_footer',
				'property' => 'background-repeat',
			)
		)
) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'radio',
	'settings'    => 'sixty_color_footer_background_position',
	'label'       => __( 'Background Position', 'sixty' ),
	'section'     => 'sixty_footer_background',
	'alpha'       => true,
	'default'	  => 'center',
	'transport'	  => 'postMessage',
	'choices'	  => array(
			'left' => esc_attr__( 'Left', 'sixty' ),
			'center' => esc_attr__( 'Center', 'sixty' ),
			'right' => esc_attr__( 'Right', 'sixty' )
		),
	'js_vars'	  => array(
			array(
				'element'  => '#main_footer',
				'function' => 'css',
				'property' => 'background-position',
			)
		),
	'output'	  => array(
			array(
				'element'  => '#main_footer',
				'property' => 'background-position',
			)
		)
) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'radio',
	'settings'    => 'sixty_color_footer_background_attachment',
	'label'       => __( 'Background Attachment', 'sixty' ),
	'section'     => 'sixty_footer_background',
	'alpha'       => true,
	'default'	  => 'scroll',
	'transport'	  => 'postMessage',
	'choices'	  => array(
			'scroll' => esc_attr__( 'Scroll', 'sixty' ),
			'fixed' => esc_attr__( 'Fixed', 'sixty' )
		),
	'js_vars'	  => array(
			array(
				'element'  => '#main_footer',
				'function' => 'css',
				'property' => 'background-attachment',
			)
		),
	'output'	  => array(
			array(
				'element'  => '#main_footer',
				'property' => 'background-attachment',
			)
		)
) );
