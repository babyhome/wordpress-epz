<?php

add_action( 'customize_register', 'epz_customize_register' );
function epz_customize_register( $wp_customize ) {
	
	// ===============================================================
	// General settings Section
	$wp_customize->add_section( 'general_settings',
		array(
			'title' 		=> __( 'General Settings', 'epz' ),
			'description' 	=> 'Some common settings for entire site.',
			'priority' 		=> 30,
		)
	);
	
	// Logo
	$wp_customize->add_setting( 'epz_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control (
		$wp_customize, 'epz_logo', array(
			'label' 	=> __( 'Upload Logo', 'epz' ),
			'section' 	=> 'general_settings',
			'settings' 	=> 'epz_logo'		
		)
	) );
	
	// theme color
	$wp_customize->add_setting( 'theme_color', array(
		'default' 		=> '#E50914',
		'transport' 	=> 'postMessage',
		'sanitize_callback' 	=> 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'theme_color', array(
			'label' 	=> __( 'Theme Color', 'epz' ),
			'section' 	=> 'general_settings',
			'settings' 	=> 'theme_color',
		)
	) );
	
	// favicon
	$wp_customize->add_setting( 'epz_favicon' );
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize, 'epz_favicon', array(
			'label' 	=> __( 'Upload Favicon (Recommend .ico or .png format)', 'epz' ),
			'section' 	=> 'general_settings',
			'settings' 	=> 'epz_favicon'
		)
	));
	
	// ===============================================================
	// Sidebar settings Section
	$wp_customize->add_section( 'sidebar_settings', array(
		'title' 		=> __( 'Sidebar Settings', 'epz' ),
		'description' 	=> 'Settings for sidebar.',
		'priority' 		=> 30,
	) );
	
	// sidebar position
	$wp_customize->add_setting( 'sidebar_position', array(
		'default' 	=> 'right',
		'transport'	=> 'postMessage',
	) );
	$wp_customize->add_control( 'sidebar_position', array(
		'label' 	=> __( 'Sidebar Position', 'epz' ),
		'section' 	=> 'sidebar_settings',
		'type' 		=> 'radio',
		'choices' 	=> array(
			'left' 		=> 'Left',
			'right' 	=> 'Right'
		)
	) );
	
	// ===============================================================
	// footer settings Section
	$wp_customize->add_section( 'footer_settings', array(
		'title' 	=> __( 'Footer Settings', 'epz' ),
		'description' 	=> 'Footer Settings Section.',
		'priority' 	=> 30,
	) );
	
	// show hide footer widget
	$wp_customize->add_setting( 'hide_footer_widgets', array(
		'transport' 	=> 'postMessage'
	));
	
	$wp_customize->add_control( 'hide_footer_widgets',
		array(
			'type' 		=> 'checkbox',
			'label' 	=> __( 'Hide Footer Widget Area', 'epz' ),
			'section' 	=> 'footer_settings',
		)
	);
	
	// custom copyright
	$wp_customize->add_setting( 'copyright_textbox', 
		array(
			'default' 	=> 'All Rights Reserved.',
			'transport'	=> 'postMessage'
		)
	);
	$wp_customize->add_control( new WP_Customize_Control (
		$wp_customize, 'copyright_textbox',
		array(
			'label' 		=> __( 'Copyright text', 'epz' ),
			'section' 		=> 'footer_settings',
			'settings' 		=> 'copyright_textbox',
			'type' 			=> 'text',
			'priority' 		=> 1
		)
	) );
	
	
	// ===============================================================
	// custom code
	$wp_customize->add_section( 'custom_code',
		array(
			'title' 	=> __( 'Custom Code', 'epz' ),
			'description' 	=> '',
			'priority' 	=> 200,
		)
	);
	
	// custom css
	$wp_customize->add_setting( 'custom_css', 
		array(
			'transport' 	=> 'postMessage'
		)
	);
	$wp_customize->add_control( 'custom_css',
		array(
			'label' 		=> __( 'Custom CSS', 'epz' ),
			'description' 	=> __( 'Enter your custom CSS code.', 'epz' ),
			'section' 		=> 'custom_code',
			'type' 			=> 'textarea',
		)
	);
	// Custom header js
	$wp_customize->add_setting( 'custom_header_js', 
		array(
			'transport' 	=> 'postMessage'
		)
	);
	$wp_customize->add_control( 'custom_header_js',
		array(
			'label' 		=> __( 'Custom Header JS', 'epz' ),
			'description' 	=> __( 'Enter your custom Javascript code to Header section.', 'epz' ),
			'section' 		=> 'custom_code',
			'type' 			=> 'textarea',
		)
	);
	
	
	
	// ===============================================================
	
	class Customize_Number_Control extends WP_Customize_Control {
		public $type = 'number';
		
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input type="number" name="quantity" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>" style="width: 70px;" />
			</label>
			<?php
		}
	}
	
	class Customize_CustomCSS_Control extends WP_Customize_Control {
		public $type = 'custom_css';
		
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea style="width: 100%; height: 150px; " <?php $this->link(); ?>><?php $this->value(); ?></textarea>
			</label>
			<?php
		}
	}
}

if( class_exists( 'WP_Customize_Control' ) ) {
	class WP_Customize_Category_Control extends WP_Customize_Control {
		
		/**
		 * Render the control's content.
		 */
		public function render_content() {
			$dropdown = wp_dropdown_categories(
				array(
					'name' 				=> '_customize-dropdown-categories-' . $this->id,
					'echo' 				=> '0',
					'show_option_none' 	=> __( '&mdash; Select &mdash;', 'epz' ),
					'option_none_value'	=> '0',
					'selected' 			=> $this->value(),
				)
			);
			
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
			
			printf( 
				'<label class="customize-control-select"><span class="customize-control-title">%s</span>%s</label>', $this->label, $dropdown
			);
		}
	}
}





