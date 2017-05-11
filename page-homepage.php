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
<div class="row">
<div class="col-sm-5 col-xs-12"><span class="newsletter-text pull-left">subscribe to our newsletter to get notified when something rad this way comes...</span></div>
<div class="col-sm-7 col-xs-12" style="z-index:1">


<?php echo do_shortcode( '[jetpack_subscription_form]' ); ?>
	<form class="newsletter-form">
        <div class="col-sm-4 col-xs-5" style="padding-right: 0;"><input type="text" placeholder="who dis? (name)"></div>
<div class="col-sm-5 col-xs-5"><input type="text" placeholder="email addy?"></div>
<button type="submit" class="submit col-sm-2 col-xs-2">Submit</button>

</form>
</div>
</div>
</section>



<?php get_footer(); ?>