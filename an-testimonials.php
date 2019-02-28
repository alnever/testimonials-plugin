<?php
/*
Plugin Name: Testimonials
Plugin Uri: https://github.com/alnever/testimonials
Description: The plugin provides functions to manage and display testimonials using a custom post type and a specific widget
Version: 1.0
Author: Alex Neverov
Author URI: http://alneverov.ru

Testimonials is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Testimonialsis distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Testimonials If not, see http://www.gnu.org/licenses/gpl.html.
*/

//
class An_Testimonials_Start {

  public function __construct() {
    // if the file is calles directly - abort
    if (!defined('WPINC')) {
      die;
    }

    register_activation_hook(__FILE__, array(self::class, 'activate_plugin'));
    register_deactivation_hook(__FILE__, array(self::class, 'deactivate_plugin'));
    register_uninstall_hook(__FILE__, array(self::class, 'uninstall_plugin'));
  }

  public static function activate_plugin() {
    require_once plugin_dir_path(__FILE__) . "includes/an-testimonials-activator.php";
    An_Testimonials_Activator::activate();
  }

  public static function dectivate_plugin() {
    require_once plugin_dir_path(__FILE__) . "includes/an-testimonials-deactivator.php";
    An_Testimonials_Deactivator::deactivate();
  }

  public static function uninstall_plugin() {
    require_once plugin_dir_path(__FILE__) . "includes/an-testimonials-uninstaller.php";
    An_Testimonials_Uninstaller::uninstall();
  }

  public function run() {
    require_once plugin_dir_path(__FILE__) . "includes/an-testimonials.php";
    $plugin = new An_Testimonials();
    $plugin->run();
  }
}

(new An_Testimonials_Start())->run();






?>
