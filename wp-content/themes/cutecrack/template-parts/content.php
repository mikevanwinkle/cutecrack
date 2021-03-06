<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Boston
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php //boston_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail( ) AND get_post_meta(get_the_ID(), 'hide_image', true) !== 'yes' ) { ?>
	<aside class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'boston-list-medium' ); ?></a>
	</aside>
	<?php } ?>

	<div class="entry-summary">
		<?php the_content(); ?>
	</div><!-- .entry-summary -->

	<div class="entry-more">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php esc_html_e( 'link', 'boston' ); ?></a>
	</div>

	<footer class="entry-footer">
		<?php //boston_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
