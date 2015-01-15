<?php
/*
Template Name: Full-Width
*/

get_header(); ?>

				<div class="container-wrap clearfix">
					<div class="container">
						<div class="content content-full">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<div class="blog-post clearfix">
									<div class="blog-inside">
										<div class="page-title">
											<h1><?php the_title(); ?></h1>
										</div>

										<?php if ( has_post_thumbnail() ) { ?>
										<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'blog-image' ); ?></a>
										<?php } ?>

										<?php the_content(); ?>
									</div><!-- blog inside -->
								</div><!-- blog post -->
							<?php endwhile; ?>
							<?php endif; ?>
						</div><!-- content -->
					</div><!-- container -->
				</div><!-- container wrap -->

<?php get_footer(); ?>
