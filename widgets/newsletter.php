<?php
class amaedoandre_newsletter extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_amaedoandre_newsletter',
			'description' => __('Displays the newsletter subscription form.', 'amaedoandre'),
		);
		parent::__construct( 'widget_amaedoandre_newsletter', __('Newsletter Subscription','amaedoandre'), $widget_ops );
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
        echo  $before_title . 'Subscreva a Newsletter' . $after_title;
		?>

		<p class="widget-description">Receba no seu email uma selecção com as melhores histórias</p>
		<!-- Begin Mailchimp Signup Form -->
		<div id="mc_embed_signup">
		<form action="https://amaedoandre.us19.list-manage.com/subscribe/post?u=af07deb8a8c17de9426641e49&amp;id=5aab34cc55" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<div id="mc_embed_signup_scroll">
			
		<div class="mc-field-group">
			<label for="mce-EMAIL" class="screen-reader-text">Email </label>
			<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="O seu email">
		</div>
			<div id="mce-responses" class="clear">
				<div class="response" id="mce-error-response" style="display:none"></div>
				<div class="response" id="mce-success-response" style="display:none"></div>
			</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_af07deb8a8c17de9426641e49_5aab34cc55" tabindex="-1" value=""></div>
			<div class="clear"><input type="submit" value="Subscrever" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
			</div>
		</form>
		</div>

		<!--End mc_embed_signup-->
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
register_widget('amaedoandre_newsletter');