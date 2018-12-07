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
<?php dynamic_sidebar( 'sidebar-3' ); ?>

<?php dynamic_sidebar( 'sidebar-4' ); ?>

<?php dynamic_sidebar( 'sidebar-5' ); ?>
