<?php
class amaedoandre_events extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_amaedoandre_events',
			'description' => __('Mostra a lista de eventos.', 'amaedoandre'),
		);
		parent::__construct( 'widget_amaedoandre_events', __('Eventos','amaedoandre'), $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
        // outputs the content of the widget
        if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
        extract($args); // Make before_widget, etc available.
        $widget_title = null;
        $number_of_events = null;
        $widget_title = esc_attr(apply_filters('widget_title', $instance['widget_title']));
        $number_of_events = esc_attr($instance['number_of_events']);
		
        echo $before_widget;
        if (!empty($widget_title)) {
			echo $before_title . $widget_title . $after_title;
		} else {
			echo  $before_title . 'Eventos' . $after_title;
		}
        
        ?>
        <?php if( have_rows('event', 'widget_' . $widget_id) ): ?>
            <?php 
                $today = strtotime(current_time('Ymd'));
                $dateformatstring = 'D, j M';
                $i = 1;
            ?>
            <ul>
            <?php while ( have_rows('event', 'widget_' . $widget_id) ) : the_row(); ?>
                <?php if ($i <= $number_of_events): ?>

                    <?php
                    $event_url = get_sub_field('event_url', 'widget_' . $widget_id);
                    $event_name = get_sub_field('event_name', 'widget_' . $widget_id);
                    $event_photo = get_sub_field('event_photo', 'widget_' . $widget_id);
                    $event_start_date = strtotime(get_sub_field('event_start_date', 'widget_' . $widget_id));
                    $event_start_date_formatted = date_i18n($dateformatstring, $event_start_date);
                    $event_end_date = strtotime(get_sub_field('event_end_date', 'widget_' . $widget_id));
                    $event_end_date_formatted = date_i18n($dateformatstring, $event_end_date);
                    $event_start_hour = get_sub_field('event_start_hour', 'widget_' . $widget_id);
                    $event_location = get_sub_field('event_location', 'widget_' . $widget_id);

                    ?>
                    <?php if ($event_end_date >= $today): ?>
                        <li>
                            <?php if( !empty($event_url) ): ?>
                            <a href="<?php echo $event_url; ?>" target="_blank" title="<?php echo $event_name; ?>">
                            <?php endif;?>

                            <div class="event-photo">
                            <?php echo wp_get_attachment_image( $event_photo, 'full' ); ?> 
                            </div>

                            <p class="event-title"><?php echo $event_name; ?></p>

                            <?php if( $event_start_date == $event_end_date ): ?>
                                <p class="event-meta"><?php echo amaedoandre_get_svg( array( 'icon' => 'calendar' )); ?> <?php echo $event_start_date_formatted; ?><?php echo $event_start_hour ?  ' às ' . $event_start_hour : '' ?></p>
                            <?php else: ?>
                                <p class="event-meta"><?php echo amaedoandre_get_svg( array( 'icon' => 'calendar' )); ?> <?php echo $event_start_date_formatted . ' a ' . $event_end_date_formatted; ?></p>
                            <?php endif; ?>
                            <p class="event-meta"><?php echo amaedoandre_get_svg( array( 'icon' => 'map-marker' )); ?> <?php echo $event_location; ?></p>

                            <?php if( !empty($event_url) ): ?>
                            </a>
                            <?php endif;?>
                        </li>
                    <?php endif;?>

                <?php endif;?>
                <?php $i++; ?>
            <?php endwhile; ?>
            </ul>
        <?php endif;


        echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// Set defaults
        if(!isset($instance["widget_title"])) { $instance["widget_title"] = ''; }
        if(!isset($instance["number_of_events"])) { $instance["number_of_events"] = '3'; }
		// Get the options into variables, escaping html characters on the way
        $widget_title = esc_attr($instance['widget_title']);
        $number_of_events = esc_attr($instance['number_of_events']);
		?>

		<p>
			<label for="<?php echo $this->get_field_id('widget_title'); ?>">Título:
			<input id="<?php echo $this->get_field_id('widget_title'); ?>" name="<?php echo $this->get_field_name('widget_title'); ?>" type="text" class="widefat" value="<?php echo esc_attr($widget_title); ?>" /></label>
        </p>
        
        <p>
			<label for="<?php echo $this->get_field_id('number_of_events'); ?>">Número de eventos a mostrar:
			<input id="<?php echo $this->get_field_id('number_of_events'); ?>" name="<?php echo $this->get_field_name('number_of_events'); ?>" type="text" class="widefat" value="<?php echo esc_attr($number_of_events); ?>" /></label>
			<small>(Mostra 3 eventos por defeito)</small>
		</p>

		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['widget_title'] = strip_tags( $new_instance['widget_title'] );
        $instance['number_of_events'] = is_int( intval( $new_instance['number_of_events'] ) ) ? intval( $new_instance['number_of_events']): 3;
		//update and save the widget
		return $instance;
	}
}
register_widget('amaedoandre_events');