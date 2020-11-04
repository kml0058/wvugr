<?php
/**
 * Template part for displaying page content in single page and posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package edulife
 */

?>

<div class="singular-content-wrapper">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( edulife_has_entry_footer() ) { ?>
			<div class="post-detail">

				<div class="single-post-meta-info">
					<?php if ( edulife_has_entry_footer() ) { ?>
						<footer class="entry-footer">
							<?php edulife_entry_footer(); ?>
						</footer><!-- entry-footer -->
					<?php } ?>

				</div><!-- single-post-meta-info -->
			</div>
		<?php } ?>

		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edulife' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php if ( get_the_tags() ) { ?>
			<div class="post-tags">
				<?php the_tags(); ?>
			</div>
		<?php } ?>

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'edulife' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
