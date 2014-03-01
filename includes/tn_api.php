<?php

function bb_img($bb_name) {return site_url().'/wp-content/uploads/'.$bb_name;}
function bb_fimg($bb_post) {$bb_i = wp_get_attachment_image_src( get_post_thumbnail_id($bb_post), 'single-post-thumbnail' ); return $bb_i[0];}
function bb_show($var, $end='die') {echo '<pre>'; var_dump($var); echo '</pre>'; if ($end=='die') die();}
function xdiv($repeat=1){ for ($i = 1; $i <= $repeat; $i++) $results .= '</div>'; return $results; }

function bb_onclick($bb_url,$bb_target='') {
  if ($bb_target == '')
  {
	$bb_loc = "location.href='$bb_url';";
  } else {
    $bb_loc = "window.open('$bb_url','$bb_target')";
  }
  $bb_return = 'onclick="'.$bb_loc.'" ';
  
  echo $bb_return;
}

?>