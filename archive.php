<?php get_header(); ?>

	<!-- Main Block Container -->
	<section class="is-home main-page">
		<div class="container">

			<div class="page-wrap">
						

				<!-- Main Container -->
				<main class="row main-container">

					<div class="col-xs-12">

						<section class="news-blog-list">

						<?php get_template_part( 'archive', 'grid' ); ?>

						</section>
						
						<?php get_template_part( 'archive', 'button' ); ?>

					</div>
				</main>

				<button id="swipeOpen" class="button button-hidden-sidebar"></button>
				
				<?php get_sidebar( 'right' ); ?>

			</div>

		</div>
	</section>

<?php get_footer(); ?>