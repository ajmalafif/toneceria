<?php
/*-----------------------------------------------------------------------------------*/
/* Text Column
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'load_ok_text_column_widget' );

function load_ok_text_column_widget() {
	register_widget( 'radius_text_column' );
}

class radius_text_column extends WP_Widget {

	function radius_text_column() {
		$widget_ops = array(
			'classname'   => 'ok-text-column',
			'description' => __( 'Radius Text Column Widget', 'radius' )
		);
		$control_ops = array(
			'width'   => 200,
			'height'  => 350,
			'id_base' => 'ok-text-column'
		);
		$this->WP_Widget( 'ok-text-column', __( 'Radius Text Column', 'radius' ), $widget_ops, $control_ops );
	}


	function widget( $args, $instance ) {

		extract( $args );
		$columntitle     = $instance['column_title'];
		$columntitlelink = $instance['column_title_link'];
		$columnicon      = $instance['column_icon'];
		$columncontent   = $instance['column_content'];
		echo $before_widget;
?>

			<div class="services">
				<?php if ( $columnicon ) { ?>
				<span class="service-icon">
					<i class="fa <?php echo $instance['column_icon']; ?>"></i>
				</span>
				<?php } ?>

				<h3><a href="<?php echo $instance['column_title_link']; ?>"><?php echo $instance['column_title']; ?></a></h3>

				<p><?php echo $instance['column_content']; ?></p>
			</div>

<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['column_title']      = $new_instance['column_title'];
		$instance['column_title_link'] = $new_instance['column_title_link'];
		$instance['column_icon']       = $new_instance['column_icon'];
		$instance['column_content']    = $new_instance['column_content'];

		return $instance;
	}


	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, array(
			'title'             => '',
			'column_title'      => '',
			'column_icon'       => '',
			'column_content'    => '',
			'column_title_link' => ''
			)
		);
		$instance['column_title']      = $instance['column_title'];
		$instance['column_title_link'] = $instance['column_title_link'];
		$instance['column_icon']       = $instance['column_icon'];
		$instance['column_content']    = $instance['column_content']; ?>

			<p>
				<label for="<?php echo $this->get_field_id( 'column_title' ); ?>"><?php _e( 'Column Title', 'radius' ); ?>
				<input class="widefat" id="<?php echo $this->get_field_id( 'column_title' ); ?>" name="<?php echo $this->get_field_name( 'column_title' ); ?>" type="text" value="<?php echo esc_attr( $instance['column_title'] ); ?>" /></label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'column_title_link' ); ?>"><?php _e( 'Column Title Link', 'radius' ); ?>
				<input class="widefat" id="<?php echo $this->get_field_id( 'column_title_link' ); ?>" name="<?php echo $this->get_field_name( 'column_title_link' ); ?>" type="text" value="<?php echo esc_attr( $instance['column_title_link'] ); ?>" /></label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'column_icon' ); ?>"><?php _e( 'Column Icon (Please visit http://fortawesome.github.io/Font-Awesome/ to pick an icon. Simply enter the name of the icon to use. For example: fa-user)', 'radius' ); ?>
				<input class="widefat" id="<?php echo $this->get_field_id( 'column_icon' ); ?>" name="<?php echo $this->get_field_name( 'column_icon' ); ?>" type="text" value="<?php echo esc_attr( $instance['column_icon'] ); ?>" /></label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'column_content' ); ?>"><?php _e( 'Column Content', 'radius' ); ?>:
				<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id( 'column_content' ); ?>" name="<?php echo $this->get_field_name( 'column_content' ); ?>"><?php echo $instance['column_content']; ?></textarea>
			</p>
	<?php
	}
}
