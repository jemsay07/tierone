<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* TierOne functions and definitions
*
*@link https://developer.wordpress.org/themes/basics/theme-functions/
*
*@package TierOne
*
*/


function full_reset(){
	/**
	* This function will reset all the header links
	* http://wordpress.stackexchange.com/questions/207104/edit-theme-wp-head
	*/
	// Removes the wlwmanifest link
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// Removes the RSD link
	remove_action( 'wp_head', 'rsd_link' );
	// Removes the WP shortlink
	//remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	// Removes the canonical links
	//remove_action( 'wp_head', 'rel_canonical' );
	// Removes the links to the extra feeds such as category feeds
	//remove_action( 'wp_head', 'feed_links_extra', 3 ); 
	// Removes links to the general feeds: Post and Comment Feed
	//remove_action( 'wp_head', 'feed_links', 2 ); 
	// Removes the index link
	remove_action( 'wp_head', 'index_rel_link' ); 
	// Removes the prev link
	remove_action( 'wp_head', 'parent_post_rel_link' ); 
	// Removes the start link
	remove_action( 'wp_head', 'start_post_rel_link' ); 
	// Removes the relational links for the posts adjacent to the current post
	remove_action( 'wp_head', 'adjacent_posts_rel_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
	// Removes the WordPress version i.e. -
	remove_action( 'wp_head', 'wp_generator' );
	
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	
	/**
	*https://wordpress.org/support/topic/wp-44-remove-json-api-and-x-pingback-from-http-headers
	*/
	add_filter('rest_enabled', '_return_false');
	add_filter('rest_jsonp_enabled', '_return_false');
	
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	
	remove_action('wp_head', 'wp_print_scripts');
    //remove_action('wp_head', 'wp_print_head_scripts', 9);
    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action( 'init', 'full_reset') ;



if (! function_exists( 'tierOne_setup' )) {


	function tierOne_setup(){

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TierOne, use a find and replace
	 * to change 'tierone' to the name of your theme in all the template files.
	*/

		load_theme_textdomain('tierone', get_template_directory() . '/languages');

		// Custom Image Crop
		add_image_size( 'dt-highlighted-post', 414, 279, true );
		add_image_size( 'dt-slider-post', 570, 342, true );
		add_image_size( 'dt-featured-image', 556, 380, true );
		add_image_size( 'dt-featured-post-large', 870, 600, true );
		add_image_size( 'dt-featured-post-medium', 410, 260, true );
		add_image_size( 'dt-featured-post-medium-small', 230, 150, true );
		add_image_size( 'dt-featured-post-small', 230, 184, true );
		add_image_size( 'dt-featured-post-xs-small', 119, 78, true );
		add_image_size( 'dt-featured-post-xxs-small', 90, 54, true );
		add_image_size( 'dt-featured-post-tabed', 90, 57, true );
		add_image_size( 'dt-featured-post-t3', 254, 254, true );
		add_image_size( 'dt-featured-post-t4', 279, 177, true );
		add_image_size( 'dt-featured-post-t5', 333, 192, true );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
        */
        add_theme_support('title-tag');

		/**
		 * Add Custom Logo Support
		 */
		add_theme_support( 'custom-logo' );

		
		add_theme_support('post-thumbnails');


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary-menu' => esc_html__( 'Primary Menu', 'tierone' ),
		));


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption'));


		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support('post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link'
		));

        // Setup the WordPress core custom background feature.
        add_theme_support( 'custom-background' , apply_filters( 'tier_custom_background_cb', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
        
	}
}
add_action('after_setup_theme','tierOne_setup');


function tierone_custom_logo(){
	if (function_exists('the_custom_logo') ) {
		the_custom_logo( );
	}
}

/**
* Customize the class of logo
*/
function change_logo_class($html){
	$html = str_replace( 'custom-logo-link' , 'navbar-brand', $html);
	return $html;
}
add_filter('get_custom_logo', 'change_logo_class');



/**
* Enqueue Styles and Scripts
*/
function tierone_scripts(){

	//Enqueue Bootstrap Grid
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array() , '3.3.7' );
	
	//Enqueue Font-awesome
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.6.3');

	//Enqueue Dan-awesome
	wp_enqueue_style('danawesome', get_template_directory_uri() . '/css/dan-awesome.min.css', array(), '1.0.1');

	wp_enqueue_style('jQ-Ticker', get_template_directory_uri() . '/css/tickers-style.css', array() );
	
	//download-app
	wp_enqueue_style('download-app', get_template_directory_uri(). '/css/download-app.css',array(),'1.0.0');
	
	//Stylesheet
	wp_enqueue_style('tierone-style', get_stylesheet_uri() );
	//wp_enqueue_style('style-min', get_template_directory_uri() . '/style.min.css');

	//Enqueue Bootstrap Script
	wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', '');

	//googleapis
	wp_enqueue_script('googleapis', 'http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array('jquery'), '1.12.4' );

	//Ticker JS
	wp_enqueue_script('jQ-Ticker-Script', get_template_directory_uri() . '/js/jquery.ticker.js', array('jquery')  );

	//Custom JS
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') , '' , true);

	if(is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action('wp_enqueue_scripts', 'tierone_scripts');


/**
* This will rewrite the menu functions
*/
function tierone_display_menu(){
    wp_nav_menu(
        array( 
            'theme_location' => 'primary-menu', /* where in the theme it's assigned */
            'menu' => 'main_nav', /* menu name */
            'menu_class' => 'nav navbar-nav',
            'container' => false, /* container class */
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new tierone_menu_walker(),
        )
    );
}


/**
* Custom Search Form
*
* @param string $form Form HTML.
*
* @return string Modified form HTML.
*/
function tierone_search_form(){
	
	$form = '<form role="search" method="get" class="dt-search-form" id="searcform" action="' . esc_url(home_url('/')) . '">';
		$form .= '<label >';
			$form .= '<span class="screen-reader-text">Search for:</span>';
			$form .= '<input type="search" name="s" id="s" placeholder="Search for..." class="search-field" placeholder="Search for...">';
		$form .= '</label>';
		$form .= '<button type="submit" class="btn btn-secondary" type="button" id="searchsubmit"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>';
	$form .= '</form>';	

	return $form;	
}
add_filter( 'get_search_form', 'tierone_search_form' );



/**
* Facebook SDK
*/
function facebook_javascript_sdk(){
    ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <?php
}


/**
* Implement the custom menu walker
*/
require get_template_directory() . '/inc/wp_custom_walker.php';

/**
* Template tags
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Load Widget file
*/
require get_template_directory() . '/inc/widgets/widgets.php';

/**
* Load Breadcrumbs file
*/
require get_template_directory() . '/inc/breadcrumbs.php';

/**
* Load Customizer
*/
require get_template_directory() . '/inc/customizer.php';

