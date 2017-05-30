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

	<?php $category = get_the_category(); 
	 $name = $category[0]->cat_name;
     $cat_id = get_cat_ID( $name );
     $link = get_category_link( $cat_id );

	?>

	<a class="full-date" href="<?php echo $link; ?>"><?php echo $name; ?></a>
									

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
<li><a href="#" class="prettySocial" data-type="twitter" data-url="<?php the_permalink();?>" data-description="<?php the_title();?>" data-via="wearetrendio"><i class="fa fa-twitter-square" aria-hidden="true"><span class="itext">Tweet</span></i></a></li>

<li><a href="#" class="prettySocial" data-type="facebook" data-url="<?php the_permalink();?>" data-title="<?php the_title();?>" data-description="<?php the_excerpt();?>" data-media="<?php the_post_thumbnail_url();?>"><i class="fa fa-facebook-square" aria-hidden="true"><span class="itext">Share</span></i></a></li>


<li><a href="#" class="prettySocial" data-type="pinterest" data-url="<?php the_permalink();?>" data-description="<?php the_title();?>" data-media="<?php the_post_thumbnail_url();?>"><i class="fa fa-pinterest" aria-hidden="true"><span class="itext">Pin It</span></i></a></li>

		<li><a href="#" data-type="googleplus" data-url="<?php the_permalink();?>" data-description="<?php the_title();?>" class="prettySocial"><i class="fa fa-google-plus" aria-hidden="true"><span class="itext">Share</span></i></a></li>

<li><a href="mailto:?subject=Check%20out%20this%20article%20on%20Trendio.us&amp;body=<?php the_title(); ?>:%0A%0A<?php the_permalink(); ?>"><i class="fa fa-envelope" aria-hidden="true"><span class="itext">Email</span></i></a></li>

            </ul>




		
	</div><!-- .entry-header -->

	<div class="entry-content">


		<?php if(has_post_format('gallery')) : ?>
	
		<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>


		<?php if($images) : ?>


			

			<div class="gallery-main" style="background-image: url('<?php $the_feature = wp_get_attachment_image_src( $images[0], 'full-thumb' );
			echo $the_feature[0]; ?>')">
			<div id="gallery-count"><span class="gallery-size"><?php echo sizeof($images); ?> Photos</span> </div></div>
		


		<div class="galleries">
		<span class="close-button" <?php if(is_user_logged_in() ) : ?>style="top: 30px;"<?php endif; ?>><i class="fa fa-close" aria-hidden="true"></i></span>
		<span class="expand-button" <?php if(is_user_logged_in() ) : ?>style="top: 30px;"<?php endif; ?>><i class="fa fa-plus-square" aria-hidden="true"></i></span>

							<div class="gallery-button">
                    <div id="prev-photo"class="photo-button pull-left"><i class="fa fa-caret-left" aria-hidden="true"></i></div>
                    <div id="next-photo"class="photo-button pull-right"><i class="fa fa-caret-right" aria-hidden="true"></i></div>
                </div>




			<div class="below"><span class="image-count pull-left"><b>Image</b> 1 of <?php echo sizeof($images); ?></span> <span class="credits pull-right"><?php the_author()?> for Trendio</span></div>

			<div class="caption-view" <?php if(is_user_logged_in() ) : ?>style="margin-top: 32px;"<?php endif; ?>>
			<span class="caption-title"><?php the_title()?></span>

			<a href="#" class="prettySocial pinit" data-type="pinterest" data-url="<?php the_permalink();?>" data-description="<?php the_title();?>" data-media="<?php echo $images[0]; ?>"><i class="fa fa-pinterest" aria-hidden="true"><span class="itext">Pin This</span></i></a>


				<!--ul class="social-share">
                                    <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-envelope" aria-hidden="true" style="background: #79a250"></i></a></li>

            </ul-->

	<div class="owl-caption">

		<?php foreach($images as $image) : ?>
			
			<?php $the_caption = get_post_field('post_excerpt', $image); ?>
		<span class="caption-text item"> <?php if($the_caption) : ?><?php echo $the_caption; ?><?php endif; ?></span>
			
		<?php endforeach; ?>

		</div>


			</div>


                
	<div class="owl-carousel owl-theme owl-main">

		<?php foreach($images as $image) : ?>
			
			<?php $the_image = wp_get_attachment_image_src( $image, 'full-thumb' ); ?> 
			<?php $the_caption = get_post_meta( $image, '_wp_attachment_image_alt', true); ?>
			<div class="item item-image">
                <div class="inner-gallery">
			<img class="owl-lazy" data-src="<?php echo $the_image[0]; ?>" <?php if($the_caption) : ?>alt="<?php echo $the_caption; ?>"<?php endif; ?>>
			

			</div>
			</div>
			
		<?php endforeach; ?>

		</div>



		
		</div>

		<?php endif; ?>
<?php endif; ?>


<?php if(!has_post_format('gallery') && !has_post_format('video') && !has_post_format('aside')) : ?>

	<?php if ( has_post_thumbnail() ) : ?>
<div class="featured-image col-md-6">
<?php
$get_description = get_post(get_post_thumbnail_id())->post_excerpt;
  if(!empty($get_description)){//If description is not empty show the div
  echo '<span class="feature-credits" data-credit="' .$get_description .'">©</span>';
  }
?>

<?php 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-size' ); ?>
    <img src="<?php echo $image[0]; ?>" alt="" />


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

			
		                       

	</div><!-- .entry-content -->

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


</article><!-- #post-## -->
