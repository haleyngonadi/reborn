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
	set_post_thumbnail_size( 600, 600, true );
	add_image_size( 'single-size', 500, 500, array( 'top', 'center' ) );
		add_image_size( 'impress-size', 825, 510, array( 'top', 'center' ) );

		/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',  'video', 'link', 'gallery', 'audio', 'quote'
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
		wp_enqueue_script( 'tiny-nav', get_template_directory_uri() . '/js/tinynav.min.js', array( 'jquery' ), '20170512', true );
		wp_enqueue_script( 'pretty-social', get_template_directory_uri() . '/js/jquery.prettySocial.min.js', array( 'jquery' ), '20170512', true );





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



function wpb_postsbycategory() {
// the query
$the_query = new WP_Query( array( 'category_name' => 'featured', 'posts_per_page' => 4 ) ); 

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
	/// no posts found
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


/*function wpdocs_custom_excerpt_length( $length ) {
    return 60;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function wpdocs_excerpt_more( $more ) {
    return sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
          esc_url( get_permalink( get_the_ID() ) ),
          sprintf( __( '...more' ), '' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
*/




function wpe_excerptlength_teaser( $length ) {
    
    return 100;
}
function wpe_excerptlimit( $length ) {
    
    return 72;
}
function wpe_excerptmore( $more ) {
     return sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
          esc_url( get_permalink( get_the_ID() ) ),
          sprintf( __( '...more' ), '' )
    );
}

function wpe_excerpt( $length_callback = '', $more_callback = '' ) {
    
    if ( function_exists( $length_callback ) )
        add_filter( 'excerpt_length', $length_callback );
    
    if ( function_exists( $more_callback ) )
        add_filter( 'excerpt_more', $more_callback );
    
    $output = get_the_excerpt();
    $output = apply_filters( 'wptexturize', $output );
    $output = apply_filters( 'convert_chars', $output );
    $output = '<p>' . $output . '</p>'; // maybe wpautop( $foo, $br )
    echo $output;
}

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

	register_sidebar(array(
			'name' => 'Everything',
			'id' => 'sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		));
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


function jetpackme_more_related_posts( $options ) {
    $options['size'] = 4;
    return $options;
}
add_filter( 'jetpack_relatedposts_filter_options', 'jetpackme_more_related_posts' );


function jetpackme_remove_rp() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );





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
      'has_archive' => false,
      'supports'           => array( 'title')
    )
  );
}

function prfx_admin_styles(){
    global $typenow;
    if( $typenow == 'aotw' ) {
        wp_enqueue_style( 'prfx_meta_box_styles', get_template_directory_uri() . '/css/meta-box-styles.css' );
        wp_enqueue_style( 'admin-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

    }
}
add_action( 'admin_print_styles', 'prfx_admin_styles' );


function prfx_image_enqueue() {
    global $typenow;
    if( $typenow == 'aotw' ) {
        wp_enqueue_media();
 
        // Registers and enqueues the required javascript.
        wp_register_script( 'meta-box-image', get_template_directory_uri() . '/js/meta-box-image.js', array( 'jquery' ) );
		wp_register_script( 'moment-js', get_template_directory_uri() . '/js/moment.min.js', array( 'jquery' ), '20170403', true );

        wp_localize_script( 'meta-box-image', 'meta_image',
            array(
                'title' => __( 'Select Image', 'trendio' ),
                'button' => __( 'Use this image', 'trendio' ),
            )
        );
        wp_enqueue_script( 'meta-box-image' );
        wp_enqueue_script( 'moment-js' );

    }
}
add_action( 'admin_enqueue_scripts', 'prfx_image_enqueue' );




add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
	add_meta_box( 'my-meta-box-id', 'Basic Information', 'cd_meta_box_cb', 'aotw', 'normal', 'high' );
	add_meta_box( 'extra_information', 'Extra Fields', 'cd_extra', 'aotw', 'normal', 'high' );
	add_meta_box( 'recent_release', 'Recent Release', 'cd_release', 'aotw', 'normal', 'high' );
	add_meta_box( 'socials_id', 'Socials', 'cd_socials', 'aotw', 'normal', 'high' );


}

function wpshed_get_custom_field( $value ) {
	global $post;

    $custom_field = get_post_meta( $post->ID, $value, true );
    if ( !empty( $custom_field ) )
	    return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

    return false;
}



