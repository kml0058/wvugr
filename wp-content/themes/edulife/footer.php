<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package edulife
 */


$footer_widgets = array(
	'footer-widgets-1',
	'footer-widgets-2',
	'footer-widgets-3',
	'footer-widgets-4',
);

$payment_options = array(
	'visa',
	'paypal',
	'jcb',
	'ico_mastercard',
);


$newsletter_heading     = edulife_get_theme_mod( 'newsletter_heading' );
$newsletter_description = edulife_get_theme_mod( 'newsletter_description' );

$enable_footer_widgets   = edulife_get_theme_mod( 'enable_footer_widgets' );
$display_payment_options = edulife_get_theme_mod( 'display_payment_options' );
$display_social_links    = edulife_get_theme_mod( 'display_social_links' );
$copyright_text          = edulife_get_theme_mod( 'copyright_text' );

?>
<!-- -----------------------scroll up btn -------------------------- -->
<div id="btn-scrollup">
	<a title="<?php esc_attr_e( 'Go to top', 'edulife' ); ?>" class="scrollup" href="#"></a>
</div>
<!-- ------------------------------------------------------------------>
<footer id="footer" class="site-footer">

	<?php if ( edulife_get_newsletter_form( 0, false ) ) { ?>
	<!-- newsletter -->
	<div id="newsletter-section">
		<div class="container">
			<div class="wrapper">
				<div class="left-content">
					<h2 class="title"><?php echo esc_html( $newsletter_heading ); ?></h2>
					<p class="disclaimer"><?php echo esc_html( $newsletter_description ); ?></p>
				</div><!-- left-content -->
				<div class="right-content">
					<div class="right-content-wrapper">
						<?php edulife_get_newsletter_form(); ?>
					</div>
				</div><!-- right-content -->
			</div><!-- wrapper -->
		</div><!-- container -->
	</div><!-- newsletter-section -->
	<?php } ?>


	<?php if ( $enable_footer_widgets ) { ?>
		<div class="container">
			<div class="footer-widgets-inner">
				<div class="inner-wrapper">
					<?php
					if ( is_array( $footer_widgets ) && ! empty( $footer_widgets ) ) {
						foreach ( $footer_widgets as $footer_widget ) {
							if ( is_active_sidebar( $footer_widget ) ) {
								?>
								<aside class="wp-widget">
									<?php dynamic_sidebar( $footer_widget ); ?>
								</aside>
								<?php
							}
						}
					}
					?>
				</div><!-- inner-wrapper -->
			</div><!-- .footer-widgets-inner -->
		</div><!-- .container -->
	<?php } ?>


	<?php if ( $display_payment_options || $display_social_links ) { ?>
		<div class="payment-info-n-social-icon">
			<div class="wrapper">
				<div class="container">
					<div class="inner-content">


						<?php
						if ( $display_payment_options ) {
							?>
							<div class="payment-content">
								<h4><?php esc_html_e( 'Payment Options', 'edulife' ); ?></h4>
								<div class="payment-option">
									<?php
									foreach ( $payment_options as $payment_option ) {
										$payment_key = "payment_option_{$payment_option}";
										if ( ! edulife_get_theme_mod( $payment_key ) ) {
											continue;
										}

										$payment_icon_url = get_template_directory_uri() . "/assets/images/{$payment_option}.png";
										?>
											<a>
												<img src="<?php echo esc_url( $payment_icon_url ); ?>">
											</a>
										<?php
									}
									?>
								</div><!-- .payment-option -->
							</div><!-- .payment-content -->
							<?php

						}
						?>


						<?php if ( $display_social_links && edulife_social_link_lists( false ) ) { ?>
							<div class="social-icon-content">
								<div class="social-navigation-wrapper">
									<div class="site-social">
										<h4><?php esc_html_e( 'Follow Us', 'edulife' ); ?></h4>
										<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'edulife' ); ?>">
											<div class="menu-social-container">
												<ul id="menu-social" class="menu">

													<?php edulife_social_link_lists(); ?>

												</ul><!-- #menu-social -->
											</div><!-- .menu-social-container -->
										</nav><!-- .social-navigation -->
									</div><!-- .site-social -->
								</div><!-- .social-navigation-wrapper -->
							</div><!-- .social-icon-content -->
						<?php } ?>


					</div><!-- .inner-content -->
				</div><!-- .container -->

			</div><!-- .wrapper -->
		</div><!-- .payment-info-n-social-icon -->
	<?php } ?>

	<div class="footer-bottom">

		<div class="container">
			<div class="wrapper">

				<?php if ( $copyright_text ) { ?>
					<div id="colophon" class="site-credit">
						<div class="site-info">
							<?php echo wp_kses_post( $copyright_text ); ?>
						</div><!-- .site-info -->
					</div><!-- #colophon -->
				<?php } ?>

				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'footer-menu',
						'menu_id'         => '',
						'container_class' => 'right-content',
						'menu_class'      => 'listing',
						'fallback_cb'     => 'edulife_menu_fallback',
					)
				);
				?>

			</div><!-- wrapper -->
		</div><!-- container -->

	</div><!-- .footer-bottom -->


</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
