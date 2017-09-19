<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package epz
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
	
	<!-- favicons -->
	<?php if( get_theme_mod( 'epz_favicon' ) ): ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod( 'epz_favicon' ); ?>" />
	<?php else: ?>
		<link rel="shortcut icon" href="<?php print get_template_directory_url ?>/favicon.ico" />
	<?php endif; ?>
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> Atom Feed" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	

	<header class="main-header">
	
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- start Logo -->
					<?php if( get_theme_mod( 'epz_logo' ) ): ?>
						<a class="branding" href="<?php echo home_url(); ?>"><img src="<?php echo esc_url( get_theme_mod( 'epz_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
					<?php else : ?>
						<a class="branding" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>
	
	<nav class="main-navigation">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="navbar-header">
						<span class="nav-toggle-button collapsed" data-toggle="collapse" data-target="#main-menu">
							<span class="sr-only"><?php _e( 'Toggle navigation', 'epz' ); ?></span>
							<i class="fa fa-bars"></i>
						</span>
					</div>
					<div class="collapse navbar-collapse" id="main-menu">
						<?php
						wp_nav_menu( array(
							'theme_location' 	=> 'primary-menu',
							'container' 	=> '',
							'menu_class' 	=> 'menu text-uppercase',
						) );
						?>
						
					</div>
				</div>
			</div>
		</div>
	</nav>
	
	
	
	
	
	
