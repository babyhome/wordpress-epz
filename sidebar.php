<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package epz
 */

if ( is_active_sidebar( 'sidebar-1' ) ) :
	$sidebar = get_theme_mod( 'sidebar_position' ); ?>
	
	<div class="col-md-4 sidebar<?php if( $sidebar == 'left' ) echo ' col-md-pull-8'; ?>">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
<?php endif; ?>