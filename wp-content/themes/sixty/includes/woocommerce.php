<?php

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
 * Add next/prev labels on navigation
 */
function sixty_woocommerce_navigation_labels($args) {
	$edit = $args;

	$edit['prev_text'] = '&larr; ' . __( 'Prev', 'sixty' );
	$edit['next_text'] = __( 'Next', 'sixty' ) . ' &rarr;';

	return $edit;
}
add_filter( 'woocommerce_pagination_args', 'sixty_woocommerce_navigation_labels' );

/**
 * Add WC navigation
 */
function sixty_add_woocommerce_navigation($menus) {
	if( class_exists('WooCommerce') ) {
		$menus['woocommerce_profile'] = __( 'WooCommerce profile menu', 'sixty' );
		return $menus;
	} else {
		return $menus;
	}

}
add_filter('sixty_navigation', 'sixty_add_woocommerce_navigation');

/**
 * Remove navigation from account page, it is available on header now
 */
remove_action('woocommerce_account_navigation', 'woocommerce_account_navigation');

/**
 * WooCoommerce Hooks
 */

// Change order of hooks in product summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 11 );

// Move related products outside of main content wrapper
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 10 );

// Change review order in comments listing
remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
add_action( 'woocommerce_review_meta', 'woocommerce_review_display_rating', 20 );
