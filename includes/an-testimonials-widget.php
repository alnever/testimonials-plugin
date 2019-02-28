<?php
/*
 * Widget for testimonials
 * Register a widget for testimonials
 * @link
 * @since 1.0
 *
 * @package an-testimonials
 * @subpackage an-testimonials/includes
*/

class An_Testimonials_Widget extends WP_Widget {

    private $plugin_name = 'an-testimonials';

    public function __construct() {

        $this->widget_options = array(
            'classname' => 'an_testimonials_widget',
            'description' => __('The widget to setup and display a testimonials block', $this->plugin_name),
        );

        parent::__construct('an_testimonials_widget', __('Testimonials', $this->plugin_name), $this->widget_options);
    }

    // register a widget - called on widgets_init hook
    public static function register() {
        register_widget(self::class);
    }

    // front-end presentation
    public function widget($args, $instance) {

        $query_options = array(
            'post_type' => $this->plugin_name,
            'posts_per_page' => 5, // TODO:: replace with an argument of the widget
        );
        $query = new WP_Query($query_options);

        echo $args['before_widget'];
        if ($query->have_posts()):
?>
        <div class="an-testimonials">
            <?php while ($query->have_posts()): $query->the_post(); ?>
                <div class="an-testimonials-testimonial">
                    <div class="an-testimonials-image">
                        <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('thumbnail');
                            }
                        ?>
                    </div>
                    <div class="an-testumonials-text">
                        <?php the_content(); ?>
                    </div>
                    <div class="an-testimonials-author">
                        <?php the_title(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
<?php
        endif;
        wp_reset_postdata();
        echo $args['after_widget'];
    }

    // options form
    public function form($instance) {

    }

    // update widgets parameters
    public function update($new_instance, $old_instance) {

    }


}

 ?>
