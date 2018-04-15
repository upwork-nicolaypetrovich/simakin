
											<?php $result_count = 1; ?>
											<?php while ( have_posts() ) : the_post(); ?>
												<div class="search-results-wrap" id="result<?php echo $result_count; ?>" style="display: none;">
													<div class="search-results-block">
														<h3 class="h3"><a href="<?php the_permalink(); ?>">
															<?php echo mark_search_results( get_search_query(), get_the_title()); ?>
														</a></h3>
														<p>
															<?php echo mark_search_results( get_search_query(), get_the_excerpt()); ?>
														</p>
													</div>
												</div>
											<?php $result_count++; endwhile; ?>