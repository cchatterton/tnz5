<?php

// find'n replace (preseve case)
// 1. Comps & Comp (as tax)
// 2. Team (as cpt)
// Remember to include in functions.php

function tax_comp() {
	$labels = array(
		'name'              => _x( 'Comp', 'taxonomy general name' ),
		'singular_name'     => _x( 'Comp', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Comps' ),
		'all_items'         => __( 'All Comps' ),
		'parent_item'       => __( 'Parent Comp' ),
		'parent_item_colon' => __( 'Parent Comp:' ),
		'edit_item'         => __( 'Edit Comp' ),
		'update_item'       => __( 'Update Comp' ),
		'add_new_item'      => __( 'Add New Comp' ),
		'new_item_name'     => __( 'New Comp' ),
		'menu_name'         => __( 'Comps' ),
	);
	$args = array(
		'labels' => $labels,
		'show_admin_column' => true,
		'hierarchical' => true,
	);
	register_taxonomy( 'comp', array('match','team'), $args );
}
add_action( 'init', 'tax_comp', 0 );

// Add term page
function tax_comp_meta_add() {

	tax_comp_meta_field_add('tax_comp_thumb1','1st Thumbnail',$desc='Enter a URL for the image');
	tax_comp_meta_field_add('tax_comp_thumb2','2nd Thumbnail',$desc='Enter a URL for the image');
	tax_comp_meta_field_add('tax_comp_thumb3','3rd Thumbnail',$desc='Enter a URL for the image');

}
add_action( 'comp_add_form_fields', 'tax_comp_meta_add', 10, 2 );

function tax_comp_meta_field_add($name,$label,$desc='Enter a value for this field'){

	echo '<div class="form-field">'."\n";
	echo '	<label for="term_meta['.$name.']">'.$label.'</label>'."\n";
	echo '	<input type="text" name="term_meta['.$name.']" id="term_meta['.$name.']" value="">'."\n";
	echo '	<p class="description">'.$desc.'</p>'."\n";
	echo '</div>'."\n";

}

// Edit term page
function tax_comp_meta_edit($term) {

	// put the term ID into a variable
	$t_id = $term->term_id;

	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" );

	tax_comp_meta_field_edit($term_meta,'tax_comp_thumb1','1st Thumbnail',$desc='Enter a URL for the image');
	tax_comp_meta_field_edit($term_meta,'tax_comp_thumb2','2nd Thumbnail',$desc='Enter a URL for the image');
	tax_comp_meta_field_edit($term_meta,'tax_comp_thumb3','3rd Thumbnail',$desc='Enter a URL for the image');

}
add_action( 'comp_edit_form_fields', 'tax_comp_meta_edit', 10, 2 );

function tax_comp_meta_field_edit($term_meta,$name,$label,$desc='Enter a value for this field'){

	echo '<tr class="form-field">'."\n";
	echo '	<th scope="row" valign="top"><label for="term_meta['.$name.']">'.$label.'</label></th>'."\n";
	echo '	<td>'."\n";
	$value = ($term_meta[$name]) ? $term_meta[$name] : '';
	echo '		<input type="text" name="term_meta['.$name.']" id="term_meta['.$name.']" value="'.$value.'">'."\n";
	echo '		<p class="description">'.$desc.'</p>'."\n";
	echo '	</td>'."\n";
	echo '</tr>'."\n";

}

// Save extra taxonomy fields callback function.
function tax_comp_meta_save( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );

		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}
add_action( 'edited_comp', 'tax_comp_meta_save', 10, 2 );
add_action( 'create_comp', 'tax_comp_meta_save', 10, 2 );

?>