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
                    <li><a href="#" class="prettySocial" data-type="pinterest" data-url="<?php the_permalink();?>" data-description="<?php the_title();?>" data-media="<?php the_post_thumbnail_url();?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="prettySocial" data-type="facebook" data-url="<?php the_permalink();?>" data-title="Get To Know: <?php the_title();?>" data-description="<?php the_excerpt();?>" data-media="<?php the_post_thumbnail_url();?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="prettySocial" data-type="twitter" data-url="<?php the_permalink();?>" data-description="Get To Know: <?php the_title();?>" data-via="wearetrendio"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="mailto:?subject=Check%20out%20this%20artist%20on%20Trendio.us&amp;body=<?php the_title(); ?>:%0A%0A<?php the_permalink(); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>

                </ul>



   <section class="white-complete complete animated flipInY"> 



		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>


			
			    <div class="random-row  aotw-page">

                 <div class="full-title"><span class="pre-aotw"><?php _e( 'Artist of the Week:', 'reborn' )?> </span><?php the_title();?></div>
        <div class="aotw-block row">
            <div class="aotw-photo col-sm-5">
                <div class="artist-image" style="background-image: url('<?php the_post_thumbnail_url(); ?>')" data-url="<?php the_permalink();?>">
                    
                    <?php if ( get_post_meta( $post->ID, 'wpcf-from', true ) ) : ?>
                    <span class="from-location"> <?php echo ( get_post_meta( $post->ID, 'wpcf-from', true ) ); ?></span>
                    <?php endif; ?>

                </div></div>
            <div class="complete-content col-sm-7">
                <span class="full-date"><?php _e( 'Spotlight', 'reborn' )?></span>
               
                <div class="aotw-body inner-bio">


               
             <span class="bio-title"><?php _e( 'about', 'reborn' )?></span>

              <ul class="aotw-socials">

                                                 <?php if ( get_post_meta( $post->ID, 'wpcf-twitter', true ) ) : ?> 

    <li><a href="https://twitter.com/<?php echo ( get_post_meta( $post->ID, 'wpcf-twitter', true ) ); ?>" class="aotwtweets" data-twitter="<?php echo ( get_post_meta( $post->ID, 'wpcf-twitter', true ) ); ?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
<?php endif; ?>

<?php if ( get_post_meta( $post->ID, 'wpcf-facebook-url', true ) ) : ?>
    <li><a href="<?php echo esc_url( get_post_meta( $post->ID, 'wpcf-facebook-url', true ) ); ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
<?php endif; ?>

<?php if ( get_post_meta( $post->ID, 'wpcf-instagram-username', true ) ) : ?>
    <li><a href="https://instagram.com/<?php echo ( get_post_meta( $post->ID, 'wpcf-instagram-username', true ) ); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
<?php endif; ?>

<?php if ( get_post_meta($post->ID, 'wpcf-youtube-url', true ) ) : ?>
    <li><a href="<?php echo esc_url( get_post_meta( $post->ID, 'wpcf-youtube-url', true ) ); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
<?php endif; ?>     </ul>


              <div class="bio-text col-sm-12"> 
                               

               <?php the_content(); ?></div>



               
                </div>


            </div>

                                <div class="social-block col-sm-12">

                    <div class="row">
                        <div class="twitter-block col-sm-4 col-xs-4">
                            <div class="sidetop">
                                <c><i class="fa fa-instagram"></i></c>
                                <div class="text"> <?php _e( 'Instagram', 'reborn' )?></div></div>
                                    <span class="insta-user" style="display: none" data-instagram="<?php echo ( get_post_meta( $post->ID, 'wpcf-instagram-username', true ) ); ?>"><?php echo ( get_post_meta( $post->ID, 'wpcf-instagram-username', true ) ); ?></span>
                            <div class="insta-feed"> </div>


                            <div class="sidetop">
                                <c><i class="fa fa-youtube"></i></c>
                                <div class="text"> <?php _e( 'featured video', 'reborn' )?></div></div>

                                
                                <div class="youtube" data-embed="<?php echo ( get_post_meta( $post->ID, 'wpcf-youtube-id', true ) ); ?>"> <div class="play-button"></div></div>

                           


                        </div>

                        <div class="spotify-block col-sm-4 col-xs-4">
                            <div class="sidetop">
                                <c><i class="fa fa-music"></i></c>
                                <div class="text"> <?php _e( 'featured music', 'reborn' )?></div></div>
                                    <?php if ( get_post_meta( $post->ID, 'wpcf-lyrics', true ) ) : ?>
                                          <div class="landing-page">
                            <div class="vinyl-container">
                                <div class="album-cover case">
                                <img src=" <?php echo get_post_meta($post->ID, 'wpcf-release-image', true);?>">
                                    <div class="overlay"></div>
                                    </div>
                                <div class="vinyl-record"><img class="rotating" src="https://res.cloudinary.com/benfiika/image/upload/v1472919793/design003/vinyl.png"/></div>
                                <!-- end of vinyl-container   -->
                            </div>
                        
                            <div class="release">
                                
                                <?php if ( get_post_meta( $post->ID, 'wpcf-lyrics', true ) ) : ?>


                                    <strong>Title:</strong> <?php echo get_post_meta($post->ID, 'wpcf-release-title', true);?><br>
                                    
                                    <strong>Genre: </strong><?php echo get_post_meta($post->ID, 'wpcf-genre', true);?> <br>
                                    <strong>Release Date:</strong> <?php echo get_post_meta($post->ID, 'wpcf-release-date', true);?> <br>
                                   <?php if ( get_post_meta( $post->ID, 'wpcf-label', true ) ) : ?> <strong>Label:</strong> <?php echo get_post_meta($post->ID, 'wpcf-label', true);?><br><?php endif; ?>

    <strong>Listen:</strong> <a href="<?php echo get_post_meta($post->ID, 'wpcf-purchase', true);?>" target="_blank">iTunes</a> <?php if ( get_post_meta( $post->ID, 'wpcf-stream', true ) ) : ?>&bull; <a href="<?php echo get_post_meta($post->ID, 'wpcf-stream', true);?>" target="_blank">Stream</a><?php endif; ?><br>
                                    <strong>Lyrics:</strong> <a href="<?php echo get_post_meta($post->ID, 'wpcf-lyrics', true);?>" target="_blank">Search Genius</a><br>
      <?php if ( get_post_meta( $post->ID, 'wpcf-rate-the-release', true ) ) : ?><strong>Our Rating:</strong> <?php echo get_post_meta($post->ID, 'wpcf-rate-the-release', true);?><br> <?php endif; ?>

                                    



                            </div>
                        
                        </div>
                    <?php else:?>
                        <span class="no-tunes"> Sorry, we could not locate this <?php the_title()?> on iTunes at this time. </span>
                    <?php endif; ?>

                        </div>


                        <div class="facebook-block col-sm-4 col-xs-4">
                            <div class="sidetop">
                                <c><i class="fa fa-twitter"></i></c>
                                <div class="text"> <?php _e( 'latest tweets', 'reborn' )?></div></div>
                                <div id="example1"></div>


                        </div>

                    </div>
                </div>

            </div></div>
        

		<?php endwhile;
		?></section>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
            


<?php get_footer(); ?>