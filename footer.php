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
		<button id="js-to-top-button" class="to-top">Voltar ao topo <?php echo amaedoandre_get_svg( array( 'icon' => 'arrow-up' )); ?></button>
		<small>&copy; <?php echo  date('Y') . ' ' . get_bloginfo( 'name' ); ?>. Todos os Direitos Reservados</small>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php get_sidebar('menu');?>

<?php wp_footer(); ?>

</body>
</html>
