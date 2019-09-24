<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              MadelineMilagros.com
 * @since             1.0.0
 * @package           MadelineMilagros-Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       MadelineMilagros-Plugin
 * Plugin URI:        http://madelinemilagros.com/index.php/madelines-star-wars-plugin/
 * Description:       This is my first attempt writing a custom Plugin for Wordpress. 
 * Version:           1.0.0
 * Author:            Madeline Milagros Merced
 * Author URI:        MadelineMilagros.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       madelinemilagros-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * 
 */
class MadelineMilagrosPlugin {
	
	function __construct(){
		add_action( 'init', array( $this, 'custom_post_type' ) );
	}


	function activate(){
		//generated a CPT
		$this->custom_post_type();

		//flush rewrite rules		
		flush_rewrite_rules();
	

	}
	
	function deactivate(){
		//flush rewrite rules
		flush_rewrite_rules();


	}

	function uninstall(){
		//delete CPT

	}


	function custom_post_type(){
		register_post_type('book', ['public' => true, 'label' => 'Books'] );
	}

}


if( class_exists( 'MadelineMilagrosPlugin' ) ){
	$madelinemilagrosPlugin = new MadelineMilagrosPlugin();
}

//activation
register_activation_hook( __FILE__, array($madelinemilagrosPlugin, 'activate' ));

//deactivation
register_deactivation_hook( __FILE__, array($madelinemilagrosPlugin, 'deactivate' ));

//uninstall

