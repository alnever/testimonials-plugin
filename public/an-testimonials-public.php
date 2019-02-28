<?php
/*
 * Public part
 * @link
 * @since 1.0
 *
 * @package an-testimonials
 * @subpackage an-testimonials/public
*/

class An_Testimonials_Public {

  private $plugin_name;
  private $version;

  public function __construct($plugin_name, $version) {
    $this->plugin_name = $plugin_name;
    $this->version     = $version;

    // we can add frontend shortcodes here
    // add_shortcode('shortcode-name', array($this, 'shortcode_name'));
  }


  public function enqueue_styles() {
    // TODO: include styles using wp_enqueue_style
  }

  public function enqueue_scripts() {
    // TODO: include styles using wp_enqueue_script

    // if we need ajax
    add_action('wp_head',array($this,'js_variables'));
  }

  // incude necessary information for Word-Press ajax
  function js_variables() {
    $variables = array (
        'ajax_url' => admin_url('admin-ajax.php'),
        'is_mobile' => wp_is_mobile()
        // Тут обычно какие-то другие переменные
    );
    echo(
        '<script type="text/javascript">window.wp_data = '.
        json_encode($variables).
        ';</script>'
    );
  }
}

?>
