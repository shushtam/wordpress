<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sixty
 */

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

?>

<div class="post">
	<div class="post_content">
		<h2 class="entry-title"><?php esc_html_e( 'Nothing Found', 'sixty' ); ?></h2>
		<div class="formatting">
		<?php		

		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'sixty' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sixty' ); ?></p>
			<?php
				get_search_form();
		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sixty' ); ?></p>
			<?php
				get_search_form();
		endif; 
		?>	
		</div><!-- / .formatting -->
	</div><!-- / .post_content -->

</div><!-- / .post -->

