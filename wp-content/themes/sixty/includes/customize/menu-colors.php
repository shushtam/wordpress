<?php

if ( ! defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly

$text_shop = ', .header_wooc_profile_wrapper .header_wooc_profile ul li a, .header_wooc_cart .widget_shopping_cart_content ul.cart_list li a, .header_wooc_cart .empty, .widget_shopping_cart_content .quantity, .widget_shopping_cart_content p.total, .header_wooc_cart ul.cart_list .variation';
$text_usual = '.default-navigation .nav-pills li>a';
Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_menu_text',
	'label'       => __( 'Menu links', 'sixty' ),
	'section'     => 'sixty_menu_colors',
	'alpha'       => true,
	'default'	  => '#fff',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => ( class_exists('WooCommerce') ? $text_usual . $text_shop : $text_usual ),
				'function' => 'css',
				'property' => 'color',
			)
		),
	'output'	  => array(
			array(
				'element'  => ( class_exists('WooCommerce') ? $text_usual . $text_shop : $text_usual ),
				'property' => 'color',
			)
		)
) );

$background_shop = ', .header_wooc_cart .cart_total, .header_wooc_cart .widget_shopping_cart_content, .header_wooc_profile_wrapper .header_wooc_profile ul ';
$background_usual = '.default-navigation, .default-navigation .nav li ul, .widget #wp-calendar #today';
Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_menu_background',
	'label'       => __( 'Menu Background', 'sixty' ),
	'section'     => 'sixty_menu_colors',
	'alpha'       => true,
	'default'	  => '#7a4d77',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => ( class_exists('WooCommerce') ? $background_usual . $background_shop : $background_usual ),
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'	=> '.header_wooc_profile_wrapper .header_wooc_profile:before',
				'function'	=> 'css',
				'property'	=> 'border-bottom-color'
				),
			array(
				'element'	=> '.header_wooc_profile_wrapper .header_wooc_profile svg',
				'function'	=> 'css',
				'property'	=> 'fill'
				)
		),
	'output'	  => array(
			array(
				'element'  => ( class_exists('WooCommerce') ? $background_usual . $background_shop : $background_usual ),
				'property' => 'background-color',
			),
			array(
				'element'	=> '.header_wooc_profile_wrapper .header_wooc_profile:before',
				'property'	=> 'border-bottom-color'
				),
			array(
				'element'	=> '.header_wooc_profile_wrapper .header_wooc_profile svg',
				'property'	=> 'fill'
				)
		)

) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_menu_active_background',
	'label'       => __( 'Active Menu Background', 'sixty' ),
	'section'     => 'sixty_menu_colors',
	'alpha'       => true,
	'default'	  => 'rgba(86, 55, 84, 1)',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => '.default-navigation .nav>li.current-menu-item',
				'function' => 'css',
				'property' => 'background-color',
			)
		),
	'output'	  => array(
			array(
				'element'  => '.default-navigation .nav>li.current-menu-item',
				'property' => 'background-color',
			)
		)
) );


Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_menu_active_color',
	'label'       => __( 'Active Menu Color', 'sixty' ),
	'section'     => 'sixty_menu_colors',
	'alpha'       => true,
	'default'	  => '#fff',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => '.default-navigation .nav>li.current-menu-item>a',
				'function' => 'css',
				'property' => 'color',
			)
		),
	'output'	  => array(
			array(
				'element'  => '.default-navigation .nav>li.current-menu-item>a',
				'property' => 'color',
			)
		)
) );
