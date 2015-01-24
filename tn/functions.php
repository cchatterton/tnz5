<?php

// tn_onclick( $args );
// tn_new_field( $args );

add_theme_support('post-thumbnails');

function tn_onclick( $args ) {
	// last updated 19/07/2014

	is_array( $args ) ? extract( $args ) : parse_str( $args );
	// $args example: "url="http://techn.com.au&target=_blank&output=echo"

	//set defaults
	if( !$output ) $output = 'echo'; // valid $outputs include 'echo' and 'return'

	// the function
	$location = ( !$target ) ? "location.href='$url';" : "window.open('$url','$target')";
	if( $output == 'echo' ) { echo $location; } else { return $location; };

}

function tn_new_field( $args ){
	// last updated 19/07/2014

	is_array( $args ) ? extract( $args ) : parse_str( $args );
	// $args example: "url="http://techn.com.au&target=_blank&output=echo"

	//set defaults
	if( !$title && !$field_name) return;
	if( !$title && $field_name) $title = $field_name; $title = ucfirst( strtolower( $title ) );
	if( !$field_name && $title ) $field_name = $title; $field_name = strtolower( str_replace( ' ', '_', $field_name ) );
	if( !$size ) $size = '100%'; // accepts valid css for all types expect textarea. Text array expects an array where [0] is width and [1] is height
	if( !$max_width ) $max_width = '100%';
	if( !$type ) $type = 'text'; // accepts 'text', 'textarea', 'checkox', 'select'

	$script = substr( $_SERVER['PHP_SELF'], strrpos( $_SERVER['PHP_SELF'], '/')+1 );
	$source = ( $script == 'post.php' || $script == 'post-new.php' ) ? 'meta' : 'option';
	if ( !$source == 'option' && !$group ) return;
	$field_name = ( $source == 'option' ) ? $group."[".$name."]" : $field_name;

	echo ' <div style="display:block;width:100%;padding-bottom:5px;">'."\n";
	switch ($type) {

		case 'checkbox':
			$checked = ( $source == 'meta' && get_post_meta( $_GET[post], $field_name, true ) == 'true') ? 'checked="checked"' : '' ;
			if( $source == 'option' ) {
				$option = get_option( $group );
			 	$value = $option[$name];
			 	$checked = ( $value == 'true' ) ? 'checked="checked"' : '';
			 }
			echo '   <input type="checkbox" name="'.$field_name.'" value="true" '.$checked.' style="margin: 0 5px 0px 0;"/><label style="color:rgba(0,0,0,0.75);">'.$title.'</label>'."\n";
			break;

		case 'textarea':
			if( $source == 'meta' ) $value = get_post_meta( $_GET[post], $field_name, true );
			if( $source == 'option' ) {
				$option = get_option( $group );
			 	$value = $option[$name];
			 }
		 	if( $default && !$value ) $value = $default;
			echo '	<label for="'.$field_name.'">'."\n";
			echo '   	<sub style="color:rgba(0,0,0,0.75);display:block;">'.$title.'</sub>'."\n";
			echo '   </label>'."\n";
			if( !is_array( $size ) ) $size = explode(',', $size);
			$style = 'width:'.$size[0].';height:'.$size[1].';max-width:'.$max_width.';';
			echo '   <textarea id="'.$field_name.'" name="'.$field_name.'" style="'.$style.';" placeholder="'.$placeholder.'" >'.esc_attr( $value ).'</textarea>'."\n";
			break;

		case 'select':
		// expects an $options array of arrays as follows
		// $options = array (
		//		array ( 'label' => 'aaa', 'value' => '1' ),
		//		array ( 'label' => 'aaa', 'value' => '1' ),
		//		);
			$current = get_post_meta( $_GET[post], $field_name, true ) ;
			echo '	<sub style="color:rgba(0,0,0,0.75);display:block;width:100%;max-width:'.$max_width.';">'.$title.'</sub>'."\n";
			echo '  	<select name="'.$field_name.'" id="'.$field_name.'">'."\n";
			foreach( $options as $option ) echo '		<option value="'.$option['value'].'" '.selected( $option['value'], $current, false ).'>'.$option['label'].'</option>'."\n";
			echo '	</select>'."\n";
			break;

		case 'color-picker':
			echo '	<label for="meta-color" class="prfx-row-title" style="display:block;width:100%;max-width:'.$max_width.';">'.$title.'</label>'."\n";
    		echo '	<input name="'.$field_name.'" type="text" value="'.get_post_meta( $_GET[post], $field_name, true ).'" class="meta-color" />'."\n";
			break;

		case 'wp-editor':
			if( $source == 'meta' ) $value = get_post_meta( $_GET[post], $field_name, true );
			if( $source == 'option' ) {
				$option = get_option( $group );
			 	$value = $option[$name];
			 }
		 	if( $default && !$value ) $value = $default;
			wp_editor( $value, $field_name, $settings );
			break;

		case 'text':
		default:
			if( $source == 'meta' ) $value = get_post_meta( $_GET[post], $field_name, true );
			if( $source == 'option' ) {
				$option = get_option( $group );
			 	$value = $option[$name];
			 }
		 	if( $default && !$value ) $value = $default;
			echo '	<label for="'.$field_name.'">'."\n";
			echo '		<sub style="color:rgba(0,0,0,0.75);display:block;">'.$title.'</sub>'."\n";
			echo '	</label>'."\n";
			echo '   <input type="'.$type.'" id="'.$field_name.'" name="'.$field_name.'" style="display:block;max-width:'.$max_width.';width:'.$size.';" placeholder="'.$placeholder.'" value="'.esc_attr( $value ).'" />'."\n";
			break;

	}
	if( $description ) echo '   <div style="position:relative;top:-3px;display:block;width:100%;color:#ddd;font-size:0.8em;">'.$description.'</div>'."\n";
	echo ' </div>'."\n";
	return $field_name;

}

