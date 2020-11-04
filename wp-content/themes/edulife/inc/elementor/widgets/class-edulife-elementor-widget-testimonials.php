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


if ( ! class_exists( 'Edulife_Elementor_Widget_Testimonials' ) ) {

	/**
	 * Create slider one widget.
	 */
	class Edulife_Elementor_Widget_Testimonials extends \Elementor\Widget_Base {




		/**
		 * Get widget name.
		 *
		 * Retrieve oEmbed widget name.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'edulife_testimonials';
		}


		/**
		 * Get widget title.
		 *
		 * Retrieve oEmbed widget title.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return __( 'Edulife Testimonials', 'edulife' );
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
				'edulife_testimonials_section_header',
				array(
					'label' => __( 'Header', 'edulife' ),
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				)
			);

			$this->add_control(
				'edulife_testimonials_section_header_title',
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
				'edulife_testimonials_section_content',
				array(
					'label' => __( 'Content', 'edulife' ),
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				)
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'reviewer_name',
				array(
					'label'       => __( 'Reviewer Name', 'edulife' ),
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				)
			);

			$repeater->add_control(
				'reviewer_position',
				array(
					'label'       => __( 'Reviewer Position', 'edulife' ),
					'type'        => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
				)
			);

			$repeater->add_control(
				'reviewe',
				array(
					'label'       => __( 'Review', 'edulife' ),
					'type'        => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
				)
			);

			$repeater->add_control(
				'reviewer_rating',
				array(
					'label'       => __( 'Rating', 'edulife' ),
					'type'        => \Elementor\Controls_Manager::SELECT2,
					'options'     => array(
						'1' => __( 'One Star', 'edulife' ),
						'2' => __( 'Two Stars', 'edulife' ),
						'3' => __( 'Three Stars', 'edulife' ),
						'4' => __( 'Four Stars', 'edulife' ),
						'5' => __( 'Five Stars', 'edulife' ),
					),
					'label_block' => true,
				)
			);

			$repeater->add_control(
				'reviewer_image',
				array(
					'label'       => __( 'Reviewer Image', 'edulife' ),
					'type'        => \Elementor\Controls_Manager::MEDIA,
					'label_block' => true,
				)
			);

			$this->add_control(
				'edulife_testimonials_section_content_testimonials',
				array(
					'label'       => __( 'Testimonials', 'edulife' ),
					'type'        => \Elementor\Controls_Manager::REPEATER,
					'fields'      => $repeater->get_controls(),
					'default'     => array(),
					'title_field' => '{{{ reviewer_name }}}',
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
			$heading = $this->get_settings_for_display( 'edulife_testimonials_section_header_title' );
			if ( ! $heading ) {
				return;
			}
			?>
			<div class="section-heading">
				<h2 class="section-title"><?php echo esc_html( $heading ); ?></h2>
			</div>
			<?php
		}


		/**
		 * Render the html to view.
		 */
		protected function render() {
			$testimonials = $this->get_settings_for_display( 'edulife_testimonials_section_content_testimonials' );

			?>

			<div id="testimonial">
				<div class="wrapper">

					<?php $this->section_header_content(); ?>

					<div class="testimonial-slider ">
						<?php
						if ( is_array( $testimonials ) && ! empty( $testimonials ) ) {
							foreach ( $testimonials as $testimonial ) {

								$rate    = ! empty( $testimonial['reviewer_rating'] ) ? $testimonial['reviewer_rating'] : 0;
								$ratings = $rate ? ( $testimonial['reviewer_rating'] / 5 ) * 100 : 0;
								?>
								<div>
									<div class="content">
										<div class="content-wrapper">
											<div class="user-detail">
												<?php if ( ! empty( $testimonial['reviewer_image']['url'] ) ) { ?>
													<div class="user-image">
														<img src="<?php echo esc_url( $testimonial['reviewer_image']['url'] ); ?>">
													</div>
												<?php } ?>
												<div class="detail">
													<?php
													if ( ! empty( $testimonial['reviewer_name'] ) ) {
														?>
														<a href=""><h4 class='user-name'><?php echo esc_html( $testimonial['reviewer_name'] ); ?></h4></a>
														<?php
													}

													if ( $testimonial['reviewer_position'] ) {
														echo wp_kses_post( wpautop( $testimonial['reviewer_position'] ) );
													}
													?>
												</div>
											</div>

											<?php
											if ( $testimonial['reviewe'] ) {
												echo '<div class="saying">' . wp_kses_post( wpautop( $testimonial['reviewe'] ) ) . '</div>';
											}

											if ( $ratings ) {
												?>
												<div class="star-rating">
													<div class="rating">
														<a tabindex="0">
															<span style="width:<?php echo esc_attr( $ratings ); ?>%">
															</span>
														</a>
													</div>
												</div><!-- .star-rating -->
												<?php
											}
											?>

										</div>
									</div><!-- .content -->
								</div>
								<?php
							}
						}
						?>

					</div>
				</div>
			</div>

			<?php
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
				jQuery(function($) {
					$('.testimonial-slider').not('.slick-initialized').slick({
						dots: true,
						infinite: false,
						speed: 300,
						slidesToShow: 3,
						centerPadding: '40px',
						slidesToScroll: 3,
						responsive: [{
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
							// You can unslick at a given breakpoint now by adding:
							// settings: "unslick"
							// instead of a settings object
						]
					});

				});
			</script>
			<?php
		}
	}
}
