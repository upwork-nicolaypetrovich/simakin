<?php get_header(); ?>
<?php the_post(); ?>
<?php update_counter( get_the_ID() ); ?>

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
										<?php if(has_tag()){ ?>
										<span class="tags">
											<span>
												<?php the_tags( '', ' ', '' ); ?>
											</span>
										</span>
										<?php } ?>
									</div>

								</article>

								<footer class="blog-footer">
									<span class="publication-date">
										<span class="date-add-wrap">
											<img src="<?php echo get_template_directory_uri();?>/img/date-add.png" alt="">
											<span class="date-add"><?php the_date( 'j F Y' ); ?></span>
										</span>
										<?php if(get_post_meta( get_the_ID(), 'counter', true )){ ?>
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
										<span>Понравилась статья?<br>Поделись с друзьями!</span>

										<div class="soc">
											<?php echo do_shortcode("[uptolike]"); ?>
										</div>

									</div>
								</footer>
							</div>

							<?php get_sidebar( 'single' ); ?>


							<div id="hypercomments_widget"></div>
							<script type="text/javascript">
							_hcwp = window._hcwp || [];
							_hcwp.push({widget:"Stream", widget_id: 97202});
							(function() {
							if("HC_LOAD_INIT" in window)return;
							HC_LOAD_INIT = true;
							var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
							var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
							hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/97202/"+lang+"/widget.js";
							var s = document.getElementsByTagName("script")[0];
							s.parentNode.insertBefore(hcc, s.nextSibling);
							})();
							</script>
							<a href="http://hypercomments.com" class="hc-link" title="comments widget">comments powered by HyperComments</a>

							
							<?php $related = get_related_posts( get_the_ID() ); ?>
							<?php //print_r($related); die; ?>
							<?php if( $related ){ ?>
								<div class="related-box">
									<h2 class="h2">Что стоит еще посмотреть/почитать?</h2>
									<div class="flex-row">

										<?php while ($related->have_posts()){ $related->the_post(); ?>
											<article class="related-content">
												<a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url( 'related-grid' ); ?>" alt=""></a>
												<h6 class="h6"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
											</article>
										<?php } ?>

									</div>
								</div>
							<?php } ?>

						</section>

					</div>
				</main>

				<button id="swipeOpen" class="button button-hidden-sidebar"></button>

				<?php get_sidebar( 'right' ); ?>

			</div>

		</div>
	</section>

<?php get_footer(); ?>