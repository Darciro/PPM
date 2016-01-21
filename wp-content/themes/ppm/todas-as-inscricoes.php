<?php
/**
 * Template Name: Todas as inscrições
 *
 * @package WordPress
 * @subpackage PPM
 */
 
get_header(); ?>
<div id="content" class="container all-inscriptions">
	<div class="row">
		<div class="box-interna">
			<div class="col-md-12">
				<div class="title-interna">
					<h2><?php the_title() ;?> <a id="print-btn" class="print" href="#"><i class="fa fa-print"></i></a></h2>
				</div>
				
				<form id="inscriptions-filter">
					<label for="inscriptions-filter--select">Filtar por</label>
					<select id="inscriptions-filter--select">
						<option value="data">Data</option>
						<option value="modalidade">Modalidade</option>
						<option value="modalidade">Categoria</option>
						<option value="pais">País</option>
						<option value="estado">Estado</option>
					</select>
					<input type="submit" value="Ok" />
				</form>
				
				<?php
				$args = array(
					'post_type' => 'inscricao',
					'post_status' => 'publish',
					'posts_per_page' => -1
				);
				$all_subscriptions_query = new WP_Query( $args );
				if ( $all_subscriptions_query->have_posts() ) : while ( $all_subscriptions_query->have_posts() ) : $all_subscriptions_query->the_post(); ?>
	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="article-content">
							<div class="panel panel-default">
								<div class="panel-body">
									<small>Data da inscrição: <?php echo get_the_date('', $post->ID); ?></small>
									<h3><a href="<?php the_permalink() ;?>"><strong><?php the_title() ;?></strong></a></h3>
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
									<p>País: <?php echo get_user_meta( $post->post_author, 'country' )[0]; ?></p>
									<p>Estado: <?php echo get_user_meta( $post->post_author, 'ppm_estado' )[0]; ?></p>
									<p>Cidade: <?php echo get_user_meta( $post->post_author, 'ppm_cidade' )[0]; ?></p>
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
		</div>
	</div>
</div>

<?php get_footer(); ?>
