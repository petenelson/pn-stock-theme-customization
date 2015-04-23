<?php
/*
Plugin Name: PeteNelson.com Stock Theme Customization
Description: My custom overrides for the Stock theme (https://wordpress.org/themes/stock/)
Author: Pete Nelson
*/

add_action( 'wp_enqueue_scripts', 'pete_nelson_stock_theme_customization', 999 );

function pete_nelson_stock_theme_customization() {
	wp_enqueue_style( 'petenelson-stock-theme-customization', plugin_dir_url( __FILE__ ) . 'style.css', null, '2015-04-23-01' );
}
