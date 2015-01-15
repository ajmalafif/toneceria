<?php

/* Homepage Portfolio Widget Class */

class radius_home_portfolio extends WP_Widget {

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
			'portfolio_section_title' => __( 'Latest Work', 'radius' ),
			'portfolio_section_text'  => '',
			'portfolio_item_count'    => 6,
			'blog_section_title'      => __( 'Recent Posts', 'radius' ),
			'blog_item_count'         => 2,
		);

		$widget_ops = array(
			'classname'   => 'homepage-portfolio',
			'description' => __( 'Display your Portfolio and Blog posts in a tabbed widget.', 'radius' ),
		);

		$control_ops = array(
			'id_base' => 'home-portfolio',
		);

		parent::__construct( 'home-portfolio', __( 'Radius Homepage Portfolio and Blog', 'radius' ), $widget_ops, $control_ops );
	}



	/**
	 * Display the widget content
	 *
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {

		extract( $args );

		$instance = wp_parse_args( (array) $instance, $this->defaults );

		// Portfolio section - forcing defaults fallback because no values = ugly presentation
		$portfolio_section_title = ( ! empty ( $instance['portfolio_section_title'] ) ? $instance['portfolio_section_title'] : $this->defaults['portfolio_section_title'] );
		$portfolio_section_text  = ( ! empty ( $instance['portfolio_section_text'] ) ? $instance['portfolio_section_text'] : $this->defaults['portfolio_section_text'] );
		$portfolio_item_count    = ( ! empty ( $instance['portfolio_item_count'] ) ? $instance['portfolio_item_count'] : $this->defaults['portfolio_item_count'] );

		// Blog section
		$blog_section_title = ( ! empty( $instance['blog_section_title'] ) ? $instance['blog_section_title'] : $this->defaults['blog_section_title'] );
		$blog_item_count    = ( ! empty( $instance['blog_item_count'] ) ? $instance['blog_item_count'] : $this->defaults['blog_item_count'] );

		echo $before_widget; ?>

		<div class="home-portfolio">
			<div class="home-portfolio-left">

				<ul class="tabs">
					<li>
						<a href="#" class="current">
							<?php echo $portfolio_section_title; ?>
						</a>
					</li>
					<li>
						<a href="#">
							<?php echo $blog_section_title; ?>
						</a>
					</li>
				</ul><!-- tabs -->

				<div class="panes">
					<div class="pane" style="display: block;">
						<?php echo $portfolio_section_text; ?>
					</div>

					<div class="pane" style="display: none; ">
						<ul class="recent-posts">
						<?php $widget_blog_posts = new WP_Query( array( 'posts_per_page' => $blog_item_count ) );

						if ( $widget_blog_posts->have_posts() ) : while ( $widget_blog_posts->have_posts() ) : $widget_blog_posts->the_post(); ?>
							<li class="recent-post">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

								<p class="recent-meta">
									<?php echo get_the_date(); ?>  -  <?php comments_popup_link( __( 'No Comments', 'radius' ), __( '1 Comment', 'radius' ), __( '% Comments', 'radius' ) ); ?>
								</p>
								<p>
									<?php echo radius_string_limit_words( get_the_excerpt(), 18 ); ?>...
								</p>
							</li>
						<?php endwhile; endif; ?>
						</ul>
					</div>
				</div>
			</div><!-- portfolio left -->

			<div class="home-portfolio-right">
				<div class="portfolio-full clearfix">
					<div class="filter-posts">
						<!-- Portfolio Items -->
						<?php

						$portfolio_list_args = array(
							'posts_per_page' => $portfolio_item_count,
							'post_type'      => 'array-portfolio'
						);
						$portfolio_list_posts = new WP_Query( $portfolio_list_args );

						while( $portfolio_list_posts->have_posts() ) : $portfolio_list_posts->the_post() ?>

							<div class="project portfolio-item-wrap block-post" data-id="post-<?php the_ID(); ?>" <?php echo 'data-type="'. strip_tags( get_the_term_list( get_the_ID(), 'categories', '', ' ', '' ) ) .'"'; ?>>
								<div class="portfolio-item">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'portfolio-image' ); ?></a>
									<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
								</div>
							</div>

						<?php endwhile; ?>
					</div><!-- filter posts -->
				</div><!-- content -->
			</div><!-- home portfolio right -->
		</div><!-- home portfolio -->

		<?php echo $after_widget;
	}


	/**
	 * Update the instance
	 *
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {

		// Update Portfolio settings
		$new_instance['portfolio_section_title'] = strip_tags( $new_instance['portfolio_section_title'] );
		$new_instance['portfolio_section_text']  = $new_instance['portfolio_section_text'];
		$new_instance['portfolio_item_count']    = strip_tags( $new_instance['portfolio_item_count'] );

		// Update Blog settings
		$new_instance['blog_section_title']      = strip_tags( $new_instance['blog_section_title'] );
		$new_instance['blog_item_count']         = strip_tags( $new_instance['blog_item_count'] );
		return $new_instance;
	}


	/**
	 * Display the widget settings form
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'portfolio_section_title' ); ?>"><?php _e( 'Portfolio Section Title:', 'radius' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'portfolio_section_title' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_section_title' ); ?>" type="text" value="<?php echo $instance['portfolio_section_title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'portfolio_section_text' ); ?>"><?php _e( 'Portfolio Section Text', 'radius' ); ?>:
			<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id( 'portfolio_section_text' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_section_text' ); ?>"><?php echo $instance['portfolio_section_text']; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'portfolio_item_count' ); ?>"><?php _e( 'Portfolio Item Count:', 'radius' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'portfolio_item_count' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_item_count' ); ?>" type="text" value="<?php echo $instance['portfolio_item_count']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'blog_section_title' ); ?>"><?php _e( 'Blog Section Title:', 'radius' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'blog_section_title' ); ?>" name="<?php echo $this->get_field_name( 'blog_section_title' ); ?>" type="text" value="<?php echo $instance['blog_section_title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'blog_item_count' ); ?>"><?php _e( 'Blog Item Count:', 'radius' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'blog_item_count' ); ?>" name="<?php echo $this->get_field_name( 'blog_item_count' ); ?>" type="text" value="<?php echo $instance['blog_item_count']; ?>" />
		</p>
		<?php
	}

}


/**
 * Registers the widget
 */
function radius_register_portfolio_blog_widget() {
	register_widget( 'radius_home_portfolio' );
}
add_action( 'widgets_init', 'radius_register_portfolio_blog_widget' );