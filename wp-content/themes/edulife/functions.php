<?php
/**
 * Edulife functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package edulife
 */

if ( ! defined( 'EDULIFE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'EDULIFE_VERSION', '1.0.0' );
}

if ( ! function_exists( 'edulife_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function edulife_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on edulife, use a find and replace
		 * to change 'edulife' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'edulife', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1'      => esc_html__( 'Primary Menu', 'edulife' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'edulife' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'edulife_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'edulife_setup' );



if ( ! function_exists( 'edulife_menu_fallback' ) ) {

	/**
	 * If no navigation menu is assigned, this function will be used for the fallback.
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/ for available $args arguments.
	 * @param  mixed $args Menu arguments.
	 * @return string $output Return or echo the add menu link.
	 */
	function edulife_menu_fallback( $args ) {
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}

		$link  = $args['link_before'];
		$link .= '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="' . esc_attr__( 'Opens in new tab', 'edulife' ) . '" target="__blank">' . $args['before'] . esc_html__( 'Add a menu', 'edulife' ) . $args['after'] . '</a>';
		$link .= $args['link_after'];

		if ( false !== stripos( $args['items_wrap'], '<ul' ) || false !== stripos( $args['items_wrap'], '<ol' ) ) {
			$link = "<li class='menu-item'>{$link}</li>";
		}

		$output = sprintf( $args['items_wrap'], $args['menu_id'], $args['menu_class'], $link );

		if ( ! empty( $args['container'] ) ) {
			$output = sprintf( '<%1$s class="%2$s" id="%3$s">%4$s</%1$s>', $args['container'], $args['container_class'], $args['container_id'], $output );
		}

		if ( $args['echo'] ) {
			echo wp_kses_post( $output );
		}

		return $output;
	}
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function edulife_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'edulife_content_width', 640 );
}
add_action( 'after_setup_theme', 'edulife_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function edulife_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'edulife' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'edulife' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets One', 'edulife' ),
			'id'            => 'footer-widgets-1',
			'description'   => esc_html__( 'Add widgets here.', 'edulife' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets Two', 'edulife' ),
			'id'            => 'footer-widgets-2',
			'description'   => esc_html__( 'Add widgets here.', 'edulife' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets Three', 'edulife' ),
			'id'            => 'footer-widgets-3',
			'description'   => esc_html__( 'Add widgets here.', 'edulife' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets Four', 'edulife' ),
			'id'            => 'footer-widgets-4',
			'description'   => esc_html__( 'Add widgets here.', 'edulife' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'edulife_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function edulife_scripts() {

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.' : '.min.';

	wp_enqueue_style( 'edulife-main-font', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', array(), EDULIFE_VERSION );
	wp_enqueue_style( 'font awesome', get_template_directory_uri() . '/assets/css/all' . $suffix . 'css', array(), EDULIFE_VERSION );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/slick/slick.css', array(), EDULIFE_VERSION );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/slick/slick-theme.css', array(), EDULIFE_VERSION );
	wp_enqueue_style( 'edulife-style', get_stylesheet_uri(), array(), EDULIFE_VERSION );
	wp_style_add_data( 'edulife-style', 'rtl', 'replace' );

	wp_enqueue_script( 'edulife-navigation', get_template_directory_uri() . '/assets/js/navigation' . $suffix . 'js', array( 'jquery' ), EDULIFE_VERSION, true );
	wp_enqueue_script( 'edulife-slick', get_template_directory_uri() . '/assets/slick/slick' . $suffix . 'js', array( 'jquery' ), EDULIFE_VERSION, true );
	wp_register_script( 'edulife-custom-js', get_template_directory_uri() . '/assets/js/custom' . $suffix . 'js', array( 'jquery' ), EDULIFE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'edulife-custom-js' );
}
add_action( 'wp_enqueue_scripts', 'edulife_scripts' );


function edulife_dynamic_theme_color() {
	$primary_color   = sanitize_hex_color( edulife_get_theme_mod( 'primary_color' ) );
	$secondary_color = sanitize_hex_color( edulife_get_theme_mod( 'secondary_color' ) );

	$primary_color_light = edulife_colors_hex2rgba( $primary_color, 0.8 );

	ob_start();
	?>
	<style>
		/* Quote */
		blockquote {
			border-left: 4px solid <?php echo esc_attr( $primary_color ); ?>;
			border-right: 4px solid <?php echo esc_attr( $primary_color ); ?>;
		}

		blockquote:before {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.wp-block-quote,
		.wp-block-quote:not(.is-large):not(.is-style-large),
		.wp-block-pullquote {
			border-left: 4px solid <?php echo esc_attr( $primary_color ); ?>;
		}

		.site a {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		button,
		input[type="reset"],
		input[type="submit"],
		input[type="button"],
		.btn-Primary .elementor-button,
		.comment-respond form .form-submit input#submit,
		.btn-primary {
			background-color: <?php echo esc_attr( $primary_color ); ?> !important;
			border: 2px solid <?php echo esc_attr( $primary_color ); ?> !important;
		}

		.btn-secondary .elementor-button:hover,
		.btn-secondary .elementor-button:focus,
		.btn-Secondary:hover,
		.btn-Secondary:focus {
			background-color: <?php echo esc_attr( $primary_color ); ?> !important;
			border: 2px solid <?php echo esc_attr( $primary_color ); ?> !important;
		}

		#secondary .widget a:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#footer .footer-widgets-inner .inner-wrapper .wp-widget a:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#footer .payment-info-n-social-icon .wrapper .inner-content .social-icon-content .social-navigation-wrapper .site-social .social-navigation .menu-social-container .menu .menu-item a:hover {
			background-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#footer .footer-bottom .site-credit .site-info a:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#footer .footer-bottom .right-content .listing li a:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.header-top-bar .container .wrapper .header-top-content .header-top-right-content .social-navigation-wrapper .site-social .social-navigation .menu-social-container .menu .menu-item a:hover {
			background-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.header-top-bar .container .wrapper .header-top-content .header-top-right-content .login-signup-content .wrapper a:hover {
			color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		.site-branding .site-title a:hover {
			color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		.main-navigation .menu-item.current-menu-item>a:before {
			background: <?php echo esc_attr( $primary_color ); ?>;
		}

		.menu>.menu-item>a:hover {
			color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		.menu>.menu-item.current-menu-item>a {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.menu .menu-item.menu-active>a {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		/* submenu pointer */
		.menu>li>ul:after {
			border-bottom-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.menu .menu-item ul.sub-menu:before {
			background-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.menu .menu-item ul.sub-menu>.menu-item:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.menu .menu-item ul.sub-menu>.menu-item:hover>a {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#custom-header .custom-header-content.has-background-image .inner-wrapper #breadcrumb .breadcrumb-trail .trail-items li a span {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#primary .blog-post .wrapper .grid-collection .grid-item .wrapper .date-meta a:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#primary .blog-post .wrapper .grid-collection .grid-item .wrapper .entry-content .entry-header .entry-title a:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#primary .blog-post .wrapper .grid-collection .grid-item .wrapper .entry-content a {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.entry-footer a:hover {
			color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		.grid-collection .grid-item.sticky::after {
			background: <?php echo esc_attr( $primary_color ); ?>;
		}

		.post-detail .single-post-meta-info .social-icon-content .social-navigation-wrapper .site-social .social-navigation .menu-social-container .menu .menu-item a:hover {
			background-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.search #primary .searched-contained article .entry-header .entry-title a:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.search #primary .searched-contained article .entry-header .entry-meta .date-meta a:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.search #primary .searched-contained article .entry-header .entry-meta .posted-by a:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#page #home-sections #trending-courses .wrapper .inner-section .inner-section__wrapper .multiple-slider .slick-prev:hover,
		#page #home-sections #trending-courses .wrapper .inner-section .inner-section__wrapper .multiple-slider .slick-next:hover {
			background-color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		#page #home-sections #trending-courses .wrapper .inner-section .inner-section__wrapper .multiple-slider .slider-content .content .trending-detail .category a:hover p {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#page #home-sections #trending-courses .wrapper .inner-section .inner-section__wrapper .multiple-slider .slider-content .content .trending-detail .column-title:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#page #home-sections #trending-courses .wrapper .inner-section .inner-section__wrapper .multiple-slider .slider-content .content .trending-detail .section-footer .pricing .actual-price p {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#page #home-sections #services .wrapper .section-heading .primary-color {
			border-color: <?php echo esc_attr( $primary_color ); ?>;
			color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		#page #home-sections #services .wrapper .inner-section .inner-section__wrapper .service-slider .slider-content .content .icon span i {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#page #home-sections #services .wrapper .inner-section .inner-section__wrapper .service-slider .slider-content:hover {
			background-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#page #home-sections #services .wrapper .inner-section .inner-section__wrapper .mob-btn .primary-color {
			border-color: <?php echo esc_attr( $primary_color ); ?>;
			color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		#page #home-sections #blog-section .wrapper #latest-news .lastest-news__wrapper .latest-news__slider .slick-prev:hover,
		#page #home-sections #blog-section .wrapper #latest-news .lastest-news__wrapper .latest-news__slider .slick-next:hover {
			background-color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		#page #home-sections #blog-section .wrapper #latest-news .lastest-news__wrapper .latest-news__slider .slider-content .content .latest-news__detail .column-title:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#page #home-sections #blog-section .wrapper #upcoming-events .section-heading a:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#page #home-sections #blog-section .wrapper #upcoming-events .column .content .column-title:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#page #home-sections #testimonial .wrapper .testimonial-slider .content .content-wrapper .user-detail .user-name:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#page #home-sections .instructor-section .wrapper .inner-container .instruction-slider .slick-prev:hover,
		#page #home-sections .instructor-section .wrapper .inner-container .instruction-slider .slick-next:hover {
			background-color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		#page #home-sections .instructor-section .wrapper .inner-container .instruction-slider .slider-item .slider-wrapper .instructor-name p:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.comments-area .comment-list .comment .comment-body .comment-meta .comment-author .fn a:hover {
			color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		.comments-area .comment-list .comment .comment-body .comment-meta .comment-metadata a:hover {
			color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		.comments-area .comment-list .comment .comment-body .comment-meta .comment-metadata .comment-edit-link {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.comments-area .comment-list .comment .comment-body .comment-content p a {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.comment-respond .comment-form .logged-in-as a:first-child:hover {
			color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		.comment-respond .comment-form .logged-in-as a:last-child {
			color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		.navigation.pagination .nav-links .page-numbers:hover {
			border: 2px solid <?php echo esc_attr( $primary_color ); ?>;
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.navigation.pagination .nav-links .page-numbers.current {
			border: 2px solid <?php echo esc_attr( $primary_color ); ?>;
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.learndash-wrapper .ld-item-list .ld-item-list-item {
			border-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.single-page-pagination .navigation.post-navigation .nav-links .nav-next:hover a,
		.single-page-pagination .navigation.post-navigation .nav-links .nav-next:focus a,
		.single-page-pagination .navigation.post-navigation .nav-links .nav-previous:hover a,
		.single-page-pagination .navigation.post-navigation .nav-links .nav-previous:focus a {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.widget .widget-title:after {
			background: <?php echo esc_attr( $primary_color ); ?>;
		}

		.widget .search-form label:after {
			background-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		a.scrollup {
			background-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		body::-webkit-scrollbar-thumb {
			background: <?php echo esc_attr( $primary_color ); ?>;
		}

		#breadcrumb .breadcrumb-trail .trail-items .trail-begin:before {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#breadcrumb .breadcrumb-trail .trail-items li a span,
		.learndash-wrapper .ld-item-list .ld-item-list-item a.ld-item-name:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.skilled-instructors .elementor-text-editor a p:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}




		button:hover, button:focus,
		input[type="reset"]:hover,
		input[type="reset"]:focus,
		input[type="submit"]:hover,
		input[type="submit"]:focus,
		input[type="button"]:hover,
		input[type="button"]:focus,
		.btn-Primary .elementor-button:hover,
		.btn-Primary .elementor-button:focus,
		.comment-respond form .form-submit input#submit:hover,
		.comment-respond form .form-submit input#submit:focus,
		.btn-primary:hover,
		.btn-primary:focus {
		background-color: <?php echo esc_attr( $primary_color_light ); ?> !important;
		border-color: <?php echo esc_attr( $primary_color_light ); ?> !important;
		}

		#primary .blog-post .wrapper .grid-collection .grid-item .wrapper .entry-content a:hover,
		.comment-respond .comment-form .logged-in-as a:last-child:hover,
		#breadcrumb .breadcrumb-trail .trail-items .trail-begin:hover:before,
		#breadcrumb .breadcrumb-trail .trail-items li a span:hover {
			color: <?php echo esc_attr( $primary_color_light ); ?> !important;
		}





		#footer #newsletter-section {
			background-color: <?php echo esc_attr( $secondary_color ); ?>;
		}

		.notice-bar {
			background-color: <?php echo esc_attr( $secondary_color ); ?>;
		}

		#page #home-sections #blog-section .wrapper #upcoming-events .column .content .footer-content p {
			color: <?php echo esc_attr( $secondary_color ); ?>;
		}

	</style>
	<?php
	$custom_css = ob_get_clean();

	$custom_css = str_replace( '; ', ';', $custom_css );
	$custom_css = str_replace( ' }', '}', $custom_css );
	$custom_css = str_replace( '{ ', '{', $custom_css );
	$custom_css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $custom_css ) );

	echo $custom_css; // phpcs:ignore.

}
add_action( 'wp_head', 'edulife_dynamic_theme_color', 80 );



/**
 * Convert hexdec color string to rgb(a) string.
 *
 * @link https://mekshq.com/how-to-convert-hexadecimal-color-code-to-rgb-or-rgba-using-php/
 *
 * @param string $color Color in hex value | eg: #ffffff or #fff.
 * @param string $opacity Color opacity for RGBA value. If false provided, it will return RGB value.
 */
function edulife_colors_hex2rgba( $color, $opacity = false ) {

	$default = 'rgb(0,0,0)';

	// Return default if no color provided.
	if ( empty( $color ) ) {
		return $default;
	}

	// Sanitize $color if "#" is provided.
	if ( '#' === $color[0] ) {
		$color = substr( $color, 1 );
	}

	// Check if color has 6 or 3 characters and get values.
	if ( strlen( $color ) === 6 ) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) === 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

	// Convert hexadec to rgb.
	$rgb = array_map( 'hexdec', $hex );

	// Check if opacity is set(rgba or rgb).
	if ( $opacity ) {
		if ( abs( $opacity ) > 1 ) {
			$opacity = 1.0;
		}
		$output = 'rgba(' . implode( ',', $rgb ) . ',' . $opacity . ')';
	} else {
		$output = 'rgb(' . implode( ',', $rgb ) . ')';
	}

	// Return rgb(a) color string.
	return $output;
}




/**
 * Filter the excerpt length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function edulife_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 20;
}
add_filter( 'excerpt_length', 'edulife_excerpt_length' );



function edulife_customizer_get_taxonomies() {
	if ( ! defined( 'LEARNDASH_VERSION' ) ) {
		return;
	}
	return array(
		'ld_course_category' => __( 'LearnDash Courses', 'edulife' ),
		'category'           => __( 'WP Category', 'edulife' ),
	);
}



if ( ! function_exists( 'edulife_customizer_get_terms' ) ) {

	/**
	 * This function returns the formated array of terms
	 * for the given taxonomy name, for the customizer dropdown.
	 *
	 * @param string $tax_name Taxonomy name. Default is "category".
	 * @param bool   $hide_empty Takes boolean value, pass true if you want to hide empty terms.
	 * @return array $items Formated array for the dropdown options for the customizer.
	 */
	function edulife_customizer_get_terms( $tax_name = 'category', $hide_empty = true ) {

		if ( empty( $tax_name ) ) {
			return;
		}

		$items = array();
		$terms = get_terms(
			array(
				'taxonomy'   => $tax_name,
				'hide_empty' => $hide_empty,
			)
		);

		if ( is_array( $terms ) && count( $terms ) > 0 ) {
			foreach ( $terms as $term ) {
				$term_name = ! empty( $term->name ) ? $term->name : false;
				$term_id   = ! empty( $term->term_id ) ? $term->term_id : '';
				if ( $term_name ) {
					$items[ $term_id ] = $term_name;
				}
			}
		}

		return $items;
	}
}


function edulife_social_links() {
	return apply_filters(
		'edulife_social_links',
		array(
			'facebook',
			'twitter',
			'instagram',
			'linkedin',
		)
	);
}




if ( ! function_exists( 'edulife_get_newsletter_form' ) ) {

	/**
	 * Prints the newsletter form.
	 *
	 * @uses mc4wp_show_form() - MailChimp for WordPress plugin
	 * @link https://www.mc4wp.com/
	 *
	 * @param int  $form_id Form id of mc4wp.
	 * @param bool $echo Return or print the form html.
	 */
	function edulife_get_newsletter_form( $form_id = 0, $echo = true ) {

		if ( ! function_exists( 'mc4wp_show_form' ) ) {
			return;
		}

		ob_start();
		try {
			mc4wp_show_form( $form_id, array(), true );
		} catch ( Exception $e ) {
			echo '';
		}
		$form = ob_get_clean();

		if ( ' ' === $form || ! $form ) {
			return;
		}

		if ( ! $echo ) {
			return $form;
		}

		echo $form; // phpcs:ignore

	}
}


function edulife_social_link_lists( $echo = true ) {
	$social_links = edulife_social_links();

	ob_start();
	if ( is_array( $social_links ) && ! empty( $social_links ) ) {
		foreach ( $social_links as $social_link ) {
			$icon_class = "fab fa-{$social_link}";

			if ( 'linkedin' === $social_link ) {
				$icon_class = $icon_class . '-in';
			}

			if ( 'facebook' === $social_link ) {
				$icon_class = $icon_class . '-square';
			}

			$key  = "social_link_{$social_link}";
			$link = edulife_get_theme_mod( $key );

			if ( ! $link ) {
				continue;
			}
			?>
			<li class="menu-item" title="<?php echo esc_html( ucwords( $social_link ) ); ?>">
				<a href="<?php echo esc_url( $link ); ?>">
					<i class="<?php echo esc_attr( $icon_class ); ?>"></i>
				</a>
			</li>
			<?php
		}
	}
	$html = ob_get_clean();

	if ( ! $echo ) {
		return $html;
	}

	echo wp_kses_post( $html );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * TGMA plugins.
 */
require get_template_directory() . '/inc/tgm-plugin/tgmpa-hook.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/elementor/class-edulife-load-elementor-widgets.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
