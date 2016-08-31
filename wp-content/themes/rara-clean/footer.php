<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rara
 */
?>

<footer id="footer" role="content-info">

		<div class="holder">

			<?php $my_theme = wp_get_theme();  ?>


            <p>  <?php esc_attr_e('Copyright &copy;', 'rara-clean'); ?> <?php echo date('Y'); ?>

            	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

            	     <?php bloginfo( 'name' ); ?>

                 </a>  | <?php _e( 'Theme by:', 'rara-clean' ); ?>

               <a href=" <?php echo $my_theme->get( 'AuthorURI' ); ?> ">  <?php echo $my_theme->get( 'Author' ); ?> </a>   |
                <?php printf(__('Powered by ', 'rara-clean')); ?><a href="http://wordpress.org/" rel="generator">
                    <?php printf(__('%s', 'rara-clean'), 'WordPress'); ?></a>


             </p>


		
		</div>

		<?php wp_footer(); ?>

</footer>

</body>

</html>

