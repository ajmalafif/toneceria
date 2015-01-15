<?php
/**
 * Displays single portfolio items.
 *
 * @package Radius
 * @since 1.0
 */
get_header();

				// Image, gallery, video template part
				get_template_part( 'template-gallery' ); ?>

				<div class="container-wrap">
					<div class="container content-portfolio">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<!-- portfolio content -->
						<div class="content">
							<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post clearfix' ); ?>>
								<div class="blog-inside clearfix">
									<div class="page-title page-title-portfolio">
										<h1><?php the_title(); ?></h1>
									</div>

									<div class="blog-entry">
										<div class="blog-content">
											<?php the_content(''); ?>
										</div><!-- blog content -->
									</div><!-- blog entry -->
								</div><!-- blog inside -->
							</div><!-- post -->
						</div><!-- content -->

						<!-- portfolio meta details -->
						<div class="portfolio-sidebar">
							<div class="portfolio-meta">
								<h3><?php _e( 'Project Details', 'radius' ); ?></h3>
								<ul class="portfolio-meta-links">
							    	<li><span><i class="fa fa-user"></i> <?php the_author_link(); ?></span></li>
							    	<li><span><i class="fa fa-calendar"></i> <?php echo get_the_date( 'm/d/Y' ); ?></span></li>
							    	<?php echo get_the_term_list( $post->ID, 'categories', '<li><i class="fa fa-list"></i> ', ', ', '</li>' ); ?>
							    </ul>
							</div><!-- portfolio meta -->

							<ul class="portfolio-sidebar-nav">
								<li><?php next_post_link( '%link', __( '<span>Next:</span> %title', 'radius' ) ) ?></li>
								<li><?php previous_post_link( '%link', __( '<span>Previous:</span> %title', 'radius' ) ) ?></li>
							</ul>
						</div><!-- sidebar -->

						<div class="clear"></div>

						<?php endwhile; ?>
						<?php endif; ?>
					</div><!-- container -->
				</div>

<?php get_footer(); ?>
