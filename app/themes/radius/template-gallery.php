<?php
/**
 * Template part for displaying images, galleries, and videos
 *
 * @package Radius
 * @since 1.0
 */
 ?>
						<!-- Video -->
						<?php if ( get_post_meta( $post->ID, 'arrayvideo', true ) ) { ?>
							<div class="fitvid">
								<?php echo get_post_meta( $post->ID, 'arrayvideo', true ) ?>
							</div>
						<?php } else { ?>

							<!-- Gallery -->
							<?php if ( 'gallery' == get_post_format() && function_exists( 'array_gallery' ) ) { ?>
								<div class="array-gallery">
									<?php array_gallery(); ?>
								</div>
							<?php } else { ?>

								<!-- Featured image -->
								<?php if ( has_post_thumbnail() ) { ?>
									<div <?php if ( get_post_meta( $post->ID, 'gallery-size', true ) ) { ?>class="gallery-sized"<?php } ?>>
										<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'radius' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail( 'large-image' ); ?></a>
									</div>
								<?php } ?>

							<?php } ?>
						<?php } ?>