function cd_meta_box_cb( $post )
{
	$values = get_post_custom( $post->ID );
	$photo = isset( $values['wpcf-photo'] ) ? esc_attr( $values['wpcf-photo'][0] ) : '';
	$from = isset( $values['wpcf-from'] ) ? esc_attr( $values['wpcf-from'][0] ) : '';
	
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>

	<div class="somewhere">
	<p>
		<label for="wpcf-from">From</label>
		<input type="text" name="wpcf-from" id="wpcf-from" class="form-input" value="<?php echo $from; ?>" />
	</p>
	


	<!--p>
		<label for="wpcf-song-choice">Song Choice</label>
		<input type="text" name="wpcf-song-choice" id="wpcf-song-choice" class="form-input" value="<?php echo $song; ?>" />
	</p-->
	
	<p>
    <label for="wpcf-photo" class="prfx-row-title"><?php _e( 'Photo', 'reborn' )?></label>
    <input type="text" name="wpcf-photo" id="meta-image" value="<?php echo $photo; ?>" />
    <input type="button" id="meta-image-button" class="button" value="<?php _e( 'Select Image', 'trendio' )?>" />

    		<div class="photo-square appear" style="background-image:url('<?php echo $photo; ?>')"></div>

</p>

	<p>
		<label for="wpcf-biography"><?php _e( 'Artist Writeup', 'reborn' ); ?>:</label>
		<textarea name="wpcf-biography" id="wpcf-biography" cols="60" rows="14"><?php echo wpshed_get_custom_field( 'wpcf-biography' ); ?></textarea>

	
		


    </p>
</div>
	<?php	

}


function cd_socials( $post )
{

	


	$values = get_post_custom( $post->ID );
	$twitter = isset( $values['wpcf-twitter'] ) ? esc_attr( $values['wpcf-twitter'][0] ) : '';
	$facebook = isset( $values['wpcf-facebook-url'] ) ? esc_attr( $values['wpcf-facebook-url'][0] ) : '';
	$insta = isset( $values['wpcf-instagram-username'] ) ? esc_attr( $values['wpcf-instagram-username'][0] ) : '';
	$spotify = isset( $values['wpcf-spotify'] ) ? esc_attr( $values['wpcf-spotify'][0] ) : '';
	$youtube = isset( $values['wpcf-youtube-url'] ) ? esc_attr( $values['wpcf-youtube-url'][0] ) : '';
	$youtubeid = isset( $values['wpcf-youtube-id'] ) ? esc_attr( $values['wpcf-youtube-id'][0] ) : '';

	wp_nonce_field( 'my_socials_box_nonce', 'socials_box_nonce' );
	?>

	<div class="somewhere">

		<p>
		<label for="wpcf-youtube-id">YouTube ID</label>
		<p>Enter the YouTube ID of this artist's favorite video of yours. 
		<input type="text" name="wpcf-youtube-id" id="wpcf-youtube-id" class="form-input" placeholder="ex: nBmNcLBaPUE" value="<?php echo $youtubeid; ?>" />
	</p>
	

	<p>
		<label for="wpcf-youtube-url">YouTube URL</label>
		<input type="url" name="wpcf-youtube-url" id="wpcf-youtube-url" class="form-input" value="<?php echo $youtube; ?>" />
	</p>
	
		<p>
		<label for="wpcf-twitter">Twitter</label>
		<input type="text" name="wpcf-twitter" id="wpcf-twitter" class="form-input" placeholder="ex: beyonce" value="<?php echo $twitter; ?>" />
		</p>

		<div>
		<label for="wpcf-spotify">Spotify URI</label>
		<p>Please provide the artist's spotify id (found in the artist's spotify url).</p>
		<input type="text" name="wpcf-spotify" id="wpcf-spotify" class="form-input" value="<?php echo $spotify; ?>" />
		</div>

				<p>
		<label for="wpcf-facebook-url">Facebook URL</label>
		<input type="url" name="wpcf-facebook-url" id="wpcf-facebook-url" class="form-input" value="<?php echo $facebook; ?>" />
		</p>

		<p>
		<label for="wpcf-instagram-username">Instagram Username</label>
		<input type="text" name="wpcf-instagram-username" id="wpcf-instagram-username" class="form-input" value="<?php echo $insta; ?>" />
		</p>

</div>
	<?php	

}




