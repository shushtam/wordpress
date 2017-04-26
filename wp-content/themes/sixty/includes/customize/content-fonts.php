<?php

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

$primary_shop = ',.woocommerce .summary p,.product-single-wrapper div.product .woocommerce-tabs .panel p, .woocommerce #reviews #comments ol.commentlist li .comment-text p, .woocommerce table.shop_attributes, .amount, .woocommerce ul.products li.product .button,.woocommerce div.product form.cart .button,.woocommerce #review_form_wrapper #commentform .form-submit input';
$primary_usual = '.formatting a, .formatting, .widget, .excerpt, #main_footer, .post_content .category, .read_more, .nav-links a, .single_navigation a, .formatting button, input, textarea';
Kirki::add_field( 'sixty_customize', array(
	'type'        => 'typography',
	'settings'    => 'sixty_fonts_primary',
	'label'       => esc_attr__( 'Primary font', 'sixty' ),
	'description' => esc_attr__( 'Paragraphs, buttons, post navigation and content formatting.', 'sixty' ),
	'section'     => 'sixty_content_fonts',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
	),
	'output'      => array(
		array(
			'element' => ( class_exists('WooCommerce') ? $primary_usual . $primary_shop : $primary_usual ),
		)
	),
) );

$secondary_shop = ',.woocommerce div.product form.cart .variations td.label, .woocommerce div.product .woocommerce-tabs ul.tabs li a,.woocommerce_breadcrumb, .product_meta, .woocommerce-result-count,.woocommerce-review-link';
$secondary_usual = '.comment-meta .meta_right, .comment-meta .meta_right a, .comment-edit-link, .post-meta, .post-meta a, label, .logged-in-as';
Kirki::add_field( 'sixty_customize', array(
	'type'        => 'typography',
	'settings'    => 'sixty_fonts_secondary',
	'label'       => esc_attr__( 'Secondary font', 'sixty' ),
	'description' => esc_attr__( 'Post meta, paginated posts, reply link and bylines.', 'sixty' ),
	'section'     => 'sixty_content_fonts',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
	),
	'output'      => array(
		array(
			'element' => ( class_exists('WooCommerce') ? $secondary_usual . $secondary_shop : $secondary_usual ),
		)
	),
) );

$headings_shop = ',.woocommerce #reviews #comments h2,.woocommerce div.product .product_title,.woocommerce ul.products li.product h3, .upsells h2,.product-single-wrapper h1.page-title,.product-single-wrapper div.product .woocommerce-tabs .panel h2, .woocommerce table.shop_attributes th';
$headings_usual = '.formatting table th, .entry-title a, .entry-title, .widget .widget_title, #reply-title, #comments > h2, .formatting h1, .formatting h2, .formatting h3, .formatting h4,.formatting h5, .formatting h6, .archive_title h1';
Kirki::add_field( 'sixty_customize', array(
	'type'        => 'typography',
	'settings'    => 'sixty_fonts_headings',
	'label'       => esc_attr__( 'Headings', 'sixty' ),
	'description' => esc_attr__( 'Post title, comment headings, archive page title, content headings, widget titles and table headers.', 'sixty' ),
	'section'     => 'sixty_content_fonts',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
	),
	'output'      => array(
		array(
			'element' => ( class_exists('WooCommerce') ? $headings_usual . $headings_shop : $headings_usual ),
		)
	),
) );
