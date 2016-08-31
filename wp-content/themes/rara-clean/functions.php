<?php
/**
 * rara functions and definitions
 *
 * @package rara
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 780; 
}

if ( ! function_exists( 'rara_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rara_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on rara, use a find and replace
	 * to change 'rara-clean' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rara-clean', get_template_directory() . '/languages' );
    
    /**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style( 'css/editor-style.css' );
    
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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	
	add_image_size( 'rara-without-sidebar', 1180, 400, true );
    add_image_size( 'rara-with-sidebar', 590, 230, true );
    add_image_size( 'rara-recent-post', 75, 75, true );
    add_image_size( 'rara-logo', 300, 30, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rara-clean' ),
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

	/*
	 * Enable support for Post Formats editor.
	 * See http://codex.wordpress.org
	 */

/*	add_editor_style();*/

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
		) );

	// Set up the WordPress core custom background feature.
	/*add_theme_support( 'custom-background', apply_filters( 'rara_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );*/
}
endif; // rara_setup
add_action( 'after_setup_theme', 'rara_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function rara_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'rara-clean' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );


	

	register_sidebar( array(
		'name'          => __( 'Footer First', 'rara-clean' ),
		'id'            => 'footer-first',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );
	register_sidebar( array(
		'name'          => __( 'Footer Second', 'rara-clean' ),
		'id'            => 'footer-second',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );
	register_sidebar( array(
		'name'          => __( 'Footer Third', 'rara-clean' ),
		'id'            => 'footer-third',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );
}
add_action( 'widgets_init', 'rara_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rara_scripts() {

	 if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	 	wp_enqueue_script( 'comment-reply' );

	wp_enqueue_script( 'rara-cycle-carousel', get_template_directory_uri() . '/js/cycle-carousel.js', array('jquery') );
	wp_enqueue_script( 'rara-accordion', get_stylesheet_directory_uri() . '/js/accordion.js', array('jquery') );
	wp_enqueue_script( 'rara-open-close', get_stylesheet_directory_uri() . '/js/open-close.js', array('jquery') );
	 
	
	 wp_enqueue_style('rara-all',get_stylesheet_directory_uri().'/css/all.css');
	 wp_enqueue_style('rara-googleapis-font','//fonts.googleapis.com/css?family=Ubuntu:400,500,700,300');
	 wp_enqueue_style('rara-font-awesome',get_stylesheet_directory_uri().'/css/font-awesome.css');
     wp_enqueue_style( 'rara-style', get_stylesheet_uri(), array(), '2015-03-19' );
	
	}
	add_action( 'wp_enqueue_scripts', 'rara_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Jetpack custom functions for options page.
 */

require get_template_directory() . '/functions/customfuntions.php';

/**
 * Recent Post Widget
 */

require get_template_directory() . '/inc/widget-recent-post.php';


/**
 * Functions for the post excerpt in wordpress.
 */
function custom_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_rara_DIRECTORY', get_template_directory_uri() . '/option-panel/' );
require_once dirname( __FILE__ ) . '/option-panel/options-rara.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

