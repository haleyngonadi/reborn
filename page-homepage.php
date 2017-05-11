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

<?php echo get_two_top_posts() ?>

    
    <h3 class="pinline"><span>continue reading</span></h3>
    
    <div class="content-square row">


        
        <div class="content-block col-sm-4 col-xs-6">
            <div class="square-image" style="background-image: url('images/05.jpg')">
                </div>
            <div class="square-content">
                <span class="square-date">Music</span>
                <span class="square-title">Pellentesque eget neque molestie...</span>
                <span class="square-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut posuere arcu. Ut quis dignissim dolor. Pellentesque eget neque molestie, rhoncus dui a...</span>
            </div></div>
        
        <div class="content-block col-sm-4 col-xs-6">
            <div class="square-image" style="background-image: url('images/04.jpg')">
            </div>
            <div class="square-content">
                <span class="square-date">Video</span>
                <span class="square-title">Pellentesque eget neque molestie...</span>
                <span class="square-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut posuere arcu. Ut quis dignissim dolor. Pellentesque eget neque molestie, rhoncus dui a...</span>
            </div></div>
        
        <div class="content-block col-sm-4 col-xs-6">
            <div class="square-image" style="background-image: url('images/06.jpg')">
            </div>
            <div class="square-content">
                <span class="square-date">Photos</span>
                <span class="square-title">Pellentesque eget neque molestie...</span>
                <span class="square-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut posuere arcu. Ut quis dignissim dolor. Pellentesque eget neque molestie, rhoncus dui a...</span>
            </div></div>
        
    </div>

</div>
<div class="col-sm-3" id="sidebar">
    
    <div class="side-content">
        <span class="side-header">socials:</span>

        <div class="side-body">
            <ul class="socials">
                <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-spotify" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-soundcloud" aria-hidden="true"></i></a></li>

            </ul>

        </div>
    </div>

<div class="side-content">
<span class="side-header">this is kinda rad</span>

<div class="side-body">
	<div class="random"></div>

</div>
</div>



<div class="side-content">
<span class="side-header">issa jam</span>

<div class="side-body">
	<!--iframe src="https://embed.spotify.com/?uri=spotify%3Auser%3A12151914957%3Aplaylist%3A6ojvcTpwqrfXZVVrmTXpwL&theme=white" width="100%" height="380" frameborder="0" allowtransparency="true"></iframe-->
    <img src="images/spotify.png">

</div>
</div>

</div>
    
    <div class="complete">
        <div class="aotw-block">
            <div class="col-sm-4 col-xs-12">
                <div class="aotw-image" style="background-image: url(https://i1.wp.com/hypebeast.com/image/2017/01/maggie-rogers-new-single-on-and-off-1.jpg?quality=95&w=1024)"></div></div>
            <div class="complete-content col-sm-8 col-xs-12">
                <span class="full-date">Spotlight</span>
                <span class="full-title">Artist Of The Week: Maggie Rogers</span>
                <div class="aotw-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut posuere arcu. Ut quis dignissim dolor. Pellentesque eget neque molestie, rhoncus dui a, gravida ligula. Mauris pulvinar aliquam diam, fermentum molestie eros tincidunt nec. Curabitur interdum auctor sem eget porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut posuere arcu. Ut quis dignissim dolor. Pellentesque eget neque molestie, rhoncus dui a, gravida ligula. Mauris pulvinar aliquam diam, fermentum molestie eros tincidunt nec. Curabitur interdum auctor sem eget porta...
                <ul class="aotw-socials">
                    <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-spotify" aria-hidden="true"></i></a></li>


                    </ul>
                </div>
            </div></div>
    </div>


<?php get_footer(); ?>