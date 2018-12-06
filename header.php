<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A_Mãe_do_André
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">Ir para o conteúdo</a>


	<header id="masthead" class="site-header" <?php echo get_field('custom_header_photo', 'option') ? 'style="background: url(' . get_field('custom_header_photo', 'option') . ') 50% 0px / cover no-repeat;"' : ''; ?> >
		<div class="site-header-overlay" <?php echo get_field('custom_header_photo', 'option') ? 'style="opacity:'. get_field('custom_header_opacity', 'option')/100 .';"' : ''; ?>></div>
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;?>
		</div><!-- .site-branding -->

		<button class="menu-toggle"><?php echo amaedoandre_get_svg( array( 'icon' => 'menu' )); ?>Menu</button>

	</header><!-- #masthead -->
