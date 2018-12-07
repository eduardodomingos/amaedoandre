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

<div class="widgetized-menu">
	<div class="widgetized-menu__wrapper">
		<button class="widgetized-menu-toggle"><?php echo amaedoandre_get_svg( array( 'icon' => 'x' )); ?>Fechar</button>
		<div class="widgetized-menu__grid">
			<div class="widgetized-menu__grid-item">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div>
			<div class="widgetized-menu__grid-item">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</div>
			<div class="widgetized-menu__grid-item">
				<?php dynamic_sidebar( 'sidebar-5' ); ?>
			</div>
		</div>
	</div>	
</div>
