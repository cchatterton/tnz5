<nav class="top-bar" data-topbar>
      <ul class="title-area">
        <!-- Title Area -->
        <li class="name hide-for-medium-up">
<img src="http://drink-merchant.devn.com.au/files/logo_mobile1.png" style="margin:5px;" >
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <section class="top-bar-section">
            <!-- Left Nav Section -->
          <ul class="left">
<?php

$menu_name = 'top_bar_left';
if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
  $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
  $menu_items = wp_get_nav_menu_items($menu->term_id);

  foreach ( (array) $menu_items as $key => $menu_item ) {
      $title = $menu_item->title;
      $url = $menu_item->url;
      echo '<li><a href="' . $url . '">' . $title . '</a></li>';
  }
} ?>
          <li class="has-dropdown not-click"><a href="/contact">Contact Us</a>

            <ul class="dropdown">
              <li><a href="mailto:enquiry@thedrinkmerchant.com">enquiry@thedrinkmerchant.com</a></li>
              <li><a>Call 555 123 456</a></li>
              <li class="divider"></li>
              <li><a href="/contact">Enquiry Form &rarr;</a></li>
            </ul>
          </li>
          </ul>

        <!-- Right Nav Section -->
        <ul class="right">
<?php

$menu_name = 'top_bar_right';
if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
  $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
  $menu_items = wp_get_nav_menu_items($menu->term_id);

  foreach ( (array) $menu_items as $key => $menu_item ) {
      $title = $menu_item->title;
      $url = $menu_item->url;
      echo '<li><a href="' . $url . '">' . $title . '</a></li>';
  }
} else {

    $args = array(
      'sort_order' => 'ASC',
      'sort_column' => 'menu_order',
      'hierarchical' => 1,
      'child_of' => 0,
      'parent' => 0,
      'post_type' => 'page',
      'post_status' => 'publish'
    );
      $pages = get_pages($args);
      foreach ( $pages as $page ) {

      unset($liclass);
      unset($sub);

      $children = get_pages('child_of='.$page->ID.'&sort_order=ASC&sort_column=menu_order');
        if( count( $children ) != 0 ) {
        $liclass = "has-dropdown";
        $sub .= '<ul class="dropdown">';
        foreach ($children as $child){
          $sub .= '<li><a href="'.site_url().'/'.$child->post_name.'"';
          if ( is_page($child->ID)) $sub .= ' class="current_page"';
          $sub .=  '>'.$child->post_title.'</a></li>';
        }
        // $sub.='<li class="divider"></li><li><a href="'.site_url().'/services">All Services &rarr;</a></li>';
        $sub .= '</ul>';
            }
        $menu = '<li class="'.$liclass.'"><a href="'.site_url().'/'.$page->post_name.'"';
        if ( is_page($page->ID) || strpos($sub, 'current_page')>0) $menu .= ' class="current_page"';
        $menu .= '>';
        $menu .= $page->post_title;
        $menu .= '</a>'.$sub.'</li>';
        if ($page->post_name !='contact') echo $menu ;
      }
    }
    ?>

        </ul>
      </section>
    </nav>