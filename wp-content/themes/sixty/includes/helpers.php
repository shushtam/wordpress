<?php
/**
 * Helpers functions. These functions are not meant to be overwritten in child-themes.
 *
 * @since v1.0.0
 * @package sixty
 */

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly


/**
 * Get first video or iframe from post
 */
function sixty_get_first_video_embed($post_id) {
	$content = apply_filters('the_content', get_post_field('post_content', $post_id));
	$videos = get_media_embedded_in_content( $content, array( 'iframe', 'video' ) );

	if(!empty($videos)) {
		return '<div class="featured_image">' . $videos[0] . '</div>';
	}
}

/**
 * Get buttons style, solid of border. Values will be used as CSS classes
 *
 * @since v1.0.0
 */
function sixty_get_buttons_style() {
	$customizer = get_theme_mod( 'sixty_buttons_style', 'buttons_solid' );

	return esc_html($customizer);
}

/**
 * Get parent theme version
 *
 * @since v1.0.0
 * @param boolean $current - set true if you want only the curent theme version
 * @return string - Parent theme version
 */
function sixty_get_theme_version($current = false) {
	$theme_data = wp_get_theme();

	if($theme_data->get('Template') and $current == false) {
		$parent = wp_get_theme($theme_data->get('Template'));
		return $parent->get('Version');
	} else {
		return $theme_data->get('Version');
	}
}

/**
 * Check if a menu is active
 *
 * @since v1.0.0
 * @param string $menu - menu ID
 * @return bool - true if the menu is active
 */
function sixty_is_menu_active($menu) {
	if(!$menu)
		return;

	$args = array(
			'theme_location' => $menu, 
			'echo' => false,
		);

	if( has_nav_menu($menu) and wp_nav_menu($args) )
		return true;
}