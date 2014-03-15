<?php

function fx_theme_row( $rowname, $class='', $path='' ){

    if ( $rowname != 'top-bar' && $path != 'includes/nav-topbar.php' ) {

    // add to row options to customizer
    $wp_customize->add_section( 'tn_theme_'.$rowname.'_section', array(
      'title'    => $rowname,
      'priority' => 41,
    ) );
    // inputs
    $wp_customize->add_setting( 'tn_theme_'.$rowname.'_show', array( 'default' => '1') );
    $wp_customize->add_control( 'tn_theme_'.$rowname.'_show', array(
      'label'    => __( 'Show '.$rowname, 'tn_'),
      'section'  => 'tn_theme_'.$rowname.'_section',
      'type'     => 'radio',
      'choices'  => array( '0' => 'Hidden', '1' => 'Full width', '2' => 'Within a row', ),
      'priority' => 10,
    ) );
    $wp_customize->add_setting( 'tn_theme_'.$rowname.'_bg_image', array( 'default' => esc_url( get_bloginfo( 'template_url' ) ).'/images/'.$rowname.'_bg.png' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tn_theme_'.$rowname.'_bg_image', array(
      'label'    => __( 'Background Image', 'tn_' ),
      'section'  => 'tn_theme_'.$rowname.'_section',
      'priority' => 20,
    ) ) );
    $wp_customize->add_setting( 'tn_theme_'.$rowname.'_bg_color', array( 'default' => '#cecece', 'sanitize_callback' => 'sanitize_hex_color', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'tn_theme_'.$rowname.'_bg_color', array(
      'label'    => __( 'Background Color', 'tn_' ),
      'section'  => 'tn_theme_toprow_section',
      'priority' => 30,
    ) ) );
    $wp_customize->add_setting( 'tn_theme_'.$rowname.'_bg_css' );
    $wp_customize->add_control( 'tn_theme_'.$rowname.'_bg_css', array(
      'label'    => __( 'CSS', 'tn_' ),
      'description' => 'excludes color and background image',
      'section'  => 'tn_theme_'.$rowname.'_section',
      'type'     => 'text',
      'priority' => 40,
    ) );

  }

  // setup the css
  echo "<style>"."\n";
  echo "  #row-".$rowname." {"."\n";
  echo "    background-color: ".__( get_theme_mod( 'tn_theme_'.$rowname.'_bg_color' ) ).";"."\n";
  echo "    background-image: ".url(".__( get_theme_mod( 'tn_theme_'.$rowname.'_bg_image' ) ).") ";"."\n";
  echo "    backgound: ".__( get_theme_mod( 'tn_theme_'.$rowname.'_bg_css' ) )."; }"."\n";
  echo "  }"."\n";
  echo "</style>"."\n";

  // setup the wrapper
	if ( __( get_theme_mod( 'tn_theme_'.$rowname.'_show' ) ) != 0 ) { // <-- hide row
		_e( "\n".'<!-- '.$rowname.' row -->'."\n", 'tn_' );
  _e( '<div class="'.$class.'" id="row-'.$rowname.'">'."\n", 'tn_' );
  if ( __( get_theme_mod( 'tn_theme_'.$rowname.'_show' ) ) == 2 ) {
  	_e( '	<div class="row ">'."\n" ); // <-- inner row
  } else {
   _e( '	<div>'."\n" );
  }

  // get the template
  if ( $path ) {
    include( $path ); // <-- use includes/templatename.php
  } else {
    get_template_part( $rowname ); // <-- get the template as a theme part from the root directory
  }

  // close the wrapper
  _e( '	</div>'."\n", 'tn_' );
  _e( '</div>'."\n", 'tn_' );
  _e( '<!-- end '.$rowname.' row -->'."\n", 'tn_' );

  // done!




}
