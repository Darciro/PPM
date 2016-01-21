<?php
/**
 * The template for displaying archive pages
 *
 */

get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div class="col-md-8">
		<?php if ( have_posts() ) : ?>
			<div class="title-interna">
				<h2><?php
					single_cat_title('', true);
					// the_archive_title( '<h2 class="page-title">', '</h2>' );
					// the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?></h2>
			</div>
			<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
	
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a>
						<div class="caption">
							<p><?php the_title(); ?>ss</p>
							<span>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_footer1.png" alt="">
								<a href="<?php the_permalink(); ?>"><?php _e( 'Leia mais', 'ppm_lang' ); ?></a>
							</span>
						</div>
					</div>
				</div>
				
			<?php endwhile; ?>
			</div>
			<?php else : ?>
			Nenhuma postagem encontrada
			<?php endif; ?>
		</div>
		<div class="col-md-4">
			<?php require( get_template_directory() . '/inc/menu_informacoes.php' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
