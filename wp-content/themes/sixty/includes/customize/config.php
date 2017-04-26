<?php
if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly
/**
 * Main configutation file for customize options
 *
 * @package sixty
 */

/**
 * Init a Kirki configuration
 */
Kirki::add_config( 'sixty_customize', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
	'disable_output' => false
) );

/**
 * Make Kirki strings translatable
 */
if( function_exists('sixty_kirki_l10n') ):
	function sixty_kirki_l10n( $l10n ) {
		$l10n['background-color']      = esc_attr__( 'Background Color', 'sixty' );
		$l10n['background-image']      = esc_attr__( 'Background Image', 'sixty' );
		$l10n['no-repeat']             = esc_attr__( 'No Repeat', 'sixty' );
		$l10n['repeat-all']            = esc_attr__( 'Repeat All', 'sixty' );
		$l10n['repeat-x']              = esc_attr__( 'Repeat Horizontally', 'sixty' );
		$l10n['repeat-y']              = esc_attr__( 'Repeat Vertically', 'sixty' );
		$l10n['inherit']               = esc_attr__( 'Inherit', 'sixty' );
		$l10n['background-repeat']     = esc_attr__( 'Background Repeat', 'sixty' );
		$l10n['cover']                 = esc_attr__( 'Cover', 'sixty' );
		$l10n['contain']               = esc_attr__( 'Contain', 'sixty' );
		$l10n['background-size']       = esc_attr__( 'Background Size', 'sixty' );
		$l10n['fixed']                 = esc_attr__( 'Fixed', 'sixty' );
		$l10n['scroll']                = esc_attr__( 'Scroll', 'sixty' );
		$l10n['background-attachment'] = esc_attr__( 'Background Attachment', 'sixty' );
		$l10n['left-top']              = esc_attr__( 'Left Top', 'sixty' );
		$l10n['left-center']           = esc_attr__( 'Left Center', 'sixty' );
		$l10n['left-bottom']           = esc_attr__( 'Left Bottom', 'sixty' );
		$l10n['right-top']             = esc_attr__( 'Right Top', 'sixty' );
		$l10n['right-center']          = esc_attr__( 'Right Center', 'sixty' );
		$l10n['right-bottom']          = esc_attr__( 'Right Bottom', 'sixty' );
		$l10n['center-top']            = esc_attr__( 'Center Top', 'sixty' );
		$l10n['center-center']         = esc_attr__( 'Center Center', 'sixty' );
		$l10n['center-bottom']         = esc_attr__( 'Center Bottom', 'sixty' );
		$l10n['background-position']   = esc_attr__( 'Background Position', 'sixty' );
		$l10n['background-opacity']    = esc_attr__( 'Background Opacity', 'sixty' );
		$l10n['on']                    = esc_attr__( 'ON', 'sixty' );
		$l10n['off']                   = esc_attr__( 'OFF', 'sixty' );
		$l10n['all']                   = esc_attr__( 'All', 'sixty' );
		$l10n['cyrillic']              = esc_attr__( 'Cyrillic', 'sixty' );
		$l10n['cyrillic-ext']          = esc_attr__( 'Cyrillic Extended', 'sixty' );
		$l10n['devanagari']            = esc_attr__( 'Devanagari', 'sixty' );
		$l10n['greek']                 = esc_attr__( 'Greek', 'sixty' );
		$l10n['greek-ext']             = esc_attr__( 'Greek Extended', 'sixty' );
		$l10n['khmer']                 = esc_attr__( 'Khmer', 'sixty' );
		$l10n['latin']                 = esc_attr__( 'Latin', 'sixty' );
		$l10n['latin-ext']             = esc_attr__( 'Latin Extended', 'sixty' );
		$l10n['vietnamese']            = esc_attr__( 'Vietnamese', 'sixty' );
		$l10n['hebrew']                = esc_attr__( 'Hebrew', 'sixty' );
		$l10n['arabic']                = esc_attr__( 'Arabic', 'sixty' );
		$l10n['bengali']               = esc_attr__( 'Bengali', 'sixty' );
		$l10n['gujarati']              = esc_attr__( 'Gujarati', 'sixty' );
		$l10n['tamil']                 = esc_attr__( 'Tamil', 'sixty' );
		$l10n['telugu']                = esc_attr__( 'Telugu', 'sixty' );
		$l10n['thai']                  = esc_attr__( 'Thai', 'sixty' );
		$l10n['serif']                 = _x( 'Serif', 'font style', 'sixty' );
		$l10n['sans-serif']            = _x( 'Sans Serif', 'font style', 'sixty' );
		$l10n['monospace']             = _x( 'Monospace', 'font style', 'sixty' );
		$l10n['font-family']           = esc_attr__( 'Font Family', 'sixty' );
		$l10n['font-size']             = esc_attr__( 'Font Size', 'sixty' );
		$l10n['font-weight']           = esc_attr__( 'Font Weight', 'sixty' );
		$l10n['line-height']           = esc_attr__( 'Line Height', 'sixty' );
		$l10n['font-style']            = esc_attr__( 'Font Style', 'sixty' );
		$l10n['letter-spacing']        = esc_attr__( 'Letter Spacing', 'sixty' );
		$l10n['top']                   = esc_attr__( 'Top', 'sixty' );
		$l10n['bottom']                = esc_attr__( 'Bottom', 'sixty' );
		$l10n['left']                  = esc_attr__( 'Left', 'sixty' );
		$l10n['right']                 = esc_attr__( 'Right', 'sixty' );
		$l10n['color']                 = esc_attr__( 'Color', 'sixty' );
		$l10n['add-image']             = esc_attr__( 'Add Image', 'sixty' );
		$l10n['change-image']          = esc_attr__( 'Change Image', 'sixty' );
		$l10n['remove']                = esc_attr__( 'Remove', 'sixty' );
		$l10n['no-image-selected']     = esc_attr__( 'No Image Selected', 'sixty' );
		$l10n['select-font-family']    = esc_attr__( 'Select a font-family', 'sixty' );
		$l10n['variant']               = esc_attr__( 'Variant', 'sixty' );
		$l10n['subsets']               = esc_attr__( 'Subset', 'sixty' );
		$l10n['size']                  = esc_attr__( 'Size', 'sixty' );
		$l10n['height']                = esc_attr__( 'Height', 'sixty' );
		$l10n['spacing']               = esc_attr__( 'Spacing', 'sixty' );
		$l10n['ultra-light']           = esc_attr__( 'Ultra-Light 100', 'sixty' );
		$l10n['ultra-light-italic']    = esc_attr__( 'Ultra-Light 100 Italic', 'sixty' );
		$l10n['light']                 = esc_attr__( 'Light 200', 'sixty' );
		$l10n['light-italic']          = esc_attr__( 'Light 200 Italic', 'sixty' );
		$l10n['book']                  = esc_attr__( 'Book 300', 'sixty' );
		$l10n['book-italic']           = esc_attr__( 'Book 300 Italic', 'sixty' );
		$l10n['regular']               = esc_attr__( 'Normal 400', 'sixty' );
		$l10n['italic']                = esc_attr__( 'Normal 400 Italic', 'sixty' );
		$l10n['medium']                = esc_attr__( 'Medium 500', 'sixty' );
		$l10n['medium-italic']         = esc_attr__( 'Medium 500 Italic', 'sixty' );
		$l10n['semi-bold']             = esc_attr__( 'Semi-Bold 600', 'sixty' );
		$l10n['semi-bold-italic']      = esc_attr__( 'Semi-Bold 600 Italic', 'sixty' );
		$l10n['bold']                  = esc_attr__( 'Bold 700', 'sixty' );
		$l10n['bold-italic']           = esc_attr__( 'Bold 700 Italic', 'sixty' );
		$l10n['extra-bold']            = esc_attr__( 'Extra-Bold 800', 'sixty' );
		$l10n['extra-bold-italic']     = esc_attr__( 'Extra-Bold 800 Italic', 'sixty' );
		$l10n['ultra-bold']            = esc_attr__( 'Ultra-Bold 900', 'sixty' );
		$l10n['ultra-bold-italic']     = esc_attr__( 'Ultra-Bold 900 Italic', 'sixty' );
		$l10n['invalid-value']         = esc_attr__( 'Invalid Value', 'sixty' );

		return $l10n;
	}
