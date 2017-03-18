<?php
if ( !defined( 'DISALLOW_FILE_EDIT' ) )
	define( 'DISALLOW_FILE_EDIT', true );

class Lionfish 
{
	public static $instance;

	public static function init()
	{
		if ( is_null( self::$instance ) )
			self::$instance = new Lionfish();
		return self::$instance;
	}

	private function __construct()
	{
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
		add_action( 'after_setup_theme', array( $this, 'menus' ) );
		add_action( 'after_setup_theme', array( $this, 'supports') );
		add_action( 'widgets_init', array( $this, 'sidebars' ) );
	}

	public function scripts()
	{
		wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), null, true );
	}

	public function menus()
	{
		register_nav_menus( array(
		    'nav_menu' => esc_html__( 'Primary Navigation Menu' ),
		    'footer_menu' => esc_html__( 'Footer Menu' )
		) );
	}

	public function supports()
	{
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		add_theme_support( 'post-thumbnails', array( 'post', 'page', 'custom_post_type' ) );

		add_image_size( 'thumbnail', 333, 444, true );
	}

	public function sidebars() 
	{
		$defaults = array(
		    'before_widget' => '<div id="%1$s" class="widget %2$s">',
		    'after_widget' => '</div>',
		    'before_title' => '<h3 class="widget-title">',
		    'after_title' => '</h3>'
		);
		 
		$sidebars = array(
			array(
		        'id' => 'sidebar-1',
		        'name' => esc_html__( 'Sidebar' ),
		        'description' => esc_html__( 'Default Sidebar' )
		    ),
		);
		 
		foreach ( $sidebars as $sidebar )
		{
		    register_sidebar( array_merge( $defaults, $sidebar ) );
		}
		
	}

}
Lionfish::init();