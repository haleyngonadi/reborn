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

<?php echo wpb_postsbycategory() ?>

<section class="newsletter">

<span class="close-newsletter"><i class="fa fa-close" aria-hidden="true"></i></span>
<div class="row">
<div class="col-sm-5 col-xs-12"><span class="newsletter-text pull-left">subscribe to our newsletter to get notified when something rad this way comes...</span></div>
<div class="col-sm-7 col-xs-12" style="z-index:1">


<?php echo do_shortcode( '[jetpack_subscription_form]' ); ?>
	
</div>
</div>
</section>

<section class="body">
	
<div class="row content">
<div class="col-sm-9">

<?php 
// the query
$the_query = new WP_Query( array('posts_per_page' => 2 ) ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<div class="content-full">

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="content-block">
        <div class="full-image col-sm-4 col-xs-5" style="background-image: url('<?php the_post_thumbnail_url();?>')">

        	<?php
				$categories = get_categories();
				if(!empty($categories) && is_array($categories)) :
					
						$t_id = $categories[0]->term_id;
						$icon = get_option("taxonomy_$t_id");
						?>
		<div class="categorized">	
		<i class="fa <?php echo !empty($icon['category_icon']) ? $icon['category_icon'] : 'none'; ?>"></i> 
		</div>
							
						

				<?php endif; ?>


        </div>
	<div class="full-content col-sm-8  col-xs-7">
		<span class="full-date"><?php echo get_the_date('M d');?></span>
		<a class="full-title" href="<?php get_the_permalink()?>"><?php the_title(); ?></a>
		<span class="full-body"><?php the_excerpt(); ?></span>
	</div></div>
		
	<?php endwhile; ?>
	<!-- end of the loop -->
</div>
	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

    
    <h3 class="pinline"><span>continue reading</span></h3>
    
    <div class="content-square row">

    <?php 

    $args = array(
	'posts_per_page' => 3,
	'offset' => 2
);


$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		        <div class="content-block col-sm-4 col-xs-6">
            <div class="square-image" style="background-image: url('<?php the_post_thumbnail_url();?>')">
                </div>
            <div class="square-content">
                <span class="square-date"><?php $category = get_the_category();  echo $category[0]->cat_name;?></span>
                <a class="square-title" href="<?php get_the_permalink()?>"><?php the_title(); ?></a>
                <span class="square-body"><?php echo wp_trim_words( get_the_content(), 25, '...' ); ?></span>
            </div></div>
        
	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>



        
    </div>

</div>

<?php get_sidebar('sidebar-1'); ?></div>

    
    <section class="complete">

    <div class="random-row">
        <div class="aotw-block">
            <div class="aotw-photo col-sm-4 col-xs-12">
                <div class="aotw-image" style="background-image: url(https://i1.wp.com/hypebeast.com/image/2017/01/maggie-rogers-new-single-on-and-off-1.jpg?quality=95&w=1024)"></div></div>
            <div class="complete-content col-sm-8 col-xs-12">
                <span class="full-date">Spotlight</span>
                <div class="full-title"><span class="pre-aotw">Artist Of The Week: </span>Maggie Rogers</div>
                <div class="aotw-body">

                <div class="col-sm-3 bio-box">
                                <span class="bio-title">bio</span>

                               
                            </div>

              <div class="bio-text">  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut posuere arcu. Ut quis dignissim dolor. Pellentesque eget neque molestie, rhoncus dui a, gravida ligula. Mauris pulvinar aliquam diam, fermentum molestie eros tincidunt nec. Curabitur interdum auctor sem eget porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut posuere arcu. Ut quis dignissim dolor. Pellentesque eget neque molestie, rhoncus dui a, gravida ligula. Mauris pulvinar aliquam diam, fermentum molestie eros tincidunt nec. Curabitur interdum auctor sem eget porta...</div>


                <ul class="aotw-socials">
                    <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-spotify" aria-hidden="true"></i></a></li>


                    </ul>
                </div>
<div class="featured-block row">
  <div class="col-sm-6 col-xs-6">
                        <div class="sidetop">
                            <c><i class="fa fa-twitter-square"></i></c>
                            <div class="text"> latest tweets</div></div>
                        
                        <div id="example1"></div>
                        
                    </div>

                    <div class="col-sm-6 col-xs-6">
                        <div class="sidetop">
                            <c><i class="fa fa-spotify"></i></c>
                            <div class="text">featured music</div></div>
                        
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
                                <div class="text"> Instagram</div></div>

                            <div class="insta-feed"> </div>


                            <div class="sidetop">
                                <c><i class="fa fa-youtube"></i></c>
                                <div class="text"> featured video</div></div>

                            <iframe width="100%" height="195" src="https://www.youtube.com/embed/OxxggwHFj7M" frameborder="0" allowfullscreen></iframe>


                        </div>

                        <div class="spotify-block col-sm-4 col-xs-4">
                            <div class="sidetop">
                                <c><i class="fa fa-spotify"></i></c>
                                <div class="text"> spotify</div></div>

                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images2/spotify.png" width="100%">

                        </div>


                        <div class="facebook-block col-sm-4 col-xs-4">
                            <div class="sidetop">
                                <c><i class="fa fa-facebook"></i></c>
                                <div class="text"> facebook</div></div>



                        </div>

                    </div>
                </div>

            </div></div>
    </section>


        <section class="content-row row">

        <div class="col-sm-9">
 <div class="row">

                <?php 

    $args = array(
    'posts_per_page' => 4,
    'category_name' => 'concert-review'
);


$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

   

    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="content-block col-sm-6">
            <div class="square-image" style="background-image: url('<?php the_post_thumbnail_url();?>')">
                </div>
            <div class="square-content">
                <span class="square-date"><?php $category = get_the_category();  echo $category[0]->cat_name;?></span>
                <a class="square-title" href="<?php get_the_permalink()?>"><?php the_title(); ?></a>
                <span class="square-body"><?php echo wp_trim_words( get_the_content(), 25, '...' ); ?></span>
            </div></div>
        
    <?php endwhile; ?>
    <!-- end of the loop -->
    <!-- pagination here -->

    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>




    <div class="content-block col-sm-12">
        <div class="full-image col-sm-4" style="background-image: url(images/01.jpg)"><div class="categorized"><i class="fa fa-camera-retro" aria-hidden="true"></i></div></div>
    <div class="full-content col-sm-8">
        <span class="full-date">Mar. 27</span>
        <span class="full-title">Solange performs at YouTube for South by South West</span>
        <span class="full-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut posuere arcu. Ut quis dignissim dolor. Pellentesque eget neque molestie, rhoncus dui a, gravida ligula. Mauris pulvinar aliquam diam, fermentum molestie eros tincidunt nec. Curabitur interdum auctor sem eget porta...</span>
    </div>
    </div>

</div>
        
        </div>
        
        <aside id="sidebar" class="sidebar widget-area col-sm-3" role="complementary">
<?php dynamic_sidebar( 'sidebar-2' ); ?>
        </aside>

    </section>



<?php get_footer(); ?>