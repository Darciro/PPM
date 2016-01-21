<?php

?>
<div class="share-box">
	<span class="share-title">Compartilhe:</span>

	<a href="http://www.facebook.com/sharer.php?s=100&output=embed
		&u=<?php echo urlencode( get_permalink() ); ?>
		&t=<?php echo urlencode( $post->post_title ); ?>
		&images=<?php echo urlencode( $image[0]); ?>
		&summary=<?php echo urlencode( get_the_excerpt() ); ?>" class="share-btn" target="_blank"><span class="hidden">Facebook</span> <i class="fa fa-facebook"></i></a>

	<a href="http://twitter.com/share?text=<?php echo urlencode(the_title()); ?>&url=<?php echo urlencode(the_permalink()); ?>&via=twitter&related=<?php echo urlencode("coderplus:Wordpress Tips, jQuery and more"); ?>" title="Compartilhar no Twitter" rel="nofollow" target="_blank" class="share-btn" target="_blank"><span class="hidden">Twitter</span> <i class="fa fa-twitter"></i></a>

	<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="share-btn" target="_blank"><span class="hidden">Google Plus</span> <i class="fa fa-google-plus"></i></a>
</div>


<!-- 

https://www.facebook.com/sharer/sharer.php?
s=100
&p%5Burl%5D=http%3A%2F%2Fgaldar.com.br%2Fespaco-do-cliente%2Fblogdanoka%2Fblanditiis-iste-id-magnam-molestiae-reprehenderit-modi%2F&
p%5Bimages%5D%5B0%5D
&p%5Btitle%5D=Blanditiis+iste+id+magnam+molestiae+reprehenderit+modi
&p%5Bsummary%5D=Ut+sit+praesentium+voluptas+non.+Harum+perspiciatis+nostrum+fugiat+optio+debitis.+Tempora+recusandae+doloremque+quo+quasi+Ipsum+deserunt 

-->