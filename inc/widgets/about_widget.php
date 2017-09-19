<?php
/**
 * Plugin Name: About Widget
 */

add_action( 'widgets_init', 'register_epz_widgets_custom' );

function register_epz_widgets_custom() {
	register_widget( 'EPZ_About_Widget' );
}


class EPZ_About_Widget extends WP_Widget {
	
	/**
	 * Sets up the widgets name etc
	 */
	function epz_about_widget() {
		
		// widget settings
		$widget_ops 	= array( 
			'classname' 	=> 'epz_about_widget',
			'description' 	=> __('About Me Widget', 'epz' ),
		);
		
		$control_ops 	= array(
			'width' 	=> 250,
			'height' 	=> 350,
			'id_base' 	=> 'epz_about_widget'
		);
		
		parent::__construct( 
			'epz_about_widget', 
			__( 'EPZ - About Me', 'epz_about_widget'),
			$widget_ops, $control_ops );
		
	}
	
	/**
	 * Outputs the content of the widget
	 * 
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		//extract( $args );
		
		/* Our variables from the widget settings. */
		$title 		= apply_filters( 'widget_title', $instance['title'] );
		$image 		= $instance['image'];
		$subtitle 	= $instance['subtitle'];
		$description 	= $instance['description'];
		$signing 	= $instance['signing'];
		
		
		echo $args['before_widget'];
		if( $args['title'] ) {
			
			echo $args['before_title'] . $args['title'] . $args['after_title'];
			
			?>
			
			<div class="about-widget">
				<?php if( $image ) : ?>
					<div class="about-img">
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_html( $title ); ?>" />
					</div>
				<?php endif; ?>
				
				<?php if( $subtitle ) : ?>
					<span class="about-title"><?php echo wp_kses_post( $subtitle ); ?></span>
				<?php endif; ?>
				
				<?php if( $subtitle ) : ?>
					<p><?php echo wp_kses_post( $description ); ?></p>
				<?php endif; ?>
				
				<?php if( $signing ) : ?>
					<span class="about-autograph"><img src="<?php echo esc_url( $signing ); ?>" alt="" /></span>
				<?php endif; ?>
				
			</div>
			
			<?php
		}
		
		
	}
	
	
}




