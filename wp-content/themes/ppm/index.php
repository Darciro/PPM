<?php get_header(); ?>
<div class="slider">
	<div id="myCarousel" class="carousel slide">

		<div class="carousel-inner">
			<?php
			$i = 1;
			$featured = new WP_Query( array( 'category_name' => 'destaque' ) );
			if ( $featured->have_posts() ) : while ( $featured->have_posts() ) : $featured->the_post(); ?>
				<?php if( $i == 1 ){ ?>
				<div class="item active" id="mascara">
				<?php }else{ ?>
				<div class="item">
				<?php }; ?>
					<?php the_post_thumbnail('slider-thumb'); ?>
					<div class="container">
						<!--<div class="carousel-caption">
							<h2 class="amarelo"><?php the_title(); ?></h2>
							<h2 class="subtitulo"><?php the_field('subtitulo'); ?></h2>
							<h2 class="descricao ">Prêmios Profissionais da música</h2>
							<a href="<?php the_permalink(); ?>">Veja mais</a>
						</div>-->
					</div>
				</div>

			<?php $i++; endwhile; else: ?>
			<div class="col-sm-12">
				<p>Sorry, no posts to list</p>
			</div>
			<?php endif; ?>
			<?php if( $i >= 1 ): ?>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="seta-left">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/left.png" height="26" width="15">
				</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="seta-right">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/right.png" height="26" width="15">
				</span>
			</a>
			<?php endif; ?>
		</div>
	</div>
</div>

<div class="menu_baixo_slider">
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="primeiro_menu">
				<ul class="nav navbar-nav">
                    <?php
                    $lang = pll_current_language();
                    if( $lang == 'en' ): ?>

					<li><a href="#">showcases<span class="border1"></span></a></li>
					<li><a href="#">workshops<span class="border1"></span></a></li>
					<li><a href="#">talkshows<span class="border1"></span></a></li>
					<li><a href="#">panels<span class="border1"></span></a></li>
					<li><a href="#">awards<span class="border1"></span></a></li>
					<li><a href="#">where<span class="border1"></span></a></li>
					<li><a href="#">Get music Pro Awards passport<span class="border1"></span></a></li>
					<li><a href="#">multimedia</a></li>

                <?php else: ?>

                    <li><a href="#">showcases<span class="border1"></span></a></li>
                    <li><a href="#">workshops<span class="border1"></span></a></li>
                    <li><a href="#">talkshows<span class="border1"></span></a></li>
                    <li><a href="#">painéis<span class="border1"></span></a></li>
                    <li><a href="#">premiação<span class="border1"></span></a></li>
                    <li><a href="#">hospedagem<span class="border1"></span></a></li>
                    <li><a href="#">como comprar o passaporte<span class="border1"></span></a></li>
                    <li><a href="#">multimídia</a></li>

                <?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>
</div>

<?php if ( has_nav_menu( 'sec_menu' ) ): ?>
<!-- <div class="menu_baixo_slider">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="primeiro_menu">
				<?php wp_nav_menu(
					array(
						'container' 		=> false,
						'container_class' 	=> 'menu',
						'menu' 				=> 'Secondary Menu',
						'menu_class' 		=> 'nav navbar-nav',
						'theme_location' 	=> 'sec_menu',
						'before' 			=> '',
						'after' 			=> '',
						'link_before' 		=> '',
						'link_after' 		=> '<span class="border1"></span>',
						'depth' 			=> 0,
						'fallback_cb' 		=> ''
					)
				); ?>
			</div>
        </div>
    </nav>
</div> -->
<?php endif; ?>

