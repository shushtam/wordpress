<?php

if ( ! defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_content_content',
	'label'       => __( 'Content', 'sixty' ),
	'section'     => 'sixty_content_colors',
	'alpha'       => true,
	'default'	  => '#fff',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => '.post, .widget, #comments, .comment-respond,.product-single-wrapper div.product',
				'function' => 'css',
				'property' => 'background-color',
			)
		),
	'output'	  => array(
			array(
				'element'  => '.post, .widget, #comments, .comment-respond,.product-single-wrapper div.product',
				'property' => 'background-color',
			)
		)
) );

Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_content_page',
	'label'       => __( 'Page Background', 'sixty' ),
	'section'     => 'sixty_content_colors',
	'alpha'       => true,
	'default'	  => '#ebebeb',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => 'body, html, .widget_search .widget_title',
				'function' => 'css',
				'property' => 'background-color',
			)
		),
	'output'	  => array(
			array(
				'element'  => 'body, html, .widget_search .widget_title',
				'property' => 'background-color',
			)
		)
) );

$links_color_shop = ',.woocommerce-review-link,.group_table a,.product_meta a, .woocommerce nav.woocommerce-pagination ul li a.next, .woocommerce nav.woocommerce-pagination ul li a.prev';
$links_color_usual = '.formatting a, .widget a, .post .category, .post-meta a, .post .entry-title a:hover, .posts-navigation .nav-links>div a, .formatting ul li:before, .formatting code, .formatting kbd, .logged-in-as a, .single_navigation a,.formatting ol li:before';
$links_background_shop = ',.widget.widget_product_tag_cloud a,.woocommerce nav.woocommerce-pagination ul li span.current';
$links_background_usual = '.formatting ins,.widget.widget_tag_cloud a';
Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_content_links',
	'label'       => __( 'Links and Paginations links', 'sixty' ),
	'section'     => 'sixty_content_colors',
	'alpha'       => true,
	'default'	  => '#f96c5a',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => ( class_exists('WooCommerce') ? $links_color_usual . $links_color_shop : $links_color_usual ),
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element' => '.single_navigation svg, .posts-navigation .nav-links>div a svg',
				'function' => 'css',
				'property' => 'fill'
			),
			array(
				'element' => '.formatting blockquote, .post.sticky',
				'function' => 'css',
				'property' => 'border-color'
			),
			array(
				'element' => ( class_exists('WooCommerce') ? $links_background_usual . $links_background_shop : $links_background_usual ),
				'function' => 'css',
				'property' => 'background-color'
			)
		),
	'output'	  => array(
			array(
				'element'  => ( class_exists('WooCommerce') ? $links_color_usual . $links_color_shop : $links_color_usual ),
				'property' => 'color',
			),
			array(
				'element' => '.single_navigation svg, .posts-navigation .nav-links>div a svg',
				'property' => 'fill'
			),
			array(
				'element' => '.formatting blockquote, .post.sticky',
				'property' => 'border-color'
			),
			array(
				'element' => ( class_exists('WooCommerce') ? $links_background_usual . $links_background_shop : $links_background_usual ),
				'property' => 'background-color'
			)
		)
) );

$headings_shop = ',.woocommerce #reviews #comments h2,.woocommerce div.product .product_title,.woocommerce ul.products li.product h3, .upsells h2,.product-single-wrapper h1.page-title,.product-single-wrapper div.product .woocommerce-tabs .panel h2, .woocommerce table.shop_attributes th';
$headings_usual = '.formatting h1, .formatting h2, .formatting h3, .formatting h4, .formatting h5, .formatting h6,.post .entry-title a, .widget .widget_title, .post .entry-title,#reply-title, .archive_title h1';
Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_content_headings',
	'label'       => __( 'Headings', 'sixty' ),
	'section'     => 'sixty_content_colors',
	'alpha'       => true,
	'default'	  => '#1a1a1a',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => ( class_exists('WooCommerce') ? $headings_usual . $headings_shop : $headings_usual ),
				'function' => 'css',
				'property' => 'color',
			)
		),
	'output'	  => array(
			array(
				'element'  => ( class_exists('WooCommerce') ? $headings_usual . $headings_shop : $headings_usual ),
				'property' => 'color',
			)
		)
) );

$primary_text_shop = ',.woocommerce .summary p, .product-single-wrapper div.product .woocommerce-tabs .panel p, .woocommerce #reviews #comments ol.commentlist li .comment-text .description p, .header_wooc_profile_wrapper span.name';
$primary_text_usual = '.formatting, .widget, .formatting ul, .formatting ol';
Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_content_primary_text',
	'label'       => __( 'Primary Text', 'sixty' ),
	'section'     => 'sixty_content_colors',
	'alpha'       => true,
	'default'	  => '#595959',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => ( class_exists('WooCommerce') ? $primary_text_usual . $primary_text_shop : $primary_text_usual ),
				'function' => 'css',
				'property' => 'color',
			)
		),
	'output'	  => array(
			array(
				'element'  => ( class_exists('WooCommerce') ? $primary_text_usual . $primary_text_shop : $primary_text_usual ),
				'property' => 'color',
			)
		)
) );

$secondary_text_shop = ',.woocommerce_breadcrumb, .product_meta, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce #review_form_wrapper .comment-form-rating label,.woocommerce .woocommerce-result-count, .woocommerce ol.commentlist li .comment-text time';
$secondary_text_usual = '.comment-meta-item, .post-meta,.widget .post-date, .widget .rss-date, .post .tags';
Kirki::add_field( 'sixty_customize', array(
	'type'        => 'color',
	'settings'    => 'sixty_color_content_secondary_text',
	'label'       => __( 'Secondary Text', 'sixty' ),
	'section'     => 'sixty_content_colors',
	'alpha'       => true,
	'default'	  => '#333',
	'transport'	  => 'postMessage',
	'js_vars'	  => array(
			array(
				'element'  => ( class_exists('WooCommerce') ? $secondary_text_usual . $secondary_text_shop : $secondary_text_usual ),
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '.post-meta svg',
				'function' => 'css',
				'property' => 'fill',
			)
		),
	'output'	  => array(
			array(
				'element'  => ( class_exists('WooCommerce') ? $secondary_text_usual . $secondary_text_shop : $secondary_text_usual ),
				'property' => 'color',
			),
			array(
				'element'  => '.post-meta svg',
				'property' => 'fill',
			)
		)
) );
