<?php

if ( ! defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_footer_background',
	'label'       => __( 'Background Image', 'sixty' ),
	'section'     => 'sixty_footer_colors',
	'alpha'       => true,
	'default'	  => '#fff',
	'description' => __( 'Add a color on footer background. Color will not available if a footer image is added too', 'sixty' ),
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => '#main_footer',
				'function' => 'css',
				'property' => 'background-color',
			)
		),
	'output'	  => array(
			array(
				'element'  => '#main_footer',
				'property' => 'background-color',
			)
		)
) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_footer_text',
	'label'       => __( 'Text', 'sixty' ),
	'section'     => 'sixty_footer_colors',
	'alpha'       => true,
	'default'	  => '#595959',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => '#main_footer, #main_footer .site-title, #main_footer a',
				'function' => 'css',
				'property' => 'color',
			)
		),
	'output'	  => array(
			array(
				'element'  => '#main_footer, #main_footer .site-title, #main_footer a',
				'property' => 'color',
			)
		)
) );