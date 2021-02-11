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
 * @since             1.0.0
 * @package           Add_Sharing_To_Content
 *
 * @wordpress-plugin
 * Plugin Name:       AddSharingToContent
 * Plugin URI:        https://phpdocs.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Muhammad Afzal
 * Author URI:        https://phpdocs.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       add-sharing-to-content
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
define( 'ADD_SHARING_TO_CONTENT_VERSION', '1.0.0' );

function AddContenttoPagesAndPost($content){
	$Header="<h1>This is a Top Line</h1>";
	$Footer="<h1>This is a Footer Line</h1>";
	return $Header.$content.$Footer;
}

add_filter("the_content","AddContenttoPagesAndPost");