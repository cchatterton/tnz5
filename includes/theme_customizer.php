<?php

// http://themefoundation.com/wordpress-theme-customizer/
function fx_bb_theme_box( $wp_customize ) {

// Key Images (Desktop Logo, Mobile Logo and Favicon)
	$wp_customize->add_section( 'bb_theme_images_section', array(
		'title'    	=> __( 'Logos', 'bb_' ),
		//'description' 	=> __( 'add the URLs for key images below', 'bb_' ),
		'priority' 	=> 30,
	) );
	// inputs
	$wp_customize->add_setting( 'bb_theme_image_logo_large' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bb_theme_image_logo_large', array(
		'label' 		=> __( 'Large Screen Logo', 'bb_' ),
		'section' 	=> 'bb_theme_images_section',
	) ) );
	$wp_customize->add_setting( 'bb_theme_image_logo_medium' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bb_theme_image_logo_medium', array(
		'label' 		=> __( 'Medium Screen Logo', 'bb_' ),
		'section' 	=> 'bb_theme_images_section',
	) ) );
	$wp_customize->add_setting( 'bb_theme_image_logo_small' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bb_theme_image_logo_small', array(
		'label' 		=> __( 'Small Screen Logo', 'bb_' ),
		'section' 	=> 'bb_theme_images_section',
	) ) );
	$wp_customize->add_setting( 'bb_theme_image_logo_desktop_width', array( 'default' => '100px' ) );
	$wp_customize->add_control( 'bb_theme_image_logo_desktop_width', array(
		'label' 		=> __( 'Medium-up Screen Logo Width', 'bb_' ),
		'section' 	=> 'bb_theme_images_section',
		'type' 		=> 'text'
	) );
	$wp_customize->add_setting( 'bb_theme_image_logo_small_width', array( 'default' => '100px' ) );
	$wp_customize->add_control( 'bb_theme_image_logo_small_width', array(
		'label' 		=> __( 'Small Screen Logo Width', 'bb_' ),
		'section' 	=> 'bb_theme_images_section',
		'type' 		=> 'text'
	) );
	$wp_customize->add_setting( 'bb_theme_image_logo_small_padding', array( 'default' => '3px' ) );
	$wp_customize->add_control( 'bb_theme_image_logo_small_padding', array(
		'label' 		=> __( 'Small Screen Logo Padding', 'bb_' ),
		'section' 	=> 'bb_theme_images_section',
		'type' 		=> 'text'
	) );
	$wp_customize->add_setting( 'bb_theme_image_favicon' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bb_theme_image_favicon', array(
		'label' 		=> __( 'Favicon', 'bb_' ),
		'section' 	=> 'bb_theme_images_section',
	) ) );

// Theme BG
	$wp_customize->add_section( 'bb_theme_bg_section', array(
		'title' 		=> 'Theme Background',
		'priority' 	=> 40,
	) );
	// inputs
	$wp_customize->add_setting( 'bb_theme_bg_color', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_bg_color', array(
		'label' 		=> __( 'Background Color', 'bb_' ),
		'section' 	=> 'bb_theme_bg_section',
		'priority' 	=> 50,
	) ) );
	$wp_customize->add_setting( 'bb_theme_bg_image', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/bg_image.png' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bb_theme_bg_image', array(
		'label' 		=> __( 'Background Image', 'bb_' ),
		'section' 	=> 'bb_theme_bg_section',
		'priority' 	=> 60,
	) ) );
	$wp_customize->add_setting( 'bb_theme_bg_position', array( 'default' => 'center center' ) );
	$wp_customize->add_control( 'bb_theme_bg_position', array(
		'label' 		=> __( 'Background Position', 'bb_' ),
		'section' 	=> 'bb_theme_bg_section',
		'type' 		=> 'text',
		'priority' 	=> 70,
	) );
	$wp_customize->add_setting( 'bb_theme_bg_repeat', array( 'default' => 'no-repeat' ) );
	$wp_customize->add_control( 'bb_theme_bg_repeat', array(
		'label' 		=> __( 'Background Repeat', 'bb_' ),
		'section' 	=> 'bb_theme_bg_section',
		'type' 		=> 'text',
		'priority' 	=> 80,
	) );
	$wp_customize->add_setting( 'bb_theme_bg_size', array( 'default' => 'cover' ) );
	$wp_customize->add_control( 'bb_theme_bg_size', array(
		'label' 		=> __( 'Background Size', 'bb_' ),
		'section' 	=> 'bb_theme_bg_section',
		'type' 		=> 'text',
		'priority' 	=> 80,
	) );

