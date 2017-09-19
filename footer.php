<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package epz
 */

?>

<?php if( get_theme_mod( 'hide_footer_widget' ) != true ) : ?>
	<?php if( is_active_sidebar( 'footer-sidebar-1' ) || is_active_sidebar( 'footer-sidebar-2') || is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
		
		<footer class="main-footer">
			<div class="container">
				<div class="row">
					
					<div class="col-sm-4">
						<?php if( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
							<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
						<?php endif; ?>
					</div>
					
					<div class="col-sm-4">
						<?php if( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
							<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
						<?php endif; ?>
					</div>
					
					<div class="col-sm-4">
						<?php if( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
							<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</footer>
		
		
	<?php endif; ?>
<?php endif; ?>

<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				
				
				<?php esc_attr_e( '&copy;', 'epz' ); ?>
				<?php _e( date('Y' ) ); ?>
				<a href="<?php echo home_url('/') ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>.&nbsp;
				<span class="custom-copyright-text"><?php echo get_theme_mod( 'copyright_textbox', 'All Right Reserved.' ); ?></span>
			</div>
		</div>
	</div>
</div>

	

<?php wp_footer(); ?>

</body>
</html>
