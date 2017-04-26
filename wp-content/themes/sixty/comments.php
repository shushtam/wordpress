<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sixty
 */

 /*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;

/**
 * If comments exists, display the comments list
 */
if( have_comments() ):

do_action( 'sixty_comments' );

?>
<div id="comments">
	<h2>
		<?php
			printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', 'sixty' ), number_format_i18n( get_comments_number() ));
		?>
	</h2>
	<ol class="comments-list">
		<?php

			wp_list_comments( array(
				'max_depth'   => '3',
				'avatar_size' => 48,
				'walker' => new sixty_Comment_Walker()
			) );

			echo '<div class="single_navigation">';
				paginate_comments_links();
			echo '</div>';

		?>
	</ol><!-- / .comments-list -->
	<?php 

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sixty' ); ?></p>
	<?php endif; ?>

</div><!-- /#comments  -->

<?php endif; //have_comments() ?>
<?php 

do_action( 'sixty_before_comments_form' );

comment_form(); 

do_action( 'sixty_after_comments_form' );

?>
