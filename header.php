<!doctype html>
<html>

  <head>
    <title><?php tn_e( 'site_title' ) ?></title>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="TBD">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="<?php tn_e( 'tn_theme_image_favicon', 'customizer' ); ?>" type="image/png" />
    <link rel="stylesheet" href="<?php tn_e( 'theme_url' ); ?>/css/foundation.css" />
    <link rel="stylesheet" href="<?php tn_e( 'theme_url' ); ?>/css/normalize.css" />
    <link rel="stylesheet" href="<?php tn_e( 'theme_url' ); ?>/css/theme.css?v=<?php _e( date('c') ); ?>" />

    <script src="<?php tn_e( 'theme_url' ); ?>/js/modernizr.js"></script>

<?php wp_head(); ?>
  </head>
  <body>

    <!-- start everything -->
    <div class="s-everything">

<?php // shows logo row based on theme customiser
if ( __( get_theme_mod( 'tn_theme_toprow_show' ) ) != 0 ) { ?>
      <!-- logo row -->
      <div class="hide-for-small show-for-medium-up" id="toprow">
<?php if ( __( get_theme_mod( 'tn_theme_toprow_show' ) ) == 2 ) {
    _e( '<div class="row ">'."\n" );
  } else {
    _e( '<div>' );
  } ?>
          <!-- logo -->
          <div style="float:left; width: <?php _e( get_theme_mod( 'tn_theme_image_logo_desktop_width' ,'tn_' ) ); ?>">
            <a href="<?php tn_e( 'home_url' ); ?>" rel="home">
              <img class="hide-for-small hide-for-medium show-for-large-up" id="tn-logo-large" src="<?php tn_e( 'tn_theme_image_logo_large', 'customizer' ); ?>" alt="Logo" title="<?php tn_e( 'site_name' ); ?> Logo" />
              <img class="hide-for-small show-for-medium hide-for_large-up" id="tn-logo-medium" src="<?php tn_e( 'tn_theme_image_logo_medium', 'customizer' ); ?>" alt="Logo" title="<?php tn_e( 'site_name' ); ?> Logo" />
            </a>
          </div>
        </div>
      </div>
      <!-- end logo row -->
<?php } ?>

<?php // shows Topbar based on theme customiser
if ( __( get_theme_mod( 'tn_theme_topbar_show' ) ) != 0 ) { ?>
      <div id="topbar">
<?php if ( __( get_theme_mod( 'tn_theme_topbar_show' ) ) == 2 ) {
    _e( '<div class="row ">'."\n" );
  } else {
    _e( '<div>' );
  } ?>
<?php include( 'includes/nav_topbar.php' ); ?>
        </div>
      </div>
<?php } ?>

<?php // shows Topbar based on theme customiser
if ( __( get_theme_mod( 'tn_theme_herorow_show' ) ) != 0 ) { ?>
      <!-- hero -->
      <div class="hide-for-small show-for-medium-up" id="herorow">
<?php if ( __( get_theme_mod( 'tn_theme_herorow_show' ) ) == 2 ) {
    _e( '<div class="row ">'."\n" );
  } else {
    _e( '<div>' );
  } ?>
          <div class="hide-for-small medium-5 medium-centered large-7 large-centered columns">
            <a href="<?php //_e( esc_url( home_url( '/' ) ) ); ?>" rel="home">
              <img class="hide-for-small hide-for-medium show-for-large-up" id="bb-logo-large" src="<?php _e( esc_url( get_theme_mod( 'tn_theme_image_logo_large' ) ) ); ?>" alt="Logo" title="<?php _e( get_bloginfo( 'name' ) ); ?> Logo" />
              <img class="hide-for-small show-for-medium hide-for_large-up" id="bb-logo-medium" src="<?php _e( esc_url( get_theme_mod( 'tn_theme_image_logo_medium' ) ) ); ?>" alt="Logo" title="<?php _e( get_bloginfo( 'name' ) ); ?> Logo" />
            </a>
          </div>
        </div>
      </div>
      <!-- end hero -->
<?php } ?>