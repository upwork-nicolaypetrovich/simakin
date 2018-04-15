<?php get_header(); ?>
<?php the_post(); ?>

	<!-- Main Block Container -->
	<section class="not-home courses-page main-page">
		<div class="container">

			<div class="page-wrap">

				<!-- Main Container -->
				<main class="row main-container">

					<div class="col-xs-12">
						<section class="news-blog-list">

							<div class="blog-wrap">
								<article class="content-block without-footer">

									<h2 class="h2"><?php the_title(); ?></h2>
									<?php the_content(); ?>

									<?php $kursi = new WP_Query( array( 'post_type' => 'kursi', 'posts_per_page'=> -1 ) ); ?>
									<?php if ( $kursi->have_posts() ) { ?>
									<nav class="courses-nav">
										
										<?php while ( $kursi->have_posts() ) { $kursi->the_post(); ?>
										<a href="<?php the_permalink(); ?>">
											<span class="courses-img-wrap"><img src="<?php the_post_thumbnail_url( 'icon' ); ?>" alt=""></span>
											<span class="courses-description"><?php echo get_the_title(); ?></span>
										</a>
										<?php } ?>

									</nav>
									<?php wp_reset_postdata(); } ?>
								</article>
							</div>

							<div class="blog-wrap">
								<article class="content-block">
									<?php $kurs_post = get_post( get_theme_mod('kurid') ); ?>
									<h3 class="h3 nm-h3"><?php echo $kurs_post->post_title; ?></h3>
									<?php echo str_replace("\n", "<br>", $kurs_post->post_content); ?>

									<div class="content-info">

										<a href="#" class="button blue-button">Презентация курса</a>

										<a href="404.html" class="button">Оформить заказ</a>

									</div>
								</article>

								<footer class="blog-footer">
									<span class="publication-date">
										<span class="views">
											<img src="<?php echo get_template_directory_uri();?>/img/views.png" alt="">
											<?php echo get_theme_mod('ccount1');?>
										</span>
										<span class="views">
											<img src="<?php echo get_template_directory_uri();?>/img/cart.png" alt="">
											<?php echo get_theme_mod('ccount2');?>
										</span>
									</span>

								</footer>
							</div>

							<?php $kursi_otzivi = new WP_Query( array( 'post_type' => 'kursi_otzivi', 'posts_per_page'=> -1 ) ); ?>
							<?php if ( $kursi_otzivi->have_posts() ) { ?>
							<div class="blog-wrap">
								<article class="content-block without-footer testimonials">
									<h3 class="h3">Отзывы клиентов</h3>

									<?php while ( $kursi_otzivi->have_posts() ) { $kursi_otzivi->the_post(); ?>
									<div class="testimonial">
										<img src="<?php the_post_thumbnail_url( 'rew-photo' ); ?>" alt="">
										<p class="test-name"><?php echo get_the_title(); ?></p>
										<p class="test-date"><?php the_date( 'j.m G:i' ); ?></p>
										<?php the_content(); ?>
										<span>
											<a class="test-link" href="<?php echo https_converter( get_post_meta( get_the_ID(), 'link_kurs', true ) ); ?>">Страница курса</a>
										</span>
									</div>
									<?php } ?>

								</article>
							</div>
							<?php wp_reset_postdata(); } ?>

						</section>
					</div>

				</main>

				<button id="swipeOpen" class="button button-hidden-sidebar"></button>

				<?php get_sidebar( 'right' ); ?>

			</div>

		</div>
	</section>

<?php get_footer(); ?>