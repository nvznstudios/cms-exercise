<?php

// Allow SVGs to be uploaded
if( !function_exists('custom_mime_types') ){
	
	function custom_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter('upload_mimes', 'custom_mime_types');

}

// Add Stylesheet for Eaze GIPHY Search
if( !function_exists('eaze_giphy_editor_scripts') ){

	function eaze_giphy_editor_scripts() {
	    wp_enqueue_style( 'eaze-giphy-style',  get_stylesheet_directory_uri() . '/inc/eaze-giphy/assets/css/eaze-giphy.css' );
	}
	add_action( 'admin_enqueue_scripts', 'eaze_giphy_editor_scripts' );

}


// Add styles and scripts ( Eaze GIPHY Frontend styles, and Foundation )
if( !function_exists('eaze_giphy_frontend_scripts') ){

	function eaze_giphy_frontend_scripts(){
		wp_enqueue_style( 'foundation-styles',  get_stylesheet_directory_uri() . '/inc/eaze-giphy/assets/css/foundation.min.css' );
		wp_enqueue_style( 'eaze-giphy-style',  get_stylesheet_directory_uri() . '/inc/eaze-giphy/assets/css/eaze-giphy-frontend.css' );
		wp_enqueue_script( 'foundation-script',  get_stylesheet_directory_uri() . '/inc/eaze-giphy/assets/js/vendor/foundation.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'foundation-script',  get_stylesheet_directory_uri() . '/inc/eaze-giphy/assets/js/vendor/what-input.js', array( 'jquery' ) );
		wp_enqueue_script( 'foundation-app-script',  get_stylesheet_directory_uri() . '/inc/eaze-giphy/assets/js/app.js', array( 'jquery' ) );
	}
	add_action( 'wp_enqueue_scripts', 'eaze_giphy_frontend_scripts' );

}


// Add custom media button Add GIFs
if( !function_exists('add_eaze_gif_button') ){

	// Add Button to Editor
	add_action('media_buttons', 'add_eaze_gif_button', 15);
	function add_eaze_gif_button() {
	    echo '<a href="#" id="insert-eaze-gif-btn" class="button insert-eaze-gif-btn">Add GIF</a>';
	}

}



// Load JS used for Eaze GIPHY Search
if( !function_exists('include_eaze_gif_button_js_file') ){

	add_action('wp_enqueue_media', 'include_eaze_gif_button_js_file', 99999);
	function include_eaze_gif_button_js_file() {
	    wp_enqueue_script( 'eaze-giphy-script',  get_stylesheet_directory_uri() . '/inc/eaze-giphy/assets/js/eaze-giphy.js', array( 'jquery' ) );
	}

}


// Add HTML used for Eaze GIPHY Search to Admin Footer
if( !function_exists('eaze_modal_content') ){

	add_action('admin_footer', 'eaze_modal_content');
	function eaze_modal_content(){
		echo '<div id="eaze-gif-wrap" class="gif-search-wrapper">
				<div class="gif-search-wrapper-inner">
					<div class="gif-search-body">
						<div class="gif-search-close-wrapper">
							<span id="gif-search-close">X</span>
						</div>
						<span class="heading-section">
							<p>Find a GIF</p>
						</span>
						<input id="gif-search-input" name="gif-search" type="text">
						<button id="gif-search-button">Search</button>
						<div class="gif-search-results"></div>
						<button id="gif-search-insert">Insert <span class="gif-count"></span></button>
					</div>
				</div>
			</div>';
	}

}