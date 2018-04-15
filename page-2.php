<?php get_header(); ?>
<?php the_post(); ?>

	<!-- Main Block Container -->
	<section class="not-home archive main-page">
		<div class="container">

			<div class="page-wrap">

				<!-- Main Container -->
				<main class="row main-container">

					<div class="col-xs-12">

						<section class="news-blog-list">

							<div class="blog-wrap">
								<article class="content-block without-footer">

									<h2 class="h2"><?php the_title(); ?></h2>
									<?php //the_content(); ?>
									
									<div id="archive-container">
										<?php $GLOBALS['articles_ajax'] = false; ?>
										<?php get_template_part( 'page2', 'grid' ); ?>
									</div>

								</article>

							</div>

							<script> var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php'; </script>
							<div class="button-more">
								<span class="button" id="archive_loadmore">Показать еще</span>
							</div>

							<?php get_sidebar( 'single' ); ?>

						</section>

					</div>
				</main>

				<button id="swipeOpen" class="button button-hidden-sidebar"></button>

				<?php get_sidebar( 'right' ); ?>

			</div>

		</div>
	</section>

	

<?php get_footer(); ?>