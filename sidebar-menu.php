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

<div id="animatedModal">		
	<div class="modal-content">
		<!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID  class="close-animatedModal" -->
		<div class="close-animatedModal"> 
			CLOSE MODAL
		</div>
		<div class="modal-grid">
			<div>
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div>
			<div>
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</div>
			<div>
				<?php dynamic_sidebar( 'sidebar-5' ); ?>
			</div>
		<div class="modal-content">
	</div>
</div>
