<?php get_header(); ?>
<?php the_post(); ?>

	<!-- Main Block Container -->
	<section class="not-home inside-page main-page">
		<div class="container">

			<div class="page-wrap">

				<!-- Main Container -->
				<main class="row main-container">

					<div class="col-xs-12">

						<section class="news-blog-list">

							<div class="blog-wrap">
								<article class="content-block">
									<h2 class="h2"><?php the_title(); ?></h2>
									<?php the_content(); ?>

									<div class="content-info">
										<span class="author"><?php the_author(); ?></span>
										<span class="tags">
											<span>
												<?php the_tags( '', ' ', '' ); ?>
											</span>
										</span>
									</div>

								</article>
							</div>

						</section>

					</div>
				</main>

				<button id="swipeOpen" class="button button-hidden-sidebar"></button>

				<?php get_sidebar( 'right' ); ?>

			</div>

		</div>
	</section>

<?php get_footer(); ?>