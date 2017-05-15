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
	add_image_size( 'single-size', 400, 400 );

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
		wp_enqueue_script( 'lazy-load', get_template_directory_uri() . '/js/lazysizes.min.js', array( 'jquery' ), '20170512', true );




/*	 wp_enqueue_script( 'Ioype', get_template_directory_uri() . '/js/Ioype.js', array( 'jquery' ), '20170323' );
*/
	 

		wp_enqueue_script(
      'main-js', 
       get_template_directory_uri().'/js/main.js',
       array('jquery'), 
       '', 
       true
);

wp_localize_script( 'main-js', 'ajax_posts', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'noposts' => __('No older posts found', 'reborn'),
    'loadmore' => esc_html__('Load more', 'reborn')
));

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
                previous_post_link( '<div id="prev-post">%link</div>', _x( '<span>Prev</span>', 'Previous post link', 'reborn' ) );
                next_post_link(     '<div id="next-post">%link</div>',     _x( '<span>Next</span>', 'Next post link',     'reborn' ) );
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
			$string .= '<a href="' . get_the_permalink() .'" rel="bookmark"><div class="specific-image" style="background: #d91342"></div>';
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
    return sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
          esc_url( get_permalink( get_the_ID() ) ),
          sprintf( __( '...more' ), '' )
    );
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


function custom_length_excerpt($word_count_limit) {
    $content = wp_strip_all_tags(get_the_content() , true );
    echo wp_trim_words($content, $word_count_limit);
}


/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Reborn 1.0
 */
function reborn_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'reborn' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'reborn' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s side-content"><div class="side-body">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget-title side-header">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Second Sidebar', 'reborn' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'reborn' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s side-content"><div class="side-body">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget-title side-header">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'reborn' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'reborn' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'reborn_widgets_init' );


/**
 * WTI Custom Navigation Menu widget class
 *
 * @since 3.0.0
 */

class Wti_Custom_Nav_Menu_Widget extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'description' => __('Use this widget to add your social media links.') );
        parent::__construct( 'custom_nav_menu', __('Social Media'), $widget_ops );
    }

    function widget($args, $instance) {
        // Get menu
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

        if ( !$nav_menu )
            return;

        $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];

        if ( !empty($instance['title']) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];

        wp_nav_menu(
                array(
                    'fallback_cb' => '',
                    'container' => '',
                    'menu_class' => $instance['menu_class'],
                    'menu' => 'socials',
                    'link_before' => '<span class="hide-text">',
                    'link_after' => '</span>'
                )
            );

        echo $args['after_widget'];
    }

    function update( $new_instance, $old_instance ) {
        $instance['title'] = strip_tags ( stripslashes ( $new_instance['title'] ) );
        $instance['menu_class'] = strip_tags ( stripslashes ( trim ( $new_instance['menu_class'] ) ) );
        $instance['nav_menu'] = (int) $new_instance['nav_menu'];

        return $instance;
    }

    function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        $menu_class = isset( $instance['menu_class'] ) ? $instance['menu_class'] : '';
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

        // Get menus
        $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

        // If no menus exists, direct the user to go and create some.
        if ( !$menus ) {
            echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
            return;
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('menu_class'); ?>"><?php _e('Menu Class:') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('menu_class'); ?>" name="<?php echo $this->get_field_name('menu_class'); ?>" value="<?php echo $menu_class; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
            <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
        <?php
            foreach ( $menus as $menu ) {
                echo '<option value="' . $menu->term_id . '"'
                    . selected( $nav_menu, $menu->term_id, false )
                    . '>'. $menu->name . '</option>';
            }
        ?>
            </select>
        </p>
        <?php
    }
}

function wti_custom_nav_menu_widget() {
    register_widget('Wti_Custom_Nav_Menu_Widget');
}

add_action ( 'widgets_init', 'wti_custom_nav_menu_widget', 1 );



class FeaturedWidget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Featured Video' );
	}

	function widget( $args, $instance ) {

		        $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];

        if ( !empty($instance['title']) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];

        	echo '<div class="youtube" data-embed="'.$instance['video_id'].'"> <div class="play-button"></div></div>';

		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags ( stripslashes ( $new_instance['title'] ) );
		$instance['video_id'] = strip_tags ( stripslashes ( $new_instance['video_id'] ) );
		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$video_id = isset( $instance['video_id'] ) ? $instance['video_id'] : '';?>

		<p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
        </p>
		 <p>
            <label for="<?php echo $this->get_field_id('video_id'); ?>"><?php _e('Video ID:') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('video_id'); ?>" name="<?php echo $this->get_field_name('video_id'); ?>" value="<?php echo $video_id; ?>" />
        </p>
		<?php
	}
}

function featured_register_widgets() {
	register_widget( 'FeaturedWidget' );
}

add_action( 'widgets_init', 'featured_register_widgets' );



