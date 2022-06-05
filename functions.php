<?php
function twenty_twenty_one_child_scripts() {
	$parent_style        = 'twenty-twenty-one-style';
	$child_directory_uri = get_stylesheet_directory_uri();

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style(
		'twenty-twenty-one-child-style',
		$child_directory_uri . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script( 'twenty-twenty-one-child-script', $child_directory_uri . '/assets/js/main.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_child_scripts' );

function filter_posts( $query ) {
	if ( $query->is_main_query() && ! is_admin() ) :
		if ( isset( $_GET['posts_to_show'] ) ) :
			$posts_to_show = $_GET['posts_to_show'];
		else :
			$posts_to_show = get_option( 'posts_per_page' );
		endif;
		$query->set( 'posts_per_page', $posts_to_show );
	endif;
}
add_action( 'pre_get_posts', 'filter_posts' );
