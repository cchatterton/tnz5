<?php

function fx_theme_row( $rowname, $class='', $path='' ){

  // setup the wrapper
	if ( __( get_theme_mod( 'tn_theme_'.$rowname.'_show' ) ) != 0 ) { // <-- hide row
		_e( "\n".'<!-- '.$rowname.' row -->'."\n", 'tn_' );
  _e( '<div class="'.$class.'" id="'.$rowname.'">'."\n", 'tn_' );
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
