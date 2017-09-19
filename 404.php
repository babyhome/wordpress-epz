<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package epz
 */

get_header(); ?>

<section class="content-wrap">
	<div class="container">
		<div class="row">
			
			<?php $sidebar = get_theme_mod( 'sidebar_position' ); ?>
			<div class="col-md-8 main-content<?php if( $sidebar == 'left') echo ' col-md-push-4'; ?>">
				<div class="error-wrap">
					<div class="error-code"><?php _e( '404', 'epz' ); ?></div>
					<h4><?php _e( 'OOPS! The page not found.', 'epz' ); ?></h4>
					<a class="home-page-link btn btn-default" href="<?php echo esc_url( home_url('/')); ?>"><?php _e( 'Visit Home Page', 'epz' ); ?></a>
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'epz' ); ?></p>
					<div class="search-form-wrap">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div><!-- .col-md-8 -->
			
			<?php get_sidebar(); ?>
			
		</div>
	</div>
</section>

<?php
get_footer();
