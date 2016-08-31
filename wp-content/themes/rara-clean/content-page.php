<?php
/**
 * @package rara for all page
 */
?>

<article class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
	<div class="heading">

		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		
	</div>

	<div class="img-holder">

		<div class="wp-caption">

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
		</div>
							
		</div>

         <div class="detail">
			
		<?php 	/* translators: %s: Name of current page */

				the_content( sprintf(

					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rara-clean' ),

					the_title( '<span class="screen-reader-text">"', '"</span>', false )

										) );

			?>

           
		
		</div>

</article>