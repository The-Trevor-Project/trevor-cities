<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<script src="https://use.typekit.net/maa8gfb.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon-16x16.png" sizes="16x16" />
		<?php wp_head(); ?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-8083834-1', 'auto');
			ga('send', 'pageview');

		</script>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header" role="banner">

		<nav id="site-navigation" class="row" role="navigation">
			<div class="small-6 columns">
				<a href="http://www.thetrevorproject.org" rel="home"><img id="header-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/trevor-logo.png" alt="Trevor Cities"></a>
			</div>

			<div class="small-6 columns text-right" id="header-nav">
				<a href="http://www.thetrevorproject.org" class="main-site button secondary hide-for-small-only">TREVOR MAIN SITE</a>
				<button id="menu-button" class="right-off-canvas-toggle button" data-toggle="offCanvas"><strong>MENU</strong> <i class="fa fa-bars"></i></button>
			</div>

		</nav>
	</header>
	<nav class="off-canvas position-right" id="offCanvas" data-off-canvas data-position="right" role="navigation">
		<?php foundationpress_mobile_nav(); ?>
	</nav>
	<div class="off-canvas-content" data-off-canvas-content></div>
	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
