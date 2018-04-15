						<div id="tabs" class="sb-cont social-networks">
							<h5 class="h5"><?php echo apply_filters( 'widget_title', $instance['title'] ); ?></h5>
							<div class="social-label">
								<ul>
									<li class="active"><a href="javascript:void(0)">vk</a></li>
									<li><a href="javascript:void(0)">ok</a></li>
									<li><a href="javascript:void(0)">fb</a></li>
									<li><a href="javascript:void(0)">g+</a></li>
									<li><a href="javascript:void(0)">tw</a></li>
								</ul>
							</div>
							<div class="social-tab-block">
								<div class="social-block active">
									<?php echo htmlspecialchars_decode( apply_filters( 'widget_title', $instance['vk'] ),ENT_QUOTES ); ?>
								</div>
								<div class="social-block">
									<?php echo html_entity_decode( apply_filters( 'widget_title', $instance['ok'] ),ENT_QUOTES  ); ?>
								</div>
								<div class="social-block">
									<?php echo htmlspecialchars_decode( apply_filters( 'widget_title', $instance['fb'] ),ENT_QUOTES); ?>
								</div>
								<div class="social-block">
									<?php echo htmlspecialchars_decode( apply_filters( 'widget_title', $instance['google'] ),ENT_QUOTES ); ?>
								</div>
								<div class="social-block">
									<?php echo htmlspecialchars_decode( apply_filters( 'widget_title', $instance['tw'] ),ENT_QUOTES ); ?>
								</div>
							</div>
						</div>