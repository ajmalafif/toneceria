<?php
/**
 * Radius functions
 *
 * @package Radius
 * @since Radius 1.0
 */

/* Set the content width */
if ( ! isset( $content_width ) )
	$content_width = 760; /* pixels */


if ( ! function_exists( 'radius_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 * @since Radius 1.0
 */
function radius_setup() {

	if ( is_admin() ) {

		/* Load Getting Started page and initialize EDD update class */
		require( get_template_directory() . '/includes/admin/getting-started/getting-started.php' );

		/* Load custom metabox */
		require( get_template_directory() . '/includes/admin/metabox/metabox.php' );

		/* Add extra post styles */
		require( get_template_directory() . '/includes/editor/add-styles.php' );
		add_editor_style();

	}

	/* Add Customizer settings */
	require( get_template_directory() . '/customizer.php' );

	/* Load widgets */
	require( get_template_directory() . '/includes/widgets/text-column.php' );
	require( get_template_directory() . '/includes/widgets/social-dash.php' );
	require( get_template_directory() . '/includes/widgets/homepage-portfolio.php' );

	/* Add default posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );


	/* Enable support for Post Thumbnails */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // Default Thumb
	add_image_size( 'portfolio-image', 600, 600, true ); // Portfolio page thumb
	add_image_size( 'large-image', 9999, 9999, false ); // Full width image

	/* Enable portfolio, gallery, slider and metabox */
	add_theme_support( 'array_themes_portfolio_support' );
	add_theme_support( 'array_themes_slider_support' );
	add_theme_support( 'array_themes_gallery_support' );
	add_theme_support( 'array_themes_metabox_support' );

	add_theme_support( 'post-formats', array( 'gallery' ) );

	/* Custom Background Support */
	add_theme_support( 'custom-background' );

	/* Register Menu */
	register_nav_menus( array(
		'header' => __( 'Header Menu', 'radius' ),
		'footer' => __( 'Footer Menu', 'radius' ),
		'custom' => __( 'Custom Menu', 'radius' )
	) );

	/* Make theme available for translation */
	load_theme_textdomain( 'radius', get_template_directory() . '/languages' );

}
endif; // radius_setup
add_action( 'after_setup_theme', 'radius_setup' );


/* Enqueue Scripts and Styles */
function radius_scripts_styles() {

	$version = wp_get_theme()->Version;

	//Custom JS
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/includes/js/custom/custom.js', array( 'jquery' ), $version, true );

	//Flex
	wp_enqueue_script( 'flex-js', get_template_directory_uri() . '/includes/js/flex/jquery.flexslider.js', array( 'jquery' ), $version, true );

	//Tabs
	wp_enqueue_script( 'tabs-js', get_template_directory_uri() . '/includes/js/tabs/jquery.tabs.min.js', array( 'jquery' ), $version, true );

	//Fitvid
	wp_enqueue_script( 'fitvid-js', get_template_directory_uri() . '/includes/js/fitvid/jquery.fitvids.js', array( 'jquery' ), $version, true );

	//Quicksand Easing
	wp_enqueue_script( 'easing-js', get_template_directory_uri() . '/includes/js/quicksand/jquery.easing.1.3.js', array( 'jquery' ), $version, true );

	//Quicksand Script
	wp_enqueue_script( 'quicksand-js', get_template_directory_uri() . '/includes/js/quicksand/quicksand.js', array( 'jquery' ), $version, true );

	//Quicksand Call
	wp_enqueue_script( 'quicksand-call-js', get_template_directory_uri() . '/includes/js/quicksand/script.js', array( 'jquery' ), $version, true );

	//View.js
	wp_enqueue_script( 'view-js', get_template_directory_uri() . '/includes/js/view/view.min.js?auto', array( 'jquery' ), $version, true );

	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//-------  // Add Stylesheets & Fonts //------//

	//Main Stylesheet
	wp_enqueue_style( 'radius-style', get_stylesheet_uri(), array(), $version );

	//Media Queries CSS
	wp_enqueue_style( 'media-queries-css', get_template_directory_uri() . "/media-queries.css", array( 'radius-style' ), $version, 'screen' );

	//Add Flexslider CSS
	wp_enqueue_style( 'flex-slider-css', get_template_directory_uri() . '/includes/js/flex/flexslider.css', array(), $version, 'screen' );

	//Font Awesome CSS
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . "/includes/fonts/fontawesome/font-awesome.min.css", array(), $version, 'screen' );

	//Google Roboto Font
	wp_enqueue_style( 'google-roboto', radius_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'radius_scripts_styles' );


/* Add Customizer CSS To Header */
function radius_customizer_css() {
	?>
	<style type="text/css">
		a {
			color: <?php echo get_theme_mod( 'radius_theme_customizer_link', '#F5461E' ); ?>;
		}

		.desktop #nav > .current-menu-item, .desktop #nav > li:hover, .dash-active {
			background: <?php echo get_theme_mod( 'radius_theme_customizer_accent', '#f16e4f' ); ?>;
		}

		<?php echo get_theme_mod( 'radius_theme_customizer_css', '' ); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'radius_customizer_css' );


/* Deprecated page navigation */
function radius_page_has_nav() {

	_deprecated_function( __FUNCTION__, '4.0', 'radius_page_nav()' );
	return false;
}


/**
 * Displays post pagination links
 *
 * @since 4.0
 */
function radius_page_nav() {
	// Return early if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	} ?>

	<div class="portfolio-nav clearfix">
	<?php if( get_next_posts_link() ) : ?>
		<div class="portfolio-nav-left"><?php next_posts_link( __( 'Older Posts', 'radius' ) ) ?></div>
	<?php endif; ?>

	<?php if( get_previous_posts_link() ) : ?>
		<div class="portfolio-nav-right"><?php previous_posts_link( __( 'Newer Posts', 'radius' ) ) ?></div>
	<?php endif; ?>
	</div>
	<?php
}


/* Custom Excerpt Length */
function radius_string_limit_words( $string, $word_limit ) {

  $words = explode( ' ', $string, ( $word_limit + 1 ) );
  if( count( $words ) > $word_limit ) {
	array_pop( $words );
  }
  return implode( ' ', $words );
}

function featured_image_in_feed( $content ) {
    global $post;
    if( is_feed() ) {
        if ( has_post_thumbnail( $post->ID ) ){
            $output = get_the_post_thumbnail( $post->ID, 'medium', array( 'style' => 'float:right; margin:0 0 10px 10px;' ) );
            $content = $output . $content;
        }
    }
    return $content;
}
add_filter( 'the_content', 'featured_image_in_feed' );


/**
 * Registers widget areas
 */
function radius_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Homepage Text Boxes', 'radius' ),
		'id'            => 'homepage-text-boxes',
		'description'   => __('Widgets in this area will be shown as text boxes below the slider on the homepage.', 'radius'),
		'before_widget'	=> '<div class="column-wrap"><div class="column">',
		'after_widget' 	=> '</div></div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Homepage Mid Left', 'radius' ),
		'id'            => 'homepage-mid-left',
		'description'   => __( 'Widgets in this area will be shown on the right side of the middle of the homepage.', 'radius' ),
		'before_widget'	=> '<div class="widget">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Homepage Mid Right', 'radius' ),
		'id'            => 'homepage-mid-right',
		'description'   => __( 'Widgets in this area will be shown on the right side of the middle of the homepage.', 'radius' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Homepage Portfolio Section', 'radius' ),
		'id'            => 'homepage-portfolio-section',
		'description'   => __( 'Widgets in this area will be shown in the homepage portfolio section.', 'radius' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'radius' ),
		'id'            => 'sidebar',
		'description'   => __( 'Widgets in this area will be shown on the sidebar of all pages.', 'radius' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'radius' ),
		'id'            => 'footer',
		'description'   => __( 'Widgets in this area will be shown own on the left side of the footer of all pages.', 'radius' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => __( 'Social Dashboard Links', 'radius' ),
		'id'            => 'social-dashboard-links',
		'description'   => __( 'Widgets in this area will be shown on the Social Dashboard drawer.', 'radius' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>'
	) );
}
add_action( 'widgets_init', 'radius_widgets_init' );



/* Custom Comment Output */
function radius_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class( 'clearfix' ); ?> id="li-comment-<?php comment_ID() ?>">

		<div class="comment-block" id="comment-<?php comment_ID(); ?>">
			<div class="comment-info">
				<div class="comment-author vcard clearfix">
					<?php echo get_avatar( $comment->comment_author_email, 35 ); ?>

					<div class="comment-meta commentmetadata">
						<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
						<div class="clear"></div>
						<a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'radius'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)','radius'),'  ','') ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="comment-text">
				<?php comment_text() ?>
				<p class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</p>
			</div>

			<?php if ($comment->comment_approved == '0') : ?>
			<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','radius') ?></em>
			<?php endif; ?>
		</div>

		<div class="clear"></div>
<?php
}


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function radius_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'radius' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'radius_wp_title', 10, 2 );


/**
 * Sets the authordata global when viewing an author archive.
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function radius_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'radius_setup_author' );


/**
 * Return the Google font stylesheet URL
 */
function radius_fonts_url() {

	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Roboto, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$roboto = _x( 'on', 'Roboto Condensed font: on or off', 'author' );

	if ( 'off' !== $roboto ) {

		$query_args = array(
			'family' => urlencode( 'Roboto Condensed:400,700,300' ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}