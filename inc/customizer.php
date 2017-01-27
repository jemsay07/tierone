<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* Tierone Theme Customizer.
*
* @package tierone
*/
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tierone_customize_register( $wp_customize ){
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	* Header Settings
	*/
	$wp_customize->add_panel( 'tierone_header_settings', array(		
			'priority'	  => 25,
			'title' => __( 'Header Settings', 'tierone' ),
			'description' => __( 'Use this panel to set your header settings', 'tierone' ),
			'capability'  => 'edit_theme_options'
		) 
	);

	
	/**
	* Related Post
	*/
	$wp_customize->add_section(
		'tierone_related_posts_section',
		array(
			'priority'		=> 100,
			'title'			=> __( 'Related Post' , 'tierone' )
		)
	);
	$wp_customize->add_setting( 
		'tierone_related_posts_setting',
		array(
			'default'		=> 0,
			'capability'	=> 'edit_theme_options',
			'sanitize_callback'	=> 'tierone_checkbox_sanitize'
		)
	);
	$wp_customize->add_control( 
		'tierone_related_posts',
		array(
			'type'  		=> 'checkbox',
			'label'			=> __( 'Check to activate the related posts' , 'tierone' ),
			'section'		=> 'tierone_related_posts_section',
			'settings'		=> 'tierone_related_posts_setting'
			
		)
	);

	/**
	* Share Social Media
	*/
	$wp_customize->add_section(
		'tierone_share_social_media_section',
		array(
			'priority'		=> 100,
			'title'			=> __( 'Share Social Media' , 'tierone')
		)
	);

	$wp_customize->add_setting( 
		'tierone_share_social_media_setting',
		array(
			'default'		=> 0,
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => 'tierone_checkbox_sanitize'
		)
	);

	$wp_customize->add_control( 
		'tierone_social_media_sharing',
		array(
			'type'			=> 'checkbox',
			'label'			=> __( 'Check to enable the Social Sharing' , 'tierone' ),
			'section'		=> 'tierone_share_social_media_section',
			'settings'		=> 'tierone_share_social_media_setting'
		)
	);

	/**
	* Font Color
	*/
	$wp_customize->add_section(
		'tierone_font_color_section',
		array(
			'priority' 	   => 6,
			'title'		   => __( 'Font Color','tierone' )
		)
	);

	$wp_customize->add_setting(
		'tierone_font_color',
		array(
			'default'				=> '#6b6b6b',
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'		=> 'tierone_color_sanitize',
			'sanitize_js_callback'  => 'tierone_color_escaping_sanitize'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'tierone_font_color',
			array(
				'label'		=> __( 'Font Color','tierone' ),
				'section'	=> 'colors',
				'settings'  => 'tierone_font_color'
			)
		)
	);


	/**
	* Primary Color
	*/
	$wp_customize->add_setting(
		'tierone_primary_color',
		array(
			'default' 			     => '#2e84ff',
			'capability' 			 => 'edit_theme_options',
			'sanitize_callback'		 => 'tierone_color_sanitize',
			'sanitize_js_callback'   => 'tierone_color_escaping_sanitize'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'tierone_primary_color',
			array(
				'label' 		=> __( 'Primary Color', 'tierone' ),
				'section' 		=> 'colors',
				'settings' 		=> 'tierone_primary_color'
			)
		)
	);


	/**
	* Checkbox Sanitize
	*/
	function  tierone_checkbox_sanitize( $input ){
		if( $input == 1 ){
			return 1;
		}else{
			return '';
		}
	}

	// Color Sanitizate
	function tierone_color_sanitize( $color ) {
		if ( $unhashed = sanitize_hex_color_no_hash( $color ))
			return '#' . $unhashed;

		return $color;
	}

	// Color Escape Sanitize
	function tierone_color_escaping_sanitize( $input ) {
		$input = esc_attr( $input );
		return $input;
	}

	/**
	* Layout Sanitize
	*/
	function tierone_site_layout_sanitize(){
		$valid_keys = array(
			'boxed_layout' => __( 'Boxed Layout', 'tierone' ),
			'wide_layout'  => __( 'Wide Layout', 'tierone' )
		);

		if ( array_key_exists( $input, $valid_keys ) ) {
			return $input;
		} else {
			return '';
		}
	}

	/**
	* Page Layout Sanitize
	*/
	function tierone_page_layout_sanitize( $input ) {
		$valid_keys = array(
			'right_sidebar' => __( 'Right Sidebar', 'tierone'),
			'left_sidebar'  => __( 'Left Sidebar', 'tierone' ),
			'full_width'  	=> __( 'Full Width', 'tierone' )
		);

		if ( array_key_exists( $input, $valid_keys ) ) {
			return $input;
		} else {
			return '';
		}
	}


	/**
	* Number Integer
	*/
	function tierone_sanitize_integer( $input ) {
		return absint( $input );
	}

}

