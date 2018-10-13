<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package A_Mãe_do_André
 */

get_header();
?>

	<main id="main" class="main-content">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'single' );

		// Previous/next post navigation.
		$next_post = get_next_post();
		$previous_post = get_previous_post();
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">Próximo Artigo:</span> ' .
				'<span class="screen-reader-text">Próximo Artigo:</span> ' .
				'<span class="post-title">%title</span>' . get_the_post_thumbnail($next_post->ID,'thumbnail', array( 'class' => 'post-thumb' )),
			'prev_text' => '<span class="meta-nav" aria-hidden="true">Artigo Anterior:</span> ' .
				'<span class="screen-reader-text">Artigo Anterior:</span> ' .
				'<span class="post-title">%title</span>' . get_the_post_thumbnail($previous_post->ID,'thumbnail', array( 'class' => 'post-thumb' )),
		) );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
