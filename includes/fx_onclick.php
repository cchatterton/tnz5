<?php

function fx_onclick($bb_url,$bb_target='') {
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