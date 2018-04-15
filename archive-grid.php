<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php
			$caption = get_field('caption_post');
			$sub_caption = get_field('sub_caption_post');
			$free_caption = get_field('free_caption');
		?>
		<?php $format = get_post_format(); ?>
		<?php if($format === 'quote'): ?>
		<!-- START FORMAT QUOTE  -->
		<div class="blog-wrap">
			<article class="content-block nm-article nm-post">
				<div class="img-wrap">
					<a href="<?php the_permalink(); ?>" style="background-image: url(<?php the_post_thumbnail_url( 'archive-main' ); ?>)">
						<div class="nm-caption"><?php echo $caption; ?></div>
							<div class="nm-subcaption">
							<?php echo $sub_caption; ?>
							<span class="nm-blue"><?php echo $free_caption; ?></span>
						</div>
					</a>
				</div>
			<h2 class="h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p class="description"><?php the_excerpt(); ?></p>
				<div class="content-info">
				<a href="<?php the_permalink(); ?>" class="button btn-inside">Читать</a>
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
						<span class="date-add"><?php $date = get_the_date( 'j F Y' ); echo $date; ?></span>
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

					<div class="soc">
					<?php //echo do_shortcode("[uptolike]"); ?>
					</div>

					<!-- <script type="text/javascript">(function() {
					if (window.pluso)if (typeof window.pluso.start == "function") return;
					if (window.ifpluso==undefined) { window.ifpluso = 1;
					var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
					s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
					s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
					var h=d[g]('body')[0];
					h.appendChild(s);
					}})();</script>
					<div class="pluso" data-background="transparent" data-options="big,round,line,horizontal,counter,theme=04"
					 data-services="vkontakte,odnoklassniki,facebook,google,twitter"></div> -->


				</div>
			</footer>
		</div>	
		
		<!-- END FORMAT QUOTE  -->
		<?php elseif($format === 'video'): ?>        
		<!-- START FORMAT VIDEO  -->	
		<div class="blog-wrap">
			<article class="content-block nm-article nm-video">
				<div class="img-wrap">
					<a href="<?php the_permalink(); ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
					<div class="nm-caption"><?php echo $caption; ?></div>
					<div class="nm-subcaption">
						<?php echo $sub_caption; ?>
					<span class="nm-blue"><?php echo $free_caption; ?></span>
					</div>
				</a>
				</div>
				<h2 class="h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="description"><?php the_excerpt(); ?></p>
				<div class="content-info">
					<a href="<?php the_permalink(); ?>" class="button btn-inside">Читать</a>
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
						<span class="date-add"><?php $date = get_the_date( 'j F Y' ); echo $date; ?></span>
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

				<div class="soc">
				<?php //echo do_shortcode("[uptolike]"); ?>
				</div>
			</div>
			</footer>
		</div>

		<!-- END FORMAT VIDEO -->
		<?php elseif($format === 'aside'):  ?>
		<!-- START FORMAT ASIDE -->
		<div class="blog-wrap">
			<article class="content-block nm-article nm-magazine">
				<div class="img-wrap">
					<a href="<?php the_permalink(); ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
						<div class="nm-caption"><?php echo $caption; ?></div>
							<div class="nm-subcaption">
								<?php echo $sub_caption; ?>
							</div>
						<div class="nm-date"><?php echo $free_caption; ?></div>
					</a>
				</div>
				<h2 class="h2 release"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="description"><?php the_excerpt(); ?></p>
				<div class="content-info">
					<a href="<?php the_permalink(); ?>" class="button btn-inside">Читать</a>
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
						<span class="date-add"><?php $date = get_the_date( 'j F Y' ); echo $date; ?></span>
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

					<div class="soc">
					<?php //echo do_shortcode("[uptolike]"); ?>
					</div>
				</div>
			</footer>
		</div>
		<!-- END FORMAT ASIDE -->
		<?php else: ?>
		<!-- START FORMAT STANDART -->   
		<div class="blog-wrap">
			<article class="content-block">
				<div class="img-wrap">
					<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'archive-main' ); ?>" alt=""></a>
				</div>
				<h2 class="h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="description"><?php the_excerpt(); ?></p>
				<div class="content-info">
					<a href="<?php the_permalink(); ?>" class="button btn-inside">Читать</a>
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
						<span class="date-add"><?php $date = get_the_date( 'j F Y' ); echo $date; ?></span>
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
					<div class="soc">
						<?php //echo do_shortcode("[uptolike]"); ?>
					</div>
				</div>
			</footer>
		</div>
		<!-- END FORMAT STANDART -->
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
