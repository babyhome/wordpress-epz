
<?php get_header(); ?>

<section class="content-wrap">
	<div class="container">
		<div class="row">
			
			<?php $sidebar = get_theme_mod( 'sidebar_position' ); ?>
			
			<div class="col-md-8 main-content<?php if($sidebar == 'left') echo ' col-md-push-4'; ?>">
				<div class="cover author-cover">
					<div class="avatar-wrap">
						<?php echo get_avatar( get_the_author_meta( 'email'), '200' ); ?>
					</div>
					<h4 class="author-name">
						<?php the_author(); ?>
					</h4>
					
					<div class="meta-info">
						<span class="post-count"><i class="fa fa-pencil-square-o"></i>
							<?php 
							$total_posts = $wp_query->found_posts;
							printf( __( 'Total %d Posts', 'epz' ), $total_posts );
							?>
						</span>
						<?php if( get_the_author_meta( 'user_url' ) != null ) : ?>
							<span class="website"><i class="fa fa-globe"></i><a href="<?php esc_url( the_author_meta('user_url')) ?>" target="_blank"><?php _e( 'Website:', 'epz' ); ?></a></span>
						<?php endif; ?>
					</div><!-- .meta-info -->
					
					<?php $authordesc = get_the_author_meta( 'description' ); 
					if( !empty($authordesc) ) : ?>
						<div class="bio">
							<?php echo the_author_meta('description'); ?>
						</div>
					<?php endif; ?>
				</div>
				
				<?php if( have_posts()) : while ( have_posts() ) : the_post(); 
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile; endif; ?>
				
				
				<nav class="pagination">
					<?php previous_posts_link('<i class="fa fa-angle-left"></i>') ?>
					<span class="page-number">
						<?php
						//display Page x of y pages
						$paged = (get_query_var( 'paged' ) ) ? get_query_var('paged') : 1;
						$total = $wp_query->max_num_pages;
						printf( __( 'Page %d of %d', 'epz' ), $paged, $total );
						?>
					</span>
					<?php next_posts_link('<i class="fa fa-angle-right"></i>') ?>
				</nav>
				
			</div>
			
			<?php get_sidebar('sidebar-1'); ?>
		</div>
	</div>
</section>

<?php
get_footer(); ?>



