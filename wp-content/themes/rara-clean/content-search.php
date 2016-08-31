<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rara
 */
?>

<article class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
	<div class="heading">

		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
							
		<div class="info">

			<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() );?></time>

            <?php if( has_category() ){ ?>
			<span class="category"><?php the_category( ', ' ); ?></span>
            <?php } ?>
            							
		</div>

	</div>

	<div class="img-holder">

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

         <div class="detail">
			
			<?php 	/* translators: %s: Name of current post */

				the_excerpt( sprintf(
							__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rara-clean' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
										) );
			?>

            <div class="btn-holder">

				<div class="btn-holder1">

					<a class="readmore" href="<?php the_permalink(); ?>"><?php _e( 'Read more','rara-clean' ); ?></a>

				</div>

				
			</div>
		
		</div>

</article>
