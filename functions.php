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
$the_query = new WP_Query( array(/* 'category_name' => 'announcements',*/ 'posts_per_page' => 4 ) ); 

// The Loop
if ( $the_query->have_posts() ) {
	$string .= '<section class="featured row">';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
			if ( has_post_thumbnail() ) {
			$string .= '<div class="col-sm-3 col-xs-6 featured-block">';
			$string .= '<a href="' . get_the_permalink() .'" rel="bookmark"><div class="specific-image" style="background-image: url(' . get_the_post_thumbnail_url($post_id, array( 300, 300) ) .')"></div>';
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

//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


function wpdocs_custom_excerpt_length( $length ) {
    return 80;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


function pippin_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[category_icon]"><?php _e( 'Category Icon', 'pippin' ); ?></label>
		<input type="text" name="term_meta[category_icon]" id="term_meta[category_icon]" value="">
		<p class="description"><?php _e( 'Enter the font awesome value of the icon i.e. fa-home','pippin' ); ?></p>
	</div>
<?php
}
add_action( 'category_add_form_fields', 'pippin_taxonomy_add_new_meta_field', 10, 2 );


function pippin_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[category_icon]"><?php _e( 'Category Icon', 'pippin' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[category_icon]" id="term_meta[category_icon]" value="<?php echo esc_attr( $term_meta['category_icon'] ) ? esc_attr( $term_meta['category_icon'] ) : ''; ?>">
			<p class="description"><?php _e( 'Enter the font awesome value of the icon i.e. fa-home','pippin' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'category_edit_form_fields', 'pippin_taxonomy_edit_meta_field', 10, 2 );




function save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_category', 'save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_category', 'save_taxonomy_custom_meta', 10, 2 );