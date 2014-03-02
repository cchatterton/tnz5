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

      <div class="hide-for-small show-for-medium-up" id="header-wrapper">
        <div class="row">
          <a href="<?php tn_e( 'home_url' ); ?>" rel="home">
            <img class="hide-for-small hide-for-medium show-for-large-up" id="tn-logo-large" src="<?php tn_e( 'tn_theme_image_logo_large', 'customizer' ); ?>" alt="Logo" title="<?php tn_e( 'site_name' ); ?> Logo" />
            <img class="hide-for-small show-for-medium hide-for_large-up" id="tn-logo-medium" src="<?php tn_e( 'tn_theme_image_logo_medium', 'customizer' ); ?>" alt="Logo" title="<?php tn_e( 'site_name' ); ?> Logo" />
          </a>
        </div>
      </div>

      <div id="menu-wrapper">
        <div class="row collapse">
<?php include( 'includes/nav_topbar.php' ); ?>
        </div>
      </div>