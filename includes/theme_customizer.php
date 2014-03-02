<?php

// http://themefoundation.com/wordpress-theme-customizer/
function fx_tn_theme_box( $wp_customize ) {

// Key Images (Desktop Logo, Mobile Logo and Favicon)
	$wp_customize->add_section( 'tn_theme_images_section', array(
		'title'     => __( 'Logos', 'tn_' ),
		'priority'  => 30,
	) );
	// inputs
	// large screen
	$wp_customize->add_setting( 'tn_theme_image_logo_large', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/logo_large.png' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tn_theme_image_logo_large', array(
		'label'    => __( 'Large Screen Logo', 'tn_' ),
		'section'  => 'tn_theme_images_section',
		'priority' => 10,
	) ) );
	$wp_customize->add_setting( 'tn_theme_image_logo_large_width', array( 'default' => '100px' ) );
	$wp_customize->add_control( 'tn_theme_image_logo_large_width', array(
		'label'    => __( 'Logo on large screen width', 'tn_' ),
		'section'  => 'tn_theme_images_section',
		'type'     => 'text',
		'priority' => 11,
	) );
	$wp_customize->add_setting( 'tn_theme_image_logo_large_padding', array( 'default' => '3px' ) );
	$wp_customize->add_control( 'tn_theme_image_logo_large_padding', array(
		'label'    => __( 'Logo on large screen padding', 'tn_' ),
		'section'  => 'tn_theme_images_section',
		'type'     => 'text',
		'priority' => 12,
	) );
	// medium screen
	$wp_customize->add_setting( 'tn_theme_image_logo_medium', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/logo_medium.png' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tn_theme_image_logo_medium', array(
		'label'    => __( 'Medium Screen Logo', 'tn_' ),
		'section'  => 'tn_theme_images_section',
		'priority' => 20,
	) ) );
	$wp_customize->add_setting( 'tn_theme_image_logo_medium_width', array( 'default' => '100px' ) );
	$wp_customize->add_control( 'tn_theme_image_logo_medium_width', array(
		'label'    => __( 'Logo on medium screen width', 'tn_' ),
		'section'  => 'tn_theme_images_section',
		'type'     => 'text',
		'priority' => 21,
	) );
	$wp_customize->add_setting( 'tn_theme_image_logo_medium_padding', array( 'default' => '3px' ) );
	$wp_customize->add_control( 'tn_theme_image_logo_medium_padding', array(
		'label'    => __( 'Logo on large screen padding', 'tn_' ),
		'section'  => 'tn_theme_images_section',
		'type'     => 'text',
		'priority' => 22,
	) );
	// small screen
	$wp_customize->add_setting( 'tn_theme_image_logo_small', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/logo_small.png' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tn_theme_image_logo_small', array(
		'label'    => __( 'Small Screen Logo', 'tn_' ),
		'section'  => 'tn_theme_images_section',
		'priority' => 30,
	) ) );
	$wp_customize->add_setting( 'tn_theme_image_logo_small_width', array( 'default' => '100px' ) );
	$wp_customize->add_control( 'tn_theme_image_logo_small_width', array(
		'label'    => __( 'Logo on small screen width', 'tn_' ),
		'section'  => 'tn_theme_images_section',
		'type'     => 'text',
		'priority' => 31,
	) );
	$wp_customize->add_setting( 'tn_theme_image_logo_small_padding', array( 'default' => '3px' ) );
	$wp_customize->add_control( 'tn_theme_image_logo_small_padding', array(
		'label'    => __( 'Logo on small screen padding', 'tn_' ),
		'section'  => 'tn_theme_images_section',
		'type'     => 'text',
		'priority' => 32,
	) );
	// favicon
	$wp_customize->add_setting( 'tn_theme_image_favicon' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tn_theme_image_favicon', array(
		'label'   	=> __( 'Favicon', 'tn_' ),
		'section'  => 'tn_theme_images_section',
		'priority' => 40,
	) ) );

