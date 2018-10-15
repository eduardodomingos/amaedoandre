<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package A_Mãe_do_André
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function amaedoandre_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
		$classes[] = 'archive-view';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'amaedoandre_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function amaedoandre_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'amaedoandre_pingback_header' );

/**
 * Customize ellipsis at end of excerpts.
 */
function amaedoandre_excerpt_more( $more ) {
	return "…";
}
add_filter( 'excerpt_more', 'amaedoandre_excerpt_more' );

/**
 * Filters the width of an image’s caption, and remove the inline width style.
 */
add_filter( 'img_caption_shortcode_width', '__return_zero' );

/**
 * Fix Post Title Capitalization.
 */
function lowertitle($title)  {
	$title = strtolower($title);
	return $title;
}
	
function fixtitle($title) {
	$smallwordsarray = array( 'o', 'a', 'e', 'ou', 'de', 'da', 'das', 'do', 'dos' );
	$words = explode(' ', $title); 
	foreach ($words as $key => $word) {
	if ($key == 0 or !in_array($word, $smallwordsarray)) $words[$key] = ucwords($word); 
} 
$newtitle = implode(' ', $words); return $newtitle; }

add_filter('the_title', 'lowertitle');
add_filter('the_title', 'fixtitle');