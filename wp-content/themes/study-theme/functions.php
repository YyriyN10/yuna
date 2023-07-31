<?php
/**
 * study-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package study-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function study_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on study-theme, use a find and replace
		* to change 'study-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'study-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'study-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'study_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'study_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function study_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'study_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'study_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function study_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'study-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'study-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'study_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function study_theme_scripts() {
	wp_enqueue_style( 'study-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'study-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'study-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'study_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom Post Types
 */

require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Carbon Fields
 */

	require get_template_directory() . '/inc/cbf.php';


	add_action( 'after_setup_theme', 'crb_load' );
	function crb_load() {
		require_once( 'vendor/autoload.php' );
		\Carbon_Fields\Carbon_Fields::boot();
	}

	function carbon_lang_prefix() {
		$prefix = '';
		if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
			return $prefix;
		}
		$prefix = '_' . ICL_LANGUAGE_CODE;
		return $prefix;
	}

	/**
	 * Редирект на головну із site.com/wp-admin
	 */
	add_action( 'init', function () {
		if ( is_admin() && ! current_user_can( 'administrator' ) &&
		     ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
			wp_redirect( home_url() );
			exit;
		}
	});

	/**
	 * Редирект на головну із site.com/wp-login.php
	 */
	add_action( 'init', function () {
		$page_viewed = basename( $_SERVER['REQUEST_URI'] );
		if ( $page_viewed == "wp-login.php" ) {
			wp_redirect( home_url() );
			exit;
		}
	});

	/**
	 * Редирект на головну після виходу із системи
	 */
	add_action( 'wp_logout', function () {
		$login_page  = home_url( 'wp-admin' );
		wp_redirect( $login_page . "?loggedout=true" );
		exit;
	});

	add_filter( 'login_headertext', 'true_change_login_logo_text' );

	function true_change_login_logo_text( $text ) {
		return 'Yuriy Study';
	}

	add_action( 'login_head', 'true_no_login_logo' );

	function true_no_login_logo() {
		echo '<style>
		#login h1 a {
	    background-image: none;
	    text-indent: 0;
	    height: auto;
	    width: auto;
	    color: #ffffff;
	    font-size: 34px;
		}
		
		#login form{
			border-radius: 4px;
			border: 2px solid #ffffff;
			background-color: #32373c;
			color: #ffffff;
		}
		
		#login form input{
			background-color: rgba(0,0,0,0);
			border: 1px solid #ffffff;
			color: #ffffff;
			font-size: 14px;
			padding-left: 20px;
		}
		
		#login form input:focus{
			border: 1px solid #c36922;
			box-shadow: none !important;
			outline: none;
		}
		
		#login form p.submit{
			width: 100%;
			display: flex;
			padding-top: 20px;
			justify-content: center;
		}
		
		#login form p.submit .button{
			display: inline-block;
			padding: 	5px 30px;
			background-color: #9e1313;
			font-size: 18px;
			border: 1px solid rgba(0,0,0,0);
			transition: all 0.5s;
			
			&:hover{
				border: 1px solid rgba(255,255,255,0.7);
			}	
		}
		
		#login #nav,
		#login #nav a,
		#backtoblog a{
			color: #ffffff;
		}
		
		.login #backtoblog a{
			color: #ffffff;
		}
		
		.login{
			background-color: #3A3A3A;
		}
		
		.language-switcher{
			display: none;
		}
		</style>';
	}

	add_filter( 'login_headerurl', 'true_login_link_to_website' );

	function true_login_link_to_website( $url ) {
		return site_url();
	}

	/**
	 * Elementor Widgets
	 */

	require get_template_directory() . '/inc/elementor/elementor-custom.php';