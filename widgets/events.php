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
		
		echo $before_widget;
        echo  $before_title . 'Fora de Casa' . $after_title;
        
        $today = current_time('Ymd');

        
        $args = array(
            'post_type' => 'event',
            'post_status' => 'publish',
            'posts_per_page' => '5',
            'meta_query' => array(
                array(
                    'key' => 'event_end_date',
                    'compare' => '>=',
                    'value' => $today,
                )
            ),
            'meta_key' => 'event_end_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
        );


        $query = new WP_Query($args);

        if ($query->have_posts()) : ?>
        <ul>
        <?php 
            while ($query->have_posts()) : $query->the_post();
        ?>
        <li>
        <?php if(get_field('event_url')) : ?>
            <p class="event-title"><a href="#"><?php the_title(); ?></a></p>
        <?php else: ?>
            <p class="event-title"><?php the_title(); ?></p>
        <?php endif; ?>
        <?php if(get_field('event_start_date') == get_field('event_end_date')): ?>
            <p class="event-date"><?php the_field('event_start_date') ?><?php echo get_field('event_start_hour') ?  ' às ' . get_field('event_start_hour') : '' ?></p>
        <?php else: ?>
        <p class="event-date"><?php the_field('event_start_date'); ?> a <?php the_field('event_end_date'); ?></p>
        <?php endif; ?>
        <p class="event-location"><?php the_field('event_location'); ?></p>
        </li>

    
        <?php endwhile; ?>
        </ul>
        <?php else : ?>
        <p>Estamos á procura de eventos para si!</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

		<?php
        
        echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
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
		// processes widget options to be saved
	}
}
register_widget('amaedoandre_events');