<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-content'); ?>>


	<div class="single-header">

	<span class="full-date"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
									<?php
			if ( is_single() ) :
				the_title( '<span class="full-title">', '</span>' );
			else :
				the_title( sprintf( '<span class="full-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></span>' );
			endif;
		?>
								</span>
                        <span class="details">Posted by <?php echo get_the_author_link(); ?> &bull; <?php the_date('F j, Y'); ?></span>

								<ul class="social-share">
                                    <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"><span class="itext">Tweet</span></i></a></li>
                                    <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"><span class="itext">Share</span></i></a></li>
                                    <li><a href=""><i class="fa fa-pinterest" aria-hidden="true"><span class="itext">Pin It</span></i></a></li>
                                    <li><a href=""><i class="fa fa-envelope" aria-hidden="true"><span class="itext">Email</span></i></a></li>

            </ul>


		
	</div><!-- .entry-header -->

	<div class="entry-content">


		<?php if(has_post_format('gallery')) : ?>
	
		<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>


		<?php if($images) : ?>


			

			<div class="gallery-main" style="background-image: url('<?php $the_feature = wp_get_attachment_image_src( $images[0], 'full-thumb' );
			echo $the_feature[0]; ?>')">
			<div id="gallery-count"><span class="gallery-size"><?php echo sizeof($images); ?> Photos</span> </div>
			</div>


		<div class="galleries">
		<span class="close-button"><i class="fa fa-close" aria-hidden="true"></i></span>
		<span class="expand-button"><i class="fa fa-plus-square" aria-hidden="true"></i></span>


			<div class="gallery-button">
                    <div id="prev-photo"class="photo-button pull-left"><i class="fa fa-caret-left" aria-hidden="true"></i></div>
                    <div id="next-photo"class="photo-button pull-right"><i class="fa fa-caret-right" aria-hidden="true"></i></div>
                </div>

			<div class="below"><span class="pull-left"><b>Image</b> 1 of <?php echo sizeof($images); ?></span> <span class="credits pull-right">Archie for Trendio</span></div>

			<div class="caption-view" <?php if(is_admin) : ?>style="margin-top: 32px;"<?php endif; ?>>
			<span class="caption-title"><?php the_title()?></span>
				<ul class="social-share">
                                    <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-envelope" aria-hidden="true" style="background: #79a250"></i></a></li>

            </ul>

            			<span class="caption-text"><?php the_content(); ?></span>


			</div>


                
	<div class="owl-carousel owl-theme">

		<?php foreach($images as $image) : ?>
			
			<?php $the_image = wp_get_attachment_image_src( $image, 'full-thumb' ); ?> 
			<?php $the_caption = get_post_field('post_excerpt', $image); ?>
			<div class="item">

                <div class="inner-gallery">
			<img class="owl-lazy" data-src="<?php echo $the_image[0]; ?>" <?php if($the_caption) : ?>title="<?php echo $the_caption; ?>"<?php endif; ?> />

			</div>
			</div>
			
		<?php endforeach; ?>

		</div>
		
		</div>
		<?php endif; ?>
<?php endif; ?>


<?php if(!has_post_format('gallery') || !has_post_format('video')) : ?>

	<?php if ( has_post_thumbnail() ) : ?>
<div class="featured-image col-md-6">
<?php
$get_description = get_post(get_post_thumbnail_id())->post_excerpt;
  if(!empty($get_description)){//If description is not empty show the div
  echo '<span class="feature-credits" data-credit="' .$get_description .'">©</span>';
  }
?>

<?php the_post_thumbnail('single-size');?>
</div>	<?php endif; ?>
<?php endif; ?>


 <div class="single-text">

		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'reborn' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'reborn' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'reborn' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>

</div>

			<?php  print_feelbox_widget();?>
		                        <ul class="tags">

					<li class="ticket written"><span class="circle"></span><a href="#">Written By <?php echo get_the_author(); ?></a></li>

							<?php 
					$tags = get_the_tags();
					foreach ( $tags as $tag ) {
						$tag_link = get_tag_link( $tag->term_id );
								
						$html .= "<li class='ticket'><span class='circle'></span> <a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
						$html .= "{$tag->name}</a></li>";
					}
					echo $html;?>

						</ul>

	</div><!-- .entry-content -->


</article><!-- #post-## -->
