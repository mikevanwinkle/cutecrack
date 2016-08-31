<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package rara
 */

?>

<?php get_header(); ?>

	<main id="main" role="main">

		<div class="holder">
			
            <div class="content-holder">

				<section id="content"<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) echo ' class="no-sidebar"';?>>

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php get_template_part('content','page'); ?>

					<?php rara_post_nav(); ?>


					<?php

					// If comments are open or we have at least one comment, load up the comment template
					
					if ( comments_open() || get_comments_number() ) :

						comments_template();

					endif;

				     ?>

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
