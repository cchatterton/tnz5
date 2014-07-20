<?php

function fx_block_grid( $args ) {

 // validate provided $args
 if( is_string( $args ) ) parse_str( $args );
 if( is_array( $args ) ) extract( $args );
 if( !$taxonomy && !$term ) return;

 // set defaults for get_posts()
 if( !$posts_per_page ) $posts_per_page = 5;
 if( !$post_type ) $post_type = 'attachment';
 if( !$orderby ) $orderby = 'menu_order';
 if( !$order ) $order = 'ASC';
 if( !$field ) $field = 'id';

 // create full $args for get_posts()
 $args = array(
   'posts_per_page'  => $posts_per_page,
   'post_type'       => $post_type,
   'orderby'         => $orderby,
   'order'           => $order,  // 0 at the top - bigger the number the lower on the page
   'tax_query'       => array(
     array(
       'taxonomy'    => $taxonomy,
       'field'       => $field,
       'terms'       => $term
     )
   )
 );

 // get tiles
 $tiles = get_posts( $args );

 // setup defaults for responsive block-grid
 if( !$small ) $small = 3;
 if( !$medium ) $medium = 8;
 if( !$large ) $large = 8;

 // setup the grid
 echo '<ul class="small-block-grid-'.$small.' medium-block-grid-'.$medium.' large-block-grid-'.$large.'">'."\n";

 // for each tile -> the grid
 foreach ($tiles as $tile ) {

  // get missing meta data
  $image = wp_get_attachment_url( $tile->ID );
  $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);

  // the output
  echo '  <li>'."\n";
  echo '      <img src="'.$image.'" alt="'.$alt.'" title="'.$tile->post_excerpt.'">'."\n";
  echo '  </li>'."\n";
 }
 echo '</ul>'."\n";
}

?>