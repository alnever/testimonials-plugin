<?php
/*
 * Internationalization
 * @link
 * @since 1.0
 *
 * @package an-testimonials
 * @subpackage an-testimonials/includes
*/

class An_Testimonials_i18n {
	public function load_plugin_textdomain($textdomain) {
		load_plugin_textdomain(
			$textdomain,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
