<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package sixty
 */

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 

// Trigger functions right before body opening tag
do_action( 'sixty_body_top' ); 

// Echo requested header part
echo '<div class="header_wrapper">';
sixty_the_header_part();
echo '</div>';

?>

