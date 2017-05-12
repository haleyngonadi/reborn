<?php
/**
 * Template for displaying search forms in Reborn
 *
 * @package WordPress
 * @subpackage Reborn
 * @since Reborn 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'reborn' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="submit search-submit"><span class="screen-reader-text"><i class="fa fa-search" aria-hidden="true"></i></span></button>
</form>
