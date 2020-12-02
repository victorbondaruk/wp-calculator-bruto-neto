<?php

class Wp_Calculator_Bruto_Neto_i18n {
	
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-calculator-bruto-neto',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
