<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Reborn
 * @since Reborn 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


                    <ul class="social-list">
                    <li><a href="https://www.instagram.com/trendio.us/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <!--li><a href="https://www.bloglovin.com/blog/2322714" target="_blank"><i class="fa fa-heart" aria-hidden="true"></i></a></li-->
                    <li><a href="https://www.facebook.com/wearetrendio" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/wearetrendio" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="mailto:contact@trendio.us" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.spotify.com/user/trendio/" target="_blank"><i class="fa fa-spotify" aria-hidden="true"></i></a></li>

                </ul>

 


		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>

			
			<?php get_template_part( 'content', get_post_format() ); ?>	
        <div class="oldposts">
            <?php
                next_post_link( '<div id="prev-post">%link</div>', _x( '<span>Prev</span>', 'Previous post link', 'reborn' ) );
                previous_post_link(     '<div id="next-post">%link</div>',     _x( '<span>Next</span>', 'Next post link',     'reborn' ) );
            ?>
        </div>

		<?php endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

	                <div class="related-post row" id="related-post">
                    <h3 class="pinline"><span>Related Posts</span></h3>


<?php
$related_posts = array();
$query = array();

// Number of posts to show
$query['showposts'] = 4;

// Fetches related post IDs if JetPack Related Posts is active
if ( class_exists( 'Jetpack_RelatedPosts' ) && method_exists( 'Jetpack_RelatedPosts', 'init_raw' ) ) :
    $related = Jetpack_RelatedPosts::init_raw()
        ->set_query_name( 'theme-custom' ) // optional, name can be anything
        ->get_for_post_id( get_the_ID(), array( 'size' => $query['showposts'] )
    );
    if ( $related ) :
        foreach ( $related as $result ) :
            $related_posts[] = $result[ 'id' ];
        endforeach;
    endif;
endif;

// Sets query to related posts, falls back to recent posts
if ( $related_posts ) {
    $query['post__in'] = $related_posts;
    $query['orderby'] = 'post__in';
    $title = __( 'Related Posts', 'prefix' );
} else {
    $query['post__not_in'] = array( $post->ID );
    $title = __( 'Recent Posts', 'prefix' );
}
?>
<div class="related-posts">

    <?php $related = new WP_Query( $query ); ?>
    <?php while ( $related->have_posts() ) : $related->the_post(); ?>


        <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12 featured-block">

          <a href="<?php the_permalink();?>"> <div class="related-image" style="background-image: url('<?php the_post_thumbnail_url('medium-size');?>')"></div></a>
                    </div>

    <?php endwhile; wp_reset_query(); ?>
</div>
                    
                    

                    
                    </div>


<?php get_footer(); ?>