				<!-- Sidebae -->
				<aside id="swipeClose" class="sidebar-container">
					<div class="relative">
						<div class="sb-cont sidebar-nav">
							<h4 class="h4">Рубрики</h4>
							<nav>
								<?php foreach (get_categories() as $cat) { ?>
								<?php $terms = get_all_wp_terms_meta($cat->term_id); ?>
								<a href="<?php echo get_category_link( $cat->term_id ); ?>" <?php if( get_queried_object_id() == $cat->term_id) echo 'class="active"'; ?>>
									<span><img src="<?php echo https_converter($terms['icon'][0]); ?>" alt=""></span>
									<?php echo $cat->name; ?><i><?php echo $cat->count; ?></i>
								</a>
								<?php } ?>
							</nav>
						</div>
						<?php dynamic_sidebar( 'sidebar-right' ); ?>
					</div>
				</aside>