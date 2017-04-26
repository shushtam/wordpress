<?php

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('post loop'); ?>>
	<?php 

	sixty_the_post_thumbnail();

	?>

	<div class="post_content">
		<?php 

		/**
		 * Display excerpt only in loops
		 */
		echo '<div class="formatting">';
			the_content();
		echo '</div><!-- / .formatting -->';


		?>
		
	</div><!-- / .post_content -->
</div>