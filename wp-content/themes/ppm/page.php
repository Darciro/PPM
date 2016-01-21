<?php
if ( is_page( 'inscricao' ) || is_page( 'inscription' ) ){ 
	acf_form_head(); 
};
get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div class="box-interna">
			<div class="col-md-12">
				<?php if ( new DateTime() < new DateTime("2015-11-20 01:59:59") && is_page( 'inscricao' ) ): ?>
					<article>
						<div class="article-content">
							<div class="title-interna">
								<?php
									$lang = pll_current_language();
									if( $lang == 'en' ){
										echo '<h2>Off period</h2>';
									}else{
										echo '<h2>Fora do período</h2>';	
									}
								?>
							</div>
	
							<div class="panel panel-default">
								<div class="panel-body">
									<?php
										$lang = pll_current_language();
										if( $lang == 'en' ){
											echo 'The registration period starts at 00hs of the day 2015-11-20.';
										}else{
											echo 'O perído de inscrições começa às 00hs do dia 20/11/2015.';	
										}
									?>
								</div>
							</div>
						</div>
					</article>
				<?php else: ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="article-content">
								<div class="title-interna">
									<h2><?php the_title() ;?></h2>
								</div>
		
								<?php the_post_thumbnail('large'); ?>
								<div class="panel panel-default">
									<div class="panel-body">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
						</article>
		
					<?php endwhile; else: ?>
						<p>Sorry, no posts to list</p>
					<?php endif; ?>
					
					<?php if( get_field('painel-duvidas') ): ?>
					<div class="panel panel-default bg_blac">
						<div class="panel-body text-center color-white">
							<?php if( current_lang() == 'pt' ){ echo 'Em caso de dúvidas, favor enviar email para'; }else{ echo 'For questions, please email us on'; }; ?><?php _e( 'Inscreva-se', 'ppm_lang' ); ?>
								<a href="mailto:ppm@grv.art.br">ppm@grv.art.br</a> | <a href="tel:+556133224263">tel: 55 61 3322 4263</a>
						</div>
					</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
