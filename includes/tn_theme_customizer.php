<?php

// http://themefoundation.com/wordpress-theme-customizer/

// Key Images (Desktop Logo, Mobile Logo and Favicon)
function fx_tn_theme_images_box( $wp_customize ) {
	$wp_customize->add_section( 'tn_theme_images_section', array(
		'title'       	=> __( 'Key Theme Images', 'tn' ),
		'description' 	=> __( 'add the URLs for key images below', 'tn' ),
		'priority' 		=> 35
	) 	);
	// inputs
	$wp_customize->add_setting( 'tn_theme_image_logo_large', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/logo_large.png' ) );
	$wp_customize->add_control( 'tn_theme_image_logo_large', array(
		'label' 		=> __( 'Large Screen Logo', 'tn' ),
		'section' 	=> 'tn_theme_images_section',
		'settings' 	=> 'tn_theme_image_logo_large',
		'type' 		=> 'text'
	) 	);
	$wp_customize->add_setting( 'tn_theme_image_logo_medium', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/logo_medium.png' ) );
	$wp_customize->add_control( 'tn_theme_image_logo_medium', array(
		'label' 		=> __( 'Medium Screen Logo', 'tn' ),
		'section' 	=> 'tn_theme_images_section',
		'settings' 	=> 'tn_theme_image_logo_medium',
		'type' 		=> 'text'
	) 	);
	$wp_customize->add_setting( 'tn_theme_image_logo_small', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/logo_small.png' ) );
	$wp_customize->add_control( 'tn_theme_image_logo_small', array(
		'label' 		=> __( 'Small Screen Logo', 'tn' ),
		'section' 	=> 'tn_theme_images_section',
		'settings' 	=> 'tn_theme_image_logo_small',
		'type' 		=> 'text'
	) 	);
	$wp_customize->add_setting( 'tn_theme_image_favicon', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/favicon.png' ) );
	$wp_customize->add_control( 'tn_theme_image_favicon', array(
		'label' 		=> __( 'Logo', 'tn' ),
		'section' 	=> 'tn_theme_images_section',
		'settings' 	=> 'tn_theme_image_favicon',
		'type' 		=> 'text'
	) 	);
}
add_action( 'customize_register', 'fx_tn_theme_images_box' );

// Header
function fx_tn_theme_header_box( $wp_customize ) {
	$wp_customize->add_section( 'tn_theme_header_section', array(
		'title' 			=> 'Theme Header',
		// 'description' 	=> __( 'add the URLs for key images below', 'tn' ),
		'priority' 		=> 35
	) 	);
	// inputs
	$wp_customize->add_setting( 'tn_theme_header_height', array( 'default' => '100px' ) );
	$wp_customize->add_control( 'tn_theme_header_height', array(
		'label' 		=> __( 'Header text', 'tn' ),
		'section' 	=> 'tn_theme_header_section',
		'settings' 	=> 'tn_theme_header_height',
		'type' 		=> 'text'
	) 	);
	$wp_customize->add_setting( 'tn_theme_header_bg_color', array( 'default' => '#fff' ) );
	$wp_customize->add_control( 'tn_theme_header_bg_color', array(
		'label' 		=> __( 'Header text', 'tn' ),
		'section' 	=> 'tn_theme_header_section',
		'settings' 	=> 'tn_theme_header_bg_color',
		'type' 		=> 'text'
	) 	);
	$wp_customize->add_setting( 'tn_theme_header_bg_image', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/bg_image.png' ) );
	$wp_customize->add_control( 'tn_theme_header_bg_image', array(
		'label' 		=> __( 'Header text', 'tn' ),
		'section' 	=> 'tn_theme_header_section',
		'settings' 	=> 'tn_theme_header_bg_image',
		'type' 		=> 'text'
	) 	);
	$wp_customize->add_setting( 'tn_theme_header_bg_position', array( 'default' => 'center center' ) );
	$wp_customize->add_control( 'tn_theme_header_bg_position', array(
		'label' 		=> __( 'Header text', 'tn' ),
		'section' 	=> 'tn_theme_header_section',
		'settings' 	=> 'tn_theme_header_bg_position',
		'type' 		=> 'text'
	) 	);
	$wp_customize->add_setting( 'tn_theme_header_bg_repeat', array( 'default' => 'no-repeat' ) );
	$wp_customize->add_control( 'tn_theme_header_bg_repeat', array(
		'label' 		=> __( 'Header text', 'tn' ),
		'section' 	=> 'tn_theme_header_section',
		'settings' 	=> 'tn_theme_header_bg_repeat',
		'type' 		=> 'text'
	) 	);
}
add_action( 'customize_register', 'fx_tn_theme_header_box' );

// Topbar
function fx_tn_theme_topbar_box( $wp_customize ) {
	$wp_customize->add_section( 'tn_theme_topbar_section', array(
		'title' 			=> 'Theme Topbar',
		// 'description' 	=> __( 'add the URLs for key images below', 'tn' ),
		'priority' 		=> 35
	) 	);
	// inputs
	$wp_customize->add_setting( 'tn_theme_topbar_bg_color', array( 'default' => 'rgba(51, 143, 201, 1)' ) );
	$wp_customize->add_control( 'tn_theme_topbar_bg_color', array(
		'label' 		=> __( 'Topbar Color', 'tn' ),
		'section' 	=> 'tn_theme_topbar_section',
		'settings' 	=> 'tn_theme_topbar_bg_color',
		'type' 		=> 'text'
	) 	);
	$wp_customize->add_setting( 'tn_theme_topbar_bg_color_hover', array( 'default' => 'rgba(51, 143, 201, 0.5)' ) );
	$wp_customize->add_control( 'tn_theme_topbar_bg_color_hover', array(
		'label' 		=> __( 'Topbar Hover Color', 'tn' ),
		'section' 	=> 'tn_theme_topbar_section',
		'settings' 	=> 'tn_theme_topbar_bg_color_hover',
		'type' 		=> 'text'
	) 	);
	$wp_customize->add_setting( 'tn_theme_topbar_font_color', array( 'default' => 'rgba(255, 255, 255, 1)' ) );
	$wp_customize->add_control( 'tn_theme_topbar_font_color', array(
		'label' 		=> __( 'Topbar Font Color', 'tn' ),
		'section' 	=> 'tn_theme_topbar_section',
		'settings' 	=> 'tn_theme_topbar_font_color',
		'type' 		=> 'text'
	) 	);
	$wp_customize->add_setting( 'tn_theme_topbar_font_color_hover', array( 'default' => 'rgba(255, 255, 255, 1)' ) );
	$wp_customize->add_control( 'tn_theme_topbar_font_color_hover', array(
		'label' 		=> __( 'Topbar Font Hover Color', 'tn' ),
		'section' 	=> 'tn_theme_topbar_section',
		'settings' 	=> 'tn_theme_topbar_font_color_hover',
		'type' 		=> 'text'
	) 	);
	$wp_customize->add_setting( 'tn_theme_topbar_divide_color', array( 'default' => 'rgba(255, 255, 255, 1)' ) );
	$wp_customize->add_control( 'tn_theme_topbar_divide_color', array(
		'label' 		=> __( 'Topbar Font Hover Color', 'tn' ),
		'section' 	=> 'tn_theme_topbar_section',
		'settings' 	=> 'tn_theme_topbar_divide_color',
		'type' 		=> 'text'
	) 	);
}
add_action( 'customize_register', 'fx_tn_theme_topbar_box' );

// Copyright
function fx_tn_theme_copyright_box( $wp_customize ) {
	$wp_customize->add_section( 'tn_theme_copyright_section', array(
		'title' 			=> 'Copyright Statement',
		// 'description' 	=> __( 'add the URLs for key images below', 'tn' ),
		'priority' 		=> 35
	) 	);
	// inputs
	$wp_customize->add_setting( 'tn_theme_copyright', array( 'default' => 'Default copyright text' ) );
	$wp_customize->add_control( 'tn_theme_copyright', array(
		'label' 		=> __( 'Copyright text', 'tn' ),
		'section' 	=> 'tn_theme_copyright_section',
		'settings' 	=> 'tn_theme_copyright',
		'type' 		=> 'text'
	) 	);
}
add_action( 'customize_register', 'fx_tn_theme_copyright_box' );

?>