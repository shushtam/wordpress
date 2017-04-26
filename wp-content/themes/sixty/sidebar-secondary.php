<?php 
/**
 * The sidebar containing the second widget area.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#sidebar-php
 *
 * @package sixty
 */
// one-column - null
// two-column-default - null
// two-column-reversed - sidebar 1
// three-column-default - null
// three-column-center - sidebar 1
// three-column- reversed - sidebar 1, sidebar 2

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

$layout = sixty_get_single_layout_type();

if( $layout == 'one-column' or 
	$layout == 'two-column-default' or
	$layout == 'three-column-default' )
	return;

// Alter sidebar ID if WC is installed
if( class_exists( 'WooCommerce' ) ) {
	$sidebar_one = 'sidebar_woocommerce';
	$sidebar_two = 'sidebar_woocommerce';
} else {
	$sidebar_one = 'sidebar_one';
	$sidebar_two = 'sidebar_two';
}

if( $layout == 'two-column-reversed' ) {

	if( is_active_sidebar($sidebar_one) ) : ?>
		<div class="<?php sixty_the_layout_type_class('sidebar'); ?>" id="sidebar_secondary">
			<?php dynamic_sidebar( $sidebar_one ); ?>
		</div><!-- / .col-md-4 -->
	<?php else:

		sixty_the_empty_sidebar();

	endif;

} elseif( $layout == 'three-column-center' ) {

	if( is_active_sidebar($sidebar_one) ) : ?>
		<div class="<?php sixty_the_layout_type_class('sidebar'); ?>" id="sidebar_secondary">
			<?php dynamic_sidebar( $sidebar_one ); ?>
		</div><!-- / .col-md-4 -->
	<?php else:

		sixty_the_empty_sidebar();

	endif;
} elseif( $layout == 'three-column-reversed' ) {

	if( is_active_sidebar($sidebar_one) ) : ?>
		<div class="<?php sixty_the_layout_type_class('sidebar'); ?>" id="sidebar_secondary">
			<?php dynamic_sidebar( $sidebar_one ); ?>
		</div><!-- / .col-md-4 -->
	<?php else:

		sixty_the_empty_sidebar();

	endif;

	if( is_active_sidebar($sidebar_two ) ) : ?>
		<div class="<?php sixty_the_layout_type_class('sidebar'); ?>" id="sidebar_secondary">
			<?php dynamic_sidebar( $sidebar_two  ); ?>
		</div><!-- / .col-md-4 -->
	<?php else:

		sixty_the_empty_sidebar();

	endif;
}
