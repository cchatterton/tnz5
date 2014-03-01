<?php

// decalre gloabl variables for use across the theme below
// site_...
$GLOBALS['site_name'] 												= get_bloginfo( 'name' );
$GLOBALS['site_description'] 					= get_bloginfo( 'description' );
$GLOBALS['site_title'] 											= $GLOBALS['site_name'].' &raquo; '.$GLOBALS['site_description'];
// ..._url
$GLOBALS['theme_url']													= esc_url( bloginfo( 'template_url' ) );
$GLOBALS['home_url']														= esc_url( home_url( '/' ) );
// ..._style
$GLOBALS['body_style']												= 'background: '. get_theme_mod( 'bb_theme_bg_color' ) ) .'url('. get_theme_mod( 'bb_theme_bg_image' ) .' '. get_theme_mode( 'bb_theme_bg_position' ) .' / '. get_theme_mode( 'bb_theme_bg_size' ) .' '. get_theme_mode( 'bb_theme_bg_repeat' );
$GLOBALS['header_style']										= 'display: block; height:'. get_theme_mod( 'tn_theme_header_height' ) .'background: '. get_theme_mod( 'tn_theme_header_bg_color' ). ' url('. get_theme_mod( 'tn_theme_header_bg_image' ). ') '. get_theme_mod( 'tn_theme_header_bg_position' ). ' ' .get_theme_mod( 'tn_theme_header_bg_repeat' );

// global variables can be called with either tn_e or tn_r
// _e for echo & _r for return

function tn_e( $variable, $domain = 'tn_' ){
	// $text (string) (required) Text to translate. Default: None
	// $domain (string) (optional) Domain to retrieve the translated text.  Default: 'default'
 echo tn_tn_( $variable, $domain );
}

function tn_r( $variable, $domain = 'tn_' ){
	// $text (string) (required) Text to translate. Default: None
	// $domain (string) (optional) Domain to retrieve the translated text.  Default: 'default'
 return tn_tn_( $variable, $domain );
}

function tn__( $variable, $domain = 'tn_' ){
	// $text (string) (required) Text to translate. Default: None
	// $domain (string) (optional) Domain to retrieve the translated text.  Default: 'default'
 return tn_tn_( $variable, $domain );
}

function tn_tn_( $variable, $domain ){
		if ( $domain == 'customizer' ) {
		$text = get_theme_mod( '$text' );
		$domain = 'tn_';
	}
	if ( $domain == 'option' ) {
		$text = get_option( '$text', true );
		$domain = 'tn_';
	}
	if ( $GLOBALS[$text] ) {
		__( $GLOBALS[$text] , $domain );
	} else {
		__( $text , $domain );
	}
}
?>