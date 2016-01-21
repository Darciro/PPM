<?php
/**
 * Template Name: Galeria de fotos
 *
 * @package WordPress
 * @subpackage PPM
 */
get_header(); ?>
<div id="content" class="container gallery-page">
    <div class="row">
        <div class="box-interna">
            <div class="col-md-8">
                <div class="title-interna">
                    <h2><?php the_title() ;?></h2>
                </div>
				<?php $gallery = new WP_Query( array( 'post_type' => 'gallery' ) );
                if ( $gallery->have_posts() ) : while ( $gallery->have_posts() ) : $gallery->the_post(); ?>
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            <a href="<?php the_permalink(); ?>" class="thumbnail">
                                <?php the_post_thumbnail('archive-thumb'); ?>
                            </a>
                        </div>
                        <strong><?php the_title() ;?></strong><br>
                        <p><?php the_excerpt() ;?></p>
                        <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_footer1.png" height="16" width="15" alt=""> 
                        <a href="<?php the_permalink(); ?>">Veja mais</a></span>
                    </div>
        
                <?php endwhile; else: ?>
                <p>Sem galerias...</p>
                <?php endif; ?>
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