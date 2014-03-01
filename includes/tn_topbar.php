
<nav class="top-bar">
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1><a href="#" style="white-space:nowrap;display: inline;">Call 0424 572 468 <span class="hide-for-small">&nbsp;&nbsp;&nbsp;WHO'S BEHIND THE WHEEL?</span></a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Left Nav Section -->

    <!-- Right Nav Section -->
<?php

// Get the nav menu based on $menu_name (same as 'theme_location' or 'menu' arg to wp_nav_menu)
// This code based on wp_nav_menu's code to get Menu ID from menu slug

$menu_name = 'main-menu';

if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
  $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
  $menu_items = wp_get_nav_menu_items($menu->term_id);
  $menu_list = '<ul id="menu-' . $menu_name . '" class="right">';
  foreach ( (array) $menu_items as $key => $menu_item ) {
      $title = $menu_item->title;
      $url = $menu_item->url;
      $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
}
  $menu_list .= '</ul>';
} else {
  $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
}

// $menu_list now ready to output
echo $menu_list;

?>
  </section>
</nav>