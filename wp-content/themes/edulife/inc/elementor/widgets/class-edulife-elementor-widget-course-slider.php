<?php
/**
 * Create elementor custom widget.
 *
 * @package edulife.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Plugin;

if ( ! class_exists( 'Edulife_Elementor_Widget_Course_Slider' ) ) {

	/**
	 * Create course slider widget.
	 */
	class Edulife_Elementor_Widget_Course_Slider extends \Elementor\Widget_Base {

		/**
		 * Get widget name.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'edulife_course_slider';
		}

		/**
		 * Get widget title.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return __( 'Edulife Course Slider', 'edulife' );
		}


		/**
		 * Get widget categories.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return array Widget categories.
		 */
		public function get_categories() {
			return array( 'edulife' );
		}

		/**
		 * Register oEmbed widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function _register_controls() {
			$this->section_header();
			$this->section_content();
		}

		/**
		 * Creates section heading.
		 */
		private function section_header() {

			$this->start_controls_section(
				'edulife_course_slider_section_header',
				array(
					'label' => __( 'Header', 'edulife' ),
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				)
			);

			$this->add_control(
				'edulife_course_slider_section_header_title',
				array(
					'label' => __( 'Title', 'edulife' ),
					'type'  => \Elementor\Controls_Manager::TEXT,
				)
			);

			$this->end_controls_section();

		}

		/**
		 * Creates section content.
		 */
		private function section_content() {

			$this->start_controls_section(
				'edulife_course_slider_section_content',
				array(
					'label' => __( 'Content', 'edulife' ),
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				)
			);

			if ( edulife_customizer_get_taxonomies() ) {
				$this->add_control(
					'edulife_course_slider_section_content_taxonomy',
					array(
						'label'   => __( 'Category Type', 'edulife' ),
						'type'    => \Elementor\Controls_Manager::SELECT2,
						'options' => edulife_customizer_get_taxonomies(),
					)
				);
			}

			$this->add_control(
				'edulife_course_slider_section_content_term_ld_course_category',
				array(
					'label'     => __( 'Courses Category', 'edulife' ),
					'type'      => \Elementor\Controls_Manager::SELECT2,
					'options'   => edulife_customizer_get_terms( 'ld_course_category' ),
					'condition' => array(
						'edulife_course_slider_section_content_taxonomy' => 'ld_course_category',
					),
				)
			);

			$this->add_control(
				'edulife_course_slider_section_content_term_category',
				array(
					'label'     => __( 'Posts Category', 'edulife' ),
					'type'      => \Elementor\Controls_Manager::SELECT2,
					'options'   => edulife_customizer_get_terms( 'category' ),
					'condition' => array(
						'edulife_course_slider_section_content_taxonomy' => 'category',
					),
				)
			);

			$this->add_control(
				'edulife_course_slider_section_content_total_posts',
				array(
					'label'       => __( 'Total Posts', 'edulife' ),
					'type'        => \Elementor\Controls_Manager::NUMBER,
					'description' => __( 'Enter the total number of posts you want to display. You can also set "0" to display it according to WordPress backend "Reading Settings" or set "-1" to display all available posts.', 'edulife' ),
					'min'         => -1,
					'default'     => -1,
				)
			);

			$this->end_controls_section();
		}

		/**
		 * Checks if elementor is in editor mode.
		 */
		private function is_editor_mode() {
			return Plugin::$instance->editor->is_edit_mode();
		}

		/**
		 * This section header.
		 */
		private function section_header_content() {
			$heading = $this->get_settings_for_display( 'edulife_course_slider_section_header_title' );
			if ( ! $heading ) {
				return;
			}
			?>
			<div class="section-heading">

				<?php if ( $heading ) { ?>
				<h2 class="section-title">
					<?php echo esc_html( $heading ); ?>
				</h2>
				<?php } ?>

			</div><!-- .section-heading -->
			<?php
		}

		/**
		 * This section loop content.
		 */
		private function section_loop_content( $tax ) {

			$category = get_the_terms( get_the_ID(), $tax );
			$cat_name = ! is_wp_error( $category ) && ! empty( $category[0]->name ) ? $category[0]->name : '';
			$cat_link = ! is_wp_error( $category ) && ! empty( $category[0] ) ? get_term_link( $category[0] ) : '';

			$course_price    = function_exists( 'learndash_get_course_price' ) ? learndash_get_course_price() : null;
			$currency_symbol = function_exists( 'learndash_30_get_currency_symbol' ) ? learndash_30_get_currency_symbol() : '';

			?>
			<div <?php post_class(); ?>>
				<div class="slider-content">
					<div class="content">
						<a href="<?php the_permalink(); ?>" class="img-container img-overlay-1">
							<?php the_post_thumbnail( 'full' ); ?>
						</a><!-- .img-container -->
						<figcaption class="trending-detail">

							<?php if ( $cat_name ) { ?>
							<div class="category">
								<a href="<?php echo esc_url( $cat_link ); ?>">
									<p><?php echo esc_html( $cat_name ); ?></p>
								</a>
							</div>
							<?php } ?>

							<?php
							the_title(
								'<a href="' . esc_url( get_the_permalink() ) . '"><h3 class="column-title">',
								'</h3></a>'
							);
							?>

							<div class="section-footer">

								<?php if ( $currency_symbol && ! empty( $course_price['type'] ) && 'paynow' === $course_price['type'] && ! empty( $course_price['price'] ) ) { ?>
									<div class="pricing">
										<div class="actual-price">
											<p><?php echo esc_html( "{$currency_symbol} {$course_price['price']}" ); ?></p>
										</div><!-- .actual-price -->
									</div><!-- pricing -->
								<?php } ?>

							</div><!-- .section-footer -->

						</figcaption><!-- .trending-detail -->
					</div><!-- .content -->
				</div><!-- .slider-content -->
			</div>
			<?php
		}

		/**
		 * Render the html to view.
		 */
		protected function render() {

			$tax         = $this->get_settings_for_display( 'edulife_course_slider_section_content_taxonomy' );
			$key         = "edulife_course_slider_section_content_term_{$tax}";
			$category    = $this->get_settings_for_display( $key );
			$total_posts = $this->get_settings_for_display( 'edulife_course_slider_section_content_total_posts' );

			$args = array(
				'post_type'      => 'ld_course_category' === $tax ? 'sfwd-courses' : 'post',
				'post_status'    => 'publish',
				'posts_per_page' => $total_posts,
			);

			if ( ! empty( $category ) ) {
				$args['tax_query'] = array( // phpcs:ignore
					array(
						'taxonomy' => $tax,
						'field'    => 'term_id',
						'terms'    => array( $category ),
					),
				);
			}

			$the_query = new WP_Query( $args );
			?>
				<!-- trending courses  -->
				<div id="trending-courses">
					<div class="wrapper">

						<?php $this->section_header_content(); ?>

						<?php if ( $the_query->have_posts() ) { ?>
						<div class="inner-section">
							<div class="inner-section__wrapper">
								<div class="multiple-slider">

									<?php
									// Loop me through.
									while ( $the_query->have_posts() ) {
										$the_query->the_post();
										$this->section_loop_content( $tax );
									}
									?>

								</div><!-- .trending-course-slider -->
							</div><!-- .inner-section__wrapper -->
						</div><!-- .inner-section -->
						<?php } ?>

					</div><!-- .wrapper -->
				</div><!-- #trending-courses -->
			<?php
			wp_reset_postdata();
			$this->custom_scripts();
		}

		/**
		 * Custom scripts for this section.
		 */
		public function custom_scripts() {
			if ( ! $this->is_editor_mode() ) {
				return;
			}
			?>
			<script>
				jQuery(function ($) {
					$('.multiple-slider').not('.slick-initialized').slick({
					dots: true,
					infinite: false,
					speed: 300,
					slidesToShow: 3,
					centerPadding: '40px',
					slidesToScroll: 1,
					responsive: [
						{
							breakpoint: 1024,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 2,
								infinite: true,
								dots: false
							}
						},
						{
							breakpoint: 700,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						},
						{
							breakpoint: 480,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}
					]
					});
				});
			</script>
			<?php
		}

	}
}

