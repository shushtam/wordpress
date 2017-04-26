<?php

if ( ! defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly

$label_color_shop = ',
					.buttons_solid .woocommerce a.button, 
					.buttons_solid.woocommerce a.button,
					.buttons_solid td.actions .coupon .button,											
					.buttons_solid.woocommerce .widget_price_filter .price_slider_amount .button, 	
					.buttons_solid .wc-proceed-to-checkout .checkout-button.button, 				
					.buttons_solid.woocommerce button.button.alt, 									
					.buttons_solid.woocommerce #respond input#submit,
					.buttons_solid .widget_shopping_cart_content p.buttons .checkout,
					.buttons_solid .formatting .woocommerce .return-to-shop a.button,
					.buttons_solid .woocommerce button.button, 
					.buttons_solid .woocommerce input.button,


					.buttons_border .woocommerce a.button,
					.buttons_border.woocommerce a.button,
					.buttons_border td.actions .coupon .button, 											
					.buttons_border.woocommerce .widget_price_filter .price_slider_amount .button, 	
					.buttons_border .wc-proceed-to-checkout .checkout-button.button, 				
					.buttons_border.woocommerce button.button.alt, 									
					.buttons_border.woocommerce #respond input#submit,
					.buttons_border .widget_shopping_cart_content p.buttons .checkout,
					.buttons_border .formatting .woocommerce .return-to-shop a.button,
					.buttons_border .woocommerce button.button, 
					.buttons_border .woocommerce input.button';
$label_color_usual = '
					.buttons_solid .formatting input[type="submit"],
					.buttons_solid .formatting button,
					.buttons_solid .comment-respond input[type="submit"],
					.buttons_solid .post .read_more,

					.buttons_border .formatting input[type="submit"],
					.buttons_border .formatting button,
					.buttons_border .comment-respond input[type="submit"],
					.buttons_border .post .read_more';
Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_buttons_text',
	'label'       => __( 'Buttons label', 'sixty' ),
	'section'     => 'sixty_buttons_colors',
	'alpha'       => true,
	'default'	  => '#fff',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => (class_exists('WooCommerce') ? $label_color_usual . $label_color_shop : $label_color_usual),
				'function' => 'css',
				'property' => 'color',
			)
		),
	'output'	  => array(
			array(
				'element'  => (class_exists('WooCommerce') ? $label_color_usual . $label_color_shop : $label_color_usual),
				'property' => 'color',
			)
		)
) );

$background_shop_background = ',
	.buttons_solid .woocommerce a.button, 											.buttons_border .woocommerce a.button:hover,
	.buttons_solid.woocommerce a.button, 											.buttons_border.woocommerce a.button:hover,
	.buttons_solid.woocommerce .widget_price_filter .price_slider_amount .button, 	.buttons_border.woocommerce .widget_price_filter .price_slider_amount .button:hover,
	.buttons_solid .wc-proceed-to-checkout .checkout-button.button, 				.buttons_border .wc-proceed-to-checkout .checkout-button.button:hover,
	.buttons_solid.woocommerce button.button.alt, 									.buttons_border.woocommerce button.button.alt:hover,
	.buttons_solid.woocommerce #respond input#submit, 								.buttons_border.woocommerce #respond input#submit:hover,
	.buttons_solid .widget_shopping_cart_content p.buttons .checkout,				.buttons_border .widget_shopping_cart_content p.buttons .checkout:hover,
	.buttons_solid .formatting .woocommerce .return-to-shop a.button,				.buttons_border .formatting .woocommerce .return-to-shop a.button:hover,
	.buttons_solid .woocommerce button.button, 										.buttons_border .woocommerce button.button:hover,
	.buttons_solid .woocommerce input.button,										.buttons_border .woocommerce input.button:hover
							';
