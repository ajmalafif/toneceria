<?php

/**
 * Social Dash Widget Class
 */
class radius_social_dash extends WP_Widget {


	/**
	 * Holds settings defaults. Populated in __construct().
	 *
	 * @var array
	 */
	protected $defaults;



	/**
	 * Set default options and create widget.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		$this->defaults = array(
			'link_icon' => '',
			'link'      => '',
			'link_text' => '',
		);

		$widget_ops = array(
			'classname'   => 'widget_radius_social_dash',
			'description' => __( 'Show your social network links in a dropdown below the top menu.', 'radius' ),
		);

		$control_ops = array(
			'id_base' => 'social-dash',
		);

		parent::__construct( 'social-dash', __( 'Radius Social Dash Widget', 'radius' ), $widget_ops, $control_ops );
	}



	/**
	 * Displays the widget content
	 *
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {

		extract( $args );

		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$link_icon 	= $instance['link_icon'];
		$link       = $instance['link'];
		$link_text  = $instance['link_text'];

		echo $before_widget; ?>

		<div class="social-link">
			<a href="<?php echo esc_url( $instance['link'] ); ?>"><i class="<?php echo esc_attr( $instance['link_icon'] ); ?>"></i><?php echo esc_html( $instance['link_text'] ); ?></a>
		</div>

		<?php echo $after_widget;
	}


	/**
	 * Update the instance
	 *
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {

		$new_instance['link_icon'] = strip_tags( $new_instance['link_icon'] );
		$new_instance['link']      = strip_tags( $new_instance['link'] );
		$new_instance['link_text'] = strip_tags( $new_instance['link_text'] );

		return $new_instance;
	}


	/**
	 * Displays the widget settings form
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$link_icon = esc_attr( $instance['link_icon'] );
		$link      = esc_url( $instance['link'] );
		$link_text = esc_attr( $instance['link_text'] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'link_icon' ); ?>"><?php _e( 'Link Icon', 'radius' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'link_icon' ); ?>" name="<?php echo $this->get_field_name( 'link_icon' ); ?>" class="widefat" style="width:100%;">
				<option <?php selected( $link_icon, 'fa fa-dribbble' ); ?> value="fa fa-dribbble">Dribbble</option>
				<option <?php selected( $link_icon, 'fa fa-facebook-square' ); ?> value="fa fa-facebook-square">Facebook</option>
				<option <?php selected( $link_icon, 'fa fa-flickr' ); ?> value="fa fa-flickr">Flickr</option>
				<option <?php selected( $link_icon, 'fa fa-github-square' ); ?> value="fa fa-github-square">Github</option>
				<option <?php selected( $link_icon, 'fa fa-google-plus-square' ); ?> value="fa fa-google-plus-square">Google+</option>
				<option <?php selected( $link_icon, 'fa fa-instagram' ); ?> value="fa fa-instagram">Instagram</option>
				<option <?php selected( $link_icon, 'fa fa-linkedin-square' ); ?> value="fa fa-linkedin-square">LinkedIn</option>
				<option <?php selected( $link_icon, 'fa fa-pinterest-square' ); ?> value="fa fa-pinterest-square">Pinterest</option>
				<option <?php selected( $link_icon, 'fa fa-tumblr-square' ); ?> value="fa fa-tumblr-square">Tumblr</option>
				<option <?php selected( $link_icon, 'fa fa-twitter-square' ); ?> value="fa fa-twitter-square">Twitter</option>
				<option <?php selected( $link_icon, 'fa fa-youtube-square' ); ?> value="fa fa-youtube-square">YouTube</option>


			</select>
		</p>

		 <p>
		  <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link:', 'radius' ); ?></label>
		  <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo $link; ?>" />
		</p>

		<p>
		  <label for="<?php echo $this->get_field_id( 'link_text' ); ?>"><?php _e( 'Link Text:', 'radius' ); ?></label>
		  <input class="widefat" id="<?php echo $this->get_field_id( 'link_text' ); ?>" name="<?php echo $this->get_field_name( 'link_text' ); ?>" type="text" value="<?php echo $link_text; ?>" />
		</p>
		<?php
	}

} // class


/**
 * Registers the widget
 */
function radius_register_social_dash_widget() {
	register_widget( 'radius_social_dash' );
}
add_action( 'widgets_init', 'radius_register_social_dash_widget' );