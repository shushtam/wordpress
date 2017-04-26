<?php

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly



Kirki::add_field( 'sixty_customize', array(
	'type'        => 'typography',
	'settings'    => 'sixty_fonts_navigation',
	'label'       => esc_attr__( 'Navigation Links', 'sixty' ),
	'section'     => 'sixty_menu_fonts',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
	),
	'output'      => array(
		array(
			'element' => '.default-navigation a',
		)
	),
) );