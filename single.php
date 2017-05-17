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
                    <li><a href="https://www.instagram.com/monikahibbs/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.pinterest.com/monikahibbs/" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.bloglovin.com/blog/2322714" target="_blank"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.facebook.com/bymonika" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/monikahibbs" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="mailto:hello@monikahibbs.com" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
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
$query['showposts'] = 3;

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
    <h3><?php esc_attr_e( $title ); ?></h3>
    <?php $related = new WP_Query( $query ); ?>
    <?php while ( $related->have_posts() ) : $related->the_post(); ?>
        <div class="related-post clearfix">
            <div class="related-image">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'archive' ); ?></a>
            </div>
            <div class="related-content">
                <h3><a href="<?php the_permalink();?>"><?php the_title( ); ?></a></h3>
                <p>by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></p>
            </div>
        </div>
    <?php endwhile; wp_reset_query(); ?>
</div>
                    
                    <div class="col-sm-3 col-xs-6 featured-block">

                        <div class="related-image" style="background-image: url()">
                        </div>
                    </div>

                    
                    </div>


<?php get_footer(); ?>