// Function to convert hex to rgb from http://weblizar.com/
function hex2rgb($hex) {
	$hex 	= str_replace( '#', '', $hex );
	
	if( strlen($hex) == 3 ) {
		$r 	= hexdec( substr($hex, 0, 1).substr($hex, 0, 1) );
		$g 	= hexdec( substr($hex, 1, 1).substr($hex, 1, 1) );
		$b 	= hexdec( substr($hex, 2, 1).substr($hex, 2, 1) );
	} else {
		$r 	= hexdec( substr($hex, 0, 2 ) );
		$g 	= hexdec( substr($hex, 2, 2 ) );
		$b 	= hexdec( substr($hex, 4, 2 ) );
	}
	$rgb 	= array( $r, $g, $b );
	return $rgb;
}


// Output the customized style at the head of the site
function custom_style_output() {
	$chosen_theme_color = get_theme_mod('theme_color');
	if ($chosen_theme_color != null) {
		$chosen_theme_color_rgb = hex2rgb($chosen_theme_color);
		$chosen_theme_color_rgb_final = implode(", ", $chosen_theme_color_rgb);
		echo '<style type="text/css">';
			echo 'a, a:hover{color: '.$chosen_theme_color.';}';
			echo '.btn-default, input[type="submit"] {border: 1px solid '.$chosen_theme_color.'; background:'.$chosen_theme_color.';}';
			echo 'textarea:focus {border: 1px solid '.$chosen_theme_color.';}';
			echo 'input[type="search"]:focus, input[type="text"]:focus, input[type="url"]:focus, input[type="email"]:focus, input[type="password"]:focus, textarea:focus, .form-control:focus {border: 1px solid '.$chosen_theme_color.';}';
			echo 'blockquote {border-left: 4px solid '.$chosen_theme_color.';}';
			echo '::-moz-selection{background: '.$chosen_theme_color.';}';
			echo '::selection{background: '.$chosen_theme_color.';}';
			echo '.main-navigation .menu li:hover > a, .main-navigation .menu li:focus > a {color: '.$chosen_theme_color.';}';
			echo '.main-navigation .menu li.current-menu-item > a {color: '.$chosen_theme_color.';}';
			echo '.main-navigation .menu li ul > li.current-menu-ancestor > a {color: '.$chosen_theme_color.';}';
			echo '.main-navigation .menu li ul:hover > a {color: '.$chosen_theme_color.';}';
			echo '.post .featured {background: '.$chosen_theme_color.';}';
			echo '.post .featured-media.no-image {background: '.$chosen_theme_color.';}';
			echo '.post .tag-list a:hover {color: '.$chosen_theme_color.';}';
			echo '.post .post-footer .category-list a:hover {color: '.$chosen_theme_color.';}';
			echo '.post .post-footer .share .share-icons li a:hover i {background: '.$chosen_theme_color.'; border: 1px solid '.$chosen_theme_color.';}';
			echo '.featured-media {background: '.$chosen_theme_color.';}';
			echo '.pagination a {background: '.$chosen_theme_color.';}';
			echo '.pagination .page-number {background: '.$chosen_theme_color.';}';
			echo '.comment-wrap ol li header .comment-details .commenter-name a:hover {color: '.$chosen_theme_color.';}';
			echo '.comment-wrap ol li header .comment-reply-link {background: '.$chosen_theme_color.';}';
			echo '.widget a:hover, .widget a:focus {color: '.$chosen_theme_color.';}';
			echo '.widget ul > li:hover .post-count {background: '.$chosen_theme_color.';  border: 1px solid '.$chosen_theme_color.';}';
			echo '.widget .title:after {background: '.$chosen_theme_color.';}';
			echo '.widget .social li a:hover i {background: '.$chosen_theme_color.'; border: 1px solid '.$chosen_theme_color.';}';
			echo '.widget .tagcloud a:hover {background: '.$chosen_theme_color.'; border: 1px solid '.$chosen_theme_color.';}';
			echo '.widget.widget_calendar caption {background: '.$chosen_theme_color.';}';
			echo '.widget.widget_calendar table tbody a:hover, .widget.widget_calendar table tbody a:focus {background: '.$chosen_theme_color.';}';
			echo '.widget.widget_recent_entries ul li a:hover {color: '.$chosen_theme_color.';}';
			echo '.main-footer .widget .tagcloud a:hover {border: 1px solid '.$chosen_theme_color.';}';
			echo '.main-footer .widget.widget_recent_entries ul li a:hover {color: '.$chosen_theme_color.';}';
			echo '#back-to-top {background: rgba( '. $chosen_theme_color_rgb_final .', 0.6);}';
			echo '#back-to-top:hover {background: '.$chosen_theme_color.';}';
			echo '.mejs-controls .mejs-time-rail .mejs-time-current {background: '.$chosen_theme_color.' !important;}';
			echo '@media (max-width: 767px) {.main-navigation .menu li:hover > a {color: '.$chosen_theme_color.';}';
		echo '</style>';
	}
}

add_action('wp_head', 'custom_style_output');


// live preview the changes
function epz_customizer_live_preview() {
	wp_enqueue_script('customizer-js', get_template_directory_uri() .'/assets/js/epz-customizer.js', array('jquery', 'customize-preview'), NULL, true );
}
add_action( 'customize_preview_init', 'epz_customizer_live_preview' );







