<?php
/**
 * The template for displaying the header
 * *
 * @package WordPress
 * @subpackage Reborn
 * @since Reborn 1.0
 */
?>

<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon.png">
				<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/animate.css" />
				<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.carousel.min.css" />

	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css">


	<!-- Fonts-->
<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Arvo|Coming+Soon|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Required JS-->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="show-desktop">
	<div class="lines line-one"></div>
	<div class="lines line-two"></div>
	<div class="container">
	<div class="row menu-items">
		
		<div class="logo-small"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></div>
		<div class="col-sm-4 left-menu hidden-xs">
<?php if ( has_nav_menu( 'left-menu' ) ) : ?>
								<?php
									wp_nav_menu( array(
										'theme_location' => 'left-menu',
										'menu_class'     => 'pull-right menu',
										 'walker'  => new Walker_Quickstart_Menu() //use our custom walker

									 ) );
								?>

								<?php endif; ?>

				
		</div>

		<div class="col-sm-4 logo col-xs-12">
			<span class="logo-text col-xs-10 col-sm-12 col-lg-sm">TRENDIO</span>
	   
			<div class="col-xs-2 hidden-lg hidden-sm bars-right">
				<div class="bars pull-right"><span id="lines"></span>
				<span id="lines"></span>
				<span id="lines"></span></div>

			</div>
		</div>
		
		<div class="col-sm-4 col-xs-12 right-menu">

		<?php if ( has_nav_menu( 'right-menu' ) ) : ?>
		<?php
									wp_nav_menu( array(
										'theme_location' => 'right-menu',
										'menu_class'     => 'pull-left menu',
										 'walker'  => new Walker_Quickstart_Menu() //use our custom walker

									 ) );
								?>

								<?php endif; ?>

		</div>
	</div></div>
</header>



<header class="show-mobile">
	<div class="lines line-one"></div>
	<div class="lines line-two"></div>
	<div class="container">
	<div class="row menu-items">
		

		<div class="col-sm-4 logo col-xs-12">
			<span class="logo-text col-xs-10 col-sm-12 col-lg-sm"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
	   
			<div class="col-xs-2 hidden-lg hidden-sm bars-right">
				<div class="bars pull-right"><span id="lines"></span>
				<span id="lines"></span>
				<span id="lines"></span></div>

			</div>
		</div>

				<div class="col-sm-4 left-menu hidden-lg">
		<?php

$menu = wp_nav_menu( array(
	'theme_location'=> 'right-menu',
	'fallback_cb'   => false,
	'container'     => '',
	'items_wrap' => '%3$s',
	'echo' => false
) );
// Display menu-2 with all the list items from menu-1 included.
wp_nav_menu( array(
	'theme_location' => 'left-menu',
	'items_wrap' => '<ul id="%1$s" class="pull-right %2$s">%3$s ' . $menu . '</ul>',
) );

?>

		</div>

	</div></div>
</header>

 <div class="wrapper">



	<div class="container">
