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

<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/component.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/animations.css" />
				<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/animate.css" />
				<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.carousel.min.css" />
				<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.theme.default.min.css" />

	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css">


	<!-- Fonts-->
<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Arvo|Old+Standard+TT:400,400i,700|Coming+Soon|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Frank+Ruhl+Libre:300,400,500,700,900" rel="stylesheet">

<!-- Required JS-->

<script src="https://use.fontawesome.com/9579ff98a2.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/modernizr.custom.js"></script>

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
	<div class="lines line-one"></div>
	<div class="lines line-two"></div>
	<div class="container">
	<div class="row menu-items">
        
        <div class="logo-small"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></div>
		<div class="col-sm-4 left-menu hidden-xs">
		<ul class="pull-right menu">
            <li><a id="iterateEffects"><i class="fa fa-home" aria-hidden="true"></i> HOME<span>start here</span></a></li>
            <li><a href=""><i class="fa fa-music" aria-hidden="true"></i>MUSIC<span>jam sess.?</span></a></li>
            <li><a href=""><i class="fa fa-video-camera" aria-hidden="true"></i> VIDEOS<span>enjoy watching</span></a></li>
		</ul>
		</div>

		<div class="col-sm-4 logo col-xs-12">
            <span class="logo-text col-xs-10 col-sm-12 col-lg-sm">TRENDIO</span>
       
            <div class="col-xs-2 hidden-lg hidden-sm">
            	<div class="bars pull-right"><span id="lines"></span>
            	<span id="lines"></span>
            	<span id="lines"></span></div>

            </div>
		</div>
		
		<div class="col-sm-4 col-xs-12 right-menu">
		<ul class="pull-left menu">
			 <li class="second-menu"><a href=""><i class="fa fa-home" aria-hidden="true"></i> HOME<span>start here</span></a></li>
            <li class="second-menu"><a href=""><i class="fa fa-music" aria-hidden="true"></i>MUSIC<span>jam sess.?</span></a></li>
            <li class="second-menu"><a href=""><i class="fa fa-video-camera" aria-hidden="true"></i> VIDEOS<span>enjoy watching</span></a></li>
            <li><a href=""><i class="fa fa-camera-retro" aria-hidden="true"></i> GIGS<span>get browsin'</span></a></li>
            <li><a href=""><i class="fa fa-coffee" aria-hidden="true"></i> AOTW<span>they slay</span></a></li>
            <li><a href=""><i class="fa fa-envelope" aria-hidden="true"></i>  CONTACT<span>drop a line</span></a></li>
		</ul>
		</div>
	</div></div>
</header>


 <div class="wrapper">
    <div class="container">
