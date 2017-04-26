<?php

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
		 * Display post meta only for posts
		 */
		if ( 'post' === get_post_type() ) : 

			// Generate time string
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			);

			// Apply time string
			$posted_on = sprintf( '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.848 12.459c.202.038.202.333.001.372-1.907.361-6.045 1.111-6.547 1.111-.719 0-1.301-.582-1.301-1.301 0-.512.77-5.447 1.125-7.445.034-.192.312-.181.343.014l.985 6.238 5.394 1.011z"/></svg> %s', $time_string );
		
			echo '<div class="post-meta"><span class="posted-on">'. $posted_on .'</span></div><!-- / .post-meta -->';

		endif;


		/**
		 * Display excerpt only in loops
		 */
		echo '<div class="formatting">';
			the_content();
		echo '</div><!-- / .formatting -->';


		?>
		
	</div><!-- / .post_content -->
</div>