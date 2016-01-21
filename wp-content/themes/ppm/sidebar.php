<aside class="col-sm-12 col-md-4">
	<div class="panel-info">
		<div class="panel-heading">
			<h4 class="panel-title"><i class=" icon-map-marker"></i><?php _e( 'Outras Notícias', 'ppm_lang' ); ?></h4>                  
		</div>
		<div class="list-group">
			<?php
			$args = array(
				'post_type' => 'post',
				'category_name' => 'noticias',
				'post_status' => 'publish',
				'posts_per_page' => 5,
				'post__not_in' => array( get_the_ID() )
			);
			$more_news_query = new WP_Query( $args );
			if ( $more_news_query->have_posts() ) : while ( $more_news_query->have_posts() ) : $more_news_query->the_post(); ?>
			
			<a href="<?php the_permalink(); ?>" class="list-group-item"><?php the_title(); ?></a>
			
			<?php endwhile; else: ?>
				<p>Sorry, no posts to list</p>
			<?php endif; ?>
		</div>
	</div><br/>
	
	<?php 
		if ( is_active_sidebar( 'right_sidebar' ) ) :
        	dynamic_sidebar( 'right_sidebar' );
    	endif; 
	?>
</aside>