<?php
/*
 * Post type for testimonials
 * Register custom post types for testimonials
 * @link
 * @since 1.0
 *
 * @package an-testimonials
 * @subpackage an-testimonials/includes
*/

class An_Testimonials_Post_Type {

    // plugin name used as a textdomain
    private $plugin_name;

    public function __construct($plugin_name) {
        $this->plugin_name = $plugin_name;
    }

    public function register_testimonials_post_type() {
        register_post_type($this->plugin_name, array(
                'labels' => array(
                    'name' => __('Testomonials',$this->plugin_name),
                    'singular_name' => __('Testomonial',$this->plugin_name),
                ),
                'public' => true,
                'has_archive' => true,
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'show_in_nav_menus' => false,
            )
        );

        add_post_type_support($this->plugin_name, array(
            'title', 'editor', 'revisions', 'page-attributes', 'thumbnail',
        ));
    }
}

 ?>
