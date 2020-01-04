<?php
/*
Plugin Name: Progression Theme Elements - Viseo
Text Domain: progression-elements-viseo
Plugin URI: http://progressionstudios.com
Description: Theme Elements for Progression Studios Theme
Version: 1.0
Author: Progression Studios
Author URI: http://progressionstudios.com/
Author Email: contact@progressionstudios.com
License: GNU General Public License v3.0
Text Domain: progression-elements-viseo
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


define( 'PROGRESSION_THEME_ELEMENTS_URL', plugins_url( '/', __FILE__ ) );
define( 'PROGRESSION_THEME_ELEMENTS_PATH', plugin_dir_path( __FILE__ ) );


// Translation Setup
add_action('plugins_loaded', 'progression_theme_elements_viseo');
function progression_theme_elements_viseo() {
	load_plugin_textdomain( 'progression-elements-viseo', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

//Front end form shortcode generation
require PROGRESSION_THEME_ELEMENTS_PATH . '/inc/front-end-form.php';

/**
 * Registering Custom Post Types
 */
/*** Registering Custom Post Type ***/
add_action('init', 'viseo_progression_theme_elements_custom_post_type_init');
function viseo_progression_theme_elements_custom_post_type_init() {	
	register_taxonomy(
		'slider-tags', 'post', 
		array(
			'hierarchical' => true, 
			
			$labels = array(
					'name'              => esc_html__( "Filtering Tags", "progression-elements-viseo" ), 
					'singular_name'     => esc_html__( 'Filtering Tag', 'taxonomy singular name', 'progression-elements-viseo' ),
					'search_items'      => esc_html__( 'Search Filters', 'progression-elements-viseo' ),
					'all_items'         => esc_html__( 'All Filters', 'progression-elements-viseo' ),
					'parent_item'       => esc_html__( 'Parent Filter', 'progression-elements-viseo' ),
					'parent_item_colon' => esc_html__( 'Parent Filter:', 'progression-elements-viseo' ),
					'edit_item'         => esc_html__( 'Edit Filter', 'progression-elements-viseo' ),
					'update_item'       => esc_html__( 'Update Filter', 'progression-elements-viseo' ),
					'add_new_item'      => esc_html__( 'Add New Filter', 'progression-elements-viseo' ),
					'new_item_name'     => esc_html__( 'New Filter Name', 'progression-elements-viseo' ),
					'menu_name'         => esc_html__( 'Filtering Tags', 'progression-elements-viseo' ),
				),
			'labels'            => $labels,
			'query_var' => true, 
			'rewrite' => array('slug' => 'slider-tags'),
		)
	 );

}




// CSS Styles in Admin
function progression_theme_elements_wp_admin_style() {
    wp_register_style( 'progression-elements-viseo-admin-styles',  PROGRESSION_THEME_ELEMENTS_URL . 'assets/css/style.css' );
    wp_enqueue_style( 'progression-elements-viseo-admin-styles' );
    wp_enqueue_script( 'progression_studios_import_data', plugin_dir_url( __FILE__ ) . 'assets/js/importdata.js' );
}
add_action( 'admin_enqueue_scripts', 'progression_theme_elements_wp_admin_style' );



// Calling new Page Builder Elements
require_once PROGRESSION_THEME_ELEMENTS_PATH.'inc/elementor-helper.php';

function progression_theme_elements_load_elements(){
	require_once PROGRESSION_THEME_ELEMENTS_PATH.'elements/slider-element.php';
	require_once PROGRESSION_THEME_ELEMENTS_PATH.'elements/post-element.php';
	require_once PROGRESSION_THEME_ELEMENTS_PATH.'elements/category-element.php';
}
add_action('elementor/widgets/widgets_registered','progression_theme_elements_load_elements');



// Don't duplicate me!
if ( !class_exists( 'Radium_Theme_Demo_Data_Importer' ) ) {

	require_once( dirname( __FILE__ ) . '/importer/radium-importer.php' ); //load admin theme data importer

	class Radium_Theme_Demo_Data_Importer extends Radium_Theme_Importer {

		/**
		 * Holds a copy of the object for easy reference.
		 *
		 * @since 0.0.1
		 *
		 * @var object
		 */
		private static $instance;

		/**
		 * Set name of the widgets json file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $widgets_file_name       = 'widgets.json';

		/**
		 * Set name of the content file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $content_demo_file_name  = 'content.xml';
		
		/**
		 * Set name of the content file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $slider_file_name  = 'slider.zip';

		/**
		 * Holds a copy of the widget settings
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $widget_import_results;

		/**
		 * Constructor. Hooks all interactions to initialize the class.
		 *
		 * @since 0.0.1
		 */
		public function __construct() {

			 $this->demo_files_path = dirname(__FILE__) . '/demo-files/'; //can
			 $this->theme_name1="progression-studios";
			$ddd = dirname(__FILE__) . '/demo-files/'; //can
			$files = array_diff(scandir($ddd), array('..', '.'));
			$this->theme_namess=$files;	
			//print_r($files);
			//die();
			self::$instance = $this;
			parent::__construct();

		}


	}

	new Radium_Theme_Demo_Data_Importer;

}
