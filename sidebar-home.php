<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A_Mãe_do_André
 */

if ( ! is_active_sidebar( 'sidebar-6' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar">
	<?php dynamic_sidebar( 'sidebar-6' ); ?>
</aside><!-- #secondary -->
