<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sixty
 */
get_header(); ?>

<div class="<?php echo sixty_get_layout_style(); ?>" id="main_container">
	<div class="row">
		<?php 
		
		get_sidebar('secondary'); 

		do_action( 'sixty_before_content' ); ?>
		<div class="<?php sixty_the_layout_type_class(); ?>">

		<?php

			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content' );

				sixty_the_pagination();
				
				comments_template();
			endwhile; // End of the loop.
		?>

		</div><!-- / .col-md-8 -->
		
		<?php 

		get_sidebar(); 

		do_action( 'sixty_after_content' );
		
		?>
	</div><!-- / .row -->
</div><!-- / .container -->
<?php get_footer(); ?>
