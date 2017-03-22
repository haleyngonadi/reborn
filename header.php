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
    <link rel="stylesheet" href="style.css">

<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/component.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/animations.css" />


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