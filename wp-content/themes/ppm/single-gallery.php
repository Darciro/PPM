<?php get_header(); ?>
<div id="content" class="container gallery-page">
    <div class="row">
        <div class="box-interna">
            <div class="col-md-8">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="article-content">
							<div class="title-interna">
								<h2><?php the_title() ;?></h2>
							</div>

                            <?php 
                            $images = get_field('imagens');
                            if( $images ): ?>
                                <?php foreach( $images as $image ): ?>
                                    <div class="col-sm-3">
                                        <a class="fancybox" rel="gallery1" href="<?php echo $image['url']; ?>">
                                             <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                                        </a>
                                        <p class="fancybox-caption"><small><?php echo $image['caption']; ?></small></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <!-- <div class="col-sm-3">
                                <a id="single_1" class="fancybox" href="http://farm1.staticflickr.com/291/18653638823_a86b58523c_b.jpg" title="Lupines (Kiddi Einars)">
                                    <img src="http://farm1.staticflickr.com/291/18653638823_a86b58523c_m.jpg" alt="" />
                                </a>
                            </div> -->

                            <?php // echo "<pre>"; var_dump( get_field('imagens') ); echo "</pre>"; ?>
	
							<?php the_content(); ?>
						</div>
					</article>
	
				<?php endwhile; endif; ?>	
            </div>

            <div class="col-md-4">
                <?php require( get_template_directory() . '/inc/menu_informacoes.php' ); ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php get_footer(); ?>