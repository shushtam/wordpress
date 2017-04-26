<?php 
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#sidebar-php
 *
 * @package sixty
 */
// one-column - null
// two-column-default - sidebar 1
// two-column-reversed - null
// three-column-default - sidebar 1, sidebar 2
// three-column-center - sidebar 2
// three-column-reversed - null 

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

$layout = sixty_get_single_layout_type();

if( $layout == 'one-column' or 
	$layout == 'two-column-reversed' or
	$layout == 'three-column-reversed' )
	return;

// Alter sidebar ID if WC is installed
if( class_exists( 'WooCommerce' ) ) {
	$sidebar_one = 'sidebar_woocommerce';
} else {
	$sidebar_one = 'sidebar_one';
}

do_action('sixty_before_sidebar');

// Display sidebars according to layouts
if( $layout == 'three-column-default' ) {
	if( is_active_sidebar($sidebar_one) ) : ?>
		<div class="<?php sixty_the_layout_type_class('sidebar'); ?>" id="sidebar">
			<?php dynamic_sidebar( $sidebar_one ); ?>
		</div><!-- / .col-md-4 -->
	<?php else:

		sixty_the_empty_sidebar();

	endif;

	if( is_active_sidebar('sidebar_two') ) : ?>
		<div class="<?php sixty_the_layout_type_class('sidebar'); ?>" id="sidebar">
			<?php dynamic_sidebar( 'sidebar_two' ); ?>
		</div><!-- / .col-md-4 -->
	<?php else:

		sixty_the_empty_sidebar();

	endif;
} elseif( $layout == 'three-column-center' ) {
	if( is_active_sidebar('sidebar_two') ) : ?>
		<div class="<?php sixty_the_layout_type_class('sidebar'); ?>" id="sidebar">
			<?php dynamic_sidebar( 'sidebar_two' ); ?>
		</div><!-- / .col-md-4 -->
	<?php else:

		sixty_the_empty_sidebar();

	endif;
} else {
	if( is_active_sidebar($sidebar_one) ) : ?>
		<div class="<?php sixty_the_layout_type_class('sidebar'); ?>" id="sidebar">
			<?php dynamic_sidebar( $sidebar_one ); ?>
		</div><!-- / .col-md-4 -->
	<?php else:

		sixty_the_empty_sidebar();

	endif;
}

do_action('sixty_after_sidebar');

?>
