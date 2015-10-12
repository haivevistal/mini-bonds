<?php

/**
* Plugin Name: Mini-Bonds
* Plugin URI: http://www.thecoapperative.com/
* Description: Connect mini-sites into one login, data is stored in central database. Provides unique registration form to all mini-sites, details are stored into CRM and email into mailchimp.
* Version: 1.0.0
* Author: Coapperative
* Author URI: http://www.thecoapperative.com/
*/

add_action('admin_menu', 'mini_bonds_setting');

function mini_bonds_setting() {
    /* for bankrate menu */
    add_options_page( __('Mini Bonds Setting','menu-page'), __('Mini Bonds Setting','menu-page'), 'manage_options', 'minibonds', 'mini_bonds' );
    add_menu_page(__('Mini Bonds Setting','Mini Bonds Setting'), __('Mini Bonds Setting','Mini Bonds Setting'), 'manage_options', 'minibonds', 'mini_bonds' );
}

add_action( 'wp_enqueue_scripts', 'mini_bonds_scripts' );
function mini_bonds_scripts() {
    /* add js libararies */
    wp_enqueue_script( 'bootstrap_js', plugins_url( 'assets/bootstrap/js/bootstrap.min.js', __FILE__ ) , array(), '3.3.5', true );
    wp_enqueue_script( 'jqueryui_js', plugins_url( 'assets/jquery-ui-1.11.4/jquery-ui.min.js', __FILE__ ) , array(), '1.11.4', true );
    wp_enqueue_script( 'parsley_js', plugins_url( 'assets/js/Parsley.js-2.2.0/dist/parsley.min.js', __FILE__ ) , array(), '2.2.0', true );
    wp_enqueue_script( 'selectBoxit_js', plugins_url( 'assets/js/jquery.selectBoxIt/src/javascripts/jquery.selectBoxIt.min.js', __FILE__ ) , array(), '3.8.1', true );
    wp_enqueue_script( 'minibond_js', plugins_url( 'assets/js/main.js', __FILE__ ) , array(), '1.0.0', true );
    /* add css libraries */
    wp_register_style( 'bootstrap_css', plugins_url( 'assets/bootstrap/css/bootstrap.min.css', __FILE__ ), false, '3.3.5' );
    wp_enqueue_style( 'bootstrap_css' );
    wp_register_style( 'jqueryui_css', plugins_url( 'assets/jquery-ui-1.11.4/jquery-ui.min.css', __FILE__ ), false, '1.11.4' );
    wp_enqueue_style( 'jqueryui_css' );
    wp_register_style( 'selectBoxit_css', plugins_url( 'assets/js/jquery.selectBoxIt/src/stylesheets/jquery.selectBoxIt.css', __FILE__ ), false, '3.8.1' );
    wp_enqueue_style( 'selectBoxit_css' );
    wp_register_style( 'fontawesome_css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', false, '4.4.0' );
    wp_enqueue_style( 'fontawesome_css' );
    wp_register_style( 'minibond_css', plugins_url( 'assets/css/main.css', __FILE__ ), false, '1.0.0' );
    wp_enqueue_style( 'minibond_css' );
}

add_action('init', 'mini_bonds_start_session', 1);
function mini_bonds_start_session() {
    if(!session_id() || session_id() == '' ) {
        session_start();
    }
}

include_once( plugin_dir_path( __FILE__ ) . '/mini-bonds-functions.php');
include_once( plugin_dir_path( __FILE__ ) . '/mini-bonds-registration.php');
include_once( plugin_dir_path( __FILE__ ) . '/mini-bonds-registration-form1.php');
include_once( plugin_dir_path( __FILE__ ) . '/mini-bonds-registration-form2.php');
include_once( plugin_dir_path( __FILE__ ) . '/mini-bonds-registration-form3.php');
include_once( plugin_dir_path( __FILE__ ) . '/mini-bonds-registration-form4.php');
include_once( plugin_dir_path( __FILE__ ) . '/mini-bonds-registration-form5.php');
include_once( plugin_dir_path( __FILE__ ) . '/mini-bonds-login.php');
include_once( plugin_dir_path( __FILE__ ) . '/mini-bonds-shortcodes.php');

function mini_bonds() {
    include_once( plugin_dir_path( __FILE__ ) . '/mini-bonds-admin-setting.php');
    minibond_admin_setting();
}