// Body
	$wp_customize->add_section( 'tn_theme_body_bg_section', array(
		'title'   	=> 'Body',
		'priority' => 40,
	) );
	// inputs
	$wp_customize->add_setting( 'tn_theme_body_bg_color', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_body_bg_color', array(
		'label'    => __( 'Background Color', 'tn_' ),
		'section'  => 'tn_theme_body_bg_section',
		'priority' => 10,
	) ) );
	$wp_customize->add_setting( 'tn_theme_body_bg_image', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/body_bg.png' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tn_theme_body_bg_image', array(
		'label'    => __( 'Background Image', 'tn_' ),
		'section'  => 'tn_theme_body_bg_section',
		'priority' => 20,
	) ) );
	$wp_customize->add_setting( 'tn_theme_body_bg_position', array( 'default' => 'center center' ) );
	$wp_customize->add_control( 'tn_theme_body_bg_position', array(
		'label'    => __( 'Background Position', 'tn_' ),
		'section'  => 'tn_theme_body_bg_section',
		'type'     => 'text',
		'priority' => 30,
	) );
	$wp_customize->add_setting( 'tn_theme_body_bg_repeat', array( 'default' => 'no-repeat' ) );
	$wp_customize->add_control( 'tn_theme_body_bg_repeat', array(
		'label'    => __( 'Background Repeat', 'tn_' ),
		'section'  => 'tn_theme_body_bg_section',
		'type'     => 'text',
		'priority' => 40,
	) );
	$wp_customize->add_setting( 'tn_theme_body_bg_size', array( 'default' => 'cover' ) );
	$wp_customize->add_control( 'tn_theme_body_bg_size', array(
		'label'    => __( 'Background Size', 'tn_' ),
		'section'  => 'tn_theme_body_bg_section',
		'type'     => 'text',
		'priority' => 40,
	) );

// Top Row (above tobbar)
	$wp_customize->add_section( 'tn_theme_toprow_section', array(
		'title'    => 'Top row',
		'priority' => 41,
	) );
	// inputs
	$wp_customize->add_setting( 'tn_theme_toprow_show', array( 'default' => '1') );
	$wp_customize->add_control( 'tn_theme_toprow_show', array(
		'label'    => 'Show Toprow',
		'section'  => 'tn_theme_toprow_section',
		'type'     => 'radio',
		'choices'  => array( '0' => 'Hidden', '1' => 'Full width', '2' => 'Within a row', ),
		'priority' => 10,
	) );
	$wp_customize->add_setting( 'tn_theme_toprow_height_type', array( 'default' => 'height', ) );
	$wp_customize->add_control( 'tn_theme_toprow_height_type', array(
		'label'    => 'Height Type',
		'section'  => 'tn_theme_toprow_section',
		'type'     => 'radio',
		'choices'  => array( 'min-height' => 'min-height', 'height' => 'height', 'max-height' => 'max-height', ),
		'priority' => 20,
	) );
	$wp_customize->add_setting( 'tn_theme_toprow_overflow' );
	$wp_customize->add_control( 'tn_theme_toprow_overflow', array(
		'label'    => 'Overflow Hidden',
		'section'  => 'tn_theme_toprow_section',
		'type'     => 'checkbox',
		'priority' => 30,
	) );
	$wp_customize->add_setting( 'tn_theme_toprow_height', array( 'default' => '100px' ) );
	$wp_customize->add_control( 'tn_theme_toprow_height', array(
		'label'    => __( 'Height', 'tn_' ),
		'section'  => 'tn_theme_toprow_section',
		'type'     => 'text',
		'priority' => 40,
	) );
	$wp_customize->add_setting( 'tn_theme_toprow_bg_color', array( 'default' => '#0B7BDD', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_toprow_bg_color', array(
		'label'    => __( 'Background Color', 'tn_' ),
		'section'  => 'tn_theme_toprow_section',
		'priority' => 50,
	) ) );
	$wp_customize->add_setting( 'tn_theme_toprow_bg_image', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/toprow_bg.png' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tn_theme_toprow_bg_image', array(
		'label'    => __( 'Background Image', 'tn_' ),
		'section'  => 'tn_theme_toprow_section',
		'priority' => 60,
	) ) );
	$wp_customize->add_setting( 'tn_theme_toprow_bg_position', array( 'default' => 'center center' ) );
	$wp_customize->add_control( 'tn_theme_toprow_bg_position', array(
		'label'    => __( 'background Position', 'tn_' ),
		'section'  => 'tn_theme_toprow_section',
		'type'     => 'text',
		'priority' => 70,
	) );
	$wp_customize->add_setting( 'tn_theme_toprow_bg_repeat', array( 'default' => 'no-repeat' ) );
	$wp_customize->add_control( 'tn_theme_toprow_bg_repeat', array(
		'label'    => __( 'background Repeat', 'tn_' ),
		'section'  => 'tn_theme_toprow_section',
		'type'     => 'text',
		'priority' => 80,
	) );
	$wp_customize->add_setting( 'tn_theme_toprow_bg_size', array( 'default' => 'cover' ) );
	$wp_customize->add_control( 'tn_theme_toprow_bg_size', array(
		'label'    => __( 'Background Size', 'tn_' ),
		'section'  => 'tn_theme_toprow_section',
		'type'     => 'text',
		'priority' => 90,
	) );

