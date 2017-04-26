<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function sixty_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sixty, use a find and replace
	 * to change 'sixty' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sixty', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Allow user to change the website logo
	 */
	add_theme_support( 'custom-logo' );

	/*
	 * Allow user to add an custom header image
	 */
	add_theme_support( 'custom-header', (array)apply_filters( 'sixty_custom_header_args', array(
			'width' => 1160,
			'height' => 340
		) ) );

	/*
	 * Allow user to change thie background
	 */
	add_theme_support( 'custom-background', (array)apply_filters( 'sixty_custom_background_args', array() ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( 
		(array) apply_filters( 'sixty_navigation', 
			array(
				'primary' => esc_html__( 'Primary Menu', 'sixty' )
			) 
		)
	 );

	/*
	 * Allow theme to resize images
	 */
	add_image_size( 'sixty_thumbnail', 750, 422, array( 'center center' ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for post formats
	 *
	 * @link https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array( 
		'aside', 
		'link',
		'quote',
		'video',
	) );
	
	/**
	 * This feature enables Selective Refresh for Widgets being managed within the Customizer. This feature became available in WordPress 4.5
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/** 
	 * Make this theme compatible with WooCommerce plugin
	 */
	add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'sixty_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since v1.0.0
 */
function sixty_content_width() {

	// Set the content width based on layout type on single pages
	$default = apply_filters( 'sixty_content_width_two_columns', 650 );
	if( is_singular() ) {
		$layout = sixty_get_single_layout_type();

		if( $layout == 'one-column') {
			$GLOBALS['content_width'] = apply_filters( 'sixty_content_width_one_column', 1140 );
		} elseif( $layout == 'three-column-default' or $layout == 'three-column-reversed' or $layout == 'three-column-center' ) {
			$GLOBALS['content_width'] = apply_filters( 'sixty_content_width_three_columns', 555 );
		} else {
			$GLOBALS['content_width'] = $default;
		}

	} else {
		$GLOBALS['content_width'] = $default;
	}
}
add_action( 'after_setup_theme', 'sixty_content_width', 0 );


/**
 * Enqueue and register styles
 */
function sixty_styles() {
	wp_enqueue_style( 'SourceSansPro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700,700i', sixty_get_theme_version());

	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', sixty_get_theme_version());

	wp_enqueue_style( 'sixty-main-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sixty-scripts', get_template_directory_uri() . '/assets/js/dest/scripts.min.js', array(), sixty_get_theme_version() );

	if( class_exists('WooCommerce') ) {
		wp_enqueue_style( 'sixty-custom-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.min.css', sixty_get_theme_version());
	}

	if( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'sixty_styles' );

/**
 * Add editor stylesheet for the theme.
 *
 * @since v1.0.0
 */
function sixty_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/assets/css/custom-editor-style.min.css' );
}
add_action( 'admin_init', 'sixty_editor_styles' );

/**
 * Register sidebars
 *
 * @since v1.0.0
 */
function sixty_sidebars() {

	$sidebar_one = (array)apply_filters( 'sixty_sidebar_one', array(
		'name'			=> __( 'Main Sidebar', 'sixty' ),
		'before_widget' => '<div class="widget %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget_title">',
		'after_title'   => '</div>',
	) );
	$sidebar_one['id'] = 'sidebar_one';

	register_sidebar( $sidebar_one );

	$sidebar_two = (array)apply_filters( 'sixty_sidebar_two', array(
		'name'			=> __( 'Secondary Sidebar', 'sixty' ),
		'description'	=> __( 'This sidebar area will be used on three columns layouts.', 'sixty' ),
		'before_widget' => '<div class="widget %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget_title">',
		'after_title'   => '</div>',
	) );
	$sidebar_two['id'] = 'sidebar_two';

	register_sidebar( $sidebar_two );

	// Register WooCommerce sidebar
	if( class_exists( 'WooCommerce' ) ) {
		$sidebar_woocommerce = (array)apply_filters( 'sixty_sidebar_woocommerce', array(
			'name'			=> __( 'WooCommerce Sidebar', 'sixty' ),
			'description'	=> __( 'This sidebar area will be used on WooCommerce pages.', 'sixty' ),
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget_title">',
			'after_title'   => '</div>',
		) );
		$sidebar_woocommerce['id'] = 'sidebar_woocommerce';

		register_sidebar( $sidebar_woocommerce );
	}

}
add_action( 'widgets_init', 'sixty_sidebars' );


/**
 * Include extra files
 */
require_once get_template_directory() . '/includes/helpers.php';
require_once get_template_directory() . '/includes/template-tags.php';
require_once get_template_directory() . '/includes/social-media.php';
require_once get_template_directory() . '/includes/tgmpa/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/includes/layouts.php';

/**
 * Include customize file - Kirki
 */
include_once( dirname( __FILE__ ) . '/includes/kirki/kirki.php' );
require_once get_template_directory() . '/includes/customize/config.php';

/**
 * Include WC specific files
 */

if( class_exists('WooCommerce') ) {
	require_once get_template_directory() . '/includes/woocommerce.php';
}

/**
 *	Modify comments markup structure
 *
 * @since v1.0.0
 */
class sixty_Comment_Walker extends Walker_Comment {
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

	// constructor – wrapper for the comments list
	function __construct() { ?>

		<section class="comments-list">

	<?php }

	// start_lvl – wrapper for child comments list
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>
		
		<section class="child-comments comments-list">

	<?php }

	// end_lvl – closing wrapper for child comments list
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>

		</section>

	<?php }

	// start_el – HTML for comment template
	function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;
		$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 

		if ( 'article' == $args['style'] ) {
			$tag = 'article';
			$add_below = 'comment';
		} else {
			$tag = 'article';
			$add_below = 'comment';
		} ?>

		<article <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
			
			<div class="comment-meta post-meta" role="complementary">
				<figure class="gravatar"><?php echo get_avatar( $comment, 48 ); ?></figure>
				
				<div class="meta_right">
					<h2 class="comment-author">
						<a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a>
					</h2>
					<time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('jS F Y') ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a></time>
					<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div><!-- / .meta_right -->

				<?php if ($comment->comment_approved == '0') : ?>
					<p class="comment-meta-item"><?php _e( 'Your comment is awaiting moderation.', 'sixty' ); ?></p>
				<?php endif; ?>

			</div>
			<div class="comment-content post-content formatting" itemprop="text">
				<?php comment_text() ?>
				<?php edit_comment_link('<span class="comment-meta-item">Edit this comment</span>','',''); ?>
			</div>

	<?php }

	// end_el – closing HTML for comment template
	function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

		</article>

	<?php }

	// destructor – closing wrapper for the comments list
	function __destruct() { ?>

		</section>
	
	<?php }

}

add_action( 'tgmpa_register', 'sixty_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function sixty_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'sixty',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'sixty' ),
			'menu_title'                      => __( 'Install Plugins', 'sixty' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'sixty' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'sixty' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'sixty' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'sixty'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'sixty'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'sixty'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'sixty'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'sixty'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'sixty'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'sixty'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'sixty'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'sixty'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'sixty' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'sixty' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'sixty' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'sixty' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'sixty' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'sixty' ),
			'dismiss'                         => __( 'Dismiss this notice', 'sixty' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'sixty' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'sixty' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}

function sixty_button_type_body($classes) {
	$classes[] = sixty_get_buttons_style();

	if('1' == get_theme_mod('sixty_buttons_round')) {
		$classes[] = 'buttons_rounded';
	}
	
	return $classes;
}
add_filter( 'body_class', 'sixty_button_type_body');
