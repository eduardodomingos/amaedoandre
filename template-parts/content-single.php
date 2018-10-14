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
		<?php amaedoandre_post_thumbnail(); ?>
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				amaedoandre_posted_by();
				amaedoandre_posted_on();
				amaedoandre_posted_in();
				amaedoandre_entry_tags();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if( have_rows('content_blocks') ):
			while ( have_rows('content_blocks') ) : the_row();
				if( get_row_layout() == 'visual_editor' ):
					the_sub_field('visual_editor_text');
				elseif( get_row_layout() == 'gallery' ):
					$images = get_sub_field('gallery_photos');
					if( $images ): ?>
						<?php $total_images = count( $images );?>
						<div class="gallery">
							<?php foreach( $images as $key => $image ): ?>
								<div>
									<figure>
										<img src="<?php echo $image['sizes']['gallery']; ?>" alt="<?php echo $image['alt']; ?>" />
										<?php if( $image['caption'] ): ?>
										<figcaption>
											<span><?php echo $image['caption']; ?></span>
											<span class="photo-index"><?php echo amaedoandre_get_svg( array( 'icon' => 'camera' )); ?> <?php echo ($key + 1) . '/' . $total_images; ?></span>
										</figcaption>
										<?php endif; ?>
									</figure>
								</div>
							<?php endforeach; ?>
						</div><!-- .slider -->
					<?php endif;
				endif;
			endwhile;
		endif;
		// the_content( sprintf(
		// 	wp_kses(
		// 		/* translators: %s: Name of current post. Only visible to screen readers */
		// 		__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'amaedoandre' ),
		// 		array(
		// 			'span' => array(
		// 				'class' => array(),
		// 			),
		// 		)
		// 	),
		// 	get_the_title()
		// ) );
		?>
	</div><!-- .entry-content -->
	<?php amaedoandre_share_this(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
