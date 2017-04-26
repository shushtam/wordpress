<?php

if ( ! defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'typography',
	'settings'    => 'sixty_fonts_sitetitle',
	'label'       => esc_attr__( 'Site title', 'sixty' ),
	'section'     => 'sixty_header_fonts',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
	),
	'output'      => array(
		array(
			'element' => '.header_part h1, .header_part h2',
		)
	),
) );