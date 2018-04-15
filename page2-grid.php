<?php
	foreach (get_categories() as $cat) {
	if ( checkAllowedCat( $cat->term_id ) ){
		$terms = get_all_wp_terms_meta($cat->term_id);
	?>
	<div class="archice-wrap">
		<img src="<?php echo https_converter($terms['icon'][0]); ?>" alt="">
		<h6 class="h6"><?php echo $cat->name; ?></h6>
		<?php
			$args = array( 'cat'=> $cat->term_id );
			if ($GLOBALS['articles_ajax']) $args['posts_per_page'] = -1;
			$articles = new WP_Query( $args );
			if ( $articles->have_posts() ) {
		?>
		<ul>
			<?php while ( $articles->have_posts() ) { $articles->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
			<?php } ?>
		</ul>
		<?php wp_reset_postdata(); } ?>
	</div>
	<?php } ?>
<?php } ?>