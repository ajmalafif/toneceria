<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Radius
 * @since 1.0
 */
get_header(); ?>
		<div class="container-wrap">
			<div class="container">
				<div class="content">
					<div class="archive-title">
					<?php if( ! is_home() ) : ?>
						<h1>
						<?php
						if( is_search() ) {
							printf( __( 'Search Results for: %s', 'radius' ), '<span>' . get_search_query() . '</span>' );

						} else if( is_tag() ) {
							_e( 'Tag', 'radius' ); ?>: <?php single_tag_title();

						} else if( is_day() ) {
							_e( 'Archive', 'radius' ); ?>: <?php echo get_the_date();

						} else if( is_month() ) {
							_e( 'Archive', 'radius' ); ?>: <?php echo get_the_date( 'F Y' );

						} else if( is_year() ) {
							_e( 'Archive', 'radius' ); ?>: <?php echo get_the_date( 'Y' );

						} else if( is_404() ) {
							_e( '404 - Page Not Found', 'radius' );

						} else if( is_category() ) {
							_e( 'Category', 'radius' ); ?>: <?php single_cat_title();

						} else if( is_author() ) {
							printf( __( 'Author: %s', 'radius' ), '' . get_the_author() . '' );

						} ?>
						</h1>
					<?php endif; ?>
					</div>

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class('blog-post clearfix'); ?>>
						<!-- Grab image, gallery, video template part -->
						<?php get_template_part( 'template-gallery' ); ?>

						<div class="blog-inside clearfix">
							<div class="blog-text">
								<div class="title-meta">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								</div>

								<div class="blog-entry">
									<div class="blog-content">
										<?php if( is_search() || is_archive() ) { ?>
											<div class="excerpt-more">
												<?php the_excerpt(__( 'Read More', 'radius' ) ); ?>
											</div>
										<?php } else { ?>

										<?php the_content( __( 'Read more...', 'radius' ) ); ?>

										<?php } ?>
									</div>
									<?php wp_link_pages(); ?>
								</div><!-- blog entry -->
							</div><!-- blog text -->

							<!-- Grab meta template part -->
							<?php get_template_part( 'template-meta' ); ?>
						</div><!-- blog inside -->
						<div class="clear"></div>
					</div><!-- blog post -->

					<?php endwhile; ?>

					<!-- Post Navigation -->
					<?php radius_page_nav(); ?>

					<?php endif; ?>
				</div><!-- content -->

				<?php get_sidebar(); ?>
		</div><!-- container -->
	</div><!-- container wrap -->

<?php get_footer(); ?>
