<?php
/*
Template Name: Homepage
*/

get_header();

			$slider_list_args = array(
				'posts_per_page' => 5,
				'post_type'      => 'array-slider'
			);
			$slider_list_posts = new WP_Query( $slider_list_args );

			if( $slider_list_posts->have_posts() ) : ?>
				<div id="header-slider" class="flexslider">
					<ul class="slides">
						<?php while( $slider_list_posts->have_posts() ) : $slider_list_posts->the_post() ?>
							<li class="showcase">
								<div class="showcase-image">
									<?php if ( get_post_meta( $post->ID, '_cmb_slide_link', true ) ) {
										$slidelink = get_post_meta( $post->ID, '_cmb_slide_link', true ); ?>
										<a href="<?php echo esc_url( $slidelink ); ?>"><?php the_post_thumbnail( 'full-size' ); ?></a>
									<?php } else {
										the_post_thumbnail( 'full-size' );
									} ?>
								</div>
							</li><!-- showcase -->
						<?php endwhile; ?>
					</ul>
				</div>
			<?php endif; ?>

			<div id="sections-wrap">
				<div id="sections" class="clearfix">

					<!-- Text Box Section -->
					<?php if ( is_active_sidebar( 'homepage-text-boxes' ) ) : ?>
						<div class="section-wrap clearfix">
							<div class="section top-section">
								<div class="section-widget-wrap">
									<?php dynamic_sidebar( 'homepage-text-boxes' ); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<!-- Text and Video Section -->
					<?php if ( is_active_sidebar( 'homepage-mid-left' ) || is_active_sidebar( 'homepage-mid-right' ) ) : ?>
						<div class="section-wrap clearfix">
							<div class="section mid-section">
								<div class="mid-left">
									<?php dynamic_sidebar( 'homepage-mid-left' ); ?>
								</div>

								<div class="mid-right">
									<?php dynamic_sidebar( 'homepage-mid-right' ); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<!-- Portfolio and Blog Section -->
					<?php if ( is_active_sidebar( 'homepage-portfolio-section' ) ) : ?>
						<div class="section-wrap clearfix">
							<div class="section bottom-section">
								<?php dynamic_sidebar( 'homepage-portfolio-section' ); ?>
							</div>
						</div>
					<?php endif; ?>
				</div><!-- sections -->
			</div><!-- sections wrap -->

<?php get_footer(); ?>