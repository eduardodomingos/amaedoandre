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
		<?php amaedoandre_posted_in(); ?>
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				amaedoandre_posted_by();
				amaedoandre_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if(get_field('affiliate_links')): ?>
			<p class="entry-disclosure">Nota: <?php if( get_field('monetization_type') == 'voucher' ):
				the_field('affiliate_links_voucher_text', 'option');
			else:
				the_field('affiliate_links_money_text', 'option');
			endif; ?></p>
		<?php endif; ?>
		<?php
		if( have_rows('content_blocks') ):
			$row = 1;
			while ( have_rows('content_blocks') ) : the_row();
				if( get_row_layout() == 'visual_editor' ):
					if($row == 1) {
					echo preg_replace('/^<p>((\S+\s+){2}\S+)/', '<p><b>$1</b>', get_sub_field('visual_editor'));
					} else {
						the_sub_field('visual_editor');
					}
				elseif( get_row_layout() == 'gallery' ):
					$images = get_sub_field('gallery_photos');
					if( $images ): ?>
						<?php $total_images = count( $images );?>
						<div class="gallery">
							<?php foreach( $images as $key => $image ): ?>
								<div>
									<figure>
										<div class="aspect-ratio-box">
											<div class="aspect-ratio-box-inside">
												<img src="<?php echo $image['sizes']['gallery']; ?>" alt="<?php echo $image['alt']; ?>" />
											</div>
										</div>
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
				++$row;
			endwhile;
		endif;
		?>
	</div><!-- .entry-content -->
	<?php amaedoandre_entry_tags();?>
	<?php amaedoandre_share_this(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
