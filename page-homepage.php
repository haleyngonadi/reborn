<?php
/**
 * The main template file
 *
 *
 * @package WordPress
 * @subpackage Reborn
 * @since Reborn 1.0
 */

get_header('home'); ?>

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

$the_query = new WP_Query( array('posts_per_page' => 2 ) ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<div class="content-full">

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="content-block">
        <div class="full-image col-sm-4 col-xs-12" style="background-image: url('<?php the_post_thumbnail_url();?>')">

        	<?php
				$categories = get_categories();
				if(!empty($categories) && is_array($categories)) :
					
						$t_id = $categories[0]->term_id;
						$icon = get_option("taxonomy_$t_id");
						?>
		<div class="categorized">	
		<i class="fa <?php echo !empty($icon['category_icon']) ? $icon['category_icon'] : 'fa-music'; ?>"></i> 
		</div>
							

				<?php endif; ?>


        </div>
	<div class="full-content col-sm-8  col-xs-12">
		<span class="full-date"><?php echo get_the_date('M d');?></span>
		<a class="full-title" href="<?php the_permalink()?>"><?php the_title(); ?></a>
		<span class="full-body"><?php wpe_excerpt('wpe_excerptlimit', 'wpe_excerptmore'); ?></span>
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
                <a class="square-title" href="<?php the_permalink()?>"><?php the_title(); ?></a>
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


                <?php 

    $args = array(
    'posts_per_page' => 1,
    'post_type' => 'aotw'
);


$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
 
    <div class="random-row">
        <div class="aotw-block">
            <div class="aotw-photo col-sm-4 col-xs-12">
               <a href="<?php the_permalink()?>"> <div class="aotw-image" style="background-image: url('<?php echo esc_url( get_post_meta( $post->ID, 'wpcf-photo', true ) ); ?>')" data-url="<?php the_permalink();?>"></div></a></div>
            <div class="complete-content col-sm-8 col-xs-12">
                <span class="full-date"><?php _e( 'Spotlight', 'reborn' )?></span>
                <div class="full-title"><a href="<?php the_permalink()?>"><span class="pre-aotw"><?php _e( 'Artist of the Week:', 'reborn' )?> </span><?php the_title();?></a></div>
                <div class="aotw-body">

                <div class="col-sm-3 bio-box">
                                <span class="bio-title"><?php _e( 'bio', 'reborn' )?></span>

                               
                            </div>

              <div class="bio-text">  <?php echo ( get_post_meta( $post->ID, 'wpcf-biography', true ) ); ?></div>


                </div>


            </div>


            </div>

                <?php endwhile; ?>
    <!-- end of the loop -->
    <!-- pagination here -->

    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


            </div>
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
                <a class="square-title" href="<?php the_permalink()?>"><?php the_title(); ?></a>
                <span class="square-body"><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?></span>
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
        
        <aside id="sidebar" class="sidebar widget-area col-sm-3" role="complementary">
<?php dynamic_sidebar( 'sidebar-2' ); ?>
        </aside>

    </section>

<section class="load-stories">

<div class="row" id="ajax-posts">

 

    </div>
</section>


<?php get_footer('sticky'); ?>