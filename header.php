<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin: 0 !important;">

<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo( 'charset' ); ?>">

	<title><?php wp_title();?></title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:image" content="path/to/image.jpg">
	<link rel="shortcut icon" href="img/favicon/favicons.png" type="image/x-icon">

	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#000">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#000">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">

	<style>body { opacity: 0; overflow-x: hidden; } html { background-color: #fff; }</style>

	<?php wp_head(); ?>

	<script charset="UTF-8" src="//cdn.sendpulse.com/28edd3380a1c17cf65b137fe96516659/js/push/03d0883dea65e6b62d9df738d7b05e7c_1.js" async></script>

</head>

<body <?php body_class(); ?>>

	<!-- Header -->
	<header class="my-header" style="background-image: url(<?php echo get_template_directory_uri();?>/img/head-bg.png);">
		<div class="container">

			<!-- Logo -->
			<div class="row">
				<div class="col-md-12">
					<div class="logo-site-name">
						<a class="logo-link" href="<?php echo home_url(); ?>">
							<img class="logo" src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="logo">
							<span class="logo-name"></span>
							<span class="site-description"><?php echo get_theme_mod('head1'); ?></span>
						</a>
					</div>
				</div>
			</div>

			<!-- Menu Line -->
			<div class="row">
				<div class="col-md-12">

					<div class="mnu-line">

						<div class="toggle-mnu-wrap">
							<a href="404.html" class="toggle-mnu hidden-lg"><span></span></a>
						</div>

						<nav class="main-mnu hidden-mnu">
							<?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
						</nav>

						<div class="search-wrap">
							<form action="/" class="search-form">
								<span class="hidden-search">
									<input type="search" name="s" placeholder="Найти на сайте" value="" required="required">
								</span>
								<input class="open-search" type="submit" name="submit" value="">
							</form>
						</div>

					</div>

				</div>
			</div>

		</div>
	</header>
