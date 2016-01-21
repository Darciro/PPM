<?php get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div class="box-interna">
			<div class="col-md-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="article-content">
						<div class="title-interna">
							<h2><?php the_title() ;?></h2>
							<!--<p class="the-date"><?php echo get_the_date(); ?></p>-->
						</div>
						
						<div class="panel panel-default">

							<?php // the_post_thumbnail('large'); ?>
							<!--<div class="boot-padding">-->
							<div class="panel-body">
								<?php the_content(); ?>
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
