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

   		 wp_enqueue_script( 'jquery-v-2', 'http://code.jquery.com/jquery-2.1.3.min.js', false );

        wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', false );


	wp_enqueue_script( 'page-transitions', get_template_directory_uri() . '/js/pagetransitions.js', array( 'jquery' ), '20170323' );

	wp_enqueue_script( 'moment-js', get_template_directory_uri() . '/js/moment.min.js', array( 'jquery' ), '20170323' );

	wp_enqueue_script( 'Ioype', get_template_directory_uri() . '/js/Ioype.js', array( 'jquery' ), '20170323' );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '20170323' );


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