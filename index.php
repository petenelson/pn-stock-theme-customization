<?php
/*
Plugin Name: PeteNelson.com Stock Theme Customization
Description: My custom overrides for the Stock theme (https://wordpress.org/themes/stock/)
Author: Pete Nelson
*/

add_action( 'wp_enqueue_scripts', 'pn_stock_theme_customization_css', 999 );

function pn_stock_theme_customization_css() {
	wp_enqueue_style( 'petenelson-stock-theme-customization', plugin_dir_url( __FILE__ ) . 'style.css', null, '2015-04-23-03' );
}


add_filter( 'the_content', 'pn_stock_theme_customization_the_content' );
ady_filter( 'wpseo_pre_analysis_post_content', 'pn_stock_theme_customization_the_content' );

function pn_stock_theme_customization_the_content( $content ) {

	if ( wp_attachment_is_image() ) {
		ob_start();
		?>
			<p class="attachment">
				<img src="<?php echo wp_get_attachment_url( get_the_id() ); ?>" alt="" class="size-full" />
			</p>
		<?php
		$content = ob_get_contents();
		ob_end_clean();
	}

	return $content;
}


add_filter( 'is_active_sidebar', 'pn_stock_theme_customization_is_active_sidebar', 10, 2 );

function pn_stock_theme_customization_is_active_sidebar( $is_active, $index ) {

	if ( is_singular( 'attachment' ) || is_singular( 'page' ) )  {
		$is_active = false;
	}

	return $is_active;
}

