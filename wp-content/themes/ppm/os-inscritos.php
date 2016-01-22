<?php
/**
 * Template Name: Os inscritos
 *
 * @package WordPress
 * @subpackage PPM
 */

get_header(); ?>
<div id="content" class="page-votation container all-inscriptions">
	<div class="row">
		<div class="box-interna">
			<div class="col-md-12">
				<div class="title-interna">
                    <h2><?php the_title(); ?></h2>
                </div>
				<div id="votation-form">
				<?php
				global $current_user;
      				 get_currentuserinfo();

				if( get_user_meta( $current_user->ID, '_already_voted', true ) ):
					echo 'Obrigado por sua votação!';
				else:

				if(isset($_POST['votation-submitted'])) {
					ppm_insert_vote( $current_user->ID, $_POST );
					/*echo '<pre>';
					var_dump($_POST);
					echo '</pre>';*/
					add_user_meta( $current_user->ID, '_already_voted', true, true);
					add_user_meta( $current_user->ID, '_votation_result', $_POST, true);
				}

				$creation_choices = get_field_object( 'field_5626c03dc0803' );
				$production_choices = get_field_object( 'field_5626d2f421b80' );
				$distribution_choices = get_field_object( 'field_5626d33421b81' );

				echo '<div class="hidden">';
				the_content();
				echo '</div>';
				?>

				<!--<div class="title-interna">VOTAÇÃO - ETAPA 01 : apenas para Profissionais da Música previamente Cadastrados</div>-->
				<br>

				<!-- <div class="tt">Escolha a modalidade e categoria para votar</div> -->

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="button" data-toggle="collapse" href="#collapseOne" style="background: #444;">
							<h4 class="panel-title">

								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="none" aria-controls="collapseOne" style="font-size: 14px;"> Criação
									<i class="fa fa-chevron-down fa-1x pull-right"></i> </a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<div style="margin:0px 0px 10px 0px; font-weight: bold;">Selecione a categoria</div>

								<br>

								<?php $i = 1; foreach( $creation_choices['choices'] as $choice ): ?>

									<ul class="list-group">
										<li class="list-group-item">
											<div class="row toggle" id="dropdown-detail-<?php echo $i; ?>" data-toggle="detail-<?php echo $i; ?>" style="cursor: pointer;">
												<div class="col-xs-10">
													<span class="cat-name"><?php echo $choice; ?></span>
												</div>
												<div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
											</div>
											<div id="detail-<?php echo $i; ?>">
												<hr>
												<div id="<?php echo clean_name($choice); ?>" class="container"></div>
											</div>
										</li>
									</ul>

								<?php $i++; endforeach; ?>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="button" data-toggle="collapse" href="#collapseTwo" style="background: #444;">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class style="font-size: 14px;"> Produção
									<i class="fa fa-chevron-down fa-1x pull-right"></i> </a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<div style="margin:0px 0px 10px 0px; font-weight: bold;">Selecione a categoria</div>
								<br>

								<?php $i = 1; foreach( $production_choices['choices'] as $choice ): ?>

									<ul class="list-group">
										<li class="list-group-item">
											<div class="row toggle" id="dropdown-detail-<?php echo $i; ?>" data-toggle="detail-b-<?php echo $i; ?>" style="cursor: pointer;">
												<div class="col-xs-10">
													<?php echo $choice; ?>
												</div>
												<div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
											</div>
											<div id="detail-b-<?php echo $i; ?>">
												<hr>
												<div id="<?php echo clean_name($choice); ?>" class="container"></div>
											</div>
										</li>
									</ul>

									<?php $i++; endforeach; ?>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="button" data-toggle="collapse" href="#collapseThree" style="background: #444;">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class style="font-size: 14px;"> Convergência
									<i class="fa fa-chevron-down fa-1x pull-right"></i> </a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<div style="margin:0px 0px 10px 0px; font-weight: bold;">Selecione a categoria</div>
								<br>

								<?php $i = 1; foreach( $distribution_choices['choices'] as $choice ): ?>

									<ul class="list-group">
										<li class="list-group-item">
											<div class="row toggle" id="dropdown-detail-<?php echo $i; ?>" data-toggle="detail-c-<?php echo $i; ?>" style="cursor: pointer;">
												<div class="col-xs-10">
													<?php echo $choice; ?>
												</div>
												<div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
											</div>
											<div id="detail-c-<?php echo $i; ?>">
												<hr>
												<div id="<?php echo clean_name($choice); ?>" class="container"></div>
											</div>
										</li>
									</ul>

									<?php $i++; endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
