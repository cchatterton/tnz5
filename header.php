<!doctype html>
<html>

  <head>
    <title><?php tn_e( 'site_title' ) ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="<?php tn_e( 'tn_theme_image_favicon', 'customizer' ); ?>" type="image/png" />

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
          <div class="clearfix hide-for-small show-for-medium hide-for_large-up" style="padding:<?php tn_e( 'tn_theme_image_logo_medium_padding' ,'customizer' ); ?>;display:inline-block;float:left; width: <?php tn_e( 'tn_theme_image_logo_medium_width' ,'customizer' ); ?>;">
            <a href="<?php tn_e( 'home_url' ); ?>" rel="home">
              <img id="tn-logo-medium" src="<?php tn_e( 'tn_theme_image_logo_medium', 'customizer' ); ?>" alt="Logo" title="<?php tn_e( 'site_name' ); ?> Logo" />
            </a>
          </div>
          <div class="clearfix hide-for-small hide-for-medium show-for-large-up" style="padding:<?php tn_e( 'tn_theme_image_logo_large_padding' ,'customizer' ); ?>;display:inline-block;float:left; width: <?php tn_e( 'tn_theme_image_logo_large_width' ,'customizer' ); ?>;">
            <a href="<?php tn_e( 'home_url' ); ?>" rel="home">
              <img id="tn-logo-large" src="<?php tn_e( 'tn_theme_image_logo_large', 'customizer' ); ?>" alt="Logo" title="<?php tn_e( 'site_name' ); ?> Logo" />
            </a>
          </div>
          <div id="cta" class="panel" style="display:inline-block;float:right;" <?php fx_onclick( tn_r( 'tn_theme_cta_click' ,'customizer' ) ); ?> >
            Call to Action
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
    _e( '<div class="row collapse" style="min-width: 100% !important;">' );
  } ?>
          <div class="hide-for-small medium-12 medium-centered large-12 large-centered columns" style="text-align:center;">
<?php if( intval( get_theme_mod( 'tn_theme_hero_image_cat' ) ) > 0 ) {
  fx_orbit( 'img_cat', get_theme_mod( 'tn_theme_hero_image_cat' ) );
} else { ?>
            <img id="hero" src="<?php _e( esc_url( get_theme_mod( 'tn_theme_hero_image' ) ) ); ?>" alt="Hero" title="<?php tn_e( 'site_name' ); ?> Hero" />
<?php } ?>
          </div>
        </div>
      </div>
      <!-- end hero -->
<?php } ?>