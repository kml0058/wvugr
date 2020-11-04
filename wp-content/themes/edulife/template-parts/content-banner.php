<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

$thumb_url = get_the_post_thumbnail_url( null, 'full' );
if ( is_singular() ) {
	$thumbnail_url = $thumb_url ? $thumb_url : get_header_image();
} else {
	$thumbnail_url = has_header_image() ? get_header_image() : $thumb_url;
}
$bg_class = $thumbnail_url ? 'has-background-image' : null;

?>
<div id="custom-header">
	<!-- Add has-background-image class when the page has background image -->
	<div class="custom-header-content <?php echo esc_attr( $bg_class ); ?>" style="background-image:url('<?php echo esc_url( $thumbnail_url ); ?>');">
		<div class="container">
			<div class="inner-wrapper">
				<?php if ( ! is_front_page() ) { ?>
					<h1><?php wp_title( ' ' ); ?></h1>
				<?php } else { ?>
					<h1><?php esc_html_e( 'Home', 'edulife' ); ?></h1>
				<?php } ?>

				<!-- breadcrumb -->
				<?php edulife_breadcrumb(); ?>
			</div><!-- .inner-wrapper -->
		</div><!-- .container -->
	</div><!-- .custom-header-content -->
</div><!-- #custom-header -->
