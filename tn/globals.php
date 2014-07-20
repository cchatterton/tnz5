<?php

define('ns_', 'tn_');

// decalre gloabl variables for use across the theme below
// site_...
$GLOBALS['site_name'] 												= get_bloginfo( 'name' );
$GLOBALS['site_description'] 					= get_bloginfo( 'description' );
$GLOBALS['site_title'] 											= $GLOBALS['site_name'].' &raquo; '.$GLOBALS['site_description'];
// ..._url
$GLOBALS['theme_url']													= get_template_directory_uri();
$GLOBALS['home_url']														= esc_url( home_url( '/' ) );
// ..._path
$x = get_bloginfo( 'template_directory' );
$x = substr( $x, ( strlen( $x ) - ( ( strrpos( $x, '/' ) ) ) - 1 ) * -1 );
$GLOBALS['css_path'] 													= "wp-content/themes/$x/css/";

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
		$variable = get_theme_mod( $variable );
		$domain = 'tn_';
	}
	if ( $domain == 'option' ) {
		$variable = get_option( $variable, true );
		$domain = 'tn_';
	}

	// var_dump( $GLOBALS[$variable] );
	// var_dump( $domain );
	// die();

	if ( $GLOBALS[$variable] ) {
		return __( $GLOBALS[$variable] , $domain );
	} else {
		return __( $variable , $domain );
	}
}

// var_dump($GLOBALS);
?>