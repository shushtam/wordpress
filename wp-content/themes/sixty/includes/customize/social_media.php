<?php

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'repeater',
	'label'       => esc_attr__( 'Social media icons', 'sixty' ),
	'section'     => 'sixty_social_media',
	'row_label' => array(               
        	'type' => 'text',
        	'value' => esc_attr__('social link', 'sixty' ),
	),
	'settings'    => 'sixty_social_media_links',
	'fields' => array(
		'icon' => array(
			'type'        => 'select',
			'label'       => esc_attr__( 'Social Network', 'sixty' ),
			'description' => esc_attr__( 'Select your social media network', 'sixty' ),
			'choices'     => sixty_social_networks(true),
		),
		'link' => array(
			'type'        => 'text',
			'label'       => esc_attr__( 'Link', 'sixty' ),
			'description' => esc_attr__( 'Enter your social media account link', 'sixty' ),
		),
	)
) );