// Header
	$wp_customize->add_section( 'bb_theme_header_section', array(
		'title' 		=> 'Header',
		'priority' 	=> 40,
	) );
	// inputs
	$wp_customize->add_setting( 'bb_theme_header_show' );
	$wp_customize->add_control( 'bb_theme_header_show', array(
		'label' 		=> 'Show Logo Row',
		'section' 	=> 'bb_theme_header_section',
		'type' 		=> 'checkbox',
		'priority' 	=> 10,
	) );
	$wp_customize->add_setting( 'bb_theme_header_height_type', array( 'default' => 'height', ) );
	$wp_customize->add_control( 'bb_theme_header_height_type', array(
		'label' 		=> 'Height Type',
		'section' 	=> 'bb_theme_header_section',
		'type' 		=> 'radio',
		'choices' 	=> array( 'min-height' => 'min-height', 'height' => 'height', 'max-height' => 'max-height', ),
		'priority' 	=> 20,
	) );
	$wp_customize->add_setting( 'bb_theme_header_overflow' );
	$wp_customize->add_control( 'bb_theme_header_overflow', array(
		'label' 		=> 'Overflow Hidden',
		'section' 	=> 'bb_theme_header_section',
		'type' 		=> 'checkbox',
		'priority' 	=> 30,
	) );

	$wp_customize->add_setting( 'bb_theme_header_height', array( 'default' => '100px' ) );
	$wp_customize->add_control( 'bb_theme_header_height', array(
		'label' 		=> __( 'Height', 'bb_' ),
		'section' 	=> 'bb_theme_header_section',
		'type' 		=> 'text',
		'priority' 	=> 40,
	) );
	$wp_customize->add_setting( 'bb_theme_header_bg_color', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_header_bg_color', array(
		'label' 		=> __( 'Background Color', 'bb_' ),
		'section' 	=> 'bb_theme_header_section',
		'priority' 	=> 50,
	) ) );
	$wp_customize->add_setting( 'bb_theme_header_bg_image', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/bg_image.png' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bb_theme_header_bg_image', array(
		'label' 		=> __( 'Background Image', 'bb_' ),
		'section' 	=> 'bb_theme_header_section',
		'priority' 	=> 60,
	) ) );
	$wp_customize->add_setting( 'bb_theme_header_bg_position', array( 'default' => 'center center' ) );
	$wp_customize->add_control( 'bb_theme_header_bg_position', array(
		'label' 		=> __( 'background Position', 'bb_' ),
		'section' 	=> 'bb_theme_header_section',
		'type' 		=> 'text',
		'priority' 	=> 70,
	) );
	$wp_customize->add_setting( 'bb_theme_header_bg_repeat', array( 'default' => 'no-repeat' ) );
	$wp_customize->add_control( 'bb_theme_header_bg_repeat', array(
		'label' 		=> __( 'background Repeat', 'bb_' ),
		'section' 	=> 'bb_theme_header_section',
		'type' 		=> 'text',
		'priority' 	=> 80,
	) );

// Topbar
	$wp_customize->add_section( 'bb_theme_topbar_section', array(
		'title' 		=> 'Topbar',
		'priority' 	=> 40,
	) );
	// inputs
	$wp_customize->add_setting( 'bb_theme_topbar_show', array( 'default' => '1') );
	$wp_customize->add_control( 'bb_theme_topbar_show', array(
		'label' 		=> 'Show Topbar',
		'section' 	=> 'bb_theme_topbar_section',
		'type' 		=> 'radio',
		'choices' 	=> array( '0' => 'No topbar', '1' => 'Full width topbar', '2' => 'Topbar content within a row', ),
	) );
	$wp_customize->add_setting( 'bb_theme_topbar_title', array( 'default' => 'Menu' ) );
	$wp_customize->add_control( 'bb_theme_topbar_title', array(
		'label' 		=> __( 'Mobile Menu Title', 'bb_' ),
		'section' 	=> 'bb_theme_topbar_section',
		'type' 		=> 'text'
	) );
	$wp_customize->add_setting( 'bb_theme_topbar_bg_color', array( 'default' => '#000000', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_topbar_bg_color', array(
		'label' 		=> __( 'Topbar Color', 'bb_' ),
		'section' 	=> 'bb_theme_topbar_section',
	) ) );
	$wp_customize->add_setting( 'bb_theme_topbar_bg_color_hover', array( 'default' => '#111111', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_topbar_bg_color_hover', array(
		'label' 		=> __( 'Topbar Hover Color', 'bb_' ),
		'section' 	=> 'bb_theme_topbar_section',
	) ) );
	$wp_customize->add_setting( 'bb_theme_topbar_font_color', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_topbar_font_color', array(
		'label' 		=> __( 'Topbar Font Color', 'bb_' ),
		'section' 	=> 'bb_theme_topbar_section',
	) ) );
	$wp_customize->add_setting( 'bb_theme_topbar_font_color_hover', array( 'default' => '#EEEEEE', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_topbar_font_color_hover', array(
		'label' 		=> __( 'Topbar Font Hover Color', 'bb_' ),
		'section' 	=> 'bb_theme_topbar_section',
	) ) );
	$wp_customize->add_setting( 'bb_theme_topbar_divide_color', array( 'default' => '#EEEEEE', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_topbar_divide_color', array(
		'label' 		=> __( 'Topbar Divider Color', 'bb_' ),
		'section' 	=> 'bb_theme_topbar_section',
	) ) );

