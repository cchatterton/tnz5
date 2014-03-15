<?php

function fx_theme_row( $rowname, $class='', $path='' ){

  if ( __( get_theme_mod( 'tn_theme_'.$rowname.'_show' ) ) != 0 ) { // <-- hide row

    if ( $rowname != 'topbar' && $path != 'includes/nav-topbar.php' ) {

      // setup the css
      echo "<style>"."\n";
      echo "  #row-".$rowname." {"."\n";
      echo "    background-color: ".__( get_theme_mod( 'tn_theme_'.$rowname.'_bg_color' ) ).";"."\n";
      echo "    background-image: url(".__( get_theme_mod( 'tn_theme_'.$rowname.'_bg_image' ) ) .");"."\n";
      echo "    backgound: ".__( get_theme_mod( 'tn_theme_'.$rowname.'_bg_css' ) )."; }"."\n";
      echo "  }"."\n";
      echo "</style>"."\n";

    }

    // setup the wrapper
		_e( "\n".'<!-- '.$rowname.' row -->'."\n", 'tn_' );
    _e( '<div class="full-row '.$class.'" id="row-'.$rowname.'">'."\n", 'tn_' );
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

  }
  // done!

}