// Topbar
	$wp_customize->add_section( 'tn_theme_topbar_section', array(
		'title'    => 'Topbar',
		'priority' => 42,
	) );
	// inputs
	$wp_customize->add_setting( 'tn_theme_topbar_show', array( 'default' => '1') );
	$wp_customize->add_control( 'tn_theme_topbar_show', array(
		'label'    => 'Show Topbar',
		'section'  => 'tn_theme_topbar_section',
		'type'     => 'radio',
		'choices'  => array( '0' => 'Hidden', '1' => 'Full width', '2' => 'Within a row', ),
		'priority' => 10,
	) );
	$wp_customize->add_setting( 'tn_theme_topbar_title', array( 'default' => 'Menu' ) );
	$wp_customize->add_control( 'tn_theme_topbar_title', array(
		'label'    => __( 'Mobile Menu Title', 'tn_' ),
		'section'  => 'tn_theme_topbar_section',
		'type'     => 'text',
		'priority' => 20,
	) );
	$wp_customize->add_setting( 'tn_theme_topbar_bg_color', array( 'default' => '#000000', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_topbar_bg_color', array(
		'label'    => __( 'Topbar Color', 'tn_' ),
		'section'  => 'tn_theme_topbar_section',
		'priority' => 30,
	) ) );
	$wp_customize->add_setting( 'tn_theme_topbar_bg_color_hover', array( 'default' => '#111111', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_topbar_bg_color_hover', array(
		'label'    => __( 'Topbar Hover Color', 'tn_' ),
		'section'  => 'tn_theme_topbar_section',
		'priority' => 40,
	) ) );
	$wp_customize->add_setting( 'tn_theme_topbar_font_color', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_topbar_font_color', array(
		'label'    => __( 'Topbar Font Color', 'tn_' ),
		'section'  => 'tn_theme_topbar_section',
		'priority' => 50,
	) ) );
	$wp_customize->add_setting( 'tn_theme_topbar_font_color_hover', array( 'default' => '#EEEEEE', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_topbar_font_color_hover', array(
		'label'    => __( 'Topbar Font Hover Color', 'tn_' ),
		'section'  => 'tn_theme_topbar_section',
		'priority' => 60,
	) ) );
	$wp_customize->add_setting( 'tn_theme_topbar_divide_color', array( 'default' => '#EEEEEE', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_topbar_divide_color', array(
		'label'    => __( 'Topbar Divider Color', 'tn_' ),
		'section'  => 'tn_theme_topbar_section',
		'priority' => 70,
	) ) );

