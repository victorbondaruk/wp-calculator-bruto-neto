<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/salimserdar
 * @since      1.0.0
 *
 * @package    wp-wp-calculator-bruto-neto
 * @subpackage wp-wp-calculator-bruto-neto/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    wp-wp-calculator-bruto-neto
 * @subpackage wp-wp-calculator-bruto-neto/public
 * @author     Salim Serdar Koksal <salimserdar@gmail.com>
 */
class Wp_Calculator_Bruto_Neto_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	protected $shortcodeClass;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->wp_covid_19_include_display_template();
	}


	private function wp_covid_19_include_display_template()
	{
		/**
		 * Include the functions from diroctory for shortcodes registered in this class.
		 */
		require plugin_dir_path(__FILE__) . 'inc/class-wp-calculator-bruto-neto-shortcode-template.php';
		$this->shortcodeClass = new Wp_Calculator_Bruto_Neto_Shortcode_Template();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Calculator_Bruto_Neto_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Calculator_Bruto_Neto_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wp-calculator-bruto-neto-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Calculator_Bruto_Neto_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Calculator_Bruto_Neto_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script('chartjs', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js', array(), $this->version, true);
		wp_enqueue_script('wp-calculator-bruto-neto-public', plugin_dir_url(__FILE__) . 'js/wp-calculator-bruto-neto-public.js', array('jquery', 'chartjs'), $this->version, true);

	}

	/**
	 * Register the shortcodes.
	 *
	 * @since    1.0.0
	 */

	public function wp_calculator_bruto_neto_add_shortcode()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Calculator_Bruto_Neto_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Calculator_Bruto_Neto_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// add_shortcode('display_wp_calculator_bruto_neto', array('Wp_Calculator_Bruto_Neto_Shortcode_Template', 'wp_calculator_bruto_neto_display_shortcode'));
		// add_shortcode('display_wp_calculator_bruto_neto_global', array('Wp_Calculator_Bruto_Neto_Shortcode_Template', 'wp_calculator_bruto_neto_global_shortcode'));
		// add_shortcode('display_wp_calculator_bruto_neto_line_chart', array('Wp_Calculator_Bruto_Neto_Shortcode_Template', 'wp_calculator_bruto_neto_line_chart_shortcode'));

		add_shortcode('display_wp_calculator_bruto_neto', array($this->shortcodeClass, 'wp_calculator_bruto_neto_display_shortcode'));
		add_shortcode('display_wp_calculator_bruto_neto_global', array($this->shortcodeClass, 'wp_calculator_bruto_neto_global_shortcode'));
		add_shortcode('display_wp_calculator_bruto_neto_line_chart', array($this->shortcodeClass, 'wp_calculator_bruto_neto_line_chart_shortcode'));
	}
}
