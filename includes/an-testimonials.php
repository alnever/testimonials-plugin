<?php
/*
 * Defines plugin's core
 * @link
 * @since 1.0
 *
 * @package an-testimonials
 * @subpackage an-testimonials/includes
*/

class An_Testimonials {

  // For maintaining and registering all hooks
  protected $loader;

  // Plugin unique identifier
  protected $plugin_name;

  // Plugin version
  protected $version;

  // Constructor
  public function __construct() {
      $this->plugin_name = 'an-testimonials'; // Should be replaced
      $this->version     = '1.0';

      $this->load_dependencies();
      $this->set_locale();
      $this->register_custom_post_type();
      $this->register_widget();
      $this->define_admin_hooks();
      $this->define_public_hooks();
  }

  // Load necessary files/dependensies and create plugin Loader
  private function load_dependencies() {
    require_once plugin_dir_path(dirname(__FILE__)) . 'includes/an-testimonials-loader.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'includes/an-testimonials-i18n.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'includes/an-testimonials-post-type.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'includes/an-testimonials-widget.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'admin/an-testimonials-admin.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'public/an-testimonials-public.php';

    $this->loader = new An_Testimonials_Loader();
  }

  // Define default locale of the plugin
  private function set_locale() {
    $plugin_i18n = new An_Testimonials_i18n($this->plugin_name);
    $this->loader->add_action('plugin_loaded', $plugin_i18n, 'load_plugin_textdomain');
  }

  // Define handler of the hooks, which are first on the admin page
  private function define_admin_hooks() {
    $plugin_admin = new An_Testimonials_Admin($this->plugin_name, $this->version);
    $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
    $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
  }

  // Define handler of the hooks, which are first on the front page
  private function define_public_hooks() {
    $plugin_public = new An_Testimonials_Public($this->plugin_name, $this->version);
    $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
    $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
  }

  // Register custom post type
  private function register_custom_post_type() {
      $plugin_post_type = new An_Testimonials_Post_Type($this->plugin_name);
      $this->loader->add_action('init', $plugin_post_type, 'register_testimonials_post_type');
  }

  // Register widget
  private function register_widget() {
      $this->loader->add_action('widgets_init', An_Testimonials_Widget::class, 'register');
  }

  public function run() {
    $this->loader->run();
  }

  public function get_loader() {
    return $this->loader;
  }

  public function get_plugin_name() {
    return $this->plugin_name;
  }

  public function get_version() {
    return $this->version;
  }
}

?>
