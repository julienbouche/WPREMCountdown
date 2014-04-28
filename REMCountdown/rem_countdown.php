<?php
	/* Plugin Name: REM Countdown
	Plugin URI: https://github.com/julienbouche
	Description: enables you to configure a countdown with different messages
	Version: 0.1
	Author: Julien Bouché
	Author URI: https://github.com/julienbouche
	License: GPLv2 or later
	*/
?>
<?
/** Actions. */
add_action( 'admin_menu', 'rem_countdown_admin_menu' );
add_action( 'admin_init','rem_countdown_admin_init' );
add_action( 'wp_enqueue_scripts', 'rem_countdown_scripts' );
add_action( 'wp_header', 'rem_countdown_display');

/** rem_countdown plugin activation code */
function rem_countdown_admin_init(){
	remcd_init_settings();
}

function remcd_init_settings(){
	//register every fields
	register_setting('remcountdown-plugin-group', 'remcd_activation_date');
	register_setting('remcountdown-plugin-group', 'remcd_deactivation_date');
	register_setting('remcountdown-plugin-group', 'remcd_event_start_date');
	register_setting('remcountdown-plugin-group', 'remcd_event_start_hour');
	register_setting('remcountdown-plugin-group', 'remcd_event_end_date');
	register_setting('remcountdown-plugin-group', 'remcd_event_end_hour');
	register_setting('remcountdown-plugin-group', 'remcd_during_event_message');
	register_setting('remcountdown-plugin-group', 'remcd_after_event_message');
}

function rem_countdown_scripts() {
	//wp_enqueue_style( 'remcd_stylesheet', get_stylesheet_uri() );
	//Ajout de la feuille de style
	wp_register_style('remcd_stylesheet', plugins_url('css/rem_countdown.css', __FILE__));
	wp_enqueue_style('remcd_stylesheet');
	
	//Ajout des scripts javascript
	wp_enqueue_script( 'script-name', plugins_url( '/js/rem_countdown.js' , __FILE__ ) , array(), '1.0.0', false );
}


/** Adds an entry to WD admin menu */
function rem_countdown_admin_menu() {
	add_options_page( 'REM Countdown Options', 'REM Countdown', 'manage_options', 'REMCountdownSettingsPage', 'rem_countdown_options' );
}

/** Displays the admin settings page */
function rem_countdown_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	include('rem_countdown_admin_page.php');
}

function rem_countdown_display(){
	include('rem_countdown_display.php');
}
?>
