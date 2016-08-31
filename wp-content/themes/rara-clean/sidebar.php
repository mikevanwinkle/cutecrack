<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package rara
 */

?>

 <aside id="sidebar">


	<?php

		if ( ! is_active_sidebar( 'sidebar-1' ) ) {

			return;

			}

	?>

	<div id="secondary" class="widget-area" role="complementary">

		<?php dynamic_sidebar( 'sidebar-1' ); ?>

	</div><!-- #secondary -->

</aside>