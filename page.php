<?php
/**
 * The main template file
 *
 *
 * @package WordPress
 * @subpackage Reborn
 * @since Reborn 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area page-area">
		<main id="main" class="site-main" role="main">


<?php if ( have_posts() ) : ?>

	
	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>


	<div class="entry-header col-md-12">
	
		<span class="cat-title"><?php the_title()?></span>
	</div><!-- .entry-header -->

	<div class="entry-content col-md-12">

	<?php if ( has_post_thumbnail() ) : ?>
<div class="featured-image col-md-4">
<?php
$get_description = get_post(get_post_thumbnail_id())->post_excerpt;
  if(!empty($get_description)){//If description is not empty show the div
  echo '<span class="feature-credits" data-credit="' .$get_description .'">©</span>';
  }
?>

<?php 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-size' ); 

if ($image) : ?>
    <img src="<?php echo $image[0]; ?>" alt="" />
<?php endif; ?> 

</div>	<?php endif; ?>

<div class="cat-text <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-size' ); if ($image) : ?>col-md-8<?php endif; ?> ">

		<?php
			/*  translators: %s: Name of current post */
			the_content();


		?>
</div>	</div><!-- .entry-content -->

</article><!-- #post-## -->
	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

	</div><!-- .content-area -->


</main></div>

 <ul class="social-list">
                    <li><a href="https://www.instagram.com/trendio.us/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.bloglovin.com/blog/2322714" target="_blank"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.facebook.com/wearetrendio" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/wearetrendio" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="mailto:contact@trendio.us" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.spotify.com/user/trendio/" target="_blank"><i class="fa fa-spotify" aria-hidden="true"></i></a></li>

                </ul>



<?php get_footer(); ?>