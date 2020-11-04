<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package edulife
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$enable_top_bar      = edulife_get_theme_mod( 'enable_top_bar' );
$address             = edulife_get_theme_mod( 'top_bar_address' );
$contact_number      = edulife_get_theme_mod( 'top_bar_contact_number' );
$email               = edulife_get_theme_mod( 'top_bar_email' );
$enable_login_signup = edulife_get_theme_mod( 'enable_login_signup' );
$login_url           = edulife_get_theme_mod( 'login_url' );
$signup_link         = edulife_get_theme_mod( 'signup_link' );

$enable_header_cta_btn = edulife_get_theme_mod( 'enable_header_cta_btn' );
$header_cta_btn_label  = edulife_get_theme_mod( 'header_cta_btn_label' );
$header_cta_btn_link   = edulife_get_theme_mod( 'header_cta_btn_link' );


?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'edulife' ); ?></a>
	<div id="page" class="site">

		<header id="masthead" class="site-header">

			<div class="heading-content">
				<div class="container">
					<div class="content-wrapper">
						<div class="site-branding">
							<?php

							the_custom_logo();

							if ( display_header_text() ) {
								?>
								<h1 class="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
								</h1>
								<?php
								$edulife_description = get_bloginfo( 'description', 'display' );
								if ( $edulife_description || is_customize_preview() ) :
									?>
									<p class="site-description">
										<?php echo esc_html( $edulife_description ); ?>
									</p>
									<?php
								endif;
							}
							?>
						</div><!-- .site-branding -->

						<div class="theme-primary-navigation">
							<nav id="site-navigation" class="main-navigation">
								<div class="toggle-button-wrapper">
									<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
										<span class="menu-toggle__text"><?php esc_html_e( 'Toggle Menu', 'edulife' ); ?></span>
									</button>
								</div>

								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
										'fallback_cb'    => 'edulife_menu_fallback',
									)
								);
								?>
							</nav><!-- #site-navigation -->

							<?php if ( $enable_header_cta_btn ) { ?>
								<div class="apply-button">
									<a href="<?php echo esc_url( $header_cta_btn_link ); ?>" class="btn-primary btn-prop"><?php echo esc_html( $header_cta_btn_label ); ?></a>
								</div>
							<?php } ?>

						</div><!-- #theme-primary-navigation -->
					</div><!-- .content-wrapper -->
				</div><!-- .container -->
			</div><!-- .heading-content -->
		</header><!-- #masthead -->