// Hero Row
	$wp_customize->add_section( 'tn_theme_herorow_section', array(
		'title'   => 'Hero row',
		'priority'  => 43,
	) );
	// inputs
	$wp_customize->add_setting( 'tn_theme_herorow_show', array( 'default' => '1') );
	$wp_customize->add_control( 'tn_theme_herorow_show', array(
		'label'    => 'Show Herorow',
		'section'  => 'tn_theme_herorow_section',
		'type'     => 'radio',
		'choices'  => array( '0' => 'Hidden', '1' => 'Full width', '2' => 'Within a row', ),
		'priority' => 10,
	) );
	$wp_customize->add_setting( 'tn_theme_herorow_height_type', array( 'default' => 'height', ) );
	$wp_customize->add_control( 'tn_theme_herorow_height_type', array(
		'label'    => 'Height Type',
		'section'  => 'tn_theme_herorow_section',
		'type'     => 'radio',
		'choices'  => array( 'min-height' => 'min-height', 'height' => 'height', 'max-height' => 'max-height', ),
		'priority' => 20,
	) );
	$wp_customize->add_setting( 'tn_theme_herorow_overflow' );
	$wp_customize->add_control( 'tn_theme_herorow_overflow', array(
		'label'    => 'Overflow Hidden',
		'section'  => 'tn_theme_herorow_section',
		'type'     => 'checkbox',
		'priority' => 30,
	) );
	$wp_customize->add_setting( 'tn_theme_herorow_height', array( 'default' => '100px' ) );
	$wp_customize->add_control( 'tn_theme_herorow_height', array(
		'label'    => __( 'Height', 'tn_' ),
		'section'  => 'tn_theme_herorow_section',
		'type'     => 'text',
		'priority' => 40,
	) );
	$wp_customize->add_setting( 'tn_theme_herorow_bg_color', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_herorow_bg_color', array(
		'label'    => __( 'Background Color', 'tn_' ),
		'section'  => 'tn_theme_herorow_section',
		'priority' => 50,
	) ) );
	$wp_customize->add_setting( 'tn_theme_herorow_bg_image', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/herorow_bg.png' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tn_theme_herorow_bg_image', array(
		'label'    => __( 'Background Image', 'tn_' ),
		'section'  => 'tn_theme_herorow_section',
		'priority' => 60,
	) ) );
	$wp_customize->add_setting( 'tn_theme_herorow_bg_position', array( 'default' => 'center center' ) );
	$wp_customize->add_control( 'tn_theme_herorow_bg_position', array(
		'label'    => __( 'background Position', 'tn_' ),
		'section'  => 'tn_theme_herorow_section',
		'type'     => 'text',
		'priority' => 70,
	) );
	$wp_customize->add_setting( 'tn_theme_herorow_bg_repeat', array( 'default' => 'no-repeat' ) );
	$wp_customize->add_control( 'tn_theme_herorow_bg_repeat', array(
		'label'    => __( 'background Repeat', 'tn_' ),
		'section'  => 'tn_theme_herorow_section',
		'type'     => 'text',
		'priority' => 80,
	) );
	$wp_customize->add_setting( 'tn_theme_herorow_bg_size', array( 'default' => 'cover' ) );
	$wp_customize->add_control( 'tn_theme_herorow_bg_size', array(
		'label'    => __( 'Background Size', 'tn_' ),
		'section'  => 'tn_theme_herorow_section',
		'type'     => 'text',
		'priority' => 90,
	) );

