

	<!-- Footer -->
	<footer class="my-footer" style="background-image: url(<?php echo get_template_directory_uri();?>/img/footer-bg.png);">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="footer-logo">
						<a class="logo-link" href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri();?>/img/logo-footer.png" alt="">
							<img class="footer-logo-name" src="<?php echo get_template_directory_uri();?>/img/logo-name-footer.png" alt="">
						</a>
					</div>
					<div class="footer-soc">
						<div class="soc">
							<ul>
								<li>
									<a target="_blank" class="vk" title="vk" href="<?php echo get_theme_mod('sn1');?>"><i class="fa fa-vk"></i></a>
								</li>
								<li>
									<a target="_blank" class="odnoklassniki" title="odnoklassniki" href="<?php echo get_theme_mod('sn2');?>"><i class="fa fa-odnoklassniki"></i></a>
								</li>
								<li>
									<a target="_blank" class="facebook" title="facebook" href="<?php echo get_theme_mod('sn3');?>"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a target="_blank" class="google-plus" title="google-plus" href="<?php echo get_theme_mod('sn4');?>"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a target="_blank" class="twitter" title="twitter" href="<?php echo get_theme_mod('sn5');?>"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a target="_blank" class="paper-plane" title="telegram" href="<?php echo get_theme_mod('sn6');?>"><i class="fa fa-paper-plane"></i></a>
								</li>
								<li>
									<a target="_blank" class="youtube" title="youtube" href="<?php echo get_theme_mod('sn7');?>"><i class="fa fa-youtube-play"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="information">
						<p>Информация:</p>

						<?php wp_nav_menu( array( 'theme_location' => 'information' ) ); ?>

						<!-- <a class="popup-modal" href="#privacy-policy">Политика конфиденциальности</a> -->
						<?php $info = get_post( 76 );?>
						<div id="privacy-policy" class="white-popup-block mfp-hide">
							<div class="modal-header">
								<button title="Закрыть" type="button" class="mfp-close">×</button>
								<h2 class="h2"><?php echo $info->post_title; ?></h2>
							</div>
							<div class="modal-body custom-scroll">
								<?php echo $info->post_content; ?>
							</div>
						</div>

						<!-- <a class="popup-modal" href="#consent-mailing">Согласие с рассылкой</a> -->
						<?php $info = get_post( 78 );?>
						<div id="consent-mailing" class="white-popup-block mfp-hide">
							<div class="modal-header">
								<button title="Закрыть" type="button" class="mfp-close">×</button>
								<h2 class="h2"><?php echo $info->post_title; ?></h2>
							</div>
							<div class="modal-body custom-scroll">
								<?php echo $info->post_content; ?>
							</div>
						</div>

						<!-- <a class="popup-modal" href="#refusal-resposibility">Отказ от ответственности</a> -->
						<?php $info = get_post( 80 );?>
						<div id="refusal-resposibility" class="white-popup-block mfp-hide">
							<div class="modal-header">
								<button title="Закрыть" type="button" class="mfp-close">×</button>
								<h2 class="h2"><?php echo $info->post_title; ?></h2>
							</div>
							<div class="modal-body custom-scroll">
								<?php echo $info->post_content; ?>
							</div>
						</div>

						<!-- <a class="popup-modal" href="#rules-reprints">Правила перепечатки</a> -->
						<?php $info = get_post( 82 );?>
						<div id="rules-reprints" class="white-popup-block mfp-hide">
							<div class="modal-header">
								<button title="Закрыть" type="button" class="mfp-close">×</button>
								<h2 class="h2"><?php echo $info->post_title; ?></h2>
							</div>
							<div class="modal-body custom-scroll">
								<?php echo $info->post_content; ?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="footer-menu-cont">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="footer-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'bottom' ) ); ?>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<div class="copyright">
			<p><?php echo get_theme_mod('copyrights');?></p>
		</div>
	</footer>

	<div class="button blue-button to-top">
		<i class="fa fa-angle-double-up"></i>
		<span class="del_word">Наверх</span>
	</div>

	<?php //if (isset($_SESSION['popup'])&&$_SESSION['popup']) { ?>
	<!-- <div class="popupBox popupBox-message">
		<div class="popupBox__wrap">
		<div class="popupBox__content">
				<h2 class="h2">Спасибо!</h2>
				<p>Ваше <b>сообщение</b><br> отправлено и будет рассмотрено<br> в ближайшее время.</p>
				<a href="#" class="button">Закрыть</a>
			</div>
		</div>
	</div> -->
	<?php //$_SESSION['popup']=false; } ?>

	<!-- <div class="popupBox popupBox-subscribe">
		<div class="popupBox__wrap">
		<div class="popupBox__content">
				<h2 class="h2">Поздравляю!</h2>
				<p>Вы успешно оформили <b>подписку.</b><br> Спасибо вам за оказанное<br> доверие.</p>
				<a href="#" class="button">Закрыть</a>
			</div>
		</div>
	</div> -->

	<div class="popupBox popupBox-apologise">
		<div class="popupBox__wrap">
			<div class="popupBox__content">
				<h2 class="h2"><?php echo get_theme_mod('pu11');?></h2>
				<p><?php echo get_theme_mod('pu12');?></p>
				<a href="#" class="button">Закрыть</a>
			</div>
		</div>
	</div>

</body>
</html>
