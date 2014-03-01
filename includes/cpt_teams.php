<?php

// find'n replace (preseve case)
// 1. Teams & Team (as cpt)
// Remember to include in functions.php

function cpt_team() {
	$labels = array(
		'name'               => _x( 'Team', 'post type general name' ),
		'singular_name'      => _x( 'Team', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Team' ),
		'add_new_item'       => __( 'Add New Team' ),
		'edit_item'          => __( 'Edit Team' ),
		'new_item'           => __( 'New Team' ),
		'all_items'          => __( 'All Teams' ),
		'view_item'          => __( 'View Team' ),
		'search_items'       => __( 'Search Teams' ),
		'not_found'          => __( 'No Teams found' ),
		'not_found_in_trash' => __( 'No Teams found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Teams'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Team posts',
		'public'        => true,
		'menu_position' => 20,
 	 // 'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'supports'      => array( 'title', 'editor', 'thumbnail', 'page-attributes'),
		'has_archive'   => true,
		'hierarchical' 	=> true
	);
	register_post_type( 'team', $args );
}
add_action( 'init', 'cpt_team' );


// Styling for the custom post type icon

function cpt_team_header() {

	$menu = site_url().'/wp-content/themes/'.get_template().'/images/team_menu_icon.png';
	$icon = site_url().'/wp-content/themes/'.get_template().'/images/team_cpt_icon.png';

	echo '<style type="text/css" media="screen">'."\n";
	echo '	#menu-posts-team post .wp-menu-image { background: url('.$menu.') no-repeat 4px -35px!important; }'."\n";
	echo '	#menu-posts-team post:hover .wp-menu-image {background: url('.$menu.') no-repeat 4px -2px!important; }'."\n";
	echo '	#icon-edit.icon32-posts-team post {background: url('.$icon.') no-repeat -1px 2px;}'."\n";
	echo ' #team post_value {width: 50%;}'."\n";
	echo '</style>'."\n";

}
add_action( 'admin_head', 'cpt_team_header' );

// Set Messages
function cpt_team_messages( $messages ) {
//http://codex.wordpress.org/Function_Reference/register_post_type

  global $post, $post_ID;

  $messages['team'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Team Post updated.', 'your_text_domain'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Team updated.', 'your_text_domain'),
    3 => __('CTeam deleted.', 'your_text_domain'),
    4 => __('Team Post updated.', 'your_text_domain'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Team Post restored to revision from %s', 'your_text_domain'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Team Post published. <a href="%s">View Team Post</a>', 'your_text_domain'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Team Post saved.', 'your_text_domain'),
    8 => sprintf( __('Team Post submitted. <a target="_blank" href="%s">Preview Team Post</a>', 'your_text_domain'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Team Post scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Team Post</a>', 'your_text_domain'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Team Post draft updated. <a target="_blank" href="%s">Preview Team Post</a>', 'your_text_domain'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'cpt_team_messages' );

function cpt_team_colors_box() {
    add_meta_box(
        'cpt_team_colors_box',
        __( 'Team colors', '' ),
        'cpt_team_colors_box_content',
        'team',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'cpt_team_colors_box' );

function cpt_team_colors_box_content( $post ) {
	wp_nonce_field( plugin_basename( __FILE__ ), 'cpt_team_colors_box_content_nonce' );
	// custom fields here!
	team_meta_field('Color #1','cpt_team_meta_color_1','100%','text','#000000');
	team_meta_field('Color #2','cpt_team_meta_color_2','100%','text','#000000');
	team_meta_field('Color #3','cpt_team_meta_color_3','100%','text','#000000');
}

function cpt_team_results_box() {
    add_meta_box(
        'cpt_team_results_box',
        __( 'Team Results', '' ),
        'cpt_team_results_box_content',
        'team',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'cpt_team_results_box' );

function cpt_team_results_box_content( $post ) {
	wp_nonce_field( plugin_basename( __FILE__ ), 'cpt_team_results_box_content_nonce' );
	// custom fields here!
	team_meta_field('Played','cpt_team_meta_results_p','100%');
	team_meta_field('Won','cpt_team_meta_results_w','100%');
	team_meta_field('Drawn','cpt_team_meta_results_d','100%');
	team_meta_field('Lost','cpt_team_meta_results_l','100%');
	team_meta_field('For','cpt_team_meta_results_f','100%');
	team_meta_field('Against','cpt_team_meta_results_a','100%');
	team_meta_field('Goal Difference','cpt_team_meta_results_gd','100%');
	team_meta_field('Points','cpt_team_meta_results_pts','100%');
}

add_action( 'save_post', 'cpt_team_meta_box_save' );

function team_meta_field($title,$name,$size,$type='text',$placeholder=''){

	$title = ucfirst(strtolower($title));

	switch ($type) {

		case 'checkbox':

			$checked = ( get_post_meta( $_GET[post], $name, true )=='true') ? 'checked="'.get_option($name) .'"' : '' ;

		    echo '	<tr valign="top" >'."\n";
		    echo '  	<td style="padding:10px 0;">'."\n";
						echo ' 		<input type="checkbox" name="'.$name.'" value="true" '.$checked.' style="margin: 0 5px 0 0;"/><sub style="color:rgba(0,0,0,0.75);">'.$title.'</sub>'."\n";
		    echo '  	</td>'."\n";
		    echo '	</tr>'."\n";

			break;

		case 'text':
		default:

		    echo '	<tr valign="top" >'."\n";
		    echo '  	<td style="padding:5px 0px;">'."\n";
		    echo '			<sub style="color:rgba(0,0,0,0.75);display:block;">'.$title.'</sub>'."\n";
		    echo '   	   <input type="'.$type.'" id="'.$name.'" name="'.$name.'" style="display:block;width:'.$size.';" placeholder="'.$placeholder.'" value="'.esc_attr( get_post_meta( $_GET[post], $name, true ) ).'" />'."\n";
		    echo '  	</td>'."\n";
		    echo '	</tr>'."\n";

			break;

	}
}

function cpt_team_meta_box_save( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if ( !wp_verify_nonce( $_POST['cpt_team_colors_box_content_nonce'], plugin_basename( __FILE__ ) ) &&
	    	!wp_verify_nonce( $_POST['cpt_team_results_box_content_nonce'], plugin_basename( __FILE__ ) ) 	 )
	return;

	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) )
		return;
	} else {
		if ( !current_user_can( 'edit_post', $post_id ) )
		return;
	}

	$custom_meta_feilds = array(
 	'cpt_team_meta_color_1','cpt_team_meta_color_2','cpt_team_meta_color_3', // cpt_team_colors_box
 	'cpt_team_meta_results_p','cpt_team_meta_results_w','cpt_team_meta_results_d','cpt_team_meta_results_l','cpt_team_meta_results_f','cpt_team_meta_results_a','cpt_team_meta_results_gd','cpt_team_meta_results_pts' // cpt_team_results_box
 	);
	foreach ( $custom_meta_feilds as $custom_meta_feild ) {
		$custom_meta_value = $_POST[$custom_meta_feild];
		update_post_meta( $post_id, $custom_meta_feild, $custom_meta_value );
	}
}

?>