// Pallet Primary
	$wp_customize->add_section( 'tn_theme_pallet1', array(
		'title'    => 'Primary Colors',
		'priority' => 50,
	) );
	// inputs
	$wp_customize->add_setting( 'tn_theme_color1', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_color1', array(
		'label'    => __( 'Primary Color', 'tn_' ),
		'section'  => 'tn_theme_pallet1',
		'priority' => 10,
	) ) );
	$wp_customize->add_setting( 'tn_theme_color1_highlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_color1_highlight', array(
		'label'    => __( 'Primary Color (highlight)', 'tn_' ),
		'section'  => 'tn_theme_pallet1',
		'priority' => 20,
	) ) );
	$wp_customize->add_setting( 'tn_theme_color1_lowlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_color1_lowlight', array(
		'label'    => __( 'Primary Color (lowlight)', 'tn_' ),
		'section'  => 'tn_theme_pallet1',
		'priority' => 30,
	) ) );

// Pallet Secondary
	$wp_customize->add_section( 'tn_theme_pallet2', array(
		'title'    => 'Secondary Colors',
		'priority' => 51,
	) );
	// inputs
	$wp_customize->add_setting( 'tn_theme_color2', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_color2', array(
		'label'    => __( 'Secondary Color', 'tn_' ),
		'section'  => 'tn_theme_pallet2',
		'priority' => 10,
	) ) );
	$wp_customize->add_setting( 'tn_theme_color2_highlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_color2_highlight', array(
		'label'    => __( 'Secondary Color (highlight)', 'tn_' ),
		'section'  => 'tn_theme_pallet2',
		'priority' => 20,
	) ) );
	$wp_customize->add_setting( 'tn_theme_color2_lowlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_color2_lowlight', array(
		'label'    => __( 'Secondary Color (lowlight)', 'tn_' ),
		'section'  => 'tn_theme_pallet2',
		'priority' => 30,
	) ) );

// Pallet Teritary
	$wp_customize->add_section( 'tn_theme_pallet3', array(
		'title'    => 'Tertiary  Colors',
		'priority' => 52,
	) );
	// inputs
	$wp_customize->add_setting( 'tn_theme_color3', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_color3', array(
		'label'    => __( 'Tertiary Color', 'tn_' ),
		'section'  => 'tn_theme_pallet3',
		'priority' => 10,
	) ) );
	$wp_customize->add_setting( 'tn_theme_color3_highlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_color3_highlight', array(
		'label'    => __( 'Tertiary Color (highlight)', 'tn_' ),
		'section'  => 'tn_theme_pallet3',
		'priority' => 20,
	) ) );
	$wp_customize->add_setting( 'tn_theme_color3_lowlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_color3_lowlight', array(
		'label'    => __( 'Tertiary Color (lowlight)', 'tn_' ),
		'section'  => 'tn_theme_pallet3',
		'priority' => 30,
	) ) );

// Contact Details
	$wp_customize->add_section( 'tn_theme_contacts_section', array(
		'title'    => 'Contact Details',
		'priority' => 60,
	) );
	// inputs
	$wp_customize->add_setting( 'tn_theme_contact_email' );
	$wp_customize->add_control( 'tn_theme_contact_email', array(
		'label'    => __( 'Email Address', 'tn_' ),
		'section'  => 'tn_theme_contacts_section',
		'type'     => 'text',
		'priority' => 10,
	) );
	$wp_customize->add_setting( 'tn_theme_contact_phone' );
	$wp_customize->add_control( 'tn_theme_contact_phone', array(
		'label'    => __( 'Phone Number', 'tn_' ),
		'section'  => 'tn_theme_contacts_section',
		'type'     => 'text',
		'priority' => 20,
	) );


// Copyright
	$wp_customize->add_section( 'tn_theme_copyright_section', array(
		'title'    => 'Copyright Statement',
		'priority' => 61,
	) );
	// inputs
	$wp_customize->add_setting( 'tn_theme_copyright', array( 'default' => 'Default copyright text' ) );
	$wp_customize->add_control( 'tn_theme_copyright', array(
		'label'    => __( 'Copyright text', 'tn_' ),
		'section'  => 'tn_theme_copyright_section',
		'type'     => 'text',
		'priority' => 30,
	) );

}
add_action( 'customize_register', 'fx_tn_theme_box' );

?>
