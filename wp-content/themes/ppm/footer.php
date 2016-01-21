<footer>
	<div class="container">
		<div class="botoes">
			<ul class="text-center">
				<li class="inc2">
					<a id="inc2" href="<?php echo home_url() ?>/inscricao"><?php _e( 'Inscreva-se', 'ppm_lang' ); ?></a>
				</li>
				<li class="entrar2" >
					<a id="entrar2"href="<?php echo home_url(); ?>/register"><?php _e( 'Entrar', 'ppm_lang' ); ?></a>
				</li>
			</ul>
		</div>
	</div>

		<div class="container">
			<div class="menu_footer">
				<?php wp_nav_menu(
					array(
						'container' 		=> false,
						'container_class' 	=> 'menu',
						'menu' 				=> 'Footer Menu',
						'menu_class' 		=> 'text-center',
						'theme_location' 	=> 'footer_menu',
						'before' 			=> '',
						'after' 			=> '',
						'link_before' 		=> '',
						'link_after' 		=> '<span class="border3"></span>',
						'depth' 			=> 0, 
						'fallback_cb' 		=> '' 
					)
				); ?>
			</div>
		</div>
		<div class="container">
			<div class="menu_footer2">
				<ul class="text-center">
					<li>
						<a href="https://www.facebook.com/ppm2015/" target="_blank"><img class="midias" src="<?php echo get_template_directory_uri(); ?>/assets/img/face-footer.png" alt="">
						</a>
					</li>
					<li>
						<a href="https://twitter.com/premiopm" target="_blank"><img class="midias" src="<?php echo get_template_directory_uri(); ?>/assets/img/tt-footer.png" alt="">
						</a>
					</li>
					<li>
						<a href="https://www.youtube.com/channel/UCoBr138u-E4OgOMRMfxOxNg" target="_blank"><img class="midias" src="<?php echo get_template_directory_uri(); ?>/assets/img/yt-footer.png" height="22" width="23" alt="">
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/premiopm/" target="_blank"><img class="midias" src="<?php echo get_template_directory_uri(); ?>/assets/img/ig-footer.png" height="22" width="23" alt="">
						</a>
					</li>
				</ul>
			</div>
		</div>

	<div class="footer">
		<p class="text-center 4 cols 6 small cols"><br><?php _e( 'Copyright © 2015 todos os direitos reservados', 'ppm_lang' ); ?></p>
	</div>

</footer>

	<?php wp_footer(); ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-70412105-1', 'auto');
	  ga('send', 'pageview');

	</script>
</body>
</html>