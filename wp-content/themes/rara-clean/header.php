<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package rara
 */
?>
<!doctype html>

<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="profile" href="http://gmpg.org/xfn/11">

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header id="header" role="banner">

		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'rara-clean' ); ?></a>

		<div class="header-holder">

			<div class="logo" id="branding">
				<?php
					$options = of_get_option( "logo_uploader" );
					if( $options ){
                        $img_id = rara_get_attachment_id( $options );
                        $img = wp_get_attachment_image_src( $img_id, 'rara-logo' );
                        echo '<a href="' . esc_url( home_url( '/' ) ) . '"><img  src="'.esc_url( $img[0] ).'"/></a>';
                    }else {
				?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <span class="tagline"><?php bloginfo( 'description' ); ?></span>
                <?php  }  ?>
		    </div>

			<div class="open-close">

				<a class="opener" href="#">menu</a>

				<div class="slide">

					<nav id="nav" role="navigation">

						
						
						 <?php
						

							$defaults = array(

								'theme_location'  => 'primary',

								'menu'            => '',

								'container'       => '',

								'container_class' => 'nav',

								'container_id'    => '',

								'menu_class'      => '',

								'menu_id'         => '',

								'echo'            => true,

								'fallback_cb'     => '',

								'before'          => '',

								'after'           => '',

								'link_before'     => '',

								'link_after'      => '',

								'items_wrap'      => '<ul class="accordion">%3$s</ul>',

								'depth'           => 2,
								
								
								);

							wp_nav_menu( $defaults ); 

						?> 
					
					</nav>

				</div>

			</div>

		</div>

	</header>
