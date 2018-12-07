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


	<header id="masthead" class="site-header">
		<div class="container">
			
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
			

			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' 	=> 'primary',
					'menu_id'        	=> 'primary-menu',
					'container'			=> false,
				) );
				?>
				
				<button class="megamenu-toggle"><?php echo amaedoandre_get_svg( array( 'icon' => 'menu' )); ?><span class="screen-reader-text">Menu</span></button>
			</nav><!-- #site-navigation -->

		</div><!-- .container -->
	</header><!-- #masthead -->

	<div id="site-content" class="content container layout">
