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
get_header(); ?>

<div class="<?php echo sixty_get_layout_style(); ?>" id="main_container">
	<div class="row">
		<?php do_action( 'sixty_before_content' ); ?>
		<div class="col-md-8 col-sm-12 col-xs-12">
		<?php 

		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			sixty_the_posts_navigation();
			
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; 

		?>
		</div><!-- / .col-md-8 -->
		
		<?php 

		// Display sidebar
		get_sidebar(); 

		do_action( 'sixty_after_content' );
		
		?>
	</div><!-- / .row -->
</div><!-- / .container -->
<?php get_footer(); ?>
