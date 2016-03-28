<?php
if (!function_exists('onphpid_theme_setup')) {
    function onphpid_theme_setup()
    {
		add_theme_support('title-tag');
	
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');	


		register_nav_menus(array(
			'primary' => esc_html__( 'Primary', 'onphpid-theme' ),
		));

		add_theme_support('post-thumbnails');

		add_image_size('on-post-thumbnail', 850, 200, true);

		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		add_theme_support('post-formats', array(
			'gallery',
			'audio',
			'video',
		));


		add_theme_support('custom-background', apply_filters('onphpid_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));
	}
}
add_action('after_setup_theme', 'onphpid_theme_setup');

if (!function_exists('onphpid_theme_scripts')) {
	function onphpid_theme_scripts()
	{
		wp_enqueue_style('onphpid-theme-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('onphpid-theme-bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
		
		wp_enqueue_style('onphpid-theme-style', get_stylesheet_uri());

		wp_enqueue_script('onphpid-theme-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
		wp_enqueue_script('onphpid-theme-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true);

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
	 
}
add_action('wp_enqueue_scripts', 'onphpid_theme_scripts');

if (!function_exists('onphpid_theme_widgets_init')) {
	function onphpid_theme_widgets_init()
	{
		register_sidebar(
			array(
				'name'          => __('Sidebar', 'onphpid-theme'),
				'id'            => 'sidebar-pertama',
				'description'   => __('Ini Sidebar Pertama Kita', 'onphpid-theme'),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
}
add_action('widgets_init', 'onphpid_theme_widgets_init');

// custom length the_excerpt
function custom_excerpt_length($length)
{
	return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function onphpid_excerpt_more($more)
{
	global $post;

	$more  = '<div class="readmore">';
	$more .= '<div class="readmore-button">';
	$more .= '<a href="'.get_permalink($post->ID).'" class="btn btn-sm btn-danger">';
	    $more .= 'Readmore <em class="glyphicon glyphicon-chevron-right"></em>';
	    $more .= '</a>';
	$more .= '</div>';
	$more .= '</div>';
	return $more;
}

add_filter('excerpt_more', 'onphpid_excerpt_more');