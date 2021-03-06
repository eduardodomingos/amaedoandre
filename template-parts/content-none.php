<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package A_Mãe_do_André
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title">Nenhum resultado encontrado</h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>
			<p>Pronta para publicar a tua primeira história? <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>">Começa aqui</a>.</p>
			<?php
		elseif ( is_search() ) :
			?>

			<p>Desculpe, mas não existe qualquer conteúdo com as palavras-chave que introduziu. Tente efetuar uma procura com outras palavras-chave.<br>Obrigado.</p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'amaedoandre' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
