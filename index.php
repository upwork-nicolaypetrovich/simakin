<?php get_header(); ?>

	<!-- Main Block Container -->
	<section class="is-home main-page">
		<div class="container">

			<div class="page-wrap">
						

				<!-- Main Container -->
				<main class="row main-container">

					<div class="col-xs-12">

						<section class="news-blog-list">


						<?php if( get_theme_mod('mpostid') ){ ?>
						<?php $pin = get_post( get_theme_mod('mpostid') ); ?>
						<?php //print_r($pin); ?>
									<div class="blog-wrap">
										<article class="content-block">
											<div class="img-wrap">
												<a href="<?php echo get_permalink($pin->ID); ?>"><img src="<?php echo get_the_post_thumbnail_url( $pin->ID, 'archive-main' ); ?>"></a>
											</div>
											<h2 class="h2"><a href="<?php echo get_permalink($pin->ID); ?>"><?php echo $pin->post_title; ?></a></h2>
											<p class="description"><?php echo get_the_excerpt($pin->ID); ?></p>
											<div class="content-info">
												<a href="<?php echo get_permalink($pin->ID); ?>" class="button btn-inside">Читать</a>
												<span class="author"><?php the_author_meta( 'display_name', $pin->post_author ); ?></span>
												<?php if(get_the_tags( $pin->ID )){ ?>
												<span class="tags">
													<span>
														<?php //print_r(get_the_tags( $pin->ID )); ?>
														<?php foreach ( get_the_tags( $pin->ID ) as $tag) { ?>
															<a href="http://dima-develop.rocketcompany.website/tag/<?php echo $tag->slug; ?>/" class="tag"><?php echo $tag->name ?></a>
														<?php } ?>
													</span>
												</span>
												<?php } ?>
											</div>
										</article>

										<footer class="blog-footer">
											<span class="publication-date">
												<span class="date-add-wrap">
													<img src="<?php echo get_template_directory_uri();?>/img/date-add.png" alt="">
													<span class="date-add"><?php echo get_the_date( 'j F Y', $pin->ID ); ?></span>
												</span>
												<?php if(get_post_meta( $pin->ID, 'counter', true )){ ?>
												<span class="views">
													<img src="<?php echo get_template_directory_uri();?>/img/views.png" alt="">
													<?php echo get_post_meta( get_the_ID(), 'counter', true ); ?>
												</span>
												<?php } ?>
												<!-- <span class="coments">
													<img src="<?php echo get_template_directory_uri();?>/img/coments.png" alt="">
													456
												</span> -->
											</span>
											<div class="social">

												<div class="soc">
													<?php // echo do_shortcode("[uptolike]"); ?>
												</div>

											</div>
										</footer>
									</div>
						<?php } ?>


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
