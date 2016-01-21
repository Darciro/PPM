<?php
/**
 * Template Name: Informações
 *
 * @package WordPress
 * @subpackage PPM
 */
 
get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div class="box-interna informations">
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
			</div>
			
			<div class="col-md-4">
				<?php require( get_template_directory() . '/inc/menu_informacoes-2.php' ); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
