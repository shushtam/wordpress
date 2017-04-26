<?php

if ( ! defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_shop_colors_sale_banner',
	'label'       => __( 'Sale Banner', 'sixty' ),
	'section'     => 'sixty_shop_colors',
	'alpha'       => true,
	'default'	  => '#7a4d77',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => '.woocommerce ul.products li.product .onsale',
				'function' => 'css',
				'property' => 'background-color',
			)
		),
	'output'	  => array(
			array(
				'element'  => '.woocommerce ul.products li.product .onsale',
				'property' => 'background-color',
			)
		)
) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_shop_colors_review_icons',
	'label'       => __( 'Review Icons', 'sixty' ),
	'section'     => 'sixty_shop_colors',
	'alpha'       => true,
	'default'	  => '#f96c5a',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => '.woocommerce .star-rating:before, .woocommerce .star-rating span:before, .woocommerce .comment-form-rating p.stars a',
				'function' => 'css',
				'property' => 'color',
			)
		),
	'output'	  => array(
			array(
				'element'  => '.woocommerce .star-rating:before, .woocommerce .star-rating span:before, .woocommerce .comment-form-rating p.stars a',
				'property' => 'color',
			)
		)
) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_shop_colors_breadcrumb',
	'label'       => __( 'Breadcrumb', 'sixty' ),
	'section'     => 'sixty_shop_colors',
	'alpha'       => true,
	'default'	  => '#f96c5a',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => '.woocommerce_breadcrumb a',
				'function' => 'css',
				'property' => 'color',
			)
		),
	'output'	  => array(
			array(
				'element'  => '.woocommerce_breadcrumb a',
				'property' => 'color',
			)
		)
) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_shop_colors_price',
	'label'       => __( 'Price', 'sixty' ),
	'section'     => 'sixty_shop_colors',
	'alpha'       => true,
	'default'	  => '#1a1a1a',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => '.woocommerce ul.products li.product .price, .product-single-wrapper div.product .summary .price .woocommerce-Price-amount, .widget .amount, .woocommerce .widget_price_filter .price_slider_amount',
				'function' => 'css',
				'property' => 'color',
			)
		),
	'output'	  => array(
			array(
				'element'  => '.woocommerce ul.products li.product .price, .product-single-wrapper div.product .summary .price .woocommerce-Price-amount, .widget .amount, .woocommerce .widget_price_filter .price_slider_amount',
				'property' => 'color',
			)
		)
) );