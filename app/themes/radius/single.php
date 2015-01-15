<?php
/**
 * The template for displaying all single posts.
 *
 * @package Radius
 * @since 1.0
 */
get_header(); ?>
		<div class="container-wrap">
			<div class="container">
				<div class="content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post clearfix' ); ?>>
						<?php
						// Image, gallery, video template part
						get_template_part( 'template-gallery' ); ?>

						<div class="blog-inside clearfix">
							<div class="blog-text">
								<div class="title-meta">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								</div>

								<div class="blog-entry">
									<div class="blog-content">
										<?php the_content( __( 'Read more &rarr;', 'radius' ) ); ?>
									</div>
									<?php wp_link_pages(); ?>
								</div><!-- blog entry -->
							</div><!-- blog text -->

							<!-- Grab meta template -->
							<?php get_template_part( 'template-meta' ); ?>
						</div><!-- blog inside -->
					</div><!-- blog post -->

					<?php
					endwhile;

					// Post navigation
					radius_page_nav();

					// Comments
					if ( 'open' == $post->comment_status ) {
						comments_template();
					}

				endif; ?>
				</div><!-- content -->

				<?php get_sidebar(); ?>
			</div><!-- container -->
		</div><!-- container wrap -->

<?php get_footer(); ?>
