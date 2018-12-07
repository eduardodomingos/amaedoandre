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

/*
 * Returns the first instance of a given layout option
 * https://gist.github.com/secretstache/9f0a93a9953361edb7bb
 * @param - $id - the id of the post you are trying to target: '' by default
 * @param - $fc_field - the name of the ACF flexible field: 'content_blocks' as the default
 * @param - $fc_layout - the name of the flexible content layout: 'visual_editor' as the default
 * @return - mixed
 * @todo - test different types of returned content. at the moment, I am only using this for returning a string
*/
function amaedoandre_get_first_instance_of_content_block( $id = '', $fc_field = 'content_blocks', $fc_layout = 'visual_editor' ) {
	
	if ( class_exists('acf') ) { 
	
		if ( have_rows( $fc_field, $id ) ) { 
		
			$content_blocks = get_field( $fc_field, $id );
			$content = array();
		
			foreach ( $content_blocks as $block ) {
				if ( $block['acf_fc_layout'] == $fc_layout ) {
					$content[] = $block[$fc_layout];
				}
			}
		
			reset($content);
		
			return $content[0];
	
		}
	
	} else {
		
		return '<p class="error">Advanced Custom Fields is required for <code>get_first_instance_of_content_block()</code> to work.</p>';
		
	}
	
}

/*
 * Prefix tags with an # symbol
*/
add_filter( 'term_links-post_tag', function ( $links )
{

    // Return if $links are empty
    if ( empty( $links ) )
        return $links;

    // Reset $links to an empty array
    unset ( $links );
    $links = [];

    // Get the current post ID
    $id = get_the_ID();
    // Get all the tags attached to the post
    $taxonomy = 'post_tag';
	$terms = get_the_terms( $id, $taxonomy );
	

    // Make double sure we have tags
    if ( !$terms )
        return $links; 

    // Loop through the tags and build the links
    foreach ( $terms as $term ) {
        $link = get_term_link( $term, $taxonomy );

        // Here we add our hastag, so we get #Tag Name with link
        $links[] = '<a href="' . esc_url( $link ) . '" rel="tag">#' . $term->name . '</a>';
    }

    return $links;
});

/*
 * Disable Yoast SEO on Custom Post Type
*/
function my_remove_wp_seo_meta_box() {
	remove_meta_box('wpseo_meta', 'event', 'normal');
}
add_action('add_meta_boxes', 'my_remove_wp_seo_meta_box', 100);


/*
 * Remove font-size inline style from tag cloud widget
*/
function amaedoandre_tag_cloud($string){
	


	return preg_replace('/style="font-size:.+pt;"/', '', $string);
}
add_filter('wp_generate_tag_cloud', 'amaedoandre_tag_cloud',10,1); 

/*
 * Set format and order of tag cloud widget items
*/
function set_widget_tag_cloud_args($args) {
	$my_args = array('format' => 'list', 'orderby'=>'name' );
	$args = wp_parse_args( $args, $my_args );
	return $args;
}
add_filter('widget_tag_cloud_args','set_widget_tag_cloud_args');

/*
 * Capitalize tag's first letter
*/
add_filter( 'wp_generate_tag_cloud_data', function( $tag_data )
{
    return array_map ( 
        function ( $item )
        {
			$item['name'] = ucfirst($item['name']);
            return $item;
        }, 
        (array) $tag_data 
    );

} );