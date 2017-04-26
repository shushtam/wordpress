<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sixty
 */

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

	<?php echo sixty_get_first_video_embed($post->ID); ?>

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
		the_title( '<h2 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h2>' );

		/**
		 * Display post meta only for posts
		 */
		if ( 'post' === get_post_type() ) : 
			sixty_posted_on(); 
		endif;

		/**
		 * Display excerpt only in loops
		 */
		echo '<div class="formatting">';
			the_excerpt();
		echo '</div><!-- / .formatting -->';

		/**
		 * Display continue reading button
		 */
		echo '<a href="'. esc_url( get_permalink() ) .'" class="read_more">'. __( 'Continue reading', 'sixty' ) .'</a>';

		?>
		
	</div><!-- / .post_content -->
</div>