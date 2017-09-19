<?php
/**
 * The template for displaying archive pages
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
					
					<div class="cover tag-cover">
						<h4 class="tag-name">
							<?php
								if( is_day() ) :
									printf( __( 'Date: %s', 'epz' ), get_the_date() );
									
								elseif ( is_month() ) :
									printf( __( 'Month: %s', 'epz' ), get_the_date( _x( 'F Y', 'Monthly archive', 'epz' ) ) );
									
								elseif ( is_year() ) :
									printf( __( 'Year: %s', 'epz' ), get_the_date( _x( 'Y', 'Yearly archive', 'epz' ) ) );
									
								elseif ( is_tag() ) :
									printf( __( 'Tag: %s', 'epz' ), single_tag_title('', false ));
									
								elseif ( is_category() ) :
									printf( __( 'Category: %s', 'epz' ), single_cat_title( '', false ) );
									
								else:
									_e( 'Archive', 'epz' );
									
								endif;
							?>
						</h4>
						<div class="post-count">
							<?php 
							$total_posts = $wp_query->found_posts;
							//printf( __( 'Total %d Posts', 'epz' ), $total_posts );
							?>
						</div>
					</div><!-- .cover -->
					
					<?php 
					if( have_posts()) : while (have_posts()) : the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					
					 endwhile; endif; ?>
					 
					 
					 <nav class="pagination">
					 	<?php previous_posts_link('<i class="fa fa-angle-left"></i>'); ?>
					 	<span class="page-number">
					 		<?php 
					 		//display Page x of y pages
					 		$paged = (get_query_var('paged')) ? get_query_var( 'paged' ) : 1;
							$total = $wp_query->max_num_pages;
							printf( __( 'Page %d of %d', 'epz'), $paged, $total );
					 		?>
					 	</span>
					 	<?php next_posts_link( '<i class="fa fa-angle-right"></i>'); ?>
					 </nav><!-- .pagination -->
					 
				</div>
				
				<?php get_sidebar('sidebar-1'); ?>
			</div>
		</div>
	</section>



<?php
get_footer();
