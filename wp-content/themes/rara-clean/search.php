<?php
/**
 * The template for displaying search results pages.
 *
 * @package rara
 */

?>

<?php get_header(); ?>

	<main id="main" role="main">

		<div class="holder">

			
			
			<div class="content-holder">

				<section id="content">

					    <header class="page-header">

								<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'rara-clean' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						
						</header><!-- .page-header -->

					    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					    

						<?php get_template_part('content', 'search'); ?>
                   
                     	

					     <?php endwhile; else : ?>

					     	
                        <p><?php _e( 'Sorry, no posts matched your criteria.','rara-clean' ); ?></p>

                          <?php endif; ?>
			
				</section>

			<?php get_sidebar();?>

			</div>

		</div>
		
		    <?php get_template_part('footer','sidebar');?>
	</main>
	

<?php get_footer(); ?>