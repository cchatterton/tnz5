<?php

function theme_styles(){
	// get default style
	$tn_style = file_get_contents( tn_r( 'css_path' ).'style.css' );

	// create dynamic style
	$tn_style .="

	body {background: ".__( get_theme_mod( 'tn_theme_bg_color' ) )." url(".__( get_theme_mod( 'tn_theme_bg_image' ) ).") ".__( get_theme_mod( 'tn_theme_bg_position' ) )." / ".__( get_theme_mod( 'tn_theme_bg_size' ) )." ".__( get_theme_mod( 'tn_theme_bg_repeat' ) ).";}
 #header-wrapper {display: block; height:".__( get_theme_mod( 'tn_theme_header_height' ) )."background: ".__( get_theme_mod( 'tn_theme_header_bg_color' ) )." url(".__( get_theme_mod( 'tn_theme_header_bg_image' ) ).") ".__( get_theme_mod( 'tn_theme_header_bg_position' ) )." ".__( get_theme_mod( 'tn_theme_header_bg_repeat' ) ).";}
	/* topbar style */
	.top-bar.expanded {display: inline;}
	.top-bar.expanded .title-area, .top-bar-section ul li:hover > a {background: ".__( get_theme_mod( 'tn_theme_topbar_bg_color_hover' ) ).";}
	.top-bar.expanded .toggle-topbar a{color:".__( get_theme_mod( 'tn_theme_topbar_bg_color_hover' ) ).";}
	.top-bar.expanded .toggle-topbar a span{box-shadow: 0 10px 0 1px #FFFFFF, 0 16px 0 1px #FFFFFF, 0 22px 0 1px #FFFFFF;}
	.top-bar, .top-bar-section ul {background:none;}
	#tn-top-bar {height: 80px;overflow: hidden;}
	#tn-logo-large {left: -20px; position: relative; padding: 10px;}
	#menu-wrapper { border-top: 1px solid rgba(0,0,0,0.10);	height: 46px;	width: 100%;}
	#menu-wrapper .row.collapse.fixed { top: 109px; }
	#menu-wrapper, .top-bar, .top-bar-section li a:not(.button) { background: none repeat scroll 0 0 ".__( get_theme_mod( 'tn_theme_topbar_bg_color' ) )."; color: ".__( get_theme_mod( 'tn_theme_topbar_font_color' ) )."}
	.top-bar-section li a:hover:not(.button) { background: none repeat scroll 0% 0% ".__( get_theme_mod( 'tn_theme_topbar_bg_color_hover' ) )."!important; color: ".__( get_theme_mod( 'tn_theme_topbar_font_color_hover' ) )."}
	.top-bar-section .divider { border-bottom: 1px solid ".__( get_theme_mod( 'tn_theme_topbar_divide_color' ) )."!important; border-top: 1px solid rgba(0,0,0,0.1)!important; clear: both; height: 1px; width: 100%; }
";

	// write full style to style.css
	file_put_contents( tn_r( 'css_path' ).'theme.css', $tn_style );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

?>