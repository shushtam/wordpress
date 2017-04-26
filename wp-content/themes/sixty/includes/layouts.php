<?php
/**
 * Functions that help the theme manage the layout types
 *
 * @since v1.0.0
 * @package sixty
 */

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

// Actions and hooks
add_action( 'add_meta_boxes',  'sixty_layout_type_metabox' );
add_action( 'save_post', 'sixty_layout_type_metabox_save', 10, 3 );

/**
 * Register metabox
 *
 * @since v1.0.0
 */
function sixty_layout_type_metabox() {
	global $post;

	// Display the user only for users with the right permission
	if ( ! current_user_can( 'edit_post_meta', $post->ID ) || ! current_user_can( 'add_post_meta', $post->ID ) || ! current_user_can( 'delete_post_meta', $post->ID ) )
		return;

	add_meta_box('sixty_layouts_option', 'Layouts', 'sixty_layout_type_metabox_render', array('post', 'page', 'product'), 'side', 'default');
}

/**
 * Render metabox content
 *
 * @since v1.0.0
 */
function sixty_layout_type_metabox_render($post) {
	global $post;

	_e( 'Select your layout structure:', 'sixty' );

	// Get current selected layout
	$current_layout = get_post_meta( $post->ID, 'sixty_layouts_option', true );
	if ( ! $current_layout ) 
		$current_layout = sixt_get_default_layout_type();

	$layouts = sixty_get_available_layouts_types();
	$return = '<style>
	ul.custom_layout_metabox li:hover {opacity: 0.7; }
	ul.custom_layout_metabox li.active img {box-shadow: 0 0 8px 0 rgba(0, 115, 170, 0.7);}
	</style>';
	$return .= '<script>
	jQuery(window).ready(function() {
			jQuery("ul.custom_layout_metabox li").click(function() {
			jQuery("ul.custom_layout_metabox li").removeClass("active");
			jQuery(this).addClass("active");
		});
	});
	</script>';
	$return .= '<ul class="custom_layout_metabox" style="overflow: hidden; margin-bottom: 0;">';

	foreach ( $layouts as $layout => $details ) :

		$display = false;
		$default_display = array( 'post', 'page' );

		// Filter layouts per CPT
		if( !in_array($post->post_type, $default_display) ) {
			if( array_key_exists($post->post_type, $details) and $details[$post->post_type] ) {
				$display = true;
			}
		} else {
			$display = true;
		}

		// Get active class
		$class = '';
		if($current_layout == $layout) {
			$class = ' active';
		}

		// Display layout options
		if($display) {

			$return .= '<li style="float: left; margin: 5px;" class="'. esc_attr( $layout ) . $class .'">
					<label for="'. esc_attr( $layout ) .'">
						<input style="display: none;" type="radio" name="sixty_layouts_option"
						       id="'. esc_attr( $layout ) .'"
						       value="'. esc_attr( $layout ) .'"' .
							   checked( esc_attr($current_layout), $layout, false ) .' />
						
						<img src="'. get_template_directory_uri() .'/assets/icons/'. $layout .'.svg" alt="'. esc_html( $details['label'] ) .'" title="'. esc_html( $details['label'] ) .'" />
					</label>
				</li>';
		}

	endforeach; 

	$return .= '</ul>';

	echo $return;
}

/**
 * Save the metabox value
 *
 * @since v1.0.0
 */
function sixty_layout_type_metabox_save($post_id) {
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;

	$sixty_layouts_option = isset($_POST['sixty_layouts_option']) ? sixty_layout_sanitize_meta( $_POST['sixty_layouts_option'] ) : '';

	update_post_meta ($post_id, 'sixty_layouts_option', $sixty_layouts_option);
}

function sixty_layout_sanitize_meta( $layout ) {
        $layout  = sanitize_key( $layout );
        $layouts = sixty_get_available_layouts_types();
        $default = apply_filters( 'sixty_layout_sanitize_meta', sixt_get_default_layout_type() );
        return ( array_key_exists( $layout, $layouts ) ? $layout : $default );
}


/**
 * Get all layouts available in this theme
 *
 * @since v1.0.0
 * @return array - of layouts
 */
