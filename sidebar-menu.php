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
	<div>
		<div>
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div>
		<div>
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div>
		<div>
			<?php dynamic_sidebar( 'sidebar-5' ); ?>
		</div>
	</div>
</div>
