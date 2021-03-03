<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://phpdocs.com
 * @since             1.0.2
 * @package           Custom_Quote_Form
 *
 * @wordpress-plugin
 * Plugin Name:       CustomQuoteForm
 * Plugin URI:        https://phpdocs.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           2.0.5
 * Author:            Muhammad Afzal
 * Author URI:        https://phpdocs.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-quote-form
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CUSTOM_QUOTE_FORM_VERSION', '2.0.5' );

function CustomQuoteForm(){
	ob_start();
	include("template/custom-quote-form.php");
	return ob_get_flush();
}

add_shortcode("abc-quote-form","CustomQuoteForm");

//Admin Menu
if(is_admin()){
	add_action( 'admin_menu', 'custom_quote_form_menu' );
	add_action( 'admin_init','register_mysettings');
}

function register_mysettings(){
	register_setting("Custom-Quote-Form-Settings","Custom-Quote-Form-Room");
	register_setting("Custom-Quote-Form-Settings","Custom-Quote-Form-Kitchen");
	register_setting("Custom-Quote-Form-Settings","Custom-Quote-Form-WM");
	register_setting("Custom-Quote-Form-Settings","Custom-Quote-Form-AC");
	register_setting("Custom-Quote-Form-Settings","Custom-Quote-Form-Heaters");
	register_setting("Custom-Quote-Form-Settings","Custom-Quote-Form-Fridge");
}
function custom_quote_form_menu(){    
	$page_title = 'Custom Quote Form Settings';
	$menu_title = 'Quote Form Settings';
	$capability = 'manage_options';
	$menu_slug  = 'custom-quote-form-settings';
	$function   = 'custom_quote_form_page';
	$icon_url   = 'dashicons-media-spreadsheet';
	$position   = 4;
	add_menu_page( $page_title,$menu_title,$capability,$menu_slug,
	$function,$icon_url,$position ); 
}

if(!function_exists("custom_quote_form_page")){
	function custom_quote_form_page(){
		?>
		<h1>Custom Quote Form Settings Page</h1>
		<form method="post" action="options.php">
			<?php 
				settings_fields("Custom-Quote-Form-Settings");
				do_settings_sections("Custom-Quote-Form-Settings");
			?>
			<table class="form-table">
				<tr>
					<td>Cost Per Room</td>
					<td><input type="number" name="Custom-Quote-Form-Room" value="<?php echo get_option('Custom-Quote-Form-Room'); ?>" required /></td>
				</tr>
				<tr>
					<td>Cost Per Kitchen</td>
					<td><input type="number" name="Custom-Quote-Form-Kitchen" value="<?php echo get_option('Custom-Quote-Form-Kitchen'); ?>" required /></td>
				</tr>
				<tr>
					<td>Cost Per Washing Machine</td>
					<td><input type="number" name="Custom-Quote-Form-WM" value="<?php echo get_option('Custom-Quote-Form-WM'); ?>" required /></td>
				</tr>
				<tr>
					<td>Cost Per Washing AC</td>
					<td><input type="number" name="Custom-Quote-Form-AC" value="<?php echo get_option('Custom-Quote-Form-AC'); ?>" required /></td>
				</tr>
				<tr>
					<td>Cost Per Washing Heaters</td>
					<td><input type="number" name="Custom-Quote-Form-Heaters" value="<?php echo get_option('Custom-Quote-Form-Heaters'); ?>" required /></td>
				</tr>
				<tr>
					<td>Cost Per Fridge</td>
					<td><input type="number" name="Custom-Quote-Form-Fridge" value="<?php echo get_option('Custom-Quote-Form-Fridge'); ?>" required /></td>
				</tr>
				<tr>
					<td colspan="2">
					<?php submit_button(); ?>
					</td>
				</tr>
			</table>

		</form>
		<?php
	}
}

