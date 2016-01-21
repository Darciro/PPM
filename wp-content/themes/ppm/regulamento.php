<?php
/**
 * Template Name: Regulamento
 *
 * @package WordPress
 * @subpackage PPM
 */
 
get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div class="box-interna">
				<div class="col-md-8">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="article-content">
							<div class="title-interna">
								<h2><?php the_title() ;?></h2>
							</div>
	
							<?php the_content(); ?>
						</div>
					</article>
	
				<?php endwhile; endif; ?>	
					<!--<div class="title-interna"> O Regulamento </div>
					<br>
					<p class="interna">
						<div class="tt">I - Do Cadastro e Inscrição</div> 
					</p>
					
					<div class="panel panel-default">
						<div class="panel-heading">     <p class="internal-cont-color">
							<strong>Quem pode se cadastrar e inscrever?</strong> 
						</p></div>
						<div class="panel-body">
							<p class="internal-cont">
								Artistas, Profissionais da Música, Empresas e Associações
							</p>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">     <p class="internal-cont-color">
							<strong> Após a conclusão do cadastro, como inscrevo os indicados?</strong> 
						</p></div>
						<div class="panel-body">
							<p class="internal-cont">
								A partir do preenchimento do formulário de inscrição.
							</p>
						</div>
					</div>


					<div class="panel panel-default">
						<div class="panel-heading">     <p class="internal-cont-color">
							<strong> O profissional cadastrado poderá indicar pessoas físicas e empresas com quem tenham trabalhado em conjunto?</strong> 
						</p></div>
						<div class="panel-body">
							<p class="internal-cont">
								Sim. Porém, isso obrigará ao cadastrado, repetir com o mesmo login e senha, cada nova inscrição/indicação que fizer. Dessa forma, o cadastrado, ao longo de todo processo de votação, se responsabilizará por acompanhar o status de seus indicados.
							</p>
						</div>
					</div>
					
					
					<div class="panel panel-default">
						<div class="panel-heading">     <p class="internal-cont-color">
							<strong> Só serão aceitos 3 links comprobatórios ( áudio e imagem ) para cada inscrição.O sistema de inscrição não reconhecerá links de Facebook | Twitter  e Instagran para comprovação de atividades profissionais executadas.</strong> 
						</p></div>
						<div class="panel-body">
							<p class="internal-cont">
								            Local de Cadastro e Inscrição  - <a href="#"> www.ppm.art.br </a>
							</p>
						</div>
					</div>


					<p class="interna">
						<div class="tt">II - Quem pode votar?</div> 
					</p>
					<div class="panel panel-default">
						<div class="panel-heading">     <p class="internal-cont-color">
							<strong>Quem pode votar na etapa 01?</strong> 
						</p></div>
						<div class="panel-body">
							<p class="internal-cont">
								            Artistas, Profissionais da Música, Empresas e Associações
							</p>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">     <p class="internal-cont-color">
							<strong>Quem pode votar na etapa 02?</strong> 
						</p></div>
						<div class="panel-body">
							<p class="internal-cont">
								            Púbico em Geral ( a partir do cadastro no site do evento ), Artistas, Profissionais da Música, Empresas e Associações
							</p>
						</div>
					</div>


					<div class="panel panel-default">
						<div class="panel-heading">     <p class="internal-cont-color">
							<strong>Quem pode votar na etapa 03?</strong> 
						</p></div>
						<div class="panel-body">
							<p class="internal-cont">
								  Comissão Julgadora
							</p>
						</div>
					</div>



					<p class="interna">
						<div class="tt">III - Etapas de Votação</div> 
					</p>
					<div class="panel panel-default">
						<div class="panel-heading">     <p class="internal-cont-color">
							<strong>Etapa 01: Da escolha dos 5 Pré-Selecionados por categoria</strong> 
						</p></div>
						<div class="panel-body">
							<p class="internal-cont">
								            Finalizado o período de cadastro e inscrições, disponibilizaremos a relação de todos os inscritos em todas as categorias. </p> <br>

								<strong>Quem poderá votar na etapa 01, a partir da liberação da relação total de inscritos 
									em todas as categorias?</strong> 
									<br><br>

									<div>       
										Resp: Apenas Artistas e Profissionais da Música previamente cadastrados no site do evento 
										Fonte de avaliação: links comprobatórios
									</div>  

									
								</div>
							</div>

						</p>
						<div class="panel panel-default">
							<div class="panel-heading">     
								<p class="internal-cont-color">
									<strong>Etapa 02: Da escolha dos 3 Selecionados por categoria</strong> 
								</p>
							</div>
							


							<div class="panel-body">
								<strong>Quem poderá votar na etapa 02, a partir da liberação do resultado dos 5 pré-selecionados de cada categoria?</strong><br><br>
								<p class="internal-cont">Resp: Profissionais previamente cadastrados e público geral, que poderão fazer o cadastro no site do evento durante o período de votação da etapa 1; para que todos juntos, profissionais e público, previamente cadastrados, escolham livremente apenas no site do PPM2016, os 3 [três] Selecionados para todas as  categorias que desejarem votar.


								</p>
								<br>
								Fonte de avaliação: links comprobatórios


							</div>
						</div>


						<div class="panel panel-default">
							<div class="panel-heading">     <p class="internal-cont-color">
								<strong> Etapa 03: Da escolha do Vencedor de cada categoria</strong> 
							</p></div>

							
							<div class="panel-body">
								<p class="internal-cont">
									<strong> Quem poderá votar na etapa 03, a partir da liberação do resultado dos 3 selecionados de cada categoria?</strong> <br>
									    <div>Resp: Comissão Julgadora</div> <br> 
									Fonte de avaliação: links comprobatórios Local de Votação: <a href="#">www.ppm.art.br</a>
								</p>
							</div>
						</div>


						<div class="panel panel-default">
							<div class="panel-heading">     <p class="internal-cont-color">
								<strong>III Quantos serão Pré-Selecionados pelos Profissionais previamente cadastrados </strong> 
							</p></div>
							<div class="panel-body">
								<p class="internal-cont">
									  5 ( cinco). A categoria que não atingir o mínimo de três inscrições será automaticamente excluída da votação, e consequente, premiação.
								</p>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">     <p class="internal-cont-color">
								<strong>IV Quantos serão Selecionados, em cada categoria, pelo público em geral.</strong> 
							</p></div>
							<div class="panel-body">
								<p class="internal-cont">
									3 ( três)
								</p>
							</div>
						</div>


						<div class="panel panel-default">
							<div class="panel-heading">     <p class="internal-cont-color">
								<strong>V Dos Prazos Gerais de Votação</strong> 
							</p></div>
							<div class="panel-body">
								<p class="internal-cont">
									I Inscrições: de 20 de nov de 2015 à 17 de janeiro de 2016 | Local: 
								</p> <br>

								<p class="internal-cont"><strong>II Divulgação de todos os Inscritos por categoria : 25 de janeiro de 2016</strong> <br>
									Período de Votação apenas para Profissionais da Música previamente cadastrados: de 1º à 20 de fevereiro de 2016 [ nesta fase conheceremos 5 Pré-Selecionados] 
								</p><br>

								<p class="internal-cont">
									<strong>III Divulgação dos 5 [ cinco] Pré - Selecionados por categoria : 28 de fevereiro</strong> 
								</p>
								<p class="internal-cont">IV Período de Votação entre Público em Geral e Profissionais da Música 
									previamente cadastrados: de 29 de fevereiro à 13 de março de 2016 ( nesta fase conheceremos 3 Selecionados )


								</p><br>
								<p class="internal-cont">
									<strong>V Divulgação dos 3 ( três ) Selecionados por categoria : 20 de março de 2016</strong> <br>
									<p class="internal-cont">
										 VI Período de Votação apenas para Comissão Julgadora para escolha do vencedor: de 21 à 27 de março de 2016

									</p><br>

									<p class="internal-cont">
										<strong>VII Premiação: 1, 2 e 3 de abril de 2016 | Local: Teatro Brasília : Brasília</strong> 

									</p><br>
								</div>
							</div>-->



						</div>
						
						<div class="col-md-4">
							<div class="panel-info posit">
								<div class="panel-heading">
									<h4 class="panel-title"><i class=" icon-map-marker"></i><?php _e( 'Informações', 'ppm_lang' ); ?></h4>                  
								</div>
								<div class="list-group">
									<a href="<?php echo home_url() ?>/informacao#panel-1" class="list-group-item"><?php _e( 'Data do evento', 'ppm_lang' ); ?></a>
									<a href="<?php echo home_url() ?>/informacao#panel-2" class="list-group-item"><?php _e( 'Compre seu ingresso', 'ppm_lang' ); ?></a>
									<a href="<?php echo home_url() ?>/informacao#panel-3" class="list-group-item"><?php _e( 'Como chegar', 'ppm_lang' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
	</div>
</div>

<?php get_footer(); ?>
