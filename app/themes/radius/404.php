<?php
/**
 * Page not found template.
 *
 * @package Radius
 * @since 1.0
 */
get_header(); ?>
			<div class="container-wrap">
				<div class="container">
					<div class="content">
						<div class="blog-post clearfix">
							<div class="blog-inside">
								<div class="page-title">
									<h1><?php _e( '404 - Page Not Found', 'radius' ); ?></h1>
								</div>

								<p><?php _e( 'Sorry, but the page you are looking for has moved or no longer exists. Please use the search below, or the menu above to locate the missing page.', 'radius' ); ?></p>

								<?php get_search_form();?>
							</div><!-- blog inside -->
						</div><!-- blog post -->
					</div><!-- content -->
				</div><!-- container -->
			</div><!-- container wrap -->

<?php get_footer(); ?>