<div class="steps">
    <div data-role="navbar" class="ui-navbar" role="navigation">
        <ul class="ui-grid-b not-buy">
            <li class="ui-block-active ui-block-a">
                <a href="<?php echo home_url() ?>/premio-profissionais-da-musica#panel-1" class="ui-state-persist ui-btn ui-btn-inline ui-btn-active ui-btn-up-a" data-transition="none" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="span" data-theme="a" data-inline="true">
                    <span class="ui-btn-inner">
						<span class="ui-btn-text">
							<span class="descricao"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/calendar.png" alt=""><?php _e( 'Data do evento', 'ppm_lang' ); ?></span>
                    </span>
                    </span>
                </a>
            </li>
            <li class="ui-block-c">
                <a href="<?php echo home_url() ?>/premio-profissionais-da-musica#panel-2" data-transition="none" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="span" data-theme="a" data-inline="true" class="ui-btn ui-btn-up-a ui-btn-inline"><span class="ui-btn-inner">
					<span class="ui-btn-text">
						<span class="descricao3"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/maps.png" alt=""><?php _e( 'Como chegar', 'ppm_lang' ); ?></span>
					</span>
				</a>
            </li>
			<li class="ui-block-b">
                <a href="<?php echo home_url() ?>/o-regulamento" data-transition="none" class="ui-disabled ui-btn ui-btn-up-a ui-btn-inline" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="span" data-theme="a" data-inline="true">
                    <span class="ui-btn-inner">
						<span class="ui-btn-text">
							<span class="descricao2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/doc.png" alt=""><?php _e( 'O regulamento', 'ppm_lang' ); ?></span>
                    </span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="section1">
    <div class="container">
        <div class="box">
            <div class="row">
                <?php
                    $options_posts = get_field('posts_home', 'option');
                    if( $options_posts ):
                        foreach( $options_posts as $options_post ): ?>
                            <div class="<?php echo $options_post['wrapper_class']; ?>">
                                <div class="well">
                                    <div class="t1">
                                        <a href="<?php echo get_permalink( $options_post['post_home']->ID ); ?>">
                                            <span>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/setas.png" alt="">
                                                <?php echo $options_post['post_home']->post_title; ?>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="img">
                                        <?php
                                        if( $options_post['imagem_destaque'] ): ?>
                                    	<a href="<?php echo get_permalink( $options_post['post_home']->ID ); ?>">
                                            <?php if ( has_post_thumbnail( $options_post['post_home']->ID ) ) {
                                                echo get_the_post_thumbnail( $options_post['post_home']->ID, 'post-cover' );
                                            } ?>
                                        </a>
                                        <?php endif;
                                        ?>
                                    </div>
                                    <?php
                                    if( $options_post['link_veja_mais'] ): ?>
                                        <a href="<?php echo get_permalink( $options_post['post_home']->ID ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/imgbox1.png" alt="">
                                            <?php echo $options_post['texto_para_o_link']; ?>
                                        </a>
                                    <?php endif;

                                    if( $options_post['inserir_texto'] ): ?>
                                        <?php echo $options_post['post_text']; ?>
                                    <?php endif;
                                    ?>
                                </div>
                            </div>

                        <?php endforeach;
                    endif;
                ?>
                <!--<div class="col-md-4 ab1">
                    <div class="well">
                        <div class="t1">
                            <span>
                                <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/setas.png" alt=""><?php /*_e( 'O homenageado', 'ppm_lang' ); */?>
                                </span>
                        </div>
                        <div class="img">
                            <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/img1.png" alt="">
                        </div>
                        <p>Fernando Brant</p>
                    </div>
                </div>
                <div class="col-md-4 ab2">
                    <div class="well">
                        <div class="t2">
                            <span>
                                <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/setas.png" alt=""><?php /*_e( 'Os inscritos', 'ppm_lang' ); */?>
                            </span>
                        </div>
                        <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/img2.png" alt="">
                        <p><a href="<?php /*echo home_url() */?>/inscritos">Veja aqui</a> as informações sobre os candidatos inscritos</p>
                    </div>
                </div>
                <div class="col-md-4 ab3">
                    <div class="well">
                        <div class="t4">
                            <span>
								<img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/setas.png" alt=""><?php /*_e( 'O regulamento', 'ppm_lang' ); */?>
							</span>
                        </div>
                        <p>
                            <a href="<?php /*echo home_url() */?>/regulamento">Veja aqui</a> as informações sobre os candidatos pré-selecionados
                        </p>
                    </div>
                </div>-->
            </div>
            <!--<div class="row">
                <div class="col-md-4 ab5">
                    <div class="well">
                        <div class="t5">
                            <span>
								<img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/setas.png" alt=""><?php /*_e( 'A comissão julgadora', 'ppm_lang' ); */?>
							</span>
                        </div>
                        <p>Conheça a comissão julgadora do Prêmio Profissionais da Música 2016. Corpo de jurados é formado por jornalistas, empresários e acadêmicos</p>
                        <a href="<?php /*echo home_url() */?>/juri">
                            <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/imgbox1.png" alt=""><?php /*_e( 'Veja Mais', 'ppm_lang' ); */?>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 ab6">
                    <div class="well">
                        <div class="t6">
                            <span>
								<img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/setas.png" alt=""><?php /*_e( 'Os pré-selecionados', 'ppm_lang' ); */?>
							</span>
                        </div>
                        <div class="img1">
                            <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/img3.png" height="158" width="300" alt="">
                        </div>
                        <a href="<?php /*echo home_url() */?>/pre-selecionados">
                            <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/imgbox3.png" alt=""><?php /*_e( 'Veja Mais', 'ppm_lang' ); */?>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 ab4">
                    <div class="well">
                        <div class="t3">
                            <span>
								<img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/setas.png" alt=""><?php /*_e( 'As categorias', 'ppm_lang' ); */?>
							</span>
                        </div>
                        <div class="panel">
                            <a href="<?php /*echo home_url() */?>/categorias">I - <?php /*_e( 'Criação', 'ppm_lang' ); */?></a>
                        </div>
                        <div class="panel">
                            <a href="<?php /*echo home_url() */?>/categorias">II - <?php /*_e( 'Produção', 'ppm_lang' ); */?></a>
                        </div>
                        <div class="panel">
                            <a href="<?php /*echo home_url() */?>/categorias">III - <?php /*_e( 'Convergência', 'ppm_lang' ); */?></a>
                        </div>
                        <a href="categorias.html">
                            <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/imgbox2.png" alt=""><?php /*_e( 'Veja todas as categorias', 'ppm_lang' ); */?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ab8">
                    <div class="well">
                        <div class="t8">
                            <span>
								<img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/setas.png" alt=""><?php /*_e( 'A programação', 'ppm_lang' ); */?>
							</span>
                        </div>
                        <span class="number">20h</span>Abertura
                        <p>Conheça a comissão julgadora do Prêmio Profissionais da Música 2016. Corpo de jurados é formado por jornalistas, empresários e acadêmicos</p>
                        <p>
                            <a href="<?php /*echo home_url() */?>/programacao">Programação completa</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-4 ab9">
                    <div class="well">
                        <div class="t9">
                            <span>
								<img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/setas.png" alt=""><?php /*_e( 'Os selecionados', 'ppm_lang' ); */?>
							</span>
                        </div>
                        <div class="img4">
                            <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/img4.png" alt="">
                        </div>
                        <a href="<?php /*echo home_url() */?>/os-selecionados">
                            <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/imgbox3.png" alt=""><?php /*_e( 'Veja Mais', 'ppm_lang' ); */?>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 ab7">
                    <div class="well">
                        <div class="t7">
                            <span>
								<img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/setas.png" alt=""><?php /*_e( 'A campanha de arrecadação', 'ppm_lang' ); */?>
							</span>
                        </div>
                        <div class="img2">
                            <a href="<?php /*echo home_url() */?>/campanha">
                                <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/banner.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ab11">
                    <div class="well">
                        <div class="t11">
                            <span>
								<img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/setas.png" alt=""><?php /*_e( 'O local', 'ppm_lang' ); */?>
							</span>
                        </div>
                        <div class="img5">
                            <a href="<?php /*echo home_url() */?>/local"><img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/img5.png" height="158" width="300" alt=""></a>
                        </div>
                        <p>Royal Tulip Brasilia Alvorada </p>
                    </div>
                </div>
                <div class="col-md-4 ab12">
                    <div class="well">
                        <div class="t12">
                            <span>
								<img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/setas.png" alt=""><?php /*_e( 'Os vencedores de 2016', 'ppm_lang' ); */?>
							</span>
                        </div>
                        <div class="p12">
                            <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/imgbox4.png" alt="">
                            <p>
                                <a href="<?php /*echo home_url() */?>/vencedores">Veja aqui a lista completa dos  vencedores por categoria.</a>
                            </p>
                        </div>
                        <a href="<?php /*echo home_url() */?>/vencedores">
                            <img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/imgbox3.png" alt=""><?php /*_e( 'Veja Mais', 'ppm_lang' ); */?>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 ab10">
                    <div class="well">
                        <div class="t10">
                            <span>
								<img src="<?php /*echo get_template_directory_uri(); */?>/assets/img/setas.png" alt=""><?php /*_e( 'Inscrições', 'ppm_lang' ); */?>
							</span>
                        </div>
                        <p>As Inscrições do Prêmio Profissionais da Música
                            <span>2016</span> estão abertas
                        </p>
						<a href="<?php /*echo home_url() */?>/inscricao">
                        <button>Faça sua Inscrição</button>
						</a>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>


