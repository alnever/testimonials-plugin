<?php
/*
 * Loader of the plugin
 * registers filters and actions, defined within the plugin
 * @link
 * @since 1.0
 *
 * @package an-testimonials
 * @subpackage an-testimonials/includes
*/

class An_Testimonials_Loader {
  protected $actions;
  protected $filters;

  public function __construct() {
    $this->actions = array();
    $this->filters = array();
  }

  private function add($hooks, $hook, $component, $callback, $priority, $args) {
    $hooks[] = array (
      'hook' => $hook,
      'component'     => $component,
      'callback'      => $callback,
      'priority'      => $priority,
      'accepted_args' => $args
    );

    return $hooks;
  }

  public function add_action($hook, $component, $callback, $priority = 10, $args = 1) {
    $this->actions = $this->add($this->actions, $hook, $component, $callback, $priority, $args);
  }

  public function add_filter($hook, $component, $callback, $priority = 10, $args = 1) {
    $this->filters = $this->add($this->filters, $hook, $component, $callback, $priority, $args);
  }

  public function run() {
		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}
		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}
  }
}
