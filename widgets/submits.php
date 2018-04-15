						<div class="sb-cont сommunications" style="height: auto !important;">
							<div class="cmmun-cont following">
								<h5 class="h5"><?php echo apply_filters( 'widget_title', $instance['title'] ); ?></h5>
								<div class="following-links">
									<a href="<?php echo get_theme_mod('sn6');?>" target="_blank"><i class="fa fa-paper-plane"></i></a>
									<a href="<?php echo get_theme_mod('sn7');?>" target="_blank"><i class="fa fa-youtube"></i></a>
									<a href="/feed/" target="_blank"><i class="fa fa-rss"></i></a>
								</div>
							</div>
							<div class="cmmun-cont subscribe">
								<h5 class="h5"><?php echo apply_filters( 'widget_title', $instance['title2'] ); ?></h5>

								<?php echo do_shortcode('[sendpulse-form id="194"]'); ?>

							</div>
							<div class="cmmun-cont webpush">
								<h5 class="h5"><?php echo apply_filters( 'widget_title', $instance['title3'] ); ?></h5>
								<div class="description">
									<p><?php echo apply_filters( 'widget_title', $instance['push'] ); ?></p>
								</div>
								<button class="sp_notify_prompt button">Активировать</button>
							</div>
						</div>