<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Customizer\Theme Settings
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis/
 */

/**
 * The config array for setting up a Customizer panel, sections within that panel, settings and controls.
 *
 * If child theme contains a `customizer-theme-settings.php` config, it will be used instead of this config.
 *
 * @since 2.6.0
 */
return array(
	'genesis' => array(
		'title'          => __( 'Theme Settings', 'genesis' ),
		'description'    => __( 'Customize the various theme settings.', 'genesis' ),
		'theme_supports' => 'genesis-customizer-theme-settings',
		'settings_field' => 'genesis-settings',
		'control_prefix' => 'genesis',
		'sections'       => array(
			'genesis_updates'      => array(
				'title'          => __( 'Updates', 'genesis' ),
				'panel'          => 'genesis',
				'theme_supports' => 'genesis-auto-updates',
				'controls'       => array(
					'update'               => array(
						'label'       => __( 'Check For Updates', 'genesis' ),
						'description' => __( 'By checking this box, you allow Genesis to periodically check for updates.', 'genesis' ),
						'section'     => 'genesis_updates',
						'type'        => 'checkbox',
						'settings'    => array(
							'default' => 1,
						),
					),
					'update_email_address' => array(
						'label'       => __( 'Email Address', 'genesis' ),
						'description' => __( 'If you provide an email address below, you will be notified via email when a new version of Genesis is available.', 'genesis' ),
						'section'     => 'genesis_updates',
						'type'        => 'email',
						'input_attrs' => array(
							'placeholder' => __( 'Email Address', 'genesis' ),
						),
						'settings'    => array(
							'default' => '',
						),
					),

				),
			),
			'genesis_header'       => array(
				'active_callback' => 'genesis_show_header_customizer_callback',
				'title'           => __( 'Header', 'genesis' ),
				'panel'           => 'genesis',
				'controls'        => array(
					'blog_title' => array(
						'label'    => __( 'Use for site title/logo:', 'genesis' ),
						'section'  => 'genesis_header',
						'type'     => 'select',
						'choices'  => array(
							'text'  => __( 'Dynamic Text', 'genesis' ),
							'image' => __( 'Image logo', 'genesis' ),
						),
						'settings' => array(
							'default' => 'text',
						),
					),
				),
			),
			'genesis_adsense'      => array(
				'title'       => __( 'Google AdSense', 'genesis' ),
				/* translators: %s: AdSense Auto Ads URL */
				'description' => sprintf( __( 'Auto Ads must be enabled in your AdSense account for this feature to work properly. <a href="%s">Click here to enable.</a>', 'genesis' ), 'https://www.google.com/adsense/new/myads/auto-ads/' ) .
									'<br /><br />' .
									/* translators: %s: AdSense URL */
									sprintf( __( "Don't have AdSense? <a href='%s' target='_blank' rel='noopener noreferrer'>Click here</a> to sign up!", 'genesis' ), 'https://www.google.com/adsense/start/?utm_source=Genesis&utm_medium=partnerships&utm_campaign=GenesisCustomizer' ),
				'panel'       => 'genesis',
				'controls'    => array(
					'adsense_id' => array(
						'label'       => __( 'Publisher ID', 'genesis' ),
						'description' => __( 'Enter your AdSense publisher ID (ca-pub-xxxxxxxxxxxxx) to activate AdSense Auto Ads', 'genesis' ),
						'section'     => 'genesis_adsense',
						'type'        => 'text',
						'settings'    => array(
							'default' => '',
						),
					),
				),
			),
			'genesis_color_scheme' => array(
				'active_callback' => 'genesis_has_color_schemes',
				'theme_supports'  => 'genesis-style-selector',
				'title'           => __( 'Color Scheme', 'genesis' ),
				'panel'           => 'genesis',
				'controls'        => array(
					'style_selection' => array(
						'label'    => __( 'Select Color Style', 'genesis' ),
						'section'  => 'genesis_color_scheme',
						'type'     => 'select',
						'choices'  => genesis_get_color_schemes_for_customizer(),
						'settings' => array(
							'default' => '',
						),
					),
				),
			),
			'genesis_layout'       => array(
				'active_callback' => 'genesis_has_multiple_layouts',
				'title'           => __( 'Site Layout', 'genesis' ),
				'panel'           => 'genesis',
				'controls'        => array(
					'site_layout' => array(
						'label'    => __( 'Select Site Layout', 'genesis' ),
						'section'  => 'genesis_layout',
						'type'     => 'select',
						'choices'  => genesis_get_layouts_for_customizer(),
						'settings' => array(
							'default' => '',
						),
					),
				),
			),
			'genesis_breadcrumbs'  => array(
				'theme_supports' => 'genesis-breadcrumbs',
				'title'          => __( 'Breadcrumbs', 'genesis' ),
				'description'    => __( 'Select the pages which should display breadcrumbs.', 'genesis' ),
				'panel'          => 'genesis',
				'controls'       => array(
					'breadcrumb_home'       => array(
						'active_callback' => 'genesis_posts_show_on_front',
						'label'           => __( 'Breadcrumbs on Homepage', 'genesis' ),
						'section'         => 'genesis_breadcrumbs',
						'type'            => 'checkbox',
						'settings'        => array(
							'default' => 0,
						),
					),
					'breadcrumb_front_page' => array(
						'active_callback' => 'genesis_page_show_on_front',
						'label'           => __( 'Breadcrumbs on Front page', 'genesis' ),
						'section'         => 'genesis_breadcrumbs',
						'type'            => 'checkbox',
						'settings'        => array(
							'default' => 0,
						),
					),
					'breadcrumb_posts_page' => array(
						'active_callback' => 'genesis_page_show_on_front',
						'label'           => __( 'Breadcrumbs on Posts page', 'genesis' ),
						'section'         => 'genesis_breadcrumbs',
						'type'            => 'checkbox',
						'settings'        => array(
							'default' => 0,
						),
					),
					'breadcrumb_single'     => array(
						'label'    => __( 'Breadcrumbs on Single Posts', 'genesis' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'breadcrumb_page'       => array(
						'label'    => __( 'Breadcrumbs on Pages', 'genesis' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'breadcrumb_archive'    => array(
						'label'    => __( 'Breadcrumbs on Archives', 'genesis' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'breadcrumb_404'        => array(
						'label'    => __( 'Breadcrumbs on 404 page', 'genesis' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'breadcrumb_attachment' => array(
						'label'    => __( 'Breadcrumbs on Attachment/Media', 'genesis' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
				),
			),
			'genesis_comments'     => array(
				'title'    => __( 'Comments and Trackbacks', 'genesis' ),
				'panel'    => 'genesis',
				'controls' => array(
					'comments_posts'   => array(
						'label'    => __( 'Enable Comments on Posts', 'genesis' ),
						'section'  => 'genesis_comments',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 1,
						),
					),
					'comments_pages'   => array(
						'label'    => __( 'Enable Comments on Pages', 'genesis' ),
						'section'  => 'genesis_comments',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 1,
						),
					),
					'trackbacks_posts' => array(
						'label'    => __( 'Enable Trackbacks on Posts', 'genesis' ),
						'section'  => 'genesis_comments',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'trackbacks_pages' => array(
						'label'    => __( 'Enable Trackbacks on Pages', 'genesis' ),
						'section'  => 'genesis_comments',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
				),
			),
			'genesis_archives'     => array(
				'title'    => __( 'Content Archives', 'genesis' ),
				'panel'    => 'genesis',
				'controls' => array(
					'content_archive'           => array(
						'label'    => __( 'Select one of the following', 'genesis' ),
						'section'  => 'genesis_archives',
						'type'     => 'select',
						'choices'  => array(
							'full'     => __( 'Entry content', 'genesis' ),
							'excerpts' => __( 'Entry excerpts', 'genesis' ),
						),
						'settings' => array(
							'default' => 'full',
						),
					),
					'content_archive_limit'     => array(
						'label'    => __( 'Limit content to how many characters? (0 for no limit)', 'genesis' ),
						'section'  => 'genesis_archives',
						'type'     => 'number',
						'settings' => array(
							'default' => 0,
						),
					),
					'content_archive_thumbnail' => array(
						'label'    => __( 'Display the featured image?', 'genesis' ),
						'section'  => 'genesis_archives',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'image_size'                => array(
						'label'    => __( 'Featured Image Size', 'genesis' ),
						'section'  => 'genesis_archives',
						'type'     => 'select',
						'choices'  => genesis_get_image_sizes_for_customizer(),
						'settings' => array(
							'default' => '',
						),
					),
					'image_alignment'           => array(
						'label'    => __( 'Featured Image Alignment', 'genesis' ),
						'section'  => 'genesis_archives',
						'type'     => 'select',
						'choices'  => array(
							''            => __( 'None', 'genesis' ),
							'alignleft'   => __( 'Left', 'genesis' ),
							'alignright'  => __( 'Right', 'genesis' ),
							'aligncenter' => __( 'Center', 'genesis' ),
						),
						'settings' => array(
							'default' => 'alignleft',
						),
					),
					'posts_nav'                 => array(
						'label'    => __( 'Entry Pagination Type', 'genesis' ),
						'section'  => 'genesis_archives',
						'type'     => 'select',
						'choices'  => array(
							'prev-next' => __( 'Previous / Next', 'genesis' ),
							'numeric'   => __( 'Numeric', 'genesis' ),
						),
						'settings' => array(
							'default' => '',
						),
					),
				),
			),
			'genesis_scripts'      => array(
				'title'    => __( 'Header/Footer Scripts', 'genesis' ),
				'panel'    => 'genesis',
				'controls' => array(
					'header_scripts' => array(
						'label'       => __( 'Header Scripts', 'genesis' ),
						/* translators: %s: </head> */
						'description' => sprintf( __( 'This code will output immediately before the closing %s tag in the document source.', 'genesis' ), genesis_code( esc_html( '</head>' ) ) ),
						'section'     => 'genesis_scripts',
						'type'        => 'textarea',
						'settings'    => array(
							'default' => '',
						),
					),
					'footer_scripts' => array(
						'label'       => __( 'Footer Scripts', 'genesis' ),
						/* translators: %s: </body> */
						'description' => sprintf( __( 'This code will output immediately before the closing %s tag in the document source.', 'genesis' ), genesis_code( esc_html( '</body>' ) ) ),
						'section'     => 'genesis_scripts',
						'type'        => 'textarea',
						'settings'    => array(
							'default' => '',
						),
					),
				),
			),
		),
	),
);
