<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package A_Mãe_do_André
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title"><?php
			$amaedoandre_comment_count = get_comments_number();
			if($amaedoandre_comment_count === '1') {
				echo number_format_i18n( $amaedoandre_comment_count ) . ' comentário';
			}
			else {
				echo number_format_i18n( $amaedoandre_comment_count ) . ' comentários';
			}
			?></h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size' => 100,
				'walker' => new Amaedoandre_Walker_Comment()
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments">Comentários encerrados</p>
			<?php
		endif;

	endif; // Check for have_comments().
	
	$args = array(
		'title_reply' => 'Deixe um comentário'
	);
	comment_form($args);
	?>

</div><!-- #comments -->