endif;
add_filter( 'kirki/my_config/l10n', 'sixty_kirki_l10n' );

// Reset unused controls
function sixty_reset_customize( $wp_customize ) {

	// Remove 'colors' section and it's fields
	$wp_customize->remove_control( 'background_color' );
	$wp_customize->remove_control( 'header_textcolor' );
	$wp_customize->remove_section( 'colors' );

	// Update header image location
	$wp_customize->get_section('header_image')->panel = 'sixty_header_settings';

	// Update background image
	$wp_customize->get_section('background_image')->panel = 'sixty_content_settings';

}
add_action( "customize_register", "sixty_reset_customize" );

// Include panels and sections
include get_template_directory() . '/includes/customize/sections.php';
include get_template_directory() . '/includes/customize/panels.php';

// Include customize fields
// include get_template_directory() . '/includes/customize/header-general.php';
// include get_template_directory() . '/includes/customize/social_media.php';
include get_template_directory() . '/includes/customize/layout_settings.php';
include get_template_directory() . '/includes/customize/header-colors.php';
include get_template_directory() . '/includes/customize/header-fonts.php';
include get_template_directory() . '/includes/customize/header-size.php';


include get_template_directory() . '/includes/customize/menu-fonts.php';
include get_template_directory() . '/includes/customize/menu-colors.php';

include get_template_directory() . '/includes/customize/content-colors.php';
include get_template_directory() . '/includes/customize/content-fonts.php';

include get_template_directory() . '/includes/customize/buttons-colors.php';
include get_template_directory() . '/includes/customize/buttons-style.php';

include get_template_directory() . '/includes/customize/footer-colors.php';
include get_template_directory() . '/includes/customize/footer-background.php';

// Add customize fields for shop only if WC is active
if(class_exists('WooCommerce')) {
	include get_template_directory() . '/includes/customize/shop-colors.php';
}

// Class overwrite, until my pull-request is merged on kirki code
include get_template_directory() . '/includes/customize/class-kirki-output-property-background-image.php';
