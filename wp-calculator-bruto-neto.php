<?php
/**
 * WordPress CALCULATOR BRUTO NETO
 *
 * WordPress plugin to calculate Net salary from Gross.
 * Plugin de WordPress para calcular el salario neto a partir del bruto.
 *
 * @link              https://github.com/victorbondaruk/wp-calculator-bruto-neto
 * @since             1.0.0
 * @version           1.0.0
 * @package           wp-calculator-bruto-neto
 *
 * @wordpress-plugin
 * Plugin Name:       wp-calculator-bruto-neto
 * Plugin URI:        https://github.com/victorbondaruk/wp-calculator-bruto-neto
 * Description:       WordPress plugin to calculate Net salary from Gross.
 * Version:           1.0.0
 * Author:            Victor Bondaruk
 * Author URI:        https://github.com/victorbondaruk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-calculator-bruto-neto
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'WP_CALCULATOR_BRUTO_NETO_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-calculator-bruto-neto-activator.php
 */
function activate_wp_calculator_bruto_neto() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-calculator-bruto-neto-activator.php';
	wp_calculator_bruto_neto_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-calculator-bruto-neto-deactivator.php
 */
function deactivate_wp_calculator_bruto_neto() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-calculator-bruto-neto-deactivator.php';
	wp_calculator_bruto_neto_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_calculator_bruto_neto' );
register_deactivation_hook( __FILE__, 'deactivate_wp_calculator_bruto_neto' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-calculator-bruto-neto.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_calculator_bruto_neto() {

	$plugin = new wp_calculator_bruto_neto();
	$plugin->run();

}
run_wp_calculator_bruto_neto();
