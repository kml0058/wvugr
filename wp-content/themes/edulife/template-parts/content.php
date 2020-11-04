<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package edulife
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


?>


<article <?php post_class( 'grid-item' ); ?> id="post-<?php the_ID(); ?>">
	<div class="wrapper">
		<div class="img-container img-overlay-3">
			<?php
			edulife_post_thumbnail();
			edulife_posted_on();
			?>
		</div><!-- img-container -->

		<div class="content-wrapper">
			<div class="entry-content">
				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
					?>
				</header><!-- .entry-header -->
				<div class="excerpt">
					<?php the_excerpt(); ?>
				</div>
				<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'edulife' ); ?></a><!-- readmore -->
			</div><!-- .entry-content -->

			<?php
			if ( edulife_has_entry_footer() ) {
				?>
				<footer class="entry-footer">
					<?php edulife_entry_footer(); ?>
				</footer><!-- .entry-footer -->
				<?php
			}
			?>

		</div><!-- content-wrapper	 -->

	</div><!-- wrapper -->

</article><!-- #post-<?php the_ID(); ?> -->
