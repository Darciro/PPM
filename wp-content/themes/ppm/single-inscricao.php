<?php
if(!current_user_can('administrator') || !current_user_can('editor')) {
	wp_redirect( home_url() );
}
get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div class="box-interna">
			<div class="col-md-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="article-content">
						<div class="panel panel-default">
							<div class="panel-body">
								<small>Data da inscrição: <?php echo get_the_date('', $post->ID); ?></small>
								<h3><strong><?php the_title() ;?></strong></h3>
								<?php
								$user = get_user_by( 'id', $post->post_author );
								$user_fullname = get_user_meta( $post->post_author, 'ppm_fullname' );
								if( !$user_fullname[0] ){
									$name = $user->user_nicename;
								}else{
									$name = $user_fullname[0];
								}
								$email = $user->user_email;
								?>
								<p>Nome: <?php echo $name; ?></p>
								<p>Email: <?php echo $email; ?></p>
								<p>Telefone: <?php echo get_user_meta( $post->post_author, 'phone_number' )[0]; ?></p>
								<p>Estado: <?php echo get_user_meta( $post->post_author, 'ppm_estado' )[0]; ?></p>
								<p>País: <?php echo get_user_meta( $post->post_author, 'ppm_cidade' )[0]; ?></p>
								<hr/>
								<h5>Inscrições realizadas</h5>
								<?php
								if( have_rows('inscricao', $post->ID) ):

								// loop through the rows of data
								while ( have_rows('inscricao', $post->ID) ) : the_row();
					
									// display a sub field value
									echo '<p>Modalidade: ' . get_sub_field('modalidades') . '</p>';
									if( get_sub_field('modalidades') == 'Criação' ){
										echo '<p>Categoria: ' . get_sub_field('categorias_de_criacao') . '</p>';
									}else if( get_sub_field('modalidades') == 'Produção' ){
										echo '<p>Categoria: ' . get_sub_field('categorias_de_producao') . '</p>';
									}else if( get_sub_field('modalidades') == 'Convergência' ){
										echo '<p>Categoria: ' . get_sub_field('categorias_de_convergencia') . '</p>';
									}
									if( have_rows('links_para_avaliacao') ):
										// loop through links
										while ( have_rows('links_para_avaliacao') ) : the_row();
											echo '<p>Com o(s) link(s): <a href="'. get_sub_field('link')  .'" target="_blank">'. get_sub_field('link') .'</a></p>';
										endwhile;
									else :
										// No links found
									endif;
					
								endwhile;
					
							else :
					
								// no rows found
					
							endif;
								
								?>
								<?php // echo '<pre>'; var_dump($all_subscriptions_query); echo '</pre>'; ?>
							</div>
						</div>
					</div>
				</article>

			<?php endwhile; else: ?>

				<p>Sorry, no posts to list</p>

			<?php endif; ?>

			</div>
		<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
