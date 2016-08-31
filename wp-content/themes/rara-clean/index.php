<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rara
 */

?>
<?php get_header(); ?>

	<main id="main" role="main">

	

		<div class="holder">

			<?php

				  if ( is_front_page() && is_home() ) { 

					
                  get_template_part('banner','post');
					/* get_template_part('banner');*/
				}

			?>


			
			
			<div class="content-holder">

				<section id="content"<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) echo ' class="no-sidebar"';?>>
					

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
						<?php
						/* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'content', get_post_format() );
						?>
                   
                     	<?php endwhile; else : ?>

                     	<?php the_posts_navigation(); ?>


                        <?php endif; ?>

                        
                   <?php rara_pagination(); ?>

			
				</section>

		        <?php get_sidebar();?>

			</div>

		</div>
		
		    <?php get_template_part('footer','sidebar');?>
	</main>
	

<?php get_footer(); ?>