// Pallets
	$wp_customize->add_section( 'bb_theme_pallet1', array(
		'title' 		=> 'Primary Colors',
		'priority' 	=> 70,
	) );
	// inputs
	$wp_customize->add_setting( 'bb_theme_color1', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color1', array(
		'label' 		=> __( 'Primary Color', 'bb_' ),
		'priority' 	=> 10,
		'section' 	=> 'bb_theme_pallet1',
	) ) );
	$wp_customize->add_setting( 'bb_theme_color1_highlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color1_highlight', array(
		'label' 		=> __( 'Primary Color (highlight)', 'bb_' ),
		'priority' 	=> 20,
		'section' 	=> 'bb_theme_pallet1',
	) ) );
	$wp_customize->add_setting( 'bb_theme_color1_lowlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color1_lowlight', array(
		'label' 		=> __( 'Primary Color (lowlight)', 'bb_' ),
		'priority' 	=> 30,
		'section' 	=> 'bb_theme_pallet1',
	) ) );

	$wp_customize->add_section( 'bb_theme_pallet2', array(
		'title' 		=> 'Secondary Colors',
		'priority' 	=> 71,
	) );
	// inputs
	$wp_customize->add_setting( 'bb_theme_color2', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color2', array(
		'label' 		=> __( 'Secondary Color', 'bb_' ),
		'priority' 	=> 10,
		'section' 	=> 'bb_theme_pallet2',
	) ) );
	$wp_customize->add_setting( 'bb_theme_color2_highlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color2_highlight', array(
		'label' 		=> __( 'Secondary Color (highlight)', 'bb_' ),
		'priority' 	=> 20,
		'section' 	=> 'bb_theme_pallet2',
	) ) );
	$wp_customize->add_setting( 'bb_theme_color2_lowlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color2_lowlight', array(
		'label' 		=> __( 'Secondary Color (lowlight)', 'bb_' ),
		'priority' 	=> 30,
		'section' 	=> 'bb_theme_pallet2',
	) ) );

	$wp_customize->add_section( 'bb_theme_pallet3', array(
		'title' 		=> 'Tertiary  Colors',
		'priority' 	=> 72,
	) );
	// inputs
	$wp_customize->add_setting( 'bb_theme_color3', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color3', array(
		'label' 		=> __( 'Tertiary Color', 'bb_' ),
		'priority' 	=> 10,
		'section' 	=> 'bb_theme_pallet3',
	) ) );
	$wp_customize->add_setting( 'bb_theme_color3_highlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color3_highlight', array(
		'label' 		=> __( 'Tertiary Color (highlight)', 'bb_' ),
		'priority' 	=> 20,
		'section' 	=> 'bb_theme_pallet3',
	) ) );
	$wp_customize->add_setting( 'bb_theme_color3_lowlight', array( 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color', ) );
	$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'bb_theme_color3_lowlight', array(
		'label' 		=> __( 'Tertiary Color (lowlight)', 'bb_' ),
		'priority' 	=> 30,
		'section' 	=> 'bb_theme_pallet3',
	) ) );

// Contact Details
	$wp_customize->add_section( 'bb_theme_contacts_section', array(
		'title' 		=> 'Contact Details',
		'priority' 	=> 80,
	) );
	// inputs
	$wp_customize->add_setting( 'bb_theme_contact_email' );
	$wp_customize->add_control( 'bb_theme_contact_email', array(
		'label' 		=> __( 'Email Address', 'bb_' ),
		'section' 	=> 'bb_theme_contacts_section',
		'type' 		=> 'text'
	) );
	$wp_customize->add_setting( 'bb_theme_contact_phone' );
	$wp_customize->add_control( 'bb_theme_contact_phone', array(
		'label' 		=> __( 'Phone Number', 'bb_' ),
		'section' 	=> 'bb_theme_contacts_section',
		'type' 		=> 'text'
	) );


// Copyright
	$wp_customize->add_section( 'bb_theme_copyright_section', array(
		'title' 		=> 'Copyright Statement',
		'priority' 	=> 99,
	) );
	// inputs
	$wp_customize->add_setting( 'bb_theme_copyright', array( 'default' => 'Default copyright text' ) );
	$wp_customize->add_control( 'bb_theme_copyright', array(
		'label' 		=> __( 'Copyright text', 'bb_' ),
		'section' 	=> 'bb_theme_copyright_section',
		'type' 		=> 'text'
	) );

}
add_action( 'customize_register', 'fx_bb_theme_box' );

?>
