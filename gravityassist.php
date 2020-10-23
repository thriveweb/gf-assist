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
 * Text Domain: gravity-assist
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
 		define('GL_PATH', plugin_dir_path(__FILE__));

 		// includes
 		require_once(ABSPATH.'wp-includes/pluggable.php');
 		include(GL_PATH.'settings.php');

 		load_plugin_textdomain( $this->text_domain, false, $this->plugin_path . '\lang' );

 		add_action( 'admin_enqueue_scripts', array( $this, 'register_styles' ) );
 		add_action( 'admin_enqueue_scripts', array( $this, 'GL_color_picker' ) );

 		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );
 		add_action( 'wp_enqueue_scripts', array( $this, 'register_styles' ));
 		add_action( 'wp_enqueue_scripts', array( $this, 'GL_dequeue' ), 999999 );
 		add_action( 'wp_head', array( $this, 'GL_dequeue' ), 999999 );

 		register_activation_hook( __FILE__, array( $this, 'activation' ) );
 		register_deactivation_hook( __FILE__, array( $this, 'deactivation' ) );



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
 	public function register_scripts() {
 		wp_enqueue_script(
 			'mainJS',
 			$this->get_plugin_url().'js/main.js',
 			// array( 'jQuery', 'wp-color-picker' ),
 			null,
 			'1.0',
 			true
 		);
 	}

 	public function GL_color_picker() {
 		// first check that $hook_suffix is appropriate for your admin page
 		wp_enqueue_style( 'wp-color-picker' );
 		wp_enqueue_script(
 			'adminJS',
 			$this->get_plugin_url().'js/admin.js',
 			array( 'wp-color-picker' ),
 			'1.0',
 			true
 		);
 	}

 	/**
 	* Enqueue and register CSS files here.
 	*/
 	public function register_styles() {
 		wp_enqueue_style(
 			'mainCSS',
 			$this->get_plugin_url().'css/main.css',
 			array(),
 			'1.0',
 		);



 		$borderRadius = get_option('borderRadius');
 	  $fontSize = get_option('fontSize');
 		$messageText = get_option('messageText');
 		$messageBackground = get_option('messageBackground');

 		$primary = get_option('primary');
 		$hightlight = get_option('hightlight');
 	  $midGrey = get_option('midGrey');
 	  $error = get_option('error');
 		$inputBackground = get_option('inputBackground');

 		$label_top = get_option( 'label_top' );
 		$label_left = get_option( 'label_left' );
 		$placeholder_colour = get_option( 'placeholder_colour' );
 		$translateY = get_option( 'translateY' );

 		$custom_css = "
 		:root {
 		  --borderRadius: {$borderRadius}px;
 		  --fontSize: {$fontSize}px;

 		  --inputBackground: {$inputBackground};
 		  --midGrey: {$midGrey};
 		  --primary: {$primary};
 		  --hightlight: {$hightlight};
 		  --error: {$error};
 		  --messageText: {$messageText};
 		  --messageBackground: {$messageBackground};

 		}
 		.gfield .gfield_label {
 			left: {$label_top}px;
 			top: {$label_top}px;
 		}
 		.gfield.focused .gfield_label {
 		  transform: translateY(-{$translateY}%);
 		  font-size: 12px;
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
 		wp_add_inline_style( 'mainCSS', $custom_css );
 	}



 	public function GL_dequeue() {
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

 		function GL_setting_page(){

 			add_menu_page(
 				__( 'Gravity Labels', 'textdomain' ),
 				'Gravity Label',
 				'manage_options',
 				'garavity-label-setting',
 				'GL_page',
 				'dashicons-welcome-widgets-menus',
 				6
 			);
 			add_action( 'admin_init', 'gl_plugin_settings' );
 		}
 		add_action( 'admin_menu', 'GL_setting_page' );

 		function gl_plugin_settings() {
 			register_setting( 'gl-options-group', 'borderRadius');
 			register_setting( 'gl-options-group', 'fontSize');
 			register_setting( 'gl-options-group', 'messageText');
 			register_setting( 'gl-options-group', 'messageBackground');

 			register_setting( 'gl-options-group', 'primary');
 			register_setting( 'gl-options-group', 'hightlight');
 			register_setting( 'gl-options-group', 'midGrey');
 			register_setting( 'gl-options-group', 'error');
 			register_setting( 'gl-options-group', 'inputBackground');
 			register_setting( 'gl-options-group', 'label_top' );
 			register_setting( 'gl-options-group', 'label_left' );
 			register_setting( 'gl-options-group', 'placeholder_colour' );
 			register_setting( 'gl-options-group', 'translateY' );
 		}
 		add_filter( 'gform_field_css_class', 'custom_class', 10, 3 );
 		function custom_class( $classes, $field, $form ) {
         $classes .= ' GL-' .$field->type ;
 		    return $classes;
 		}
 	}
 }

 Gravityassist::get_instance();
