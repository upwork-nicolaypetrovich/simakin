<?php get_header(); ?>
<?php the_post(); ?>

	<!-- Main Block Container -->
	<section class="not-home about-page main-page">
		<div class="container">

			<div class="page-wrap">

				<!-- Main Container -->
				<main class="row main-container">

					<div class="col-xs-12">

						<section class="news-blog-list">

							<div class="blog-wrap">
								<article class="content-block without-footer about-cont">
									<h2 class="h2"><?php the_title(); ?></h2>
									<div class="img-wrap">
										<img src="<?php the_post_thumbnail_url( 'author' ); ?>" alt="">
									</div>
									<?php the_content(); ?>
								</article>
							</div>

							<?php echo do_shortcode( '[nggallery id=1 template=certificate override_thumbnail_settings="1" thumbnail_width="113" thumbnail_height="169" thumbnail_crop="1"]' ); ?>


							<div class="blog-wrap">
								<article class="content-block without-footer">
									<h2 class="h2">Напишите мне</h2>
									<p class="description">Дорогие друзья, если у вас появился вопрос, есть предложение, или просто хотите оставить свой отзыв, вы можете написать мне воспользовавшись данной формой обратной связи. Ни одно сообщение не останется без внимания.</p>
									<form class="feedback-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
										<input type="hidden" name="action" value="contact_form">
										<input type="hidden" name="test" value="">
										<label class="name">
											<span>Ваше имя:</span>
											<input type="text" name="name" value=" " required>
										</label>
										<label class="email">
											<span>Ваш e-mail:</span>
											<input type="email" name="email" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)" required>
										</label>
										<label class="select">
											<span>Тема обращения:</span>
											<select name="theme">
												<option value disabled selected>Выберите тему обращения</option>
												<option value="Предложить идею">Предложить идею</option>
												<option value="Задать вопрос">Задать вопрос</option>
												<option value="Оставить отзыв">Оставить отзыв</option>
											</select>
										</label>
										<label class="message">
											<span>Текст сообщения:</span>
											<textarea name="message" required></textarea>
										</label>
										
										<p><span>*</span> все поля обязательны для заполнения.</p>
										<button class="button">Отправить сообщение</button>
									</form>
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