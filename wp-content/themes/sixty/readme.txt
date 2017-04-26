=== Sixty ===
Contributors:		sixty
Tags: one-column, two-columns, right-sidebar, custom-logo, editor-style, featured-images, custom-menu, post-formats, sticky-post, theme-options, threaded-comments, blog, news, translation-ready, rtl-language-support
Requires at least:	4.5.0
Tested up to:		4.6.1

Sixty
== Description ==
Simple and clean blogging theme.

Notes:
The new location of Header Image section previously located in Appearance > Customize > Header Image is now located in Appearance > Header > Header Image.
The new location of Background Image section previously located in Appearance > Customize > Background Image is now located in Appearance > Content > Background Image

= License =
Font Awesome 4.7.0 by @davegandy - http://fontawesome.io - @fontawesome
License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)

Google Webfonts
https://fonts.google.com/specimen/Source+Sans+Proe
License OFL. Author: Paul D. Hunt. Copyright 2011 Google Inc. All Rights Reserved.

Kirki
Copyright (c) 2016 Aristeides Stathopoulos
License MIT - https://github.com/aristath/kirki/blob/master/LICENSE 

Bootstrap
License MIT - https://github.com/twbs/bootstrap/blob/master/LICENSE

= Action Hooks =

Content Hooks:
sixty_before_404
- Triggers before 404 page content

sixty_after_404
- Triggers after 404 page content

sixty_before_content
- Triggers before page content

sixty_after_content
- Triggers after page content

sixty_body_top
- Triggers after <body> opening tag

Comments hooks:
sixty_comments
- Triggers before #comments and if have_comments() is true

sixty_before_comments_form
- Triggers before comments form

sixty_after_comments_form
- Triggers after comments form

Footer hooks:
sixty_before_footer
- Triggers before footer content

sixty_after_footer
- Triggers after footer content

Template tags hooks:
sixty_before_social_icons
- Triggers before social media icons

sixty_after_social_icons
- Triggers after social media icons

sixty_before_postmeta
- Triggers before post meta span

sixty_after_postmeta
- Triggers after post meta span

sixty_before_logo
- Triggers before logo

sixty_after_logo
- Triggers after logo

sixty_inside_post_thumbnail
- Triggers inside post thumbnail div, next to the thumbnail img tag

sixty_after_post_thumbnail
- Triggers after post thumbnail mai div

sixty_before_posts_navigation
- Triggers before posts navigation

sixty_inside_post_navigation
- Triggers inside posts navigation div

sixty_after_posts_navigation
- Triggers after posts navigation

sixty_before_responsive_menu
- Triggers before responsive menu icon

sixty_before_sidebar
- Triggers before sidebar, ousite of #sidebar div

sixty_after_sidebar
- Triggers after sidebar, ousite of #sidebar div

sixty_before_wc_content
- Triggers before WooCommerce main content 

sixty_after_wc_content
- Triggers after WooCommerce main content 

= Filter Hooks =

sixty_custom_header_args
'array' of header args, see https://developer.wordpress.org/reference/functions/add_theme_support/#custom-header
Default: array( 'width' => 1160, 'height' => 340 )

sixty_custom_background_args
'array' of custom background args, see https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background

sixty_navigation 
'array' of navigation items. 
Default: array('primary' => esc_html__( 'Primary Menu', 'sixty' ) )

sixty_header_logo_default
'string' with logo default markup and values. 
Default: <a href="" title="" itemprop="url" class="header-logo-default"><h1></h1><h2></h2></a>

sixty_header_class - 
'string' with class name. Add an extra class to the header.
Default: header_part

sixty_social_networks
'array' of available social networks where the key is used as CSS class and the value as label. 
Default: array( 'facebook' => 'Facebook', 'twitter' => 'Twitter', 'google-plus' => 'Google Plus', 'linkedin' => 'LinkedIn', 'youtube' => 'YouTube', 'instagram' => 'Instagram' )

sixty_social_icon_{$icon_id} 
'string' with icon class name. $icon_id should match an icon defined in sixty_social_networks() or 'sixty_social_networks' filter. If the $icon_id source is from a 'sixty_social_networks' filter, make sure you call this filter after it. 
Default: social_icon_{$icon_id}

sixty_header_layouts_dir
'string' with headers new location. 
Default: template-parts/headers

sixty_header_layouts_icons_dir
'string' with header icons directory location. Used in customizer.
Default: assets/images/core/headers

sixty_content_width_one_column
'int' - one column content width in pixels
Default: 1140

sixty_content_width_two_columns
'int' - two columns content width in pixels
Default: 555

sixty_content_width_three_columns
'int' - three columns content width in pixels
Default: 650

sixty_sidebar_one, sixty_sidebar_two, sixty_sidebar_woocommerce
'array' - of sidebar args, see https://codex.wordpress.org/Function_Reference/register_sidebar#Parameters

sixty_layouts_available
'array' - of available layouts types, see includes/layouts.php L123

sixty_wp_link_pages
'array' - of wp_link_pages args, see https://codex.wordpress.org/Function_Reference/wp_link_pages#Parameters

sixty_wc_breadcrumb_args
'array' - of woocommerce_breadcrumb args, see https://docs.woocommerce.com/document/woocommerce_breadcrumb/#the-args-array

= Changelog =

v1.0.0 
- First release
