<?php
/**
 * Template Name: Talk Show
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
				$talkshows = new WP_Query( array( 'post_type' => 'talkshows' ) );
				if ( $talkshows->have_posts() ) : while ( $talkshows->have_posts() ) : $talkshows->the_post(); ?>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<p><strong class="name"><i class="fa fa-play-circle fa-lg"></i> <?php the_field( 'palestrante_talkshow' ) ?><br></strong></p>
							<a href="<?php the_field('link_depoimento'); ?>" target="_blanck"><?php the_post_thumbnail('archive-thumb'); ?></a>
							<div class="caption">
								<p><?php the_title() ;?></p>
							</div>
						</div>
					</div>
		
				<?php endwhile; else: ?>
				<p>Sem talkshows...</p>
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