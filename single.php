<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package epz
 */

get_header(); ?>


<section class="content-wrap">
	<div class="container">
		<div class="row">
			
			<?php $sidebar = get_theme_mod( 'sidebar_position' ); ?>
			
			<div class="col-md-8 main-content <?php if( $sidebar == 'left' ) echo ' col-md-push-4'; ?>">
				<?php if( have_posts() ): while( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
				
				endwhile; endif; ?>
				
				
				<div class="about-author clearfix">
					<?php if( function_exists( 'get_avatar' ) ) : ?>
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'email' ), $size = '200' ); ?></a>
						
					<?php endif; ?>
					
					<div class="details">
						<div class="author">
							 <h5 class="text-uppercase"><?php the_author_posts_link(); ?></h5> 
						</div>
						<div class="meta-info">
							<?php if( get_the_author_meta( 'user_url' ) != null ) : ?>
								<span class="website"><i class="fa fa-globe"></i><a href="<?php esc_url( the_author_meta( 'user_url' ) ); ?>" target="_blank"><?php _e( 'Website', 'epz' ); ?></a></span>
							<?php endif; ?>
						</div>
						
						<?php $authordesc = get_the_author_meta( 'description' ); 
						if( !empty( $authordesc ) ) : ?>
							<div class="bio">
								<?php echo the_author_meta( 'description' ); ?>
							</div>
						<?php endif;
						?>
					</div>
				</div><!-- .about-author -->
				
				<?php wp_enqueue_script( "comment-reply" ); ?>
				<?php 
					if( comments_open() || get_comments_number() ) {
						comments_template();
					}
				?>
				
				<div class="prev-next-wrap clearfix">
					<?php next_post_link('%link', '<i class="fa fa-angle-left fa-fw"></i> %title'); ?>
					&nbsp;
					<?php previous_post_link('%link', '%title <i class="fa fa-angle-right fa-fw"></i>'); ?>
				</div>
			</div>
			
			<?php get_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
</section>




<?php
get_footer();