add_action( 'customize_register', 'tierone_customize_register' );

/**
* Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/

function tierone_customise_prev_js(){
	wp_enqueue_script( 'tierone_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20161102', true );
}
add_action( 'wp_enqueue_scripts', 'tierone_customise_prev_js' );


/**
 * Enqueue Inline styles generated by customizer
 */

function tierone_customizer_style() {

	$color = get_theme_mod( 'tierone_font_color' );	

	if ( $color != '' ) {
		$dt_color = "
		body,
		h1 a, h2 a,
		h3 a, h4 a,
		h5 a, h6 a,
		a h1, a h2,
		a h3, a h4,
		a h5, a h6,
		.entry-title,
		.dt-site-title,
		.dt-default-page .entry-title,
		.dt-single-page .entry-title,
		.dt-category-wrap .page-header h1,
		.no-results .page-title,
		.search .page-title span,
		.dt-sidebar .dt-sidebar-title,
		.dt-sidebar .dt-widget-title,
		.dt-sidebar .dt-social-icons li .fa, a,
		.dt-sidebar-section .dt-site-recent > .dt-site-content > a > h3,
		.dt-sidebar-section .dt-site-recent > .dt-site-content > .dt-post-meta,
		.dt-post-meta.dt-post-meta-ams > .dt-post-comment > a,
		.dt-post-meta.dt-post-meta-ams > .dt-post-comment > i,
		.dt-post-meta.dt-post-meta-ams > .dt-post-view > a,
		.dt-post-meta.dt-post-meta-ams > .dt-post-view > i,
		.dt-post-meta.dt-post-meta-ams > .dt-post-calendar > a,
		.dt-post-meta.dt-post-meta-ams > .dt-post-calendar > i,
		.dt-site-title,
		.dt-site-4 .dt-site-content,
		.dt-site-5 .dt-post-meta span i, .dt-site-5 .dt-post-meta span a,
		.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-comment,
		.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-comment > i,
		.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-comment > a,
		.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-view > i,
		.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-view > a,
		.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-calendar > i,
		.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-calendar > a,
		.dt-related-posts h2{
			color: {$color};
		}
	";
	}else{
		$dt_color = "";
	}

	$primary = get_theme_mod( 'tierone_primary_color' );
	if ( $primary != '' ) {
		$dt_primary_color = "
			.dt-post-meta.dt-post-meta-ams > .dt-post-comment:hover > a,
			.dt-post-meta.dt-post-meta-ams > .dt-post-comment:hover > i,
			.dt-post-meta.dt-post-meta-ams > .dt-post-view:hover > a,
			.dt-post-meta.dt-post-meta-ams > .dt-post-view:hover > i,
			.dt-post-meta.dt-post-meta-ams > .dt-post-calendar:hover > a,
			.dt-post-meta.dt-post-meta-ams > .dt-post-calendar:hover > i,
			.dt-site-post > .dt-site-content > a:hover,
			.dt-site-post:hover > .dt-site-content > a > h3,
			.dt-sidebar-section .dt-site-recent > .dt-site-content > a:hover,
			.dt-sidebar-section .dt-site-recent:hover > .dt-site-content > span > a,
			.dt-sidebar-section .dt-site-recent:hover > .dt-site-content > a > h3,
			.dt-site-ams-content > .dt-site-ams-title:hover > a,
			.dt-featured-posts-wrap h2 a:hover,
			.dt-footer .dt-news-layout-wrap a:hover,
			.dt-footer-cont li a:hover,
			.dt-pagination-nav .current,
			.dt-sec-menu li a:hover,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-comment:hover,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-comment:hover > i,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-comment:hover > a,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-view:hover,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-view:hover > i,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-view:hover > a,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-calendar:hover,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-calendar:hover > i,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-calendar:hover > a,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-comment:focus,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-comment:focus > i,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-comment:focus > a,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-view:focus,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-view:focus > i,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-view:focus > a,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-calendar:focus,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-calendar:focus > i,
			.dt-category-posts  .dt-site-post .dt-post-content > .dt-post-meta > .dt-post-calendar:focus > a,
			a:hover{
				color: {$primary};
			}
			#back-to-top:hover{
				background-color: {$primary};
			}



		";
	}else{
		$dt_primary_color = '';
	}

	$custom_css = $dt_color . $dt_primary_color;

	wp_add_inline_style( 'tierone-style', $custom_css );
}
add_action( 'wp_enqueue_scripts','tierone_customizer_style' );

?>