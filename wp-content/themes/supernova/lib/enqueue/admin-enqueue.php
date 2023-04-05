<?php
/*
* All the admin CSS and Scripts are loaded only from this file and most of the files are loaded 
* only of the theme's  options page
*/

if (isset($_GET['page']) && $_GET['page'] == 'theme-options'){
	
		//Admin Page
		add_action( 'admin_enqueue_scripts', 'load_supernova_custom_wp_admin_style' ); //css
		function load_supernova_custom_wp_admin_style() {
				wp_register_style( 'custom_wp_admin_css', SUPERNOVA_ROOT_ADMIN.'css/admin-css.css', array(), '1.1.0', 'all' );
				wp_enqueue_style( 'custom_wp_admin_css' );
			}
		
		add_action( 'admin_enqueue_scripts', 'supernova_enqueue_admin_script' ); //js
		function supernova_enqueue_admin_script() {						
			wp_enqueue_script( 'my_custom_script', SUPERNOVA_ROOT_ADMIN.'js/adminjs.js', array('jquery'),'1.1.0', false );
			}			
		
		//Media uploader		
		add_action('admin_enqueue_scripts', 'supernova_admin_styles'); //css
		function supernova_admin_styles(){			
				 wp_enqueue_style('thickbox');
			}
					
		add_action('admin_enqueue_scripts', 'supernova_admin_scripts'); //js		
		function supernova_admin_scripts() {
			 wp_enqueue_script('jQuery');							 
			 wp_register_script('my-upload',  SUPERNOVA_ROOT_ADMIN.'js/upscript.js', array('jquery','media-upload','thickbox'));
			 wp_enqueue_script('my-upload');
			 wp_enqueue_script('media-upload');
			 wp_enqueue_script('thickbox');				 
			}
																	
		//color picker 
		add_action( 'admin_enqueue_scripts', 'supernova_enqueue_jscolor_script' ); //js
		function supernova_enqueue_jscolor_script() {								
			wp_enqueue_script( 'my_jscolor_script', SUPERNOVA_ROOT_ADMIN.'assets/jscolor/jscolor.js' );			
			}	
			
		//Range Slider	
		add_action( 'admin_enqueue_scripts', 'supernova_enqueue_admin_range_slider' ); //js
		function supernova_enqueue_admin_range_slider() {						
		wp_enqueue_script( 'jquery_ui_plugin', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js', array('jquery'),'1.0.1', false );			
			}
				
						
		//It might not be required but just making the theme a little past proof for some friends who are still using older versions
		global $wp_version;
			if ( $wp_version < 3.5 ) {
			add_action( 'admin_enqueue_scripts', 'supernova_older_styles' ); //css	
			}	
		function supernova_older_styles() {
				wp_register_style( 'supernova_older_css', SUPERNOVA_ROOT_ADMIN.'css/old/older.css', array(), '1.0.1', 'all' );
				wp_enqueue_style( 'supernova_older_css' );
			}									
					
} //Condition ENDS

		//Just a bit of css which loads eveywhere on dashboard
		add_action( 'admin_enqueue_scripts', 'load_supernova_all_admin_style' ); //css
		function load_supernova_all_admin_style() {
				wp_register_style( 'supernova_all_css', SUPERNOVA_ROOT_ADMIN.'css/all.css', array(), '1.0.1', 'all' );
				wp_enqueue_style( 'supernova_all_css' );
			}