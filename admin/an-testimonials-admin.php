<?php
/*
 * Administrative part
 * @link
 * @since 1.0
 *
 * @package an-testimonials
 * @subpackage an-testimonials/admin
*/

class An_Testimonials_Admin {

  private $plugin_name;
  private $version;

  public function __construct($plugin_name, $version) {
    $this->plugin_name = $plugin_name;
    $this->version     = $version;

    // if we need a menu
    add_action('admin_menu', array($this, 'admin_menu'));
  }

  public function enqueue_styles() {
    // TODO: include styles using wp_enqueue_style
  }

  public function enqueue_scripts() {
    // TODO: include styles using wp_enqueue_script
  }

  public function admin_menu() {
    // TODO:
    // use add_menu_page to add a new menu page
    // use add_submenu_page to add submenus
    // if pages requiere list and forms then
    // use add_action for list and form separately
  }

  public function screen_options() {
    // TODO
    // define $option and $args (array of default and option)
    // use add_screen_option($option, $args)
    // for list and form U may  need different screen options
  }

  public function menu_handler() {
    // TODO: describe, what to do if a menu item was choosen
    // use array($this, menu_handler) inside of add_submenu_page function
  }
}

?>
