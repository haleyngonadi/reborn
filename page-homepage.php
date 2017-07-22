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



    <section class="featured row">


<?php 
// the query
$the_query = new WP_Query( array( 'category_name' => 'featured', 'posts_per_page' => 4 ) ); ?>

<?php if ( $the_query->have_posts() ) : ?>


    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        
            <div class="col-sm-3 col-xs-6 featured-block">
            <a href="<?php the_permalink() ?>" rel="bookmark"> 
            <div class="specific-image"> <?php the_post_thumbnail('medium-size');?></div>
            <span class="specific-text"><?php the_title() ?> </span>
           </a></div>



    <?php endwhile; ?>
    <!-- end of the loop -->



    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
    </section>



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
        <div class="full-image col-sm-4 col-xs-12">

     <a href="<?php the_permalink()?>">   <?php the_post_thumbnail();?></a>

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

    


</div>

<?php get_sidebar('sidebar-1'); ?></div>


    <h3 class="pinline"><span>continue reading</span></h3>
    
    <div class="content-square row">

    <?php 

    $args = array(
    'posts_per_page' => 4,
    'offset' => 2
);


$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

    <!-- pagination here -->

    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="content-block col-sm-3 col-xs-6">
            <?php the_post_thumbnail();?>
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
               <a href="<?php the_permalink()?>"> <img data-src="<?php the_post_thumbnail_url(); ?>" class="lazyload"></a></div>
            <div class="complete-content col-sm-8 col-xs-12">
                <span class="full-date"><?php _e( 'Spotlight', 'reborn' )?></span>
                <div class="full-title"><a href="<?php the_permalink()?>"><?php the_title();?> <span class="pre-aotw"> </span></a></div>
                <div class="aotw-body">

                <div class="col-sm-3 bio-box">
                                <span class="bio-title"><?php _e( 'bio', 'reborn' )?></span>

                               
                            </div>

              <div class="bio-text">  <?php the_excerpt(); ?></div>

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

                <img data-src="<?php the_post_thumbnail_url('impress-size');?>" class="lazyload">

            <!-- <div class="square-image" style="background-image: url('<?php the_post_thumbnail_url('impress-size');?>')">
                </div> -->
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