<?php

// find'n replace (preseve case)
// 1. Logs & Log (as cpt)
// Remember to include in functions.php

function cpt_log() {
	$labels = array(
		'name'               => _x( 'Log', 'post type general name' ),
		'singular_name'      => _x( 'Log', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Log' ),
		'add_new_item'       => __( 'Add New Log' ),
		'edit_item'          => __( 'Edit Log' ),
		'new_item'           => __( 'New Log' ),
		'all_items'          => __( 'All Logs' ),
		'view_item'          => __( 'View Log' ),
		'search_items'       => __( 'Search Logs' ),
		'not_found'          => __( 'No Logs found' ),
		'not_found_in_trash' => __( 'No Logs found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Logs'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Log posts',
		'public'        => true,
		'menu_position' => 20,
 	 // 'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'supports'      => array( 'title', 'editor', 'thumbnail', 'page-attributes'),
		'has_archive'   => true,
		'hierarchical' 	=> true
	);
	register_post_type( 'log', $args );
}
add_action( 'init', 'cpt_log' );

function cpt_log_meta_box() {
    add_meta_box(
        'cpt_log_meta_box',
        __( 'Log Meta', '' ),
        'cpt_log_meta_box_log',
        'log',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'cpt_log_meta_box' );

function cpt_log_meta_box_log( $post ) {
	wp_nonce_field( plugin_basename( __FILE__ ), 'cpt_log_meta_box_log_nonce' );
	// custom fields here!
}
//add_action( 'save_post', 'cpt_log_meta_box_save' );


function cpt_log_meta_box_save( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if ( !wp_verify_nonce( $_POST['cpt_log_meta_box_log_nonce'], plugin_basename( __FILE__ ) ) )
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