if ( ! isset( $content_width ) ) $content_width = 1000;

function tn_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'tn_title', 10, 2 );


add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );

function toolbar_link_to_mypage( $wp_admin_bar ) {

	$qs = $_SERVER["QUERY_STRING"]; parse_str($qs); parse_str($qs, $atts);

	if ( !$atts['status'] ) {
		$atts['option'] = get_option( 'tn_site_status' );
	} else {
		update_option( 'tn_site_status', strtolower( $atts['status'] ) );
		$atts['option'] = $atts['status'];
	}

	$statuses = array('development','staging','production' );

	$i = 1;
	foreach ($statuses as $status) {
		// var_dump('atts'.$atts['status']);
		// var_dump('status'.$status);
		$class = ( $atts['option'] == $status ) ? $status : '';
		$atts['status'] = $status;

		$qs = http_build_query( $atts );
		$args = array(
			'id'    => $status,
			'title' => ucfirst( $status ),
			'href'  => '?'.$qs,
			'meta'  => array( 'class' => 'site-status '.$class )
		);
		$wp_admin_bar->add_node( $args );
	}


	// 12 or 24?
		if ( !$atts['zurb'] ) {
			$atts['zurb'] = get_option( 'tn_zurb_grid' );
		} else {
			update_option( 'tn_zurb_grid', intval( $atts['zurb'] ) );
		}

		$title = ( $atts['zurb'] == 12 ) ? 12 : 24;
		$atts['zurb'] = ( $atts['zurb'] == 12 ) ? 24 : 12;

		$qs = http_build_query( $atts );
		$args = array(
			'id'    => 'zurb',
			'title' => 'Z'.$title,
			'href'  => '?'.$qs,
			'meta'  => array( 'class' => 'zurb-grid ' )
		);
		$wp_admin_bar->add_node( $args );

}

?>