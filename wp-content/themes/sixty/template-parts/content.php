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
		if( is_singular() ) {
			the_title( '<h2 class="entry-title">', '</h2>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h2>' );
		}

		/**
		 * Display post meta only for posts
		 */
		if ( 'post' === get_post_type() ) : 
			sixty_posted_on(); 
		endif;

		/**
		 * Display excerpt only in loops
		 */
			if( is_singular() ) {
				echo '<div class="formatting">';
					the_content();
				echo '</div><!-- / .formatting -->';
			} else {
				echo '<div class="formatting excerpt">';
					the_excerpt();
				echo '</div><!-- / .formatting -->';
			}

		/**
		 * Display continue reading button
		 */
		if( !is_singular() ) {
			echo '<a href="'. esc_url( get_permalink() ) .'" class="read_more">'. __( 'Continue reading', 'sixty' ) .'</a>';
		}

		if( is_singular() && get_the_tags() ) {
			echo '<p class="tags">';
				the_tags();
			echo '</p>';
		}

		?>
		
	</div><!-- / .post_content -->

	<?php
		if(is_singular()) {
			wp_link_pages( (array) apply_filters( 'sixty_wp_link_pages', array(
				'before'           => '<p class="paginated_post"><b class="title">' . __( 'Post page ', 'sixty' ) . '</b>',
				'after'            => '</p>',
				'separator'		   => '',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) ) );
		}
	?>
</div>