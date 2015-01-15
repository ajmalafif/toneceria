<?php
/**
 * Displays archives for portfolio categories
 *
 * @package Radius
 * @since 1.0
 */
get_header(); ?>

			<div class="container-wrap">
				<div class="container">
					<div class="portfolio-title-bar">
						<?php _e( 'Category', 'radius' ); ?> / <?php single_cat_title(); ?></li>
					</div>

					<div class="portfolio-full clearfix">
						<div class="filter-posts">
							<!-- Portfolio Items -->
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					            <div class="project portfolio-item-wrap block-post" data-id="post-<?php the_ID(); ?>" <?php echo 'data-type="'. strip_tags( get_the_term_list( get_the_ID(), 'categories', '', ' ', '' ) ) .'"'; ?>>
				            		<div class="portfolio-item">
				            			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'portfolio-image' ); ?></a>
				            			<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				            		</div>
					            </div>

					        <?php endwhile; ?>
					    	<?php endif; ?>
						</div><!-- filter posts -->
					</div><!-- portfolio full -->

					<!-- post navigation -->
					<?php radius_page_nav(); ?>

				</div><!-- container -->
			</div><!-- container wrap -->
		<!-- footer -->
		<?php get_footer(); ?>
