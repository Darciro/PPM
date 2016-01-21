<?php
global $post;
$message = 'xxx';
?>
<div class="share-box">
	<span class="share-title">Compartilhe:</span>
	<a href="#" class="share-btn"><span class="hidden">Facebook</span> <i class="fa fa-facebook"></i></a>
	<a onClick="return(false);" href="<?php echo esc_url( sprintf( 'http://twitter.com/home?status=%s', urlencode( $message ) ) ); ?>" class="share-btn"><span class="hidden">Twitter x</span> <i class="fa fa-twitter"></i></a>
	<a href="#" class="share-btn"><span class="hidden">Google Plus</span> <i class="fa fa-google-plus"></i></a>
</div>