$background_shop_border = ',
	.buttons_solid .woocommerce a.button:hover, 											.buttons_border .woocommerce a.button,
	.buttons_solid.woocommerce a.button:hover, 												.buttons_border.woocommerce a.button,
	.buttons_solid.woocommerce .widget_price_filter .price_slider_amount .button:hover, 	.buttons_border.woocommerce .widget_price_filter .price_slider_amount .button,
	.buttons_solid .wc-proceed-to-checkout .checkout-button.button:hover, 					.buttons_border .wc-proceed-to-checkout .checkout-button.button,
	.buttons_solid.woocommerce button.button.alt:hover, 									.buttons_border.woocommerce button.button.alt,
	.buttons_solid.woocommerce #respond input#submit:hover, 								.buttons_border.woocommerce #respond input#submit,
	.buttons_solid .widget_shopping_cart_content p.buttons .checkout:hover,					.buttons_border .widget_shopping_cart_content p.buttons .checkout,
	.buttons_solid .formatting .woocommerce .return-to-shop a.button,						.buttons_border .formatting .woocommerce .return-to-shop a.button,
	.buttons_solid .woocommerce button.button,												.buttons_border .woocommerce button.button,
	.buttons_solid .woocommerce input.button,												.buttons_border .woocommerce input.button
							';
$background_shop_color = '
	.buttons_solid .woocommerce a.button:hover,
	.buttons_solid.woocommerce a.button:hover,
	.buttons_solid.woocommerce .widget_price_filter .price_slider_amount .button:hover,
	.buttons_solid .wc-proceed-to-checkout .checkout-button.button:hover,
	.buttons_solid.woocommerce button.button.alt:hover,					
	.buttons_solid.woocommerce #respond input#submit:hover,
	.buttons_solid .widget_shopping_cart_content p.buttons .checkout:hover,
	.buttons_solid .formatting .woocommerce .return-to-shop a.button:hover,
	.buttons_solid .woocommerce input.button:hover,
	.buttons_solid .woocommerce button.button,

	.buttons_solid  div.col-md-2 > div > div.widget_shopping_cart_content > p.buttons > a:nth-child(1),
	.buttons_border  div.col-md-2 > div > div.widget_shopping_cart_content > p.buttons > a:nth-child(1),
	.buttons_solid .widget_shopping_cart_content p.buttons .button:first-of-type,
	.buttons_border .widget_shopping_cart_content p.buttons .button:first-of-type ';

$background_usual_background = '
	.buttons_solid .read_more, 								.buttons_border .read_more:hover,
	.buttons_solid .formatting input[type="submit"], 		.buttons_border .formatting input[type="submit"]:hover,
	.buttons_solid .formatting button, 						.buttons_border .formatting button:hover,
	.buttons_solid .comment-respond input[type="submit"], 	.buttons_border .comment-respond input[type="submit"]:hover
								';
$background_usual_border = '
	.buttons_solid .read_more:hover, 							.buttons_border .read_more,
	.buttons_solid .formatting input[type="submit"]:hover, 		.buttons_border .formatting input[type="submit"],
	.buttons_solid .formatting button:hover, 					.buttons_border .formatting button,
	.buttons_solid .comment-respond input[type="submit"]:hover, .buttons_border .comment-respond input[type="submit"]
								';
$background_usual_color = '
	.buttons_solid .read_more:hover,
	.buttons_solid .formatting input[type="submit"]:hover,
	.buttons_solid .formatting button:hover,
	.buttons_solid .comment-respond input[type="submit"]:hover
	';

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_buttons_background',
	'label'       => __( 'Buttons background / border', 'sixty' ),
	'section'     => 'sixty_buttons_colors',
	'alpha'       => true,
	'default'	  => '#f96c5a',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => (class_exists('WooCommerce') ? $background_usual_background . $background_shop_background : $background_usual_background),
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => (class_exists('WooCommerce') ? $background_usual_border . $background_shop_border : $background_usual_border),
				'function' => 'css',
				'property' => 'border-color',
			),
			array(
				'element'  => (class_exists('WooCommerce') ? $background_usual_color . $background_shop_color : $background_usual_color),
				'function' => 'css',
				'property' => 'color',
			),
		),
	'output'	  => array(
			array(
				'element'  => (class_exists('WooCommerce') ? $background_usual_background . $background_shop_background : $background_usual_background),
				'property' => 'background-color',
			),
			array(
				'element'  => (class_exists('WooCommerce') ? $background_usual_border . $background_shop_border : $background_usual_border),
				'property' => 'border-color',
			),
			array(
				'element'  => (class_exists('WooCommerce') ? $background_usual_color . $background_shop_color : $background_usual_color),
				'property' => 'color',
			),
		)
) );