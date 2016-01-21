<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Meta Tags -->
	<meta charset="<?php bloginfo('charset'); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<!-- <link rel="stylesheet" type="text/css" media="all" href="<?php // bloginfo( 'stylesheet_url' ); ?>" /> -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico">

	<!-- Title -->
	<title><?php bloginfo('name'); ?> - <?php wp_title('&mdash;'); ?></title>
	<?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>


	<?php wp_head();
	$translations = pll_the_languages(array('raw' => 1)); ?>
</head>

<body class="sticky-header-on tablet-sticky-header <?php if (current_lang() == 'en') {
	echo 'english-body';
}; ?> <?php if (is_admin_bar_showing()) {
	echo "admin-bar-showing";
}; ?> <?php if (is_user_logged_in()) {
	echo "user-logged";
}; ?>">
<!-- <?php // var_dump($translations); ?>  -->
<div id="header" class="no-print">
	<?php if (is_user_logged_in()): ?>
		<div class="user-header">
			<div class="container">
				<?php
				$current_user = wp_get_current_user();
				if (get_user_meta($current_user->ID, 'ppm_fullname')) {
					$user_fullname = get_user_meta($current_user->ID, 'ppm_fullname')[0];
				} else {
					$user_fullname = $current_user->display_name;
				}
				?>
				<div class="row">
					<div class="col-sm-6 user-meta">
						<div class="user-meta--menu-wrapper">
							<?php echo get_avatar($current_user->ID, 32); ?>
							<small><?php if (current_lang() == 'pt') {
									echo 'Bem vindo';
								} else {
									echo 'Welcome';
								}; ?>,
							</small>
							<span><?php echo $user_fullname; ?></span>

							<div class="user-meta--menu">
								<ul>
									<li><a href="<?php if (current_lang() == 'pt') {
											echo home_url() . '/profile/edit/';
										} else {
											echo home_url() . '/edit-profile';
										}; ?>"><?php if (current_lang() == 'pt') {
												echo 'Editar seu perfil';
											} else {
												echo 'Edit your profile';
											}; ?></a></li>
									<li>
										<a href="<?php echo wp_logout_url(home_url()); ?>"><?php if (current_lang() == 'pt') {
												echo 'Sair';
											} else {
												echo 'Log out';
											}; ?></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-6 text-right">
						<a class="btn btn-inscriptions btn-default" href="<?php if (current_lang() == 'pt') {
							echo home_url() . '/inscricao';
						} else {
							echo home_url() . '/inscription';
						}; ?>" role="button"><?php if (current_lang() == 'pt') {
								echo 'Faça sua inscrição aqui!';
							} else {
								echo 'Sign up here!';
							}; ?></a>
						<?php
						$args = array(
							'post_type' => 'inscricao',
							'author' => $current_user->ID
						);
						$subscriptions_query = new WP_Query($args);
						if ($subscriptions_query->have_posts()) : ?>
							<span><?php if (current_lang() == 'pt') {
									echo 'ou';
								} else {
									echo 'or';
								}; ?></span> <a class="btn btn-default" href="<?php if (current_lang() == 'pt') {
								echo home_url() . '/acompanhar-inscricao';
							} else {
								echo home_url() . '/my-inscriptions';
							}; ?>" role="button"><?php if (current_lang() == 'pt') {
									echo 'Acompanhe suas inscrições';
								} else {
									echo 'Follow your subscriptions';
								}; ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="container clearfix">
		<header class="header">
			<a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Logo Space tours" class="logo .col-md-4"></a>
			<nav class="menu">
				<ul>
					<li class="<?php if (current_lang() == 'pt') {
						echo 'active';
					}; ?>">
						<a class="pt" href="<?php echo $translations[1]['url']; ?>">PT</a>
					</li>
					<li class="<?php if (current_lang() == 'en') {
						echo 'active';
					}; ?>">
						<a class="en" href="<?php echo $translations[0]['url']; ?>">EN</a>
					</li>
					<?php if (!is_user_logged_in()): ?>
						<li class="entrar">
							<a id="entrar1" href="<?php if (current_lang() == 'pt') {
								echo home_url() . '/profile/register/';
							} else {
								echo home_url() . '/register';
							}; ?>"><?php _e('Vote Aqui', 'ppm_lang'); ?></a>
						</li>
						<!--<li class="inc">
							<a id="inc1" href="<?php /*if (current_lang() == 'pt') {
								echo home_url() . '/inscricao';
							} else {
								echo home_url() . '/inscription';
							}; */?>"><?php /*_e('Inscreva-se', 'ppm_lang'); */?></a>
						</li>-->
						<li class="inc">
							<a id="inc1" href="<?php if (current_lang() == 'pt') {
								echo home_url() . '/inscricao';
							} else {
								echo home_url() . '/inscription';
							}; ?>"><?php _e('Cadastro', 'ppm_lang'); ?></a>
						</li>
						<li class="entrar">
							<a id="entrar1" href="<?php if (current_lang() == 'pt') {
								echo home_url() . '/profile/register/';
							} else {
								echo home_url() . '/register';
							}; ?>"><?php _e('Entrar', 'ppm_lang'); ?></a>
						</li>
					<?php endif; ?>
					<li class="facebook">
						<a id="facebook" href="https://www.facebook.com/ppm2015/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/face.png" alt=""></a>
					</li>
					<li class="twitter">
						<a id="twitter" href="https://twitter.com/premiopm" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter.png" alt=""></a>
					</li>
					<li class="youtube">
						<a id="youtube1" href="https://www.youtube.com/channel/UCoBr138u-E4OgOMRMfxOxNg" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/youtube.png" alt=""></a>
					</li>
					<li class="instagram">
						<a id="instagram1" href="https://www.instagram.com/premiopm/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram.png" alt=""></a>
					</li>
				</ul>
			</nav>
			<?php if (!is_user_logged_in()): ?>
				<span class="entrar1"><a href="<?php if (current_lang() == 'pt') {
						echo home_url() . '/profile/login /';
					} else {
						echo home_url() . '/login';
					}; ?>"><?php _e('Já possui conta?', 'ppm_lang'); ?></a></span>
			<?php endif; ?>
		</header>
	</div>
</div>

<div class="menu_topo no-print">
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="primeiro_menu">
				<?php wp_nav_menu(
					array(
						'container' => false,
						'container_class' => 'menu',
						'menu' => 'The Main Menu',
						'menu_class' => 'nav navbar-nav container',
						'theme_location' => 'nav_menu',
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'fallback_cb' => ''
					)
				); ?>

			</div>
		</div>
	</nav>
</div>