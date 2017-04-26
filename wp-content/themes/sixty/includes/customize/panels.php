<?php

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
 * Header settings
 * This panel holds all header settings sections
 * 
 * @since v1.0.0
 */
Kirki::add_panel( 'sixty_header_settings', array(
    'priority'    => 1,
    'title'       => __( 'Header', 'sixty' ),
    'description' => __( 'Header settings', 'sixty' ),
) );

/**
 * Navigation settings 
 * This panel holds all menu/navigation settings sections
 * 
 * @since v1.0.0
 */
Kirki::add_panel( 'sixty_menu_settings', array(
    'priority'    => 2,
    'title'       => __( 'Menu', 'sixty' ),
    'description' => __( 'Main navigation customization', 'sixty' ),
) );

/**
 * Navigation settings 
 * This panel holds all menu/navigation settings sections
 * 
 * @since v1.0.0
 */
Kirki::add_panel( 'sixty_content_settings', array(
    'priority'    => 3,
    'title'       => __( 'Content', 'sixty' ),
    'description' => __( 'All content customization', 'sixty' ),
) );

/**
 * Button settings 
 * This panel holds all buttons settings sections
 * 
 * @since v1.0.0
 */
Kirki::add_panel( 'sixty_buttons_settings', array(
    'priority'    => 4,
    'title'       => __( 'Buttons', 'sixty' ),
    'description' => __( 'All buttons customization', 'sixty' ),
) );

/**
 * Footer settings 
 * This panel holds all footer settings sections
 * 
 * @since v1.0.0
 */
Kirki::add_panel( 'sixty_footer_settings', array(
    'priority'    => 5,
    'title'       => __( 'Footer', 'sixty' ),
    'description' => __( 'All footer customization', 'sixty' ),
) );


/**
 * Shop settings 
 * This panel holds all shop settings sections
 * 
 * @since v1.0.0
 */
Kirki::add_panel( 'sixty_shop_settings', array(
    'priority'    => 6,
    'title'       => __( 'Shop', 'sixty' ),
    'description' => __( 'All shop ( WooCommerce ) customization', 'sixty' ),
) );