function sixty_get_available_layouts_types() {
	return (array)apply_filters( 'sixty_layouts_available', [
			'one-column'       		=> [
					'label' 			=> esc_html__( 'One Column', 'sixty' ),
					'container_class'	=> 'col-md-12 col-sm-12 col-sx-12',
					'sidebar_class'		=> null,
					'product'			=> true
				],
			'two-column-default'    => [
					'label'				=> esc_html__( 'Two Columns: Content | Sidebar', 'sixty' ),
					'container_class'	=> 'col-md-8 col-sm-12 col-sx-12',
					'sidebar_class'		=> 'col-md-4 col-sm-12 col-sx-12',
					'default'			=> true,
					'product'			=> true
				],
			'two-column-reversed'   => [
					'label'				=> esc_html__( 'Two Columns: Sidebar | Content', 'sixty' ),
					'container_class'	=> 'col-md-8 col-sm-12 col-sx-12',
					'sidebar_class'		=> 'col-md-4 col-sm-12 col-sx-12',
					'product'			=> true
				],
			'three-column-default'  => [
					'label'				=> esc_html__( 'Three Columns: Content | Sidebar | Sidebar', 'sixty' ),
					'container_class'	=> 'col-md-6 col-sm-12 col-sx-12',
					'sidebar_class'		=> 'col-md-3 col-sm-12 col-sx-12'
				],
			'three-column-center'   => [
					'label'				=> esc_html__( 'Three Columns: Sidebar | Content | Sidebar', 'sixty' ),
					'container_class'	=> 'col-md-6 col-sm-12 col-sx-12',
					'sidebar_class'		=> 'col-md-3 col-sm-12 col-sx-12'
				],
			'three-column-reversed' => [
					'label'				=> esc_html__( 'Three Columns: Sidebar | Sidebar | Content', 'sixty' ),
					'container_class'	=> 'col-md-6 col-sm-12 col-sx-12',
					'sidebar_class'		=> 'col-md-3 col-sm-12 col-sx-12'
				],
		] );
}

/**
 * Get the default layout 
 *
 * @since v1.0.0
 * @return string - default layout type
 */
function sixt_get_default_layout_type() {
	foreach(sixty_get_available_layouts_types() as $key => $layout) {
		if(array_key_exists('default', $layout)) {
			if($layout['default']) {
				return $key;
				break;
			}
		}
	}
}

/**
 * Simply return single layout type
 *
 * @since v1.0.0
 * @return string - layout ID
 */
function sixty_get_single_layout_type() {
	if(is_singular()) {
		global $post;
		$layout = get_post_meta( $post->ID, 'sixty_layouts_option' );
	}
	
	if(!empty($layout[0])) {
		return esc_html($layout[0]);
	} else {
		return sixt_get_default_layout_type();
	}
}

/**
 * Return layout class
 *
 * @since v1.0.0
 * @param string - container or sidebar
 * @return string - with layout content or sidebar class
 */
function sixty_get_layout_type_class($class = 'container') {

	$layouts = sixty_get_available_layouts_types();
	$current_layout = sixty_get_single_layout_type();

	if( 'container' == $class ) {
		return $layouts[$current_layout]['container_class'];
	} elseif( 'sidebar' == $class ) {
		if( is_singular() ) {
			return $layouts[$current_layout]['sidebar_class'];
		} else {
			return $layouts[sixt_get_default_layout_type()]['sidebar_class'];
		}
	}
}
function sixty_the_layout_type_class($class = 'container') {
	echo sixty_get_layout_type_class($class);
}

/**
 * Get layout type defined in customize. 
 * Layout is based on bootstrap classes: 'container' for boxed and 'container-fluid' for fluid
 *
 * @since v1.0.0
 */ 
function sixty_get_layout_style() {
	$customizer = get_theme_mod( 'sixty_layout_type', 'container' );

	return esc_html($customizer);
}

/**
 * Add layout settings as css classes on body
 *
 * @since v1.0.0
 */
function sixty_add_layout_type_class_on_body($classes) {

	// Add class for single layout types
	if( is_singular() ) {
		$classes[] = sixty_get_single_layout_type();
	}

	// Add fluid/fixed class
	if( sixty_get_layout_style() == 'container' ) {
		$classes[] = 'layout-boxed';
	} elseif( sixty_get_layout_style() == 'container-fluid' ) {
		$classes[] = 'layout-fluid';
	}

	return $classes;
}
add_filter( 'body_class', 'sixty_add_layout_type_class_on_body');
