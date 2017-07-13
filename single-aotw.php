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
   <section class="white-complete complete animated flipInY"> 



		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>


			
			    <div class="random-row  aotw-page">
        <div class="aotw-block row">
            <div class="aotw-photo col-sm-5">
                <div class="artist-image" style="background-image: url('<?php echo esc_url( get_post_meta( $post->ID, 'wpcf-photo', true ) ); ?>')" data-url="<?php the_permalink();?>"></div></div>
            <div class="complete-content col-sm-7">
                <span class="full-date"><?php _e( 'Spotlight', 'reborn' )?></span>
                <div class="full-title"><span class="pre-aotw"><?php _e( 'Artist of the Week:', 'reborn' )?> </span><?php the_title();?></div>
                <div class="aotw-body inner-bio">

                <div class="col-sm-3 bio-box">
                                <span class="bio-title"><?php _e( 'bio', 'reborn' )?></span>

                                                <ul class="aotw-socials">
<?php if ( get_post_meta( $post->ID, 'wpcf-twitter', true ) ) : ?> 
    <li><a href="https://twitter.com/<?php echo ( get_post_meta( $post->ID, 'wpcf-twitter', true ) ); ?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
<?php endif; ?>

<?php if ( get_post_meta( $post->ID, 'wpcf-facebook-url', true ) ) : ?>
    <li><a href="<?php echo esc_url( get_post_meta( $post->ID, 'wpcf-facebook-url', true ) ); ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
<?php endif; ?>

<?php if ( get_post_meta( $post->ID, 'wpcf-instagram-username', true ) ) : ?>
    <li><a href="https://instagram.com/<?php echo ( get_post_meta( $post->ID, 'wpcf-instagram-username', true ) ); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
<?php endif; ?>

<?php if ( get_post_meta($post->ID, 'wpcf-youtube-url', true ) ) : ?>
    <li><a href="<?php echo esc_url( get_post_meta( $post->ID, 'wpcf-youtube-url', true ) ); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
<?php endif; ?>



                               
                            </div>

              <div class="bio-text col-sm-9">  <?php echo ( get_post_meta( $post->ID, 'wpcf-biography', true ) ); ?></div>



                    </ul>
                </div>
<div class="sha-block row">
  <div class="col-sm-6 col-xs-6">
                        <div class="sidetop">
                            <c><i class="fa fa-twitter-square"></i></c>
                            <div class="text"><?php _e( 'latest tweets', 'reborn' )?></div></div>
                        
                        <div id="example1"></div>
                        
                    </div>

                    <div class="col-sm-6 col-xs-6">
                        <div class="sidetop">
                            <c><i class="fa fa-spotify"></i></c>
                            <div class="text"><?php _e( 'featured music', 'reborn' )?></div></div>
                        
                        <div class="landing-page">
                            <div class="vinyl-container">
                                <div class="album-cover case">
                                    <div class="overlay"></div>
                                    </div>
                                <div class="vinyl-record"><img class="rotating" src="https://res.cloudinary.com/benfiika/image/upload/v1472919793/design003/vinyl.png"/></div>
                                <!-- end of vinyl-container   -->
                            </div>
                        
                            <div class="release"></div>
                        
                        </div>

                    </div>
</div>

            </div>

                                <div class="social-block col-sm-12">

                    <div class="row">
                        <div class="twitter-block col-sm-4 col-xs-4">
                            <div class="sidetop">
                                <c><i class="fa fa-instagram"></i></c>
                                <div class="text"> <?php _e( 'Instagram', 'reborn' )?></div></div>
                                    <span class="insta-user" style="display: none"><?php echo ( get_post_meta( $post->ID, 'wpcf-instagram-username', true ) ); ?></span>
                            <div class="insta-feed"> </div>


                            <div class="sidetop">
                                <c><i class="fa fa-youtube"></i></c>
                                <div class="text"> <?php _e( 'featured video', 'reborn' )?></div></div>

                                
                                <div class="youtube" data-embed="<?php echo ( get_post_meta( $post->ID, 'wpcf-youtube-id', true ) ); ?>"> <div class="play-button"></div></div>

                           


                        </div>

                        <div class="spotify-block col-sm-4 col-xs-4">
                            <div class="sidetop">
                                <c><i class="fa fa-spotify"></i></c>
                                <div class="text"> <?php _e( 'spotify', 'reborn' )?></div></div>

                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images2/spotify.png" width="100%">

                        </div>


                        <div class="facebook-block col-sm-4 col-xs-4">
                            <div class="sidetop">
                                <c><i class="fa fa-facebook"></i></c>
                                <div class="text"> <?php _e( 'facebook', 'reborn' )?></div></div>



                        </div>

                    </div>
                </div>

            </div></div>
        

		<?php endwhile;
		?></section>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
            


<?php get_footer(); ?>