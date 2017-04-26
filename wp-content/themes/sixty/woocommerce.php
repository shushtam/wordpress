<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sixty
 */
get_header();?>

<div class="<?php echo sixty_get_layout_style(); ?>" id="main_container">
	<div class="row">
		<?php 
		
		// Get secound sidebar, for child themes only ( if they filter the layout settings )
		get_sidebar('secondary'); 

		// Hook something here
		do_action( 'sixty_before_wc_content' ); 

		?>
		<div class="<?php sixty_the_layout_type_class(); ?> product-single-wrapper">
			<?php 

			// Display breadcrumbs only for single post
			if(is_singular('product')) {
				woocommerce_breadcrumb( (array)apply_filters('sixty_wc_breadcrumb_args', array(
						'delimiter'		=> ' / ',
						'wrap_before' 	=> '<div class="row breadcrumb_row"><div class="woocommerce_breadcrumb col-md-12">',
						'wrap_after' 	=> '</div></div>',
						'home'			=> __('Home', 'sixty')
					)));
			}
			
			// Dispaly WC content
			woocommerce_content(); 

			?>
		</div><!-- / .col-md-8 -->
		
		<?php 

		get_sidebar(); 

		do_action( 'sixty_after_wc_content' );

		?>
	</div><!-- / .row -->
</div><!-- / .container -->
<?php get_footer(); ?>