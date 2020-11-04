<?php
/**
 * Loads the elementor files.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'Edulife_Load_Elementor_Widgets' ) ) {

	/**
	 * Configure and loads the custom widgets.
	 */
	final class Edulife_Load_Elementor_Widgets {

		/**
		 * Path to the elementor directory.
		 *
		 * @var $elementor_dir;
		 */
		private $elementor_dir = '';

		/**
		 * Init class.
		 */
		public function __construct() {
			$this->elementor_dir = get_template_directory() . '/inc/elementor';
			add_action( 'elementor/elements/categories_registered', array( $this, 'add_custom_categories' ), 8 );
			add_action( 'elementor/widgets/widgets_registered', array( $this, 'load_widgets' ) );
		}


		/**
		 * Creates custom categories for elementor panel.
		 */
		public function add_custom_categories( $elements_manager ) {

			$elements_manager->add_category(
				'edulife',
				array(
					'title' => __( 'Edulife Theme', 'edulife' ),
					'icon'  => 'fa fa-plug',
				)
			);

		}


		/**
		 * Loads the widgets by hooking it to elementor.
		 */
		public function load_widgets() {
			$this->load_files();
			$this->register_widget_type();
		}

		/**
		 * Returns the array of the widget files name.
		 */
		private function get_filenames() {
			return array(
				'class-edulife-elementor-widget-course-slider.php',
				'class-edulife-elementor-widget-testimonials.php',
			);
		}

		/**
		 * Converts the provided filename into respective class name.
		 */
		private function filename_to_class( $filename ) {
			$filename = str_replace( array( 'class-', '.php' ), '', $filename );
			$filename = str_replace( '-', '_', $filename );
			$filename = ucwords( $filename );
			$filename = str_replace( ' ', '_', $filename );
			return $filename;
		}

		/**
		 * Returns the path of widget file.
		 */
		private function get_filepaths() {
			$paths      = array();
			$widget_dir = $this->elementor_dir . '/widgets';
			$filenames  = $this->get_filenames();

			if ( is_array( $filenames ) && ! empty( $filenames ) ) {
				foreach ( $filenames as $index => $filename ) {
					$paths[ $index ] = "{$widget_dir}/{$filename}";
				}
			}

			return $paths;
		}

		/**
		 * Loads the widget files.
		 */
		public function load_files() {
			$paths = $this->get_filepaths();

			if ( is_array( $paths ) && ! empty( $paths ) ) {
				foreach ( $paths as $file ) {
					require_once $file;
				}
			}
		}

		/**
		 * Register widget type in elementor hook.
		 */
		public function register_widget_type() {
			$filenames = $this->get_filenames();

			if ( is_array( $filenames ) && ! empty( $filenames ) ) {
				foreach ( $filenames as $filename ) {
					$classname = $this->filename_to_class( $filename );
					\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new $classname() );
				}
			}
		}
	}

	new Edulife_Load_Elementor_Widgets();
}


