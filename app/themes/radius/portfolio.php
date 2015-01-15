<?php
/*
Template Name: Portfolio
*/

get_header(); ?>
			<div class="container-wrap">
				<div class="container">
						<div class="filter-bar clearfix">
							<ul class="filter-list filter clearfix">
								<li class="reset active all-projects"><i class="fa fa-refresh"></i></li>
								<?php
							        $terms = get_terms( 'categories' );
							        $count = count( $terms );

							        if ( $count > 0 ) {
							        	$term_list = '';
							            foreach ( $terms as $term ) {
							                $term_list .= '<li class="cat-item '. esc_attr( $term->name ) .'"><a href="#" class="'. esc_attr( $term->name ) .'">' . esc_html( $term->name ) . '</a></li>';
							            }
							            echo $term_list;
							        }
								?>
							</ul>
						</div>

						<div class="portfolio-full clearfix">
							<div class="filter-posts">
								<?php
									$global_posts_query = new WP_Query(
										array(
											'posts_per_page' => 15,
											'paged'          => get_query_var( 'paged' ),
											'post_type'      => 'array-portfolio'
										)
									);

									if ( $global_posts_query->have_posts() ) : while( $global_posts_query->have_posts() ) : $global_posts_query->the_post();
								?>
						            <div class="project portfolio-item-wrap block-post" data-id="post-<?php the_ID(); ?>" <?php echo 'data-type="'. strip_tags( get_the_term_list( get_the_ID(), 'categories', '', ' ', '' ) ) .'"'; ?>>
					            		<div class="portfolio-item">
					            			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'portfolio-image' ); ?></a>
					            			<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
					            		</div>
						            </div>
						       	<?php endwhile; endif; ?>
							</div><!-- filter posts -->
						</div><!-- content -->

						<!-- post navigation -->
						<?php if ( $global_posts_query->max_num_pages > 1 ) { ?>
							<div class="portfolio-nav clearfix">
								<div class="portfolio-nav-right">
									<?php next_posts_link( __( 'Older Entries', 'radius' ) , $global_posts_query->max_num_pages) ?>
								</div>
								<div class="portfolio-nav-left">
									<?php previous_posts_link(__( 'Newer Entries', 'radius' ), $global_posts_query->max_num_pages) ?>
								</div>
							</div>
						<?php } ?>
				</div><!-- container -->
			</div><!-- container wrap -->

<?php get_footer(); ?>
