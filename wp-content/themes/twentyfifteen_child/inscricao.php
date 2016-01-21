<?php
/**
 * Template Name: Inscrição
 *
 */

acf_form_head();
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="inscricao_form" <?php post_class(); ?>>
				
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				
				<div class="entry-content">
					<?php
				
					acf_form(array(
						'post_id'		=> 'new_post',
						// 'post_title'	=> 'Some Text',
						'new_post'		=> array(
							'post_type'		=> 'inscricao',
							'post_status'	=> 'publish'
						),
						'return'		=> home_url('obrigado'),
						'submit_value'	=> 'Enviar Inscrição'
					));
					
					?>
				</div>
			</article>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
