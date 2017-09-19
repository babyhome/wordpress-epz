<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package epz
 */

get_header(); ?>


<section class="content-wrap">
	<div class="container">
		<div class="row">
			
			<?php $sidebar = get_theme_mod( 'sidebar_position' ); ?>
			
			<div class="col-md-8 main-content <?php if( $sidebar == 'left' ) echo ' col-md-push-4'; ?>">
				
				<div class="cover tag-cover">
					<h3 class="tag-name">
						<?php _e( 'Search Resuts for', 'epz' ); echo '&nbsp;"' . get_search_query() . '"'; ?>
					</h3>
					<div class="post-count">
						
						<?php
							$total_posts = $wp_query->found_posts;
							printf( __( 'Total %d posts', 'epz' ), $total_posts );
						?>
					</div>
				</div>
				
				<?php if( have_posts() ) : while( have_posts() ) : the_post(); 
					get_template_part( 'template-parts/content', get_post_format() );	
				endwhile; else:
					
					get_template_part( 'template-parts/content', 'zero' );
					
				endif;
				?>	
				
			</div><!-- .col-md-8 -->
			
			<?php get_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
</section>

<?php
get_footer(); ?>