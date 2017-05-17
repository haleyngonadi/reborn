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

<div class="row">

	<div id="primary" class="content-area col-sm-9">



<?php if ( have_posts() ) : ?>

	<p><?php single_term_title('Currently browsing '); ?>.</p>

	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('inner-feed'); ?>>


	<div class="entry-header col-md-12">
		<span class="full-date"><?php echo get_the_date('M d');?></span>
		<?php
			if ( is_single() ) :
				the_title( '<h2 class="cat-title">', '</h2>' );
			else :
				the_title( sprintf( '<a class="cat-title" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' );
			endif;
		?>
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
			/* translators: %s: Name of current post */
			wpe_excerpt('wpe_excerptlength_teaser', 'wpe_excerptmore');

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
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


<?php get_sidebar('sidebar'); ?> 

</div>


<?php get_footer(); ?>