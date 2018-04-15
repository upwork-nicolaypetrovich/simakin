<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 10.12.2017
 * Time: 11:12
 */
$the_query = new WP_Query( array( 'post_type' => 'aktsii_ot_partnerov', 'posts_per_page' => 10 ) );
if ( $the_query->have_posts() ) {
$string .= '<div class="slider single-item">';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		if ( has_post_thumbnail() ) {
			$string .= '<div class="sb-cont bs-padding">';
			$string .= '<a href="' . get_field( 'url', $post_id ) . '" target="_blank">' .
			           '<img width="100%" src="' . get_the_post_thumbnail_url( $post_id ) . '"></a></div>';
		} else {
			// if no featured image is found
			$string .= '<div class="sb-cont bs-padding"><a href="' . get_field( 'url', $post_id ) .
			           '" rel="bookmark"><img src="https://simakin.pro/wp-content/uploads/2017/11/7a4d4be382-1.jpg" width="100%">' .
			           get_the_title() . '</a></div>';
		}
	}
} else {
}
$string .= '</div>';
echo $string;
wp_reset_postdata();