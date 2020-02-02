<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package otherrealm
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<a class="box-shadow-menu" href="#menu"  id="menubar">
            &nbsp;<img alt="Menu" src="<?php get_site_url() ?>/otherrealm.org/wp-content/themes/otherrealm/img/Ic_menu_48px.svg">&nbsp;
        </a>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text"
			   href="#content"><?php esc_html_e('Skip to content', 'otherrealm'); ?></a>
			<header id="masthead" class="site-header">
				<nav id="site-navigation" class="main-navigation">
					<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<?php esc_html_e('Primary Menu', 'otherrealm'); ?>
					</button> -->
					<?php
					wp_nav_menu(array(
					  'theme_location' => 'menu-1',
					  'menu_id' => 'primary-menu',
					  'walker' => new OtherWalks()
					));
					// echo  '!'.wp_get_attachment_image( get_the_ID(), 'full' ).'!';
					?>
				</nav><!-- #site-navigation -->
				<span class='facebook'><a id='facebook' href='https://www.facebook.com/otherrealm.org/'>Facebook</a> </span>
				<!-- <h1>!!  !!</h1> -->
			</header><!-- #masthead -->

			<div id="content" class="site-content">