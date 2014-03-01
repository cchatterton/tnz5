<?php

// create custom plugin settings menu
add_action('admin_menu', 'create_tn_theme_options');

function create_tn_theme_options() {

	//create new top-level menu
	add_menu_page('Theme Options', 'Theme Options', 'manage_options', 'tn_theme_options', 'tn_theme_options_page');
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

	//call register settings function
	add_action( 'admin_init', 'register_tn_theme_options' );
}

function register_tn_theme_options() {

	//register our settings
	$fields = array (
        'tn_menu_visibility','tn_custom_path',
        'tn_favicon','tn_logo_large','tn_logo_small','tn_header_bg', 'tn_page_noise', // images
        'tn_color_header','tn_color_topbar', 'tn_color_page','tn_color_footer', // colors
        'tn_contact_email','tn_contact_phone'
        );
	foreach ($fields as $field) register_setting( 'tn-theme-options-group', $field );

}

function tn_tab_show($tab,$showfor) {
    $showfor = explode(',', $showfor);
    if ( !in_array($tab, $showfor) ) {
        $style = 'style="display:none;"';
        echo $style;
    }
}
function tn_color_circle($color) {
    $background = 'background: '.get_option($color).';';
    echo '<div style="'.$background.'height:20px;width:20px;border-radius:10px;position:relative;left:5px;top:5px;display:inline-block;"></div>';
}
function tn_theme_options_page() {
    $qs = $_SERVER["QUERY_STRING"]; parse_str($qs); parse_str($qs, $arr);
?>
<div class="wrap">
<h2>Theme Options</h2>
<hr style="margin: 20px 0;border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); "/></p>
<form method="post" action="options.php">

    <p><input type="checkbox" name="tn_menu_visibility" value="true" <?php if( get_option('tn_menu_visibility')=='true') echo 'checked="'.get_option('tn_menu_visibility').'"'; ?> style="margin: -1px 10px;"/>Hide WordPress tabs that are not required by the theme
    <p>Custom Path: <input type="text" name="tn_custom_path" placeholder="..." value="<?php echo get_option('tn_custom_path'); ?>" /></p>
    <hr style="margin: 20px 0;border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); "/>
<p style="padding-left: 8px;">
<?php $tabs = array( 'main', 'header', 'colors','contacts'); $i = 1;
foreach ($tabs as $tab) {
    echo '<a href="/'.get_option('tn_custom_path').'/wp-admin/admin.php?page=tn_theme_options&tab='.$tab.'">'.ucfirst($tab).'</a>';
    if ($i != count($tabs)) echo ' | ';
    $i++;
} ?>
</p>

    <table class="form-table">

    	<tr valign="top" <?php tn_tab_show($arr[tab],'main'); ?> >
        <th scope="row">Favicon URL</th>
        <td><input type="text" name="tn_favicon" size="100" placeholder="http://..." value="<?php echo get_option('tn_favicon'); ?>" /></td>
        </tr>

        <tr valign="top" <?php tn_tab_show($arr[tab],'main,header'); ?> >
        <th scope="row">Large Screen Logo URL</th>
        <td><input type="text" name="tn_logo_large" size="100" placeholder="http://..."  value="<?php echo get_option('tn_logo_large'); ?>" /></td>
        </tr>

        <tr valign="top" <?php tn_tab_show($arr[tab],'main,header'); ?> >
        <th scope="row">Mobile Screen Logo URL</th>
        <td><input type="text" name="tn_logo_small" size="100" placeholder="http://..." value="<?php echo get_option('tn_logo_small'); ?>" /></td>
        </tr>

        <tr valign="top" <?php tn_tab_show($arr[tab],'main,header'); ?> >
        <th scope="row">Header BG</th>
        <td><input type="text" name="tn_header_bg" size="100" placeholder="http://..." value="<?php echo get_option('tn_header_bg'); ?>" /></td>
        </tr>

        <tr valign="top" <?php tn_tab_show($arr[tab],'main'); ?> >
        <th scope="row">Page Noise</th>
        <td><input type="text" name="tn_page_noise" size="100" placeholder="http://..." value="<?php echo get_option('tn_page_noise'); ?>" /></td>
        </tr>

        <tr valign="top" <?php tn_tab_show($arr[tab],'colors,header'); ?> >
        <th scope="row">Header BG Color</th>
        <td><input type="text" name="tn_color_header" size="100" placeholder="rgba()" value="<?php echo get_option('tn_color_header'); ?>" /><?php tn_color_circle('tn_color_header'); ?></td>
        </tr>

        <tr valign="top" <?php tn_tab_show($arr[tab],'colors,header'); ?> >
        <th scope="row">Topbar BG Color</th>
        <td><input type="text" name="tn_color_topbar" size="100" placeholder="rgba()"  value="<?php echo get_option('tn_color_topbar'); ?>" /><?php tn_color_circle('tn_color_topbar'); ?></td>
        </tr>

        <tr valign="top" <?php tn_tab_show($arr[tab],'colors'); ?> >
        <th scope="row">Page BG Color</th>
        <td><input type="text" name="tn_color_page" size="100" placeholder="rgba()" value="<?php echo get_option('tn_color_page'); ?>" /><?php tn_color_circle('tn_color_page'); ?></td>
        </tr>

        <tr valign="top" <?php tn_tab_show($arr[tab],'colors'); ?> >
        <th scope="row">Footer BG Color</th>
        <td><input type="text" name="tn_color_footer" size="100" placeholder="rgba()" value="<?php echo get_option('tn_color_footer'); ?>" /><?php tn_color_circle('tn_color_footer'); ?></td>
        </tr>

        <tr valign="top" <?php tn_tab_show($arr[tab],'contacts'); ?> >
        <th scope="row">Primary Contact Email</th>
        <td><input type="text" name="tn_contact_email" size="100" placeholder="..." value="<?php echo get_option('tn_contact_email'); ?>" /></td>
        </tr>

        <tr valign="top" <?php tn_tab_show($arr[tab],'contacts'); ?> >
        <th scope="row">Primary Contact Number</th>
        <td><input type="text" name="tn_contact_phone" size="100" placeholder="..." value="<?php echo get_option('tn_contact_phone'); ?>" /></td>
        </tr>

    </table>

    <?php submit_button(); ?>
    <?php settings_fields( 'tn-theme-options-group' ); ?>
</form>
</div>
<?php }

// Hide menu tabs that are not required
add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {

	if(get_option('tn_menu_visibility')=='true') {

	    remove_menu_page('edit.php');  // Posts
	    remove_menu_page('edit-comments.php'); // comments
	    remove_menu_page('edit.php?post_type=page'); // pages
	    remove_menu_page('plugins.php'); // plugins
	    remove_menu_page('tools.php'); // tools
	    remove_menu_page('options-general.php'); // settings

	}
}

// Add links menu tab
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

// Setup Featured Images/Thumbnails.
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 80, 55, true ); // W x H, hard crop

// Update Plugin Lables
// add_filter( 'gettext', 'change_menu_labels' );
// add_filter( 'ngettext', 'change_menu_labels' );

// function change_menu_labels( $translated )
// {
//     $translated = str_replace( 'WP Simple Booking Calendar', 'Calendars', $translated );
//     $translated = str_replace( 'Links', 'Attractions', $translated );
//     return $translated;
// }

?>