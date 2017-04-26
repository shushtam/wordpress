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

		get_sidebar('secondary'); 

		do_action( 'sixty_before_content' ); ?>
		<div class="<?php sixty_the_layout_type_class(); ?>">

		<?php

		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
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