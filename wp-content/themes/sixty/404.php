<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sixty
 */

get_header(); ?>

<div class="<?php echo sixty_get_layout_style(); ?>" id="main_container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-offset-2 col-sm-8 col-xs-12 error_page">
			<div class="formatting">
				<?php do_action( 'sixty_before_404' ); ?>
				<h2><?php _e( '404 - Nothing found', 'sixty' ); ?></h2>
				<a href="<?php echo esc_url(home_url('/')); ?>"><?php _e( 'View home page', 'sixty' ); ?></a> <?php _e( 'or search for something else:', 'sixty' ); ?> </br> </br>
				<?php 

				// Display search form
				get_search_form(); 

				do_action( 'sixty_after_404' );
				?>
			</div><!-- / .formatting -->
		</div><!-- / .col-md-12 -->
	</div><!-- / .row -->
</div><!-- / .container -->
<?php get_footer(); ?>
