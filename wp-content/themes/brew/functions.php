<?php
/**
 * yuna-brew functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package yuna-brew
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
function brew_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on yuna-brew, use a find and replace
		* to change 'brew' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'brew', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'brew' ),
			'menu-2' => esc_html__( 'Footer', 'brew' ),
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
			'brew_custom_background_args',
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
add_action( 'after_setup_theme', 'brew_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function brew_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'brew_content_width', 640 );
}
add_action( 'after_setup_theme', 'brew_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function brew_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'brew' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'brew' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'brew_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

require get_template_directory() . '/inc/scripts-styles.php';

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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
 * Carbon Fields
 */

require get_template_directory() . '/inc/carbon-fields.php';

	/**
	 * Variables
	 */
	define( 'SITE_URL', get_site_url() );
	define( 'SITE_LOCALE', get_locale() );
	define( 'THEME_PATH', get_template_directory_uri() );

	/**
	 * Custom post types
	 */

	require get_template_directory() . '/inc/custom-post-types.php';

	/**
	 * Ajax
	 */


	add_action( 'wp_enqueue_scripts', 'myajax_data', 99 );
	function myajax_data(){

		wp_localize_script('brew-script-main', 'myajax',
			array(
				'url' => admin_url('admin-ajax.php')
			)
		);

	}

	require get_template_directory() . '/inc/ajax.php';

	/**
	 * Delivery
	 */

	require get_template_directory() . '/inc/delivery.php';

	/**
	 * LiqPay
	 */

	add_action('wp_ajax_add_order', 'add_order_callback');
	add_action('wp_ajax_nopriv_add_order', 'add_order_callback');

	function add_order_callback(){

		function clearData($data) {
			return addslashes(strip_tags(trim($data)));
		}

		global $wpdb;

		$name = clearData($_POST['name']);
		$phone = clearData($_POST['phone']);
		$email = clearData($_POST['email']);
		$message = clearData($_POST['message']);
		$deliveryMethod = clearData($_POST['deliveryMethod']);
		$deliveryRegion = clearData($_POST['deliveryRegion']);
		$deliveryArea = clearData($_POST['deliveryArea']);
		$deliveryCity = clearData($_POST['deliveryCity']);
		$deliveryAddress = clearData($_POST['deliveryAddress']);
		$paymentMethod = $_POST['paymentMethod'];
		$amount = clearData($_POST['amount']);
		$order = $_POST['order'];

		$orderId = clearData($_POST['orderId']);

		$query = "INSERT INTO `brew_order` (order_number, name, phone, email, delivery_type, delivery_address, pay_type, order_list, order_sum, order_comment, order_status ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)";

		$wpdb->query( $wpdb->prepare( $query, $orderId, $name, $phone, $email, $deliveryMethod, $deliveryAddress, $paymentMethod, json_encode($order) , $amount, $message, ''));

		echo $name.'</br>';
		echo $phone.'</br>';
		echo $email.'</br>';
		echo $message.'</br>';
		echo $deliveryMethod.'</br>';
		echo $deliveryRegion.'</br>';
		echo $deliveryArea.'</br>';
		echo $deliveryCity.'</br>';
		echo $deliveryAddress.'</br>';
		echo $paymentMethod.'</br>';


	}

	/**
	 * CRM
	 */

	require get_template_directory() . '/inc/crm/inner-crm.php';