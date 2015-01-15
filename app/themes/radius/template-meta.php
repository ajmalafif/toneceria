<?php
/**
 * Template part for displaying post meta
 *
 * @package Radius
 * @since 1.0
 */
 ?>
							<div class="blog-meta">
								<ul class="meta-links">
							    	<li><span class="meta-list"><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></span></li>
							    	<li><span class="meta-list"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></span></li>
							    	<li><span class="meta-list"><i class="fa fa-list"></i> <?php the_category( ', ' ) ?></span></li>
							    	<?php the_tags( '<li><span><i class="fa fa-tag"></i> ', ', ', '</span></li>' ); ?>
							    	<li><span class="meta-list"><i class="fa fa-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( __( 'No Comments', 'radius' ), __( '1 Comment', 'radius' ), __( '% Comments', 'radius' ) );?></a></span></li>
							    </ul>
								<div class="clear"></div>
								<ul class="post-share">
									<li class="share-title"><?php _e( 'Share', 'radius' ); ?></li>
									<li class="twitter">
										<a onclick="window.open('http://twitter.com/home?status=<?php the_title_attribute(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://twitter.com/home?status=<?php the_title_attribute(); ?> - <?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="blank"><?php _e( 'Twitter', 'radius' ); ?></a>
									</li>

									<li class="facebook">
										<a onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"  target="blank"><?php _e( 'Facebook', 'radius' ); ?></a>
									</li>

									<li class="googleplus">
										<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;"><?php _e( 'Google+', 'radius' ); ?></a>
									</li>
								</ul>
							</div><!-- blog meta -->
