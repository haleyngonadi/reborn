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
                    
                    <div class="col-sm-3 col-xs-6 featured-block">

                        <div class="related-image" style="background-image: url(images/01.jpg)">
                        </div>
                    </div>

                    <div class="col-sm-3 col-xs-6 featured-block">

                        <div class="related-image" style="background-image: url(images/04.jpg)"></div>
                    </div>

                    <div class="col-sm-3 col-xs-6 featured-block">

                        <div class="related-image" style="background-image: url(images/02.jpg)"></div>
                    </div>

                    <div class="col-sm-3 col-xs-6 featured-block">

                        <div class="related-image" style="background-image: url(images/03.jpg)"></div>
                    </div>
                    
                    
                    </div>


<?php get_footer(); ?>