<?php

// create custom plugin settings menu
add_action('admin_menu', 'create_tn_google_fonts');

function create_tn_google_fonts() {

	//create new top-level menu
	add_menu_page('Google Fonts', 'Google Fonts', 'manage_options', 'tn_google_fonts', 'tn_google_fonts_page');
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

	//call register settings function
	add_action( 'admin_init', 'register_tn_google_fonts' );
}


function register_tn_google_fonts() {

	//register our settings
	$fields = array ('tn_gf1','tn_gf1','tn_gf1');
	foreach ($fields as $field) register_setting( 'tn-google-fonts-group', $field );

}

function tn_google_fonts_page() {
?>
<div class="wrap">
<h2>Google Fonts</h2>
<hr style="margin: 20px 0;border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); "/>
<form method="post" action="options.php">

    <table class="form-table">

    	<tr valign="top">
        <th scope="row">Primary Font</th>
        <td><input type="text" name="tn_gf1" size="100" placeholder="http://..." value="<?php echo get_option('tn_gf1'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Secondary Font</th>
        <td><input type="text" name="tn_gf2" size="100" placeholder="http://..."  value="<?php echo get_option('tn_gf2'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Tertiary Font</th>
        <td><input type="text" name="tn_gf3" size="100" placeholder="http://..." value="<?php echo get_option('tn_gf3'); ?>" /></td>
        </tr>

    </table>
    <?php submit_button(); ?>
    <?php settings_fields( 'tn-google-fonts-group' ); ?>
</form>
</div>
<?php } ?>