<?php
/**
 * Template for displaying search forms in Reborn
 *
 * @package WordPress
 * @subpackage Reborn
 * @since Reborn 1.0
 */
?>

<form role="search" method="get" class="search-form row" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="col-md-10 col-xs-10">
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'reborn' ); ?>" value="<?php echo get_search_query(); ?>" name="s" /></div>
	
	<div class="col-md-2 col-xs-2 no-padding">
	<button type="submit" class="pull-left submit search-submit"><span class="screen-reader-text"><i class="fa fa-search" aria-hidden="true"></i></span></button></div>
</form>