function cd_release( $post )
{

	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_enqueue_style( 'jquery-ui-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true);



	$values = get_post_custom( $post->ID );
	$rate = isset( $values['wpcf-rate-the-release'] ) ? esc_attr( $values['wpcf-rate-the-release'][0] ) : '';
	$purchase = isset( $values['wpcf-purchase'] ) ? esc_attr( $values['wpcf-purchase'][0] ) : '';
	$date = isset( $values['wpcf-release-date'] ) ? esc_attr( $values['wpcf-release-date'][0] ) : '';
	$image = isset( $values['wpcf-release-image'] ) ? esc_attr( $values['wpcf-release-image'][0] ) : '';
	$title = isset( $values['wpcf-release-title'] ) ? esc_attr( $values['wpcf-release-title'][0] ) : '';
	$lyrics = isset( $values['wpcf-lyrics'] ) ? esc_attr( $values['wpcf-lyrics'][0] ) : '';
	$type = isset( $values['wpcf-type-of-release'] ) ? esc_attr( $values['wpcf-type-of-release'][0] ) : '';
	$song = isset( $values['wpcf-song-choice'] ) ? esc_attr( $values['wpcf-song-choice'][0] ) : '';
	$label = isset( $values['wpcf-label'] ) ? esc_attr( $values['wpcf-label'][0] ) : '';
	$genre = isset( $values['wpcf-genre'] ) ? esc_attr( $values['wpcf-genre'][0] ) : '';


	wp_nonce_field( 'my_release_nonce', 'release_nonce' );
	?>

	<div class="somewhere">

	<!--p>
		<label for="wpcf-type-of-release">Type of Release</label>

    <input type="checkbox" name="album" id="album" value="yes" <?php if ( isset ( $values['album'] ) ) checked( $values['album'][0], 'yes' ); ?> />Album<br />
    <input type="checkbox" name="song" id="song" value="yes" <?php if ( isset ( $values['song'] ) ) checked( $values['song'][0], 'yes' ); ?> />Single<br />

	</p-->

<div>
			<p>
		<label for="wpcf-label">Label</label>
		<input type="text" name="wpcf-label" id="wpcf-label" class="form-input" value="<?php echo $label; ?>" />
	</p></div>
		<div>
		<label for="wpcf-song-choice">Release of Choice</label>
		<p>Please provide the title of this artist's favorite song or album of yours.</p>
		<input type="text" name="wpcf-song-choice" id="wpcf-song-choice" class="form-input" value="<?php echo $song; ?>" />
	</div>

	<div class="pre-release" style="display: none;">
	
	<p> <i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Please wait for this information to be populated.</p>

	</div>

	<div class="releases" <?php if($date) : ?>style="display: block"<?php endif; ?>>



	<p>
		<label for="wpcf-genre">Genre</label>
		<input type="text" name="wpcf-genre" id="wpcf-genre" class="form-input" value="<?php echo $genre; ?>" />
	</p>



	
	
	<div>
		<label for="wpcf-release-date">Release Date</label>
		<input type="text" name="wpcf-release-date" id="wpcf-release-date" value="<?php echo $date; ?>" />
	</div>



		<div>
    <label for="wpcf-release-image" class="prfx-row-title"><?php _e( 'Release Image', 'reborn' )?></label>
   <p> <input type="text" name="wpcf-release-image" id="release-image" value="<?php echo $image; ?>" /></p>

    		

		</div>


		<div>

				<p>
		<label for="wpcf-purchase">Purchase URL</label>
		<input type="text" name="wpcf-purchase" id="wpcf-purchase" class="form-input"  value="<?php echo $purchase; ?>" />
	</p>
</div>

		</div>

			<p>
		<label for="wpcf-lyrics">Lyrics</label>
		<input type="text" name="wpcf-lyrics" id="wpcf-lyrics" class="form-input" value="<?php echo $lyrics; ?>" />
	</p>

</div>

			<div>
		<label for="wpcf-rate-the-release">Rate The Release</label>
		<p>What would you rate this release? Ex: ★★★★☆</p>
		<input type="text" name="wpcf-rate-the-release" id="wpcf-rate-the-release" class="form-input"  value="<?php echo $rate; ?>" />
	</div>

	<?php	

}




add_action( 'save_post', 'cd_meta_box_save' );
add_action( 'save_post', 'cd_extra_box_save' );
add_action( 'save_post', 'cd_release_box_save' );
add_action( 'save_post', 'cd_socials_save' );


function cd_meta_box_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	
	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);
	
	if( isset( $_POST['wpcf-biography'] ) )
		update_post_meta( $post_id, 'wpcf-biography', esc_attr( $_POST['wpcf-biography'] ) );

	if( isset( $_POST['wpcf-from'] ) )
		update_post_meta( $post_id, 'wpcf-from', wp_kses( $_POST['wpcf-from'], $allowed ) );





	if( isset( $_POST[ 'wpcf-photo' ] ) )
    update_post_meta( $post_id, 'wpcf-photo', $_POST[ 'wpcf-photo' ] );

}

