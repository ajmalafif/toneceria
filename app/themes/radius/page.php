<?php
/**
 * Template for displaying pages.
 *
 * @package Radius
 * @since 1.0
 */
get_header(); ?>

			<!-- Grab the featured image -->
			<?php if ( has_post_thumbnail() ) { ?>
				<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'radius' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail( 'large-image' ); ?></a>
			<?php } ?>

			<div class="container-wrap">
				<div class="container">
					<div class="content">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="blog-post clearfix">
								<div class="blog-inside">
									<div class="page-title">
										<h1><?php the_title(); ?></h1>
									</div>

									<?php the_content(); ?>
									<?php wp_link_pages(); ?>
								</div><!-- blog inside -->
							</div><!-- blog post -->
						<?php endwhile; ?>
						<?php endif; ?>
					</div><!-- content -->

					<?php get_sidebar(); ?>
				</div><!-- container -->
			</div><!-- container wrap -->

<?php get_footer(); ?>
