<?php
/**
* Plugin Name: Search Top Bar
* Description: The easiest way to add a top bar with a search and contact widget to your website.
* Version: 1.1.4
* Author: JLG Design
 */

require_once 'app/admin.php';

/* --- Enqueue fontawesome --- */
add_action( 'admin_head', 'jlgstb_head' );
add_action( 'wp_enqueue_scripts', 'jlgstb_head',1);

function jlgstb_head(){
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.4.2/css/all.css');
}

/* --- Enqueue plugin scripts --- */
add_action( 'wp_enqueue_scripts', 'jlgstb_scripts' );
function jlgstb_scripts() {
  wp_enqueue_script( 'jlgstb_script', plugins_url('js/stb_script.js', __FILE__), array( 'jquery' ),'1.1.2');
  $jlgstb_settings = jlgstb_set_fields();
  wp_localize_script( 'jlgstb_script', 'jlgstb_settings', $jlgstb_settings );
}

/* --- Enqueue plugin stylsheet --- */
add_action( 'wp_enqueue_scripts', 'jlgstb_styles' );
function jlgstb_styles() {
  wp_enqueue_style( 'jlgstb_style', plugins_url('css/stb_style.css', __FILE__),'1.1.2');
}

/* --- Enqueue admin stylsheet --- */
add_action( 'admin_enqueue_scripts', 'jlgstb_admin_styles' );
function jlgstb_admin_styles() {
    wp_enqueue_style( 'jlgstb_admin_style', plugins_url('css/stb_admin_style.css', __FILE__),'1.1.2');
}

/* --- Enqueue plugin color picket --- */
add_action( 'admin_enqueue_scripts', 'jlgstb_admin_colorp' );
function jlgstb_admin_colorp() {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'jlgstb_admin_colorp_script', plugins_url('js/stb_colorp_script.js', __FILE__), array( 'wp-color-picker' ), false, true );
}

//admin menu
add_action('admin_menu', 'jlgstb_admin_menu');
add_action('admin_init', 'jlgstb_register_settings');
