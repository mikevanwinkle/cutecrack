<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package rara
 */

get_header(); ?>

	<main id="main" role="main">

		<div class="holder">

			
			<div class="content-holder">

				<section id="content">

					
						
						<div class="heading">

		 						<h1><?php _e( 'This is somewhat embarrassing, is not it?', 'rara-clean' ); ?></h1>
		 						
								<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'rara-clean' ); ?></p>
					

						    <article class="post">

		     
                                <div class="img-holder">

			                          <img src="<?php echo get_template_directory_uri(); ?>/images/404.jpg" alt="image description">';
										     
		
	                                </div>

                              </article>
			
				</section>

				

				 <?php get_template_part('sidebar');?>
			
			
			   </div>

		</div>
		
		    <?php get_template_part('footer','sidebar');?>

	</main>

     <?php get_footer(); ?>
