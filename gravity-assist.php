<?php
/**
 * Plugin Name: Gravity Assist
 * Version: 1.0.0
 * Plugin URI: http://www.hughlashbrooke.com/
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Hugh Lashbrooke
 * Author URI: http://www.hughlashbrooke.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: gravity-assist
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load plugin class files.
require_once 'includes/class-gravity-assist.php';
require_once 'includes/class-gravity-assist-settings.php';

// Load plugin libraries.
require_once 'includes/lib/class-gravity-assist-admin-api.php';
require_once 'includes/lib/class-gravity-assist-post-type.php';
require_once 'includes/lib/class-gravity-assist-taxonomy.php';

/**
 * Returns the main instance of Gravity_Assist to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Gravity_Assist
 */
function gravity_assist() {
	$instance = Gravity_Assist::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = Gravity_Assist_Settings::instance( $instance );
	}

	return $instance;
}

gravity_assist();
