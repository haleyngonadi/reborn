<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Reborn
 * @since Reborn 1.0
 */
?>


</div></div>

<footer>

    <section class="more-stories"><span>Load More Stories...</span></section>


	<?php 
$tags = get_tags('order=desc&number=10');
$html = '<ul>';
foreach ($tags as $tag) {
    $tag_link = get_tag_link($tag->term_id);  
    $html .= "<li><a href='{$tag_link}' title='{$tag->name}' class='{$tag->slug}'>";
    $html .= "{$tag->name}<span> ({$tag->count})</span></a></li>";
}
$html .= '</ul>';
echo $html;
?>


    
    <div class="inner-footer"><span>&copy; <?php the_date('Y')?> <?php echo get_bloginfo( 'name' ); ?> - All rights reserved.</span></div>

</footer>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<?php wp_footer(); ?>

</body>
</html>
