<?php
/**
 * @package   Rara
 * @author    Codewing.dk
 * @license   GPL-2.0+
 *
 */

$my_postid1 = absint(of_get_option( "banner_img1_text" ));
$my_postid2 = absint(of_get_option( "banner_img2_text" ));
$my_postid3 = absint(of_get_option( "banner_img3_text" ));
$my_postid4 = absint(of_get_option( "banner_img4_text" ));
$my_postid5 = absint(of_get_option( "banner_img5_text" ));

$my_posts = array( $my_postid1, $my_postid2, $my_postid3, $my_postid4, $my_postid5 );
$my_posts = array_filter( $my_posts );

?>
<?php  if( $my_posts ) {  ?>
<div class="banner">
	<!-- cycle carousel structure example -->
	<div class="cycle-gallery">
		<div class="mask">
			<div class="slideset">
				<?php  
                $banner_qry = new WP_Query( array( 
                    'post_type'             => array( 'post', 'page' ), 
                    'post_status'           => 'publish',
                    'posts_per_page'        => -1,                    
                    'post__in'              => $my_posts,
                    'orderby'               => 'post__in',
                    'ignore_sticky_posts'   => true
                ) );
                
                if( $banner_qry->have_posts() ){
                    while( $banner_qry->have_posts() ){
                        $banner_qry->the_post();
                    ?>
				<div class="slide">
					<?php the_post_thumbnail( 'full' ); ?>
					<div class="banner-text">
						<strong class="title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</strong>
						<?php echo wpautop( rara_excerpt( get_the_content(), 120, '.', false, false ) ); ?>
					</div>
				</div>
				<?php	}	
				 }  ?>
			</div>
		</div>
		<div class="pagination">
			<!-- pagination generated here -->
		</div>
	</div>
</div>
<?php } ?>