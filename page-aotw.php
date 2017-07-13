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

		<div class="entry-header">
	
		<span class="cat-title"><?php _e( 'The Present', 'reborn' )?></span>
	</div>

		<?php 
// the query
$the_query = new WP_Query( array( 'post_type' => 'aotw', 'year' => 2017, 'posts_per_page' => -1 ) ); ?> 

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<div class="row"><!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div class="col-sm-3">
			<a href="<?php the_permalink()?>">
		<div class="aotw-picture" style="background-image: url(<?php echo esc_url( get_post_meta( $post->ID, 'wpcf-photo', true ) ); ?>)">
		<span class="aotw-added"><?php echo get_the_date('F d, Y'); ?></span>

		<span class="aotw-called"><?php the_title(); ?></span>

		</div>
			</a>
		</div>
	<?php endwhile; ?>
	</div><!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, there are no artists to view at this time.' ); ?></p>
<?php endif; ?>




<div class="entry-header">
	
		<span class="cat-title"><?php _e( 'The Past', 'reborn' )?></span>
	</div>

<div class="tabs">
  <input type="radio" name="tabs" id="tabone" checked="checked">
  <label for="tabone">2016</label>
  <div class="tab">
   		<?php $the_query = new WP_Query( array( 'category__in' => 6, 'posts_per_page' => -1, 'year' => 2016 ) ); ?>

<?php if ( $the_query->have_posts() ) : ?>


	<div class="row"><!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


		<?php 
		$a = get_the_title();
		if (strpos($a, 'Featured:') !== false) :?>
		<div class="col-sm-3">
		<a href="<?php the_permalink()?>">
		<div class="aotw-picture" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
		<span class="aotw-added"><?php echo get_the_date('Y'); ?></span>

		<span class="aotw-called">
		<?php
			$title = get_the_title();
			$bodytag = str_replace("Featured: ", "", $title);
			echo $bodytag;
		 //the_title(); ?>
			
		</span>

		</div>
			</a>
		</div>
		<?php endif; ?>
	<?php endwhile; ?>
	</div><!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

  </div>
  
  <input type="radio" name="tabs" id="tabtwo">
  <label for="tabtwo">2015</label>
  <div class="tab">
   		<?php $the_query = new WP_Query( array( 'category__in' => 6, 'posts_per_page' => -1, 'year' => 2015 ) ); ?>

<?php if ( $the_query->have_posts() ) : ?>


	<div class="row"><!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


		<?php 
		$a = get_the_title();
		if (strpos($a, 'Featured:') !== false) :?>
		<div class="col-sm-3">
		<a href="<?php the_permalink()?>">
		<div class="aotw-picture" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
		<span class="aotw-added"><?php echo get_the_date('Y'); ?></span>

		<span class="aotw-called">
		<?php
			$title = get_the_title();
			$bodytag = str_replace("Featured: ", "", $title);
			echo $bodytag;
		 //the_title(); ?>
			
		</span>

		</div>
			</a>
		</div>
		<?php endif; ?>
	<?php endwhile; ?>
	</div><!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

  </div>
  
  <input type="radio" name="tabs" id="tabthree">
  <label for="tabthree">2014</label>
  <div class="tab">
    		<?php $the_query = new WP_Query( array( 'category__in' => 6, 'posts_per_page' => -1, 'year' => 2014 ) ); ?>

<?php if ( $the_query->have_posts() ) : ?>


	<div class="row"><!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


		<?php 
		$a = get_the_title();
		if (strpos($a, 'Featured:') !== false) :?>
		<div class="col-sm-3">
		<a href="<?php the_permalink()?>">
		<div class="aotw-picture" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
		<span class="aotw-added"><?php echo get_the_date('Y'); ?></span>

		<span class="aotw-called">
		<?php
			$title = get_the_title();
			$bodytag = str_replace("Featured: ", "", $title);
			echo $bodytag;
		 //the_title(); ?>
			
		</span>

		</div>
			</a>
		</div>
		<?php endif; ?>
	<?php endwhile; ?>
	</div><!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

  </div>
</div>



</main></div>




<?php get_footer(); ?>