class SpotifyWidget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Spotify Playlist' );
	}

	function widget( $args, $instance ) {

		        $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];

        if ( !empty($instance['title']) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];

        	echo '<iframe frameborder="0"
	class="lazyload"
    allowfullscreen=""
    width="100%"
    height="380"
    data-src="//embed.spotify.com/?uri=spotify:user:popjustice:playlist:'.$instance['playlist_id'].'&theme=white">
	</iframe>';

		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags ( stripslashes ( $new_instance['title'] ) );
		$instance['playlist_id'] = strip_tags ( stripslashes ( $new_instance['playlist_id'] ) );
		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$playlist_id = isset( $instance['playlist_id'] ) ? $instance['playlist_id'] : '';?>

		<p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
        </p>
		 <p>
            <label for="<?php echo $this->get_field_id('playlist_id'); ?>"><?php _e('Video ID:') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('playlist_id'); ?>" name="<?php echo $this->get_field_name('playlist_id'); ?>" value="<?php echo $playlist_id; ?>" />
        </p>
		<?php
	}
}

function spotify_register_widgets() {
	register_widget( 'SpotifyWidget' );
}

add_action( 'widgets_init', 'spotify_register_widgets' );

 /*** Jetpack Settings ***/

function jetpackchange_image_size ( $thumbnail_size ) {
	$thumbnail_size['width'] = 226;
	$thumbnail_size['height'] = 226;
	return $thumbnail_size;
}
add_filter( 'jetpack_relatedposts_filter_thumbnail_size', 'jetpackchange_image_size' );

function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
 
add_action( 'loop_start', 'jptweak_remove_share' );


function jetpackme_top_posts_timeframe() {
    return '30';
}
add_filter( 'jetpack_top_posts_days', 'jetpackme_top_posts_timeframe' );

function jeherve_add_date_top_posts( $post_id ) {

    $post_date = get_post_time(
        get_option( 'date_format' ),
        true,
        $post_id,
        true
    );

    printf( '<span style="margin-left:17px;color: #C7C7C7; text-transform: uppercase; font-size: 11px !important; font-weight: 200; font-family: Lato; letter-spacing: 2px; text-align: center; opacity: 1 !IMPORTANT;" class="top_posts_date">%s</span>', $post_date );
}
add_action( 'jetpack_widget_top_posts_after_post', 'jeherve_add_date_top_posts' );

function jeherve_custom_thumb_size( $get_image_options ) {
    $get_image_options['avatar_size'] = 300;

    return $get_image_options;
}
add_filter( 'jetpack_top_posts_widget_image_options', 'jeherve_custom_thumb_size' );


/*** Custom Post Types ***/

add_action( 'init', 'create_aotw_type' );
function create_aotw_type() {
  register_post_type( 'aotw',
    array(
      'labels' => array(
        'name' => __( 'AOTW' ),
        'singular_name' => __( 'AOTW' ), 
        'edit_item' => __( 'Edit AOTW' ),
        'new_item' => __( 'New AOTW' ),
        'not_found' => __( 'No AOTW Found' ),
        'view_item' => __( 'View AOTW' ),
      ),
      'public' => true,
      'has_archive' => true,
      'supports'           => array( 'title', 'thumbnail' )
    )
  );
}

add_action( 'load-post.php', 'aotw_setup' );
add_action( 'load-post-new.php', 'aotw_setup' );

/* Meta box setup function. */
function aotw_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'aotw_meta_boxes' );
  add_action( 'save_post', 'save_aotw_meta', 10, 2 );

}

function aotw_meta_boxes() {

  add_meta_box(
    'basic-information',      // Unique ID
    esc_html__( 'Basic Information', 'reborn' ),    // Title
    'smashing_aotw_meta_box',   // Callback function
    'aotw',         // Admin page (or post type)
    'normal',         // Context
    'default'         // Priority
  );
}


/* Display the post meta box. */
function smashing_aotw_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'wpcf-biography_nonce' ); ?>

  <p>
    <label for="wpcf-biography"><?php _e( "Artist Writeup", 'reborn' ); ?></label>
    <br />
    <textarea class="widefat" type="text" name="wpcf-biography" id="wpcf-biography" value="<?php echo esc_attr( get_post_meta( $post->ID, 'wpcf-biography', true ) ); ?>" size="30" /></textarea>
  </p>
<?php }


/* Save the meta box's post metadata. */
function save_aotw_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['wpcf-biography_nonce'] ) || !wp_verify_nonce( $_POST['wpcf-biography_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['wpcf-biography'] ) ? sanitize_html_class( $_POST['wpcf-biography'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'wpcf-biography';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

/**** Load More Posts ****/

function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 4;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $offset  = (isset($_POST['offset'])) ? $_POST['offset'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
       	'offset' => $offset,
        'paged'    => $page,
        'cat' => '-64'
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        $out .= '
        <div class="col-sm-3">
        <div class="small-image" style="background-image: url(' . get_the_post_thumbnail_url($post_id, array( 300, 300) ) .')"><div class="categorized">'.get_the_date('m-d').'</div></div>
    <div class="full-content">
        <span class="small-title">'.get_the_title().'</span>
        <span class="full-body">'.wp_trim_words( get_the_content(), 25, '...' ).'</span>
    </div>
    </div>';

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');