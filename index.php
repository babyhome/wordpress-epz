<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
				<?php if( have_posts() ): while( have_posts() ) : the_post(); 
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile; endif; ?>
				
				<nav class="pagination">
					<?php previous_posts_link('<i class="fa fa-angle-left"></i>' ); ?>
					<span class="page-number">
						<?php 
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$total = $wp_query->max_num_pages;
						printf( __( 'Page %d of %d', 'epz' ), $paged, $total );
						?>
					</span>
					<?php next_posts_link('<i class="fa fa-angle-right"></i>') ?>
				</nav><!-- .pagination -->
				
			</div>
			<?php get_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
</section>



<?php
get_footer();
