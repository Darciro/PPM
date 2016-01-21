<?php
/**
 * Template Name: Depoimentos
 *
 * @package WordPress
 * @subpackage PPM
 */
 
get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div class="box-interna">
			<div class="col-md-8">

				<div class="title-interna"><h2><?php the_title(); ?></h2></div>
				<div class="row">
					<?php 
				$depoimentos = new WP_Query( array( 'post_type' => 'depoimentos' ) );
				if ( $depoimentos->have_posts() ) : while ( $depoimentos->have_posts() ) : $depoimentos->the_post(); ?>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<p></p>
							<i class="fa fa-play-circle fa-2x"></i>
							<a href="<?php the_field('link_depoimento'); ?>" target="_blanck"><?php the_post_thumbnail('archive-thumb'); ?></a>
							<div class="caption">
								<p><?php the_title() ;?></p>
							</div>
						</div>
						
					</div>
		
				<?php endwhile; else: ?>
				<p>Sem depoimentos...</p>
				<?php endif; ?>
				
				</div>
			</div>
				
			<div class="col-md-4">
				<?php require( get_template_directory() . '/inc/menu_informacoes.php' ); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>