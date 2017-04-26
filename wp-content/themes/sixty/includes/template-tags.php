<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @since v1.0.0
 * @package sixty
 */

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly


if ( ! function_exists( 'sixty_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function sixty_posted_on() {

		// Generate time string
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		// Apply time string
		$posted_on = sprintf( '<i class="fa fa-clock-o"></i> %s', $time_string );

		// Author
		$byline = sprintf( '<i class="fa fa-user"></i> %s',
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		$comments_link = ( get_comments_number() > 0 ? get_permalink() . '#comments' : get_permalink() . '#respond' );
		$comments = '<i class="fa fa-comments"></i>' . sprintf( '<a href="'. esc_url( $comments_link ) .'">'. _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'sixty' ) .'</a>', number_format_i18n( get_comments_number() ) );

		echo '<div class="post-meta">';

		do_action( 'sixty_before_postmeta' );
		
			echo '<span class="posted-on">'. $posted_on .'</span><span class="byline"> '. $byline .'</span><span class="comments"> '. $comments .'</span>';

		do_action( 'sixty_after_postmeta' );

		echo '</div><!-- / .post-meta -->'; // WPCS: XSS OK.
	}
endif;

/**
 * Get formatted logo
 *
 * @since v1.0.0
 */
function sixty_get_logo() {

	do_action( 'sixty_before_logo' );

	// Default logo, created from blog name and description
	$default = apply_filters( 'sixty_header_logo_default' ,'<a href="' . esc_url( get_home_url( '/' ) ) . '" title="' . get_bloginfo('name') . '" class="header-logo-default" itemprop="url">
			<h1>' . get_bloginfo('name') . '</h1>
			<h2>' . get_bloginfo('description') . '</h2>
		</a><!-- /#logo  -->' );

	// Display logo
	if(get_custom_logo()) {
		the_custom_logo();
	} else {
		if( "blank" != get_theme_mod('header_textcolor') ) {
			echo $default;
		}
	}

	do_action( 'sixty_after_logo' );
}

/**
 *  Return requested header part
 *
 * @param id - string, header part file name, without extension and header- prefix
 * @since v1.0.0
 */
function sixty_the_header_part($id = 'default') {

	// Deliver header layout selected in customize
	$id = ( $id == 'default' ? get_theme_mod( 'sixty_header_layout', 'default' ) : $id );

	// Create header class
	$class = apply_filters( 'sixty_header_class', 'header_part' );

	// Build header return with custom ID
	echo '<header id="header_part_'. esc_attr( $id ) .'" class="'. esc_attr( $class ) .'"' .(get_header_image() ? 'style="background-image: url('. get_header_image() .');"' : '') .'>';
	echo get_template_part( 'template-parts/headers/header', $id );
	echo '</header>';
}

/**
 * Get all available header layouts
 *
 * @since v1.0.0
 * @return array - of available header layouts
 */
function sixty_get_header_layouts($icons = false) {
	$array = array();

    $dir = get_template_directory() . "/" . apply_filters( 'sixty_header_layouts_dir', 'template-parts/headers' ) . "/*";
    $files = glob($dir);

    if( !empty($files) ) {
	    foreach(glob($dir) as $file) {
	        if(!is_dir($file)) { 

	        	// Build file ID
	        	$file_id = str_replace('header-', '', substr(basename($file), 0, strpos(basename($file), ".")));

	        	// Build file name/icon
	        	if($icons) {
	        		$file_name = get_template_directory_uri() . '/'. apply_filters( 'sixty_header_layouts_icons_dir', 'assets/images/core/headers' ) .'/'. $file_id .'.png';
	        	} else {
	        		$file_name = ucfirst($file_id);
	        	}

	        	// Update array
	        	$array[$file_id] = $file_name;
	        }
	    }
    	
    	return $array;
    } else {
    	return new \WP_Error( 'no_header_layouts', __( 'No header layouts found or directory path is incorrect', 'sixty' ) );
    }
}

if( !function_exists('sixty_the_post_thumbnail') ):

	/**
	 * Display the post thumbnail in loop and single pages
	 *
	 * @since v1.0.0
	 */
	function sixty_the_post_thumbnail() {
		if( has_post_thumbnail() ) {
			echo '<div class="featured_image">';

				if( !is_single() ) {
					echo '<a href="'. esc_url(get_permalink()) .'">'. get_the_post_thumbnail( get_the_ID(), 'sixty_thumbnail' ) .'</a>';
				} else {
					the_post_thumbnail( get_the_ID(), 'sixty_thumbnail' );
				}

				do_action( 'sixty_inside_post_thumbnail' );
			echo '</div><!-- / .featured_image -->';

			do_action( 'sixty_after_post_thumbnail' );
		}
	}

endif;

if( !function_exists('sixty_the_pagination') ):

	/**
	 * Display posts navigation on single pages
	 *
	 * @since v1.0.0
	 */
	function sixty_the_pagination() {

		// Limit title strip based on selected layout
		$layout = sixty_get_single_layout_type();
		$title_strip = 28;
		if( $layout == "three-column-reversed" or
			$layout == "three-column-center" or
			$layout == "three-column-default" ) {

			$title_strip = 20;
		}

		do_action( 'sixty_before_posts_navigation' );

		echo '<div class="single_navigation">';

		$previous_post = get_previous_post();
		if ( $previous_post ) {
			echo '<a class="left" href="'.esc_url(get_permalink( $previous_post->ID )).'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path id="arrow-25" class="cls-1" d="M19,21l-3.057,3L4,12,15.943,0,19,3l-9,9Z"/></svg>';

			if( strlen($previous_post->post_title) > $title_strip ) {
				echo esc_html(substr($previous_post->post_title, 0, $title_strip)) . '...';
			} else {
				echo esc_html($previous_post->post_title);
			}
			
			echo '</a>'; 
		}

		$next_post = get_next_post();
		if ( $next_post ) {
			echo '<a class="right" href="'.esc_url(get_permalink( $next_post->ID )).'">';

			if( strlen($next_post->post_title) > $title_strip ) {
				echo esc_html(substr($next_post->post_title, 0, $title_strip)) . '...';
			} else {
				echo esc_html($next_post->post_title);
			}

			echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg></a>'; 
		}

		do_action( 'sixty_inside_post_navigation' );
		
		echo '</div>';

		do_action( 'sixty_after_posts_navigation' );
	}

endif;

if( !function_exists('sixty_the_posts_navigation') ):

	/**
	 * Display the navigation for archives pages
	 *
	 * @since v1.0.0
	 */
	function sixty_the_posts_navigation() {

		if(is_rtl()) {

			$next = __( 'Newer posts', 'sixty' ) . '<svg id="iconmonstr" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path id="arrow-25" class="cls-1" d="M19,21l-3.057,3L4,12,15.943,0,19,3l-9,9Z"/>';
			$prev = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg>' . __( 'Older posts', 'sixty' );
			
		} else {
			$next = __( 'Newer posts', 'sixty' ) . '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg>';
			$prev = '<svg id="iconmonstr" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path id="arrow-25" class="cls-1" d="M19,21l-3.057,3L4,12,15.943,0,19,3l-9,9Z"/></svg>' . __( 'Older posts', 'sixty' );
		}


		the_posts_navigation(array(
				'next_text' => $next,
				'prev_text' => $prev,
				));
	}

endif;

if( !function_exists('sixty_responsive_navigation') ):

	/**
	 * Print the responsive menu
	 */
	function sixty_responsive_navigation() {
		do_action('sixty_before_responsive_menu');

		printf( '<span class="responsive_menu_icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg><span class="opened">%s</span><span class="closed">%s</span></span>', __( 'Close Menu', 'sixty' ), __( 'Open Menu', 'sixty' ) );
	}
endif;

if( !function_exists( 'sixty_the_wc_header_cart' ) ):

	function sixty_the_wc_header_cart() {
		$return = '<div class="col-md-2"><div class="header_wooc_cart">';

		$return .= '<div class="cart_total"><i class="fa fa-shopping-cart" aria-hidden="true"></i>'. wp_kses_post(WC()->cart->get_cart_total()) .' ('. absint(WC()->cart->get_cart_contents_count()) .')</div>';

		$return .= '<div class="widget_shopping_cart_content"></div></div></div>';

		echo $return;

	}

endif;

if( !function_exists( 'sixty_the_wc_header_profile' ) ):

	function sixty_the_wc_header_profile() {
		if ( is_user_logged_in() ) {
			$menu_location = 'woocommerce_profile';

		
			echo '<div class="header_wooc_profile_wrapper"><div class="header_wooc_profile">
				<svg id="iconmonstr" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path id="arrow-25" class="cls-1" d="M21,5l3,3.057L12,20,0,8.057,3,5l9,9Z"/></svg>';

				// Echo menu
				if(sixty_is_menu_active($menu_location)) {
					wp_nav_menu( array(
						'theme_location' => $menu_location, 
						'container' => '',
						'depth'	=> 1
					) );
				} else {
					echo '<ul>';

					foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
					<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
						<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
					</li>
				<?php endforeach; 

					echo '</ul>';
				}

				echo '</div><!--/header_wooc_profile-->';

				echo '<span class="name">';
			    $current_user = wp_get_current_user();
			    if( empty($current_user->user_firstname) and empty($current_user->user_lastname) ) {
			    	echo $current_user->display_name;
			    } else {
			    	echo $current_user->user_firstname . ' ' . $current_user->user_lastname;
			    }
				

				echo '</span><span class="avatar">';
					echo	get_avatar($current_user->ID, '20');
				echo '</span><!--/avatar-->';
			echo '</div><!--/header_wooc_profile_wrapper-->';
		}
	}

endif;

if( !function_exists('sixty_the_empty_sidebar') ):

	/**
	 * Echo the empty sidebar widget
	 *
	 * @since v1.0.0
	 */
	function sixty_the_empty_sidebar() {
		printf('<div class="%s"><div class="widget"><div class="widget_title">%s</div>%s <a href="%s">%s</a></div></div>', sixty_get_layout_type_class('sidebar'), __( 'Empty Sidebar', 'sixty' ), 
		__( 'You haven\'t added any widgets to your sidebar. You can add widgets by going to: ', 'sixty' ), admin_url( '/customize.php?autofocus[panel]=widgets' ), __( 'Appearance > Customize > Widgets', 'sixty' ) );
	}

endif;