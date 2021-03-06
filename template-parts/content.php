<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package A_Mãe_do_André
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php amaedoandre_post_thumbnail(); 
		amaedoandre_posted_in();
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				amaedoandre_posted_on();
				amaedoandre_comments_link();
				amaedoandre_posted_by();
				amaedoandre_edit_post_link();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<p><?php  echo wp_trim_words( amaedoandre_get_first_instance_of_content_block( get_the_ID() ) , 35, '...'  ); ?></p>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
