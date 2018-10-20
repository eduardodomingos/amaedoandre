<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A_Mãe_do_André
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<aside id="post-widget-area" class="post-widgets">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</aside><!-- #post-widget-area -->
