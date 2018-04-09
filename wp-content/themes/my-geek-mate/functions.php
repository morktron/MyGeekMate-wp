<?php


/**

 * @author Divi Space

 * @copyright 2017

 */


if (!defined('ABSPATH')) die();

add_action( 'wp_enqueue_scripts', 'ds_ct_enqueue_parent' );
function ds_ct_enqueue_parent() { wp_enqueue_style( 'parent-style',  get_template_directory_uri() . '/style.css' ); }

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parent_style = 'parent-style'; // Divi parent style
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}


add_action( 'wp_enqueue_scripts', 'ds_ct_loadjs' );
function ds_ct_loadjs() {
	wp_enqueue_script( 'ds-theme-script', get_stylesheet_directory_uri() . '/ds-script.js',
        array( 'jquery' )
    );
}

include('login-editor.php');



/* start custom functions */

//enqueue external font awesome stylesheet
add_action('wp_enqueue_scripts','enqueue_font_awesome');
function enqueue_font_awesome(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 
}

//add Google Tag Manager plugin code
add_shortcode( 'embed-GTM', 'embed_GTM' );
function embed_GTM( $atts ){
	return "<!--foo and bar-->";
}



?>