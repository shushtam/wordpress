<?php

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

?>
<div class="<?php echo sixty_get_layout_style(). ' ' . esc_attr(get_theme_mod('sixty_header_size_field', 'large')); ?>">
	<div class="row">
		<div class="col-md-12">
			<?php 

			// Display logo
			sixty_get_logo(); 

			// Display header details if logo exists
			if(get_custom_logo() and "blank" != get_theme_mod('header_textcolor') ) {

				// Display site title
				if(get_bloginfo('name')) {
					echo sprintf( '<h1>%s</h1>', get_bloginfo('name') );
				}

				// Display site description
				if(get_bloginfo('description')) {
					echo sprintf( '<h2>%s</h2>', get_bloginfo('description') );
				}
			}

			// Diplay WC profile menu
			if(class_exists('WooCommerce')) {
				sixty_the_wc_header_profile();
			}

			?>
		</div><!-- / .col-md-12 -->
	</div><!-- / .row -->
</div><!-- / .container -->

<?php 
	
/**
 * Display navigation
 */
$menu_location = 'primary';
			
if(sixty_is_menu_active($menu_location)):

?>
<div class="container-fluid default-navigation">
	<?php 

	// If is container fluid, hide this div
	if( "container-fluid" != sixty_get_layout_style() ) {
		echo '<div class="container">';
	}

	?>
		<div class="row">
			<div class="<?php echo (class_exists('WooCommerce') ? 'col-md-10 col-xs-5 col-sm-5' : 'col-md-12'); ?>">

			<?php
			
			// Display responsive navigation open icon
			sixty_responsive_navigation();

			// Display navigation
			wp_nav_menu( array(
				'theme_location' => $menu_location, 
				'container' => '',
				'menu_class' => 'nav nav-pills'
			) );

			?>
			</div><!-- / .col-md-10 or col-md-12-->

			
			<?php
				if(class_exists('WooCommerce')) {

					sixty_the_wc_header_cart();
				}
			?>
		</div><!-- / .row -->

		<?php

		// If is container fluid, hide this div
		if( "container-fluid" != sixty_get_layout_style() ) {
			echo '</div>';
		}
		?>
	</div><!-- / .container -->
</div><!-- / .container-fluid default-navigation -->

<?php
endif;
