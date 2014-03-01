<?php

$style='

#menu-wrapper, .top-bar, .top-bar-section li a:not(.button) {
		background: none repeat scroll 0 0 '.get_option('tn_color_topbar').';
}

';

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-content/themes/ZURBN/css/dynamic.css","wb");
fwrite($fp,$style);
fclose($fp);

?>