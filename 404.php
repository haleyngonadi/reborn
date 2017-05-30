<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Reborn
 * @since Reborn 1.0
 */

get_header(); ?>

<div class="error_header">
 <h1 class="error_title animated flash"><span>404</span></h1>
  <h2><span>Nothing to see here :( Search?</span></h2>

<div class="error_search">

<form role="search" method="get" class="search-form row" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="error_input">
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search for an artist or article by title&hellip;', 'placeholder', 'reborn' ); ?>" value="<?php echo get_search_query(); ?>" name="s" /></div>
	
	<div class="error_button no-padding">
	<button type="submit" class="pull-left submit search-submit"><i class="fa fa-search" aria-hidden="true"></i> <span class="screen-reader-text">Search</span></button></div>
</form>


</div>

  </div>


  <div class="error_body">

  	<div class="row grad">  


    
    
    <div class="col-md-4 animated slideInLeft">

                                
              <div class="sidetop"> 
              <c><i class="fa fa-book"></i></c>
              <div class="text">    page 1 </div>
          
          </div>
          <?php // Get RSS Feed(s)
include_once( ABSPATH . WPINC . '/feed.php' );

// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed( 'https://trendio.us/feed/?paged=1' );

$maxitems = 0;

if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly

    // Figure out how many total items there are, but limit it to 5. 
    $maxitems = $rss->get_item_quantity( 8 ); 

    // Build an array of all the items, starting with element 0 (first element).
    $rss_items = $rss->get_items( 0, $maxitems );

endif;
?>

<ul>
    <?php if ( $maxitems == 0 ) : ?>
    <li><?php _e( 'No items', 'trendio' ); ?></li>
    <?php else : ?>
        <?php // Loop through each feed item and display each item as a hyperlink. ?>
        <?php foreach ( $rss_items as $item ) : ?>
            <li>
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                    title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
                    <?php echo esc_html( $item->get_title() ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
                              
                            </div>
                          
                                  <div class="col-md-4 animated slideInUp">
                            
              <div class="sidetop"> 
              <c><i class="fa fa-book"></i></c>
              <div class="text">    page 2 </div>
          
          </div>           
                           <?php // Get RSS Feed(s)
include_once( ABSPATH . WPINC . '/feed.php' );

// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed( 'https://trendio.us/feed/?paged=2' );

$maxitems = 0;

if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly

    // Figure out how many total items there are, but limit it to 5. 
    $maxitems = $rss->get_item_quantity( 8 ); 

    // Build an array of all the items, starting with element 0 (first element).
    $rss_items = $rss->get_items( 0, $maxitems );

endif;
?>

<ul>
    <?php if ( $maxitems == 0 ) : ?>
    <li><?php _e( 'No items', 'trendio' ); ?></li>
    <?php else : ?>
        <?php // Loop through each feed item and display each item as a hyperlink. ?>
        <?php foreach ( $rss_items as $item ) : ?>
            <li>
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                    title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
                    <?php echo esc_html( $item->get_title() ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>

                            </div>
                            
<div class="col-md-4 animated slideInRight">

                                
              <div class="sidetop"> 
              <c><i class="fa fa-book"></i></c>
              <div class="text">    page 3 </div>
          
          </div>
          
                                         <?php // Get RSS Feed(s)
include_once( ABSPATH . WPINC . '/feed.php' );

// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed( 'https://trendio.us/feed/?paged=3' );

$maxitems = 0;

if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly

    // Figure out how many total items there are, but limit it to 5. 
    $maxitems = $rss->get_item_quantity( 8 ); 

    // Build an array of all the items, starting with element 0 (first element).
    $rss_items = $rss->get_items( 0, $maxitems );

endif;
?>

<ul>
    <?php if ( $maxitems == 0 ) : ?>
        <li><?php _e( 'No items', 'trendio' ); ?></li>
    <?php else : ?>
        <?php // Loop through each feed item and display each item as a hyperlink. ?>
        <?php foreach ( $rss_items as $item ) : ?>
            <li>
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                    title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
                    <?php echo esc_html( $item->get_title() ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
                            </div></div>

  </div>
<?php get_footer(); ?>