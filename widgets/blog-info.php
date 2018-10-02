<?php
class amaedoandre_blog_info extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_amaedoandre_blog_info',
			'description' => __('Displays the blog info.', 'amaedoandre'),
		);
		parent::__construct( 'widget_amaedoandre_blog_info', __('Blog Info','amaedoandre'), $widget_ops );
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
        echo $args['before_widget'];
        
        $image = get_field('blog_info_photo', 'widget_' . $args['widget_id']);
        $size = 'thumbnail';
        echo wp_get_attachment_image( $image, $size, false, array( "class" => "photo" ) );
        
        echo '<h2 class="widget-title">'. get_field('blog_info_title', 'widget_' . $args['widget_id']) . '</h2>';
        echo '<p class="text">' . get_field('blog_info_text', 'widget_' . $args['widget_id']) . '</p>';
        

        if( has_nav_menu( 'social' ) ) { ?>
			<nav class="social-menu">
				<?php
					wp_nav_menu( array(
						'theme_location'    => 'social',
						'menu_class'        => 'social-links-menu',
						'depth'             => 1,
						'link_before'       => '<span class="screen-reader-text">',
                        'link_after'        => '</span>' . amaedoandre_get_svg( array( 'icon' => 'chain' ) ),
                        'container'         => false
					) );
				?>
			</nav><!-- .social-menu -->
        <?php }
        
        echo $args['after_widget'];
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
register_widget('amaedoandre_blog_info');