<?php
/**
 * Reborn functions and definitions
 *
 * @package WordPress
 * @subpackage Reborn
 * @since Reborn 1.0
 */

include ('vafpress/vp-post-formats-ui.php');

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Reborn 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 780;
}


function register_my_menus() {
  register_nav_menus(
    array(
      'left-menu' => __( 'Left Menu' ),
      'right-menu' => __( 'Right Menu' ),
      'socials' => __( 'Socials' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

		/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'link', 'gallery', 'audio'
	) );

	/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function reborn_scripts() {
	// Add custom fonts, used in the main stylesheet.


	// Load our main stylesheet.
	// wp_enqueue_style( 'reborn-style', get_stylesheet_uri() );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'reborn-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}



	wp_enqueue_script( 'page-transitions', get_template_directory_uri() . '/js/pagetransitions.js', array( 'jquery' ), '20170323', true );

	wp_enqueue_script( 'moment-js', get_template_directory_uri() . '/js/moment.min.js', array( 'jquery' ), '20170323', true );

		wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '20170323', true );
		wp_enqueue_script( 'owl-refresh', get_template_directory_uri() . '/js/owl.autorefresh.js', array( 'jquery' ), '20170323', true );
				wp_enqueue_script( 'read-more', get_template_directory_uri() . '/js/readmore.min.js', array( 'jquery' ), '20170324', true );




/*	 wp_enqueue_script( 'Ioype', get_template_directory_uri() . '/js/Ioype.js', array( 'jquery' ), '20170323' );
*/
	 

		wp_enqueue_script(
      'main-js', 
       get_template_directory_uri().'/js/main.js',
       array('jquery'), 
       '', 
       true
);




}
add_action( 'wp_enqueue_scripts', 'reborn_scripts' );

if ( ! function_exists( 'custom_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function custom_post_nav() {
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
 
    if ( ! $next && ! $previous ) {
        return;
    }
    ?>
        <div class="oldposts">
            <?php
                previous_post_link( '<div id="prev-post">%link</div>', _x( '<span>Prev</span>', 'Previous post link', 'acrylic' ) );
                next_post_link(     '<div id="next-post">%link</div>',     _x( '<span>Next</span>', 'Next post link',     'acrylic' ) );
            ?>
        </div>
   
    <?php
}
 
endif;


function wpb_postsbycategory() {
// the query
$the_query = new WP_Query( array(/* 'category_name' => 'announcements',*/ 'posts_per_page' => 10 ) ); 

// The Loop
if ( $the_query->have_posts() ) {
	$string .= '<section class="featured row">';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
			if ( has_post_thumbnail() ) {
			$string .= '<div class="col-sm-3 col-xs-6 featured-block">';
			$string .= '<a href="' . get_the_permalink() .'" rel="bookmark"><div class="specific-image" style="background-image: url(' . get_the_post_thumbnail_url($post_id, array( 50, 50) ) .')"></div>';
			$string .= '<span class="specific-text">'. get_the_title() .'</span>';
			$string .='</a></div>';
			} else { 
			// if no featured image is found
						$string .= '<div class="col-sm-3 col-xs-6 featured-block">';
			$string .= '<a href="' . get_the_permalink() .'" rel="bookmark"><div class="specific-image" style="background: #dc1432"></div>';
			$string .= '<span class="specific-text">'. get_the_title() .'</span>';
			$string .='</a></div>';
			}
			}
	} else {
	// no posts found
}
$string .= '</section>';

return $string;

/* Restore original Post Data */
wp_reset_postdata();
}
// Add a shortcode
add_shortcode('categoryposts', 'wpb_postsbycategory');

// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');