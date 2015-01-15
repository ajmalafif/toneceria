<?php
/**
 *
 * Displays all of the <head> section and everything through <div class="social-dash">
 *
 * @package Radius
 * @since 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/includes/ie/ie.css" />
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class('desktop'); ?>>
	<!--Main Wrapper -->
	<div class="main-wrapper">
		<div class="header-wrapper clearfix">
			<div class="header-texture clearfix">
				<div class="header">
					<div class="header-left">
					<?php if ( get_theme_mod('radius_theme_customizer_logo') ) { ?>
					    <h1 class="logo-image">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo" src="<?php echo esc_url( get_theme_mod( 'radius_theme_customizer_logo' ) ); ?>" alt="<?php the_title_attribute(); ?>" /></a>
						</h1>
					<?php } else { ?>
						<h1 class="logo-text">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?></a>
						</h1>
					    <?php } ?>
					</div>

					<!-- Header Toggles -->
					<div class="header-toggles">
						<a class="mobile-toggle menu-toggle" href="#"><i class="fa fa-bars"></i></a>

						<!-- Show Toggle If Widgets Active -->
						<?php if ( is_active_sidebar( 'social-dashboard-links' ) ) : ?>
							<a class="mobile-toggle dash-toggle" href="#"><i class="fa fa-user"></i></a>
						<?php endif; ?>
					</div>

					<!-- Menu -->
					<div class="header-right">
						<div class="nav-top">
							<?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_id' => 'nav', 'menu_class' => 'nav-menu' ) ); ?>
						</div>

						<!-- Show Toggle If Widgets Active -->
						<?php if ( is_active_sidebar( 'social-dashboard-links' ) ) : ?>
							<li class="nav-dash-toggle"><a class="dash-toggle" href="#"><i class="fa fa-external-link"></i></a></li>
						<?php endif; ?>
					</div>
				</div><!-- header -->
			</div><!-- header texture -->
		</div><!-- header wrapper -->

		<div class="social-dash">
			<div class="social-dash-inside clearfix">
				<?php dynamic_sidebar( 'social-dashboard-links' ); ?>
			</div>
		</div><!-- social dash -->

		<div class="clear"></div>