<a href="https://www.youtube.com/channel/UCoBr138u-E4OgOMRMfxOxNg" target="_blank"><div id="banner" class="banner">
    <div class="banner-image"></div>
    <div class="banner-caption">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">

                </div>
            </div>
        </div>
    </div>
    <div class="imagem-mascara"></div>
</div></a>

<div class="menu_baixo_img">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="primeiro_menu">
			<?php wp_nav_menu(
				array(
					'container' 		=> false,
					'container_class' 	=> 'menu',
					'menu' 				=> 'Suport Menu',
					'menu_class' 		=> 'nav navbar-nav',
					'theme_location' 	=> 'suport_menu',
					'before' 			=> '',
					'after' 			=> '',
					'link_before' 		=> '',
					'link_after' 		=> '<span class="border2"></span>',
					'depth' 			=> 0,
					'fallback_cb' 		=> ''
				)
			); ?>
			</div>
        </div>
    </nav>
</div>

<div class="antesdofooter">
    <div class="container">
        <div class="antesfooter">
			<h2><?php _e( 'notícias', 'ppm_lang' ); ?></h2>
			<div class="row">
			<?php
			$news = new WP_Query( array( 'category_name' => 'noticias' ) );
			if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post(); ?>
				<div class="col-md-4 afooter1">
					<div class="well">
						<!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_footer1.png" height="158" width="300" alt=""> -->
						<?php the_post_thumbnail(); ?>
						<p><?php the_title() ;?></p>
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_footer1.png"><a href="<?php the_permalink(); ?>"><?php _e( 'Leia mais', 'ppm_lang' ); ?></a></span>
					</div>
				</div>

			<?php endwhile; ?>
                <div class="all-news-box col-md-12">
                    <?php
                    // Get the ID of a given category
                    if (current_lang() == 'pt') {
                        $category_id = get_cat_ID( 'noticias' );
                    } else {
                        $category_id = get_cat_ID( 'news' );
                    };

                    // Get the URL of this category
                    $category_link = get_category_link( $category_id );
                    ?>
                    <a href="<?php echo esc_url( $category_link ); ?>"><?php _e('Mais notícias', 'ppm_lang'); ?></a>
                </div>

            <?php else: ?>
			<div class="col-sm-12">
				<p>Sorry, no posts to list</p>
			</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>
    <?php
    $enable_partners_carousel = get_field('habilitar_carrossel_de_parceiros', 'option');
    if($enable_partners_carousel): ?>
    <div id="partners_carousel" class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2><?php _e( 'Créditos', 'ppm_lang' ); ?></h2>
                <?php $carousel_itens = get_field('itens_do_carrossel', 'option'); // echo '<pre>'; var_dump($carousel_itens); echo '</pre>'; ?>
                <div class="center">
                    <a href="#" id="prev"><i class="fa fa-angle-left"></i></a>
                    <a href="#" id="next"><i class="fa fa-angle-right"></i></a>
                </div>
                <div class="cycle-slideshow"
                    data-cycle-log="false"
                    data-cycle-fx="carousel"
                    data-cycle-timeout="3000"
                    data-cycle-carousel-visible="5"
                    data-cycle-next="#next"
                    data-cycle-prev="#prev"
                    data-cycle-pager="#pager"
                    data-cycle-pager-template='<i class="fa fa-circle"></i>'
                    data-cycle-slides="> .partner"
                    >
                    <?php foreach ($carousel_itens as $carousel_item) { ?>
                        <div class="partner">
                            <div class="relative-box">
                            <?php if( $carousel_item['link'] !== '' ){ echo '<a href="' . $carousel_item['link'] . '">'; } ?>
                                <span><?php if( $carousel_item['texto'] !== '' ){ echo $carousel_item['texto']; } ?></span>
                                <img src="<?php echo $carousel_item['imagem']['sizes']['medium']; ?>">
                            <?php if( $carousel_item['link'] !== '' ){ echo '</a>'; } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="cycle-pager hidden" id="pager"></div>
            </div>
        </div>
    </div>

    <?php endif; ?>
<?php get_footer(); ?>