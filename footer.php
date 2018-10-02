<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A_Mãe_do_André
 */

?>

	<footer id="colophon" class="site-footer">
		<small><?php printf( esc_html__( '&copy; %1$s %2$s. All Rights Reserved.', 'amaedoandre' ), date('Y'), get_bloginfo( 'name' )); ?></small>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
