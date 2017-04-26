<?php

if ( ! defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly

/**
 * Social Media section
 * This section holds all social media related fields, if needed in the future it can be transformed in a panel
 *
 * --@since v1.0.0
 */
// Kirki::add_section( 'sixty_social_media', array(
//     'title'          => __( 'Social Media', 'sixty' ),
//     'description'    => __( 'Update your social media settings', 'sixty'  ),
//     'capability'     => 'edit_theme_options',
// ) );


/************
 *
 *  Header Settings
 *
 ************/

    /**
     * Header - Colors
     * This section holds header colors options
     *
     * @since v1.0.0
     */
    Kirki::add_section( 'sixty_header_colors', array(
        'title'          => __( 'Colors', 'sixty' ),
        'description'    => __( 'Header colors customization', 'sixty'  ),
        'panel'          => 'sixty_header_settings',
        'capability'     => 'edit_theme_options',
    ) );

    /**
     * Header - Colors
     * This section holds header colors options
     *
     * @since v1.0.0
     */
    Kirki::add_section( 'sixty_header_fonts', array(
        'title'          => __( 'Fonts', 'sixty' ),
        'description'    => __( 'Header fonts customization', 'sixty'  ),
        'panel'          => 'sixty_header_settings',
        'capability'     => 'edit_theme_options',
    ) );

    /**
     * Header - Size
     * This section holds header colors options
     *
     * @since v1.0.0
     */
    Kirki::add_section( 'sixty_header_size', array(
        'title'          => __( 'Size', 'sixty' ),
        'description'    => __( 'Header size customization', 'sixty'  ),
        'panel'          => 'sixty_header_settings',
        'capability'     => 'edit_theme_options',
    ) );


/************
 *
 *  Menu Settings
 *
 ************/

    /**
     * Menu - Colors
     * This section holds menu colors options
     *
     * @since v1.0.0
     */
    Kirki::add_section( 'sixty_menu_colors', array(
        'title'          => __( 'Colors', 'sixty' ),
        'description'    => __( 'Menu colors customization', 'sixty'  ),
        'panel'          => 'sixty_menu_settings',
        'capability'     => 'edit_theme_options',
    ) );

    /**
     * Menu - Fonts
     * This section holds menu fonts options
     *
     * @since v1.0.0
     */
    Kirki::add_section( 'sixty_menu_fonts', array(
        'title'          => __( 'Fonts', 'sixty' ),
        'description'    => __( 'Menu fonts customization', 'sixty'  ),
        'panel'          => 'sixty_menu_settings',
        'capability'     => 'edit_theme_options',
    ) );

/************
 *
 *  Content Settings
 *
 ************/
    /**
     * Content - Colors
     * This section holds content colors options
     *
     * @since v1.0.0
     */
    Kirki::add_section( 'sixty_content_colors', array(
        'title'          => __( 'Colors', 'sixty' ),
        'description'    => __( 'Colors customization', 'sixty'  ),
        'panel'          => 'sixty_content_settings',
        'capability'     => 'edit_theme_options',
    ) );

    /**
     * Content - Fonts
     * This section holds content fonts options
     *
     * @since v1.0.0
     */
    Kirki::add_section( 'sixty_content_fonts', array(
        'title'          => __( 'Fonts', 'sixty' ),
        'description'    => __( 'Content customization', 'sixty'  ),
        'panel'          => 'sixty_content_settings',
        'capability'     => 'edit_theme_options',
    ) );


/************
 *
 *  Buttons Settings
 *
 ************/

    /**
     * Buttons - Colors
     * This section holds buttons colors options
     *
     * @since v1.0.0
     */
    Kirki::add_section( 'sixty_buttons_colors', array(
        'title'          => __( 'Colors', 'sixty' ),
        'description'    => __( 'Buttons colors customization', 'sixty'  ),
        'panel'          => 'sixty_buttons_settings',
        'capability'     => 'edit_theme_options',
    ) );

    /**
     * Buttons - Style
     * This section holds buttons style options
     *
     * @since v1.0.0
     */
    Kirki::add_section( 'sixty_buttons_style', array(
        'title'          => __( 'Style', 'sixty' ),
        'description'    => __( 'Buttons style customization', 'sixty'  ),
        'panel'          => 'sixty_buttons_settings',
        'capability'     => 'edit_theme_options',
    ) );


/************
 *
 *  Footer Settings
 *
 ************/
    
    /**
     * Footer - Background Image
     * This section holds all footer background image options
     *
     * @since v1.0.0
     */
    Kirki::add_section( 'sixty_footer_background', array(
        'title'          => __( 'Background Image', 'sixty' ),
        'description'    => __( 'Backgorund image customization', 'sixty'  ),
        'panel'          => 'sixty_footer_settings',
        'capability'     => 'edit_theme_options',
    ) );

    /**
     * Footer - Colors
     * This section holds all footer colors options
     *
     * @since v1.0.0
     */
    Kirki::add_section( 'sixty_footer_colors', array(
        'title'          => __( 'Colors', 'sixty' ),
        'description'    => __( 'Footer colors customization', 'sixty'  ),
        'panel'          => 'sixty_footer_settings',
        'capability'     => 'edit_theme_options',
    ) );

/************
 *
 *  Shop Settings
 *
 ************/
    
    /**
     * Shop - Background Image
     * This section holds all footer background image options
     *
     * @since v1.0.0
     */
    Kirki::add_section( 'sixty_shop_colors', array(
        'title'          => __( 'Colors', 'sixty' ),
        'description'    => __( 'Shop colors customization', 'sixty'  ),
        'panel'          => 'sixty_shop_settings',
        'capability'     => 'edit_theme_options',
    ) );


/**
 * Layout settings
 * This section holds all global layout specific settings
 *
 * @since v1.0.0
 */
Kirki::add_section( 'sixty_layout_settings', array(
    'title'          => __( 'Layout', 'sixty' ),
    'description'    => __( 'Global layout specific settings', 'sixty'  ),
    'capability'     => 'edit_theme_options',
) );

