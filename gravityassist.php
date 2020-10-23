<?php
/**
* Plugin Name: Gravity Assist
* Version: 1.0.0
* Plugin URI: https://thriveweb.com.au/the-lab/
* Description: Gravity Assist - Add label animations and modern input styles.
* Author: Thriveweb - Alex Frith
* Author URI: https://thriveweb.com.au/
* Requires at least: 5.0
* Tested up to: 5.5.1
*
* Text Domain: gravityassist
* Domain Path: /lang/
*
* @package WordPress
* @author Thriveweb - Alex Frith
* @since 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Returns the main instance of Gravity_Assist to prevent the need to use globals.
*
* @since  1.0.0
* @return object Gravityassist
*/


class Gravityassist {
	private static $instance = null;
	private $plugin_path;
	private $plugin_url;
	private $text_domain = '';

	/**
	* Creates or returns an instance of this class.
	*/
	public static function get_instance() {
		// If an instance hasn't been created and set to $instance create an instance and set it to $instance.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	* Initializes the plugin by setting localization, hooks, filters, and administrative functions.
	*/
	private function __construct() {
		// session
		if(session_id() == '') {
			session_start();
		}

		$this->plugin_path = plugin_dir_path( __FILE__ );
		$this->plugin_url  = plugin_dir_url( __FILE__ );
		define('gravityassist_PATH', plugin_dir_path(__FILE__));

		// includes
		require_once(ABSPATH.'wp-includes/pluggable.php');
		include(gravityassist_PATH.'includes/gravityassist-settings.php');

		load_plugin_textdomain( $this->text_domain, false, $this->plugin_path . '\lang' );

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_register_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_register_scripts' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_register_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_register_styles' ));

		// Remove Gravity froms styles
		add_action( 'wp_enqueue_scripts', array( $this, 'gravityassist_dequeue' ), 999999 );
		add_action( 'wp_head', array( $this, 'gravityassist_dequeue' ), 999999 );

		register_activation_hook( __FILE__, array( $this, 'activation' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivation' ) );

		// Run the plugin.
		$this->run_plugin();
	}

	public function get_plugin_url() {
		return $this->plugin_url;
	}

	public function get_plugin_path() {
		return $this->plugin_path;
	}

	/**
	* Place code that runs at plugin activation here.
	*/
	public function activation() {

	}

	/**
	* Place code that runs at plugin deactivation here.
	*/
	public function deactivation() {

	}

	/**
	* Enqueue and register JavaScript files here.
	*/
	public function frontend_register_scripts() {
		wp_enqueue_script(
			'gravityassist_frontendJS',
			$this->get_plugin_url().'assets/js/frontend.js',
			// array( 'jQuery', 'wp-color-picker' ),
			null,
			time(),
			true
		);
	}

	public function admin_register_scripts() {
		// first check that $hook_suffix is appropriate for your admin page
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script(
			'gravityassist_adminJS',
			$this->get_plugin_url().'assets/js/admin.js',
			array( 'wp-color-picker' ),
			time(),
			true
		);
	}

	/**
	* Enqueue and register Admin CSS files here.
	*/
	public function admin_register_styles() {
		wp_enqueue_style(
			'gravityassist_adminCSS',
			$this->get_plugin_url().'assets/css/admin.css',
			array(),
			time(),
		);
	}

	/**
	* Enqueue and register Frontent CSS files here.
	*/
	public function frontend_register_styles() {
		wp_enqueue_style(
			'gravityassist_frontendCSS',
			$this->get_plugin_url().'assets/css/frontend.css',
			array(),
			time(),
		);

		// Get options for custom style

		$borderRadius = get_option('borderRadius');
		$fontSize = get_option('fontSize');
		$messageText = get_option('messageText');
		$messageBackground = get_option('messageBackground');

		$primary = get_option('primary');
		$hightlight = get_option('hightlight');
		$midGrey = get_option('midGrey');
		$error = get_option('error');
		// $inputBackground = get_option('inputBackground');
		// $inputColour = get_option('inputColour');
		// --inputBackground: {$inputBackground};
		// --inputColour: {$inputColour};

		$label_top = get_option( 'label_top' );
		$label_left = get_option( 'label_left' );
		$placeholder_colour = get_option( 'placeholder_colour' );
		$translateY = get_option( 'translateY' );

		$custom_css = "
		:root {
			--borderRadius: {$borderRadius}px;
			--fontSize: {$fontSize}px;
			--midGrey: {$midGrey};
			--primary: {$primary};
			--hightlight: {$hightlight};
			--error: {$error};
			--messageText: {$messageText};
			--messageBackground: {$messageBackground};
			--top: {$label_top}px;
			--left:{$label_left}px;
		}
		.gfield .gfield_label {
			left: {$label_top}px;
			top: {$label_top}px;
		}
		.gfield.focused .gfield_label {
			transform: translateY(-{$translateY}%);
		}
		.gfield :focus::-webkit-input-placeholder {
			color: {$placeholder_colour};
		}
		.gfield :focus::-ms-input-placeholder {
			color: {$placeholder_colour};
		}
		.gfield :focus::placeholder {
			color: {$placeholder_colour};
		}
		";
		wp_add_inline_style( 'gravityassist_frontendCSS', $custom_css );
	}

	public function gravityassist_dequeue() {
		wp_dequeue_style( 'gforms_reset_css' ); // style id
		wp_dequeue_style( 'gforms_formsmain_css' ); // style id
		wp_dequeue_style( 'gforms_ready_class_css' ); // style id
		wp_dequeue_style( 'gforms_browsers_css' ); // style id

		wp_deregister_style( 'gforms_reset_css' ); // style id
		wp_deregister_style( 'gforms_formsmain_css' ); // style id
		wp_deregister_style( 'gforms_ready_class_css' ); // style id
		wp_deregister_style( 'gforms_browsers_css' ); // style id
	}

	/**
	* Place code for your plugin's functionality here.
	*/
	private function run_plugin() {

		function gravityassist_setting_page(){

			add_menu_page(
				__( 'Gravity Assist', 'textdomain' ),
				'Gravity Assist',
				'manage_options',
				'garavityassist',
				'gravityassist_page',
				'dashicons-welcome-widgets-menus',
				6
			);
			add_action( 'admin_init', 'gravityassist_plugin_settings' );
		}
		add_action( 'admin_menu', 'gravityassist_setting_page' );

		function gravityassist_plugin_settings() {
			register_setting( 'gravityassist-options-group', 'borderRadius');
			register_setting( 'gravityassist-options-group', 'fontSize');
			register_setting( 'gravityassist-options-group', 'messageText');
			register_setting( 'gravityassist-options-group', 'messageBackground');
			register_setting( 'gravityassist-options-group', 'primary');
			register_setting( 'gravityassist-options-group', 'hightlight');
			register_setting( 'gravityassist-options-group', 'midGrey');
			register_setting( 'gravityassist-options-group', 'error');
			register_setting( 'gravityassist-options-group', 'label_top' );
			register_setting( 'gravityassist-options-group', 'label_left' );
			register_setting( 'gravityassist-options-group', 'placeholder_colour' );
			register_setting( 'gravityassist-options-group', 'translateY' );
			// register_setting( 'gravityassist-options-group', 'inputBackground');
			// register_setting( 'gravityassist-options-group', 'inputColour');
		}
		// Add type to li elements
		add_filter( 'gform_field_css_class', 'custom_class', 10, 3 );
		function custom_class( $classes, $field, $form ) {
			$classes .= ' gravityassist-' . $field->type . ' ';
			return $classes;
		}
	}
}

Gravityassist::get_instance();
