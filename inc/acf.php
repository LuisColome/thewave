<?php
/**
 * ACF Customizations
 *
 * @package      EAGenesisChild
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

class BE_ACF_Customizations {

	public function __construct() {

		// Only allow fields to be edited on development
		if ( ! defined( 'WP_LOCAL_DEV' ) || ! WP_LOCAL_DEV ) {
			//add_filter( 'acf/settings/show_admin', '__return_false' );
		}

		// Register options page
		add_action( 'init', array( $this, 'register_options_page' ) );

		// Register Blocks
		add_action('acf/init', array( $this, 'register_blocks' ) );
	}

	/**
	 * Register Options Page
	 *
	 */
	function register_options_page() {
	    if ( function_exists( 'acf_add_options_page' ) ) {
	        acf_add_options_page( array(
	        	'title'      => __( 'Site Options', 'ea_genesis_child' ),
	        	'capability' => 'manage_options',
	        ) );
	    }
	}

	/**
	 * Register Blocks
	 * @link https://www.billerickson.net/building-gutenberg-block-acf/#register-block
	 *
	 * Categories: common, formatting, layout, widgets, embed
	 * Dashicons: https://developer.wordpress.org/resource/dashicons/
	 * ACF Settings: https://www.advancedcustomfields.com/resources/acf_register_block/
	 */
	function register_blocks() {

		if( ! function_exists('acf_register_block_type') )
			return;

			// Register a slider block.
			acf_register_block_type(array(
				'name'              => 'reasons',
				'title'             => __('Number of Reasons'),
				'description'       => __('Block with a number of reasons with information in columns about the company/service.'),
				'icon' 				=> 'screenoptions',
                //'icon'            => file_get_contents( get_template_directory() . '/partials/reasons/reason-icon.svg' ),
				'keywords' 			=> array('columns', 'blocks', 'squares', 'information', 'reasons'),
				'render_template'   => 'partials/blocks/reasons/reasons.php',
                // 'enqueue_style' => get_template_directory_uri() . '/partials/blocks/reasons/reasons.css',
				// 'enqueue_script' => get_template_directory_uri() . '/partials/blocks/reasons/reasons.js',
				'category'          => 'text',
                'supports' => array( 
                    'align' => array( 'left', 'right', 'center', 'wide', 'full' ),
                    'align_text' => true,
                    'align_content' => true,
                ),
			));
	}
}
new BE_ACF_Customizations();

//icon picker

// /**
//  * modify the path to the icons directory
//  */
// function acf_icon_path_suffix( $path_suffix ) {
//     return 'assets/icons/acf-icons/';
// }
// add_filter( 'acf_icon_path_suffix', 'acf_icon_path_suffix' );


// // modify the path to the above prefix
// function acf_icon_path( $path_suffix ) {
//     return  get_stylesheet_directory_uri() . 'assets/icons/acf-icons/';
// }
// add_filter( 'acf_icon_path', 'acf_icon_path' );

// // modify the URL to the icons directory to display on the page
// function acf_icon_url( $path_suffix ) {
//     return  get_stylesheet_directory_uri() . 'assets/icons/acf-icons/';
// }
// add_filter( 'acf_icon_url', 'acf_icon_url' );