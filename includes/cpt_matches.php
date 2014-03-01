<?php

// find'n replace (preseve case)
// 1. Matches & Match (as cpt)
// Remember to include in functions.php

function cpt_match() {
	$labels = array(
		'name'               => _x( 'Match', 'post type general name' ),
		'singular_name'      => _x( 'Match', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Match' ),
		'add_new_item'       => __( 'Add New Match' ),
		'edit_item'          => __( 'Edit Match' ),
		'new_item'           => __( 'New Match' ),
		'all_items'          => __( 'All Matches' ),
		'view_item'          => __( 'View Match' ),
		'search_items'       => __( 'Search Matches' ),
		'not_found'          => __( 'No Matches found' ),
		'not_found_in_trash' => __( 'No Matches found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Matches'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Match posts',
		'public'        => true,
		'menu_position' => 20,
 	 // 'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'supports'      => array( 'title', 'editor', 'thumbnail', 'page-attributes'),
		'has_archive'   => true,
		'hierarchical' 	=> true
	);
	register_post_type( 'match', $args );
}
add_action( 'init', 'cpt_match' );


// Styling for the custom post type icon

function cpt_match_header() {

	$menu = site_url().'/wp-content/themes/'.get_template().'/images/match_menu_icon.png';
	$icon = site_url().'/wp-content/themes/'.get_template().'/images/match_cpt_icon.png';

	echo '<style type="text/css" media="screen">'."\n";
	echo '	#menu-posts-match post .wp-menu-image { background: url('.$menu.') no-repeat 4px -35px!important; }'."\n";
	echo '	#menu-posts-match post:hover .wp-menu-image {background: url('.$menu.') no-repeat 4px -2px!important; }'."\n";
	echo '	#icon-edit.icon32-posts-match post {background: url('.$icon.') no-repeat -1px 2px;}'."\n";
	echo ' #match post_value {width: 50%;}'."\n";
	echo '</style>'."\n";

}
add_action( 'admin_head', 'cpt_match_header' );

// Set Messages
function cpt_match_messages( $messages ) {
//http://codex.wordpress.org/Function_Reference/register_post_type

  global $post, $post_ID;

  $messages['match'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Match Post updated.', 'your_text_domain'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Match updated.', 'your_text_domain'),
    3 => __('CMatch deleted.', 'your_text_domain'),
    4 => __('Match Post updated.', 'your_text_domain'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Match Post restored to revision from %s', 'your_text_domain'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Match Post published. <a href="%s">View Match Post</a>', 'your_text_domain'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Match Post saved.', 'your_text_domain'),
    8 => sprintf( __('Match Post submitted. <a target="_blank" href="%s">Preview Match Post</a>', 'your_text_domain'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Match Post scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Match Post</a>', 'your_text_domain'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Match Post draft updated. <a target="_blank" href="%s">Preview Match Post</a>', 'your_text_domain'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'cpt_match_messages' );

function cpt_match_meta_box() {
    add_meta_box(
        'cpt_match_meta_box',
        __( 'Match Meta', '' ),
        'cpt_match_meta_box_match',
        'match',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'cpt_match_meta_box' );

function cpt_match_meta_box_match( $post ) {
	wp_nonce_field( plugin_basename( __FILE__ ), 'cpt_match_meta_box_match_nonce' );
	// custom fields here!
}
add_action( 'save_post', 'cpt_match_meta_box_save' );


function cpt_match_meta_box_save( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if ( !wp_verify_nonce( $_POST['cpt_match_meta_box_match_nonce'], plugin_basename( __FILE__ ) ) )
	return;

	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) )
		return;
	} else {
		if ( !current_user_can( 'edit_post', $post_id ) )
		return;
	}

	$custom_meta_feilds = array('tn_1','tn_2','tn_3');
	foreach ( $custom_meta_feilds as $custom_meta_feild ) {
		$custom_meta_value = $_POST[$custom_meta_feild];
		update_post_meta( $post_id, $custom_meta_feild, $custom_meta_value );
	}
}

?>