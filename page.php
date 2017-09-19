<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package epz
 */

get_header(); ?>

<section class="content-wrap">
	<div class="container">
		<div class="row">
			
			<?php $sidebar = get_theme_mod( 'sidebar_position' ); ?>
			<div class="col-md-8 main-content<?php if( $sidebar == 'left' ) echo ' col-md-push-4'; ?>">
				<?php if( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; endif; ?>
				
			</div>
			<?php get_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
</section>


<?php
get_footer();
