<?php get_header(); ?>

	<!-- Main Block Container -->
	<section class="not-home main-page">
		<div class="container">

			<div class="page-wrap">

				<!-- Main Container -->
				<main class="row main-container">

					<div class="col-xs-12">

						<?php if ( have_posts() ){ ?>
						
							<section class="news-blog-list">

								<div class="blog-wrap">
									<article class="content-block without-footer search-results">
										<?php $count = $GLOBALS['wp_query']->found_posts; ?>
										<?php //print_r($GLOBALS['wp_query']); ?>
										
										
										<h2 class="h2">Найдено результатов: <?php echo $count; ?></h2>
									
									<?php if ( $count == 1){ $GLOBALS['wp_query']->the_post();?>
										<div class="search-results-wrap">
													<div class="search-results-block">
														<h3 class="h3"><a href="<?php the_permalink(); ?>">
															<?php echo mark_search_results( get_search_query(), get_the_title()); ?>
														</a></h3>
														<p>
															<?php echo mark_search_results( get_search_query(), get_the_excerpt()); ?>
														</p>
													</div>
												</div>
									<?php }else{ ?>
										<?php get_template_part( 'search', 'grid' ); ?>
									<?php } ?>
										
									</article>

								</div>

								<?php if (  $count > 1 ) : ?>
									<script>
									var perPage = '<?php echo get_option('posts_per_page');?>';
									var totalPosts = '<?php echo $count; ?>';
									var currentPost = 1;
									</script>

									<div class="button-more">
										<span id="search_loadmore" class="button">Показать еще</span>
									</div>
								<?php endif; ?>

							</section>

						<?php }else{ ?>

							<section class="news-blog-list">

								<div class="blog-wrap">
									<article class="content-block without-footer search-results">
										<h2 class="h2">Подходящих результатов не найдено</h2>

										<p class="search-unsuccess">Проверьте орфографию или измените свой запрос.</p>

									</article>
								</div>

								<?php get_sidebar( 'single' ); ?>

								<?php $new = new WP_Query( array( 'post_type' => 'post', 'posts_per_page'=> 6 ) ); ?>
								<?php if ( $new->have_posts() ) { ?>
								<div class="related-box">
									<h2 class="h2">Что стоит еще посмотреть/почитать?</h2>
									<div class="flex-row">

										<?php while ( $new->have_posts() ) { $new->the_post(); ?>
										<article class="related-content">
											<a href="<?php the_permalink(); ?>">
												<img src="<?php the_post_thumbnail_url( 'search-new-posts' ); ?>">
											</a>
											<h6 class="h6"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
										</article>
										<?php } ?>

									</div>
								</div>
								<?php } ?>

							</section>

						<?php } ?>

					</div>
				</main>

				<button id="swipeOpen" class="button button-hidden-sidebar"></button>

				<?php get_sidebar( 'right' ); ?>

			</div>

		</div>
	</section>

<?php get_footer(); ?>