function cd_socials_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['socials_box_nonce'] ) || !wp_verify_nonce( $_POST['socials_box_nonce'], 'my_socials_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	
	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);
	
	if( isset( $_POST['wpcf-facebook-url'] ) )
		update_post_meta( $post_id, 'wpcf-facebook-url', esc_attr( $_POST['wpcf-facebook-url'] ) );

	if( isset( $_POST['wpcf-twitter'] ) )
		update_post_meta( $post_id, 'wpcf-twitter', wp_kses( $_POST['wpcf-twitter'], $allowed ) );

		if( isset( $_POST['wpcf-instagram-username'] ) )
		update_post_meta( $post_id, 'wpcf-instagram-username', wp_kses( $_POST['wpcf-instagram-username'], $allowed ) );

	if( isset( $_POST['wpcf-spotify'] ) )
		update_post_meta( $post_id, 'wpcf-spotify', wp_kses( $_POST['wpcf-spotify'], $allowed ) );

	if( isset( $_POST['wpcf-youtube-url'] ) )
		update_post_meta( $post_id, 'wpcf-youtube-url', wp_kses( $_POST['wpcf-youtube-url'], $allowed ) );

		if( isset( $_POST['wpcf-youtube-id'] ) )
		update_post_meta( $post_id, 'wpcf-youtube-id', wp_kses( $_POST['wpcf-youtube-id'], $allowed ) );


}




function cd_release_box_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['release_nonce'] ) || !wp_verify_nonce( $_POST['release_nonce'], 'my_release_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	
	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);
	
		if( isset( $_POST['wpcf-release-title'] ) )
		update_post_meta( $post_id, 'wpcf-release-title', wp_kses( $_POST['wpcf-release-title'], $allowed ) );

		if( isset( $_POST['wpcf-song-choice'] ) )
		update_post_meta( $post_id, 'wpcf-song-choice', wp_kses( $_POST['wpcf-song-choice'], $allowed ) );

		if( isset( $_POST['wpcf-rate-the-release'] ) )
		update_post_meta( $post_id, 'wpcf-rate-the-release', wp_kses( $_POST['wpcf-rate-the-release'], $allowed ) );

	if( isset( $_POST['wpcf-purchase'] ) )
		update_post_meta( $post_id, 'wpcf-purchase', wp_kses( $_POST['wpcf-purchase'], $allowed ) );

		if( isset( $_POST['wpcf-release-date'] ) )
		update_post_meta( $post_id, 'wpcf-release-date', wp_kses( $_POST['wpcf-release-date'], $allowed ) );

	if( isset( $_POST['wpcf-release-image'] ) )
		update_post_meta( $post_id, 'wpcf-release-image', wp_kses( $_POST['wpcf-release-image'], $allowed ) );

		if( isset( $_POST['wpcf-lyrics'] ) )
		update_post_meta( $post_id, 'wpcf-lyrics', wp_kses( $_POST['wpcf-lyrics'], $allowed ) );

if( isset( $_POST['wpcf-label'] ) )
		update_post_meta( $post_id, 'wpcf-label', wp_kses( $_POST['wpcf-label'], $allowed ) );

	if( isset( $_POST['wpcf-genre'] ) )
		update_post_meta( $post_id, 'wpcf-genre', wp_kses( $_POST['wpcf-genre'], $allowed ) );

	        if( isset( $_POST[ 'ep' ] ) ) {
            update_post_meta( $post_id, 'ep', 'yes' );
        } else {
            update_post_meta( $post_id, 'ep', 'no' );
        }

        //saves bill's value
        if( isset( $_POST[ 'song' ] ) ) {
            update_post_meta( $post_id, 'song', 'yes' );
        } else {
            update_post_meta( $post_id, 'song', 'no' );
        }

        //saves steve's value
        if( isset( $_POST[ 'album' ] ) ) {
            update_post_meta( $post_id, 'album', 'yes' );
        } else {
            update_post_meta( $post_id, 'album', 'no' );
        }

	if( isset( $_POST['wpcf-label'] ) )
	


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
        <div class="animated flipInX load-block">
        <div class="small-image" style="background-image: url(' . get_the_post_thumbnail_url($post_id, array( 300, 300) ) .')"><div class="categorized">'.get_the_date('m-d').'</div></div>
    <div class="full-content">
        <a class="small-title" href="'.get_the_permalink().'">'.get_the_title().'</a>
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


class Walker_Quickstart_Menu extends Walker {

    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );

    /**
     * At the start of each element, output a <li> and <a> tag structure.
     * 
     * Note: Menu objects include url and title properties, so we will use those.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    	$class = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $item->classes ), $item) ) );




        $output .= sprintf( "\n<li class='%s'><a href='%s'%s><i class='fa %s' aria-hidden='true'></i> %s<span>%s</span></a></li>\n",
            $class,
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
             $class,
            $item->title,
            $item->description
        );
    }

}


class Right_Menu extends Walker {

    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );

    /**
     * At the start of each element, output a <li> and <a> tag structure.
     * 
     * Note: Menu objects include url and title properties, so we will use those.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    	$class = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $item->classes ), $item) ) );




        $output .= sprintf( "\n<li class='%s'><a href='%s'%s><i class='fa %s' aria-hidden='true'></i> %s<span>%s</span></a></li>\n",
            $class,
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
             $class,
            $item->title,
            $item->description
        );
    }

}

function comicpress_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}



