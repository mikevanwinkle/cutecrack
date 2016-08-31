<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rara
 */

get_header(); ?>

	

	<main id="main" role="main">

		<div class="holder">
			
			<div class="content-holder">

				<section id="content"<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) echo ' class="no-sidebar"';?>>

					    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', get_post_format() );?>
                   
                     	

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
