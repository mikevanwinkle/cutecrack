<?php
/**
 * The template for displaying the footer sidebar.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rara
 */
?>
<?php if ( is_active_sidebar( 'footer-first' ) || is_active_sidebar( 'footer-second' ) || is_active_sidebar( 'footer-third' )  ) : ?>

   <div class="three-columns">

			<div class="holder">

				<div class="column" role="complementary">

					<?php dynamic_sidebar( 'footer-first' ); ?>

				</div>

				<div class="column" role="complementary">

					<?php dynamic_sidebar( 'footer-second' ); ?>

				</div>

				<div class="column" role="complementary">

					<?php dynamic_sidebar( 'footer-third' ); ?>

				</div>

			</div>
			
		</div>

<?php endif; ?>