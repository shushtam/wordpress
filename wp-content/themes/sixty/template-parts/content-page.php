<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sixty
 */

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<?php 

	sixty_the_post_thumbnail();

	?>

	<div class="post_content">
		<?php 

		/**
		 * Display category
		 */
		$categories = get_the_category();
		if( !empty($categories) ) {
			echo '<a href="'. esc_url( get_category_link($categories[0]->term_id) ) .'" class="category">'. esc_html( $categories[0]->name ) .'</a>';
		}

		/**
		 * Display page title, if is not single also display the permalink
		 */
		the_title( '<h2 class="entry-title">', '</h2>' );

		/**
		 * Display excerpt only in loops
		 */
		echo '<div class="formatting">';
			the_content();
		echo '</div><!-- / .formatting -->';

		
		?>
		
	</div><!-- / .post_content -->
</div>