<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts() {

	// Enqueue the main Stylesheet.
	wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/dist/assets/css/app.css', array(), 
									 filemtime(get_template_directory() . '/dist/assets/css/app.css'), 'all' );

	// Deregister the jquery version bundled with WordPress, as we're injecting the version we need with Webpack.
	wp_deregister_script( 'jquery' );

	// Enqueue Founation scripts
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/dist/assets/js/app.js', array(), 
										filemtime(get_template_directory() . '/dist/assets/js/app.js'), true );

	// Enqueue FontAwesome from CDN. Uncomment the line below if you don't need FontAwesome.
	wp_enqueue_script( 'jquery', 'https://use.fontawesome.com/5016a31c8c.js', array(), '4.7.0', true );


	// Add the comment-reply library on pages where it is necessary
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	}

	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
endif;
