<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package edulife
 */

get_header();


edulife_banner();

?>

<main id="primary" class="site-main">
	<div class="container">
		<section class="error-404 not-found">
			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'edulife' ); ?>
				</p>

				<?php get_search_form(); ?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</div>
</main><!-- #main -->

<?php
get_footer();
