<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A_Mãe_do_André
 */

if ( ! is_active_sidebar( 'sidebar-3' ) && ! is_active_sidebar( 'sidebar-4' ) && ! is_active_sidebar( 'sidebar-5' ) ) {
	return;
}
?>

<div id="mega-menu">
	<div class="container">
		<button class="megamenu-toggle"><?php echo amaedoandre_get_svg( array( 'icon' => 'x' )); ?><span class="screen-reader-text">Fechar</span></button>
		<div>
			<div><?php dynamic_sidebar( 'sidebar-3' ); ?></div>
			<div><?php dynamic_sidebar( 'sidebar-4' ); ?></div>
			<div><?php dynamic_sidebar( 'sidebar-5' ); ?></div>
		</div>
	</div>
</div>