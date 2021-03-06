<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package A_Mãe_do_André
 */

if ( ! function_exists( 'amaedoandre_posted_in' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function amaedoandre_posted_in() {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'amaedoandre' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			?>
			<span class="cat-links meta"><span class="screen-reader-text">Em</span> <?php echo $categories_list; ?></span>
			<?php
		}
	}
endif;

if ( ! function_exists( 'amaedoandre_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function amaedoandre_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			'há ' .human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			'há ' . human_time_diff( get_the_modified_time( 'U' ), current_time( 'timestamp' ) )
		);

		echo ' <span class="posted-on meta">'. $time_string . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'amaedoandre_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function amaedoandre_posted_by() {
		

		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

		echo ' <span class="byline meta">' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'amaedoandre_comments_link' ) ) :
	/**
	 * Prints comments link.
	 */
	function amaedoandre_comments_link() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link meta">';
			comments_popup_link(sprintf('Comentar<span class="screen-reader-text"> em %s</span>', get_the_title()));
			echo '</span>';
		}

	}
endif;

if ( ! function_exists( 'amaedoandre_edit_post_link' ) ) :
	/**
	 * Prints comments link.
	 */
	function amaedoandre_edit_post_link() {
		edit_post_link(
			'Editar',
			'<span class="edit-link meta">',
			'</span>'
		);

	}
endif;

if ( ! function_exists( 'amaedoandre_entry_tags' ) ) :
	/**
	 * Prints HTML with meta information for the tags.
	 */
	function amaedoandre_entry_tags() {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list('',' ');
		if ( $tags_list ) {
			?>
			<p class="tags-links meta">Tags: <?php echo $tags_list?></p>
			<?php
		}
	}
endif;

if ( ! function_exists( 'amaedoandre_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function amaedoandre_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		?>
		<figure class="post-thumbnail">
		<?php
		if ( is_singular() ) :
			?>
			<?php the_post_thumbnail(); ?>
		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().?>
		</figure>
		<?php
	}
endif;

if ( ! function_exists( 'amaedoandre_share_this' ) ) :
	/**
	 * Displays the share buttons.
	 */
	function amaedoandre_share_this() {
		$url = urlencode(get_the_permalink());
		$title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
		?>
		<div class="share-this">
			<span class="label"><?php echo amaedoandre_get_svg( array( 'icon' => 'sharing' )); ?> Partilhe</span>
			<ul class="social-links-list">
				<li class="facebook">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" title="Partilhar no Facebook">
						<?php echo amaedoandre_get_svg( array( 'icon' => 'facebook' )); ?>
						<span class="screen-reader-text">Partilhar no Facebook</span>
					</a>
				</li>
				<li class="twitter">
					<a href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;via=amaedoandre" title="Partilhar no Twitter">
						<?php echo amaedoandre_get_svg( array( 'icon' => 'twitter' )); ?>
						<span class="screen-reader-text">Partilhar no Twitter</span>
					</a>
				</li>
				<li class="mail">
					<a href="mailto:?subject=<?php echo rawurlencode(get_the_title()); ?>&amp;body=Acabei de ler este artigo no blog A Mãe do André: <?php echo $url; ?>" title="Enviar por email">
						<?php echo amaedoandre_get_svg( array( 'icon' => 'mail' )); ?>
						<span class="screen-reader-text">Enviar por email</span>
					</a>
				</li>
			</ul>
		</div>
	<?php
	}
endif;