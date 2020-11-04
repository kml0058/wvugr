<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package edulife
 */

get_header();

edulife_banner();
?>

<div class="content">
	<div class="container">
		<div class="inner-wrapper no-sidebar">

			<main id="primary" class="site-main">
				<div class="blog-post">
					<div class="wrapper">
						<div class="grid-collection">
							<?php
							if ( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content' );

								endwhile;

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						</div><!-- .grid-collection -->

						<?php the_posts_pagination(); ?>

					</div><!-- .wrapper -->
				</div><!-- .blog-post -->

			</main><!-- #main -->

		</div><!-- .inner-wrapper -->
	</div><!-- .container -->
</div><!-- .content -->

<?php
get_footer();

