<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sixty
 */

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly
?>

<footer id="main_footer">
	<div class="container-fluid">
		<div class="row">
			<?php 

				do_action( 'sixty_before_footer' );

				// Site title
				if(get_bloginfo('name')) {
					printf( '<div class="site-title">%s</div>', get_bloginfo('name') );
				}

				// Copyright
				printf( '<p>' . __( 'Copyright &copy %1$s. All rights reserved. </br> Designed by %2$s', 'sixty' ) . '</p>',
				        get_bloginfo( 'name' ),
				        '<a href="http://www.wp60.com" target="_blank" rel="nofollow">WP60</a>'
				);

				do_action( 'sixty_after_content' );
			?>
		</div><!-- / .row -->
	</div><!-- / .container-fluid -->
</footer>

<?php wp_footer(); ?>

</body>
</html>