<?php
/**
 * @package rara
 */
?>

<article class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="heading">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							
		<div class="info">

			<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php the_date( 'F j, Y ');?></time>

			<span class="category"><?php the_category( ', ' ); ?></span>
		
		</div>
						
	</div>

	

	    <?php

		// Must be inside a loop.

		if ( has_post_thumbnail() ) {

		?>

		<div class="img-holder">

		<div class="wp-caption">

		<?php

	     ( is_active_sidebar( 'sidebar-1' ) ) ? the_post_thumbnail( 'rara-with-sidebar' ) : the_post_thumbnail( 'rara-without-sidebar' ) ;

	     ?>
	     <p class="aligncenter"><?php echo get_post(get_post_thumbnail_id())->post_excerpt;?> </p>

	     </div>
							
	     </div>
	     
	     <?php
							
		}

	    else {

		?>
			
										     
		<?php
		
		       }

		?>
		

	<div class="detail">

		<p>
			<?php 	/* translators: %s: Name of current post */

				the_content( sprintf(

					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rara-clean' ),

					the_title( '<span class="screen-reader-text">"', '"</span>', false )

										) );

			?> 

		</p>

		

		<div class="pagelink"><?php wp_link_pages('pagelink=Page %'); ?></div>			

			<div class="btn-holder">

				

    
		    </div>
						
		</div>

</article>