<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;
/**
*Register Widget Area
*
*@package TierOne
*/


function tierone_widget_init(){

	//Register Right Widget
	register_sidebar(array(
		'name'          => __( 'Sidebar', 'tierone' ),
		'id'            => 'dt-site-right-sidebar',
		'description'   => __('Add widgets to Show widgets at right panel of page', 'tierone'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="dt-sidebar-title">',
		'after_title'   => '</h2>'
	) );

	//Register Metabox
	register_sidebar(array(
		'name'          => __( 'Custom Meta Box', 'tierone' ),
		'id'            => 'dt-site-meta-box',
		'description'   => __('Display the Meta tags', 'tierone'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => ''
	) );

	//Register Custom CSS & Script
	register_sidebar(array(
		'name'          => __( 'Custom Box', 'tierone' ),
		'id'            => 'dt-site-box',
		'description'   => __('Display the customize script or style or even normal html tag', 'tierone'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => ''
	) );

	//Register Ads727x90
	register_sidebar(array(
		'name'          => __( 'Frontpage: Ads 727x90', 'tierone' ),
		'id'            => 'dt-site-ads',
		'description'   => __('Shows the advertisement in the middle of the page', 'tierone'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="dt-sidebar-title">',
		'after_title'   => '</h2>'
	) );

	//Register Tierone Ticker
	register_sidebar(array(
		'name'          => __( 'Tierone Ticker', 'tierone' ),
		'id'            => 'dt-site-ticker',
		'description'   => __('Show Tierone Ticker', 'tierone'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="dt-sidebar-title">',
		'after_title'   => '</h2>'
	) );

	//Register Tierone slider
	register_sidebar(array(
		'name'          => __( 'Tierone Slider', 'tierone' ),
		'id'            => 'dt-site-carousel',
		'description'   => __('Show Tierone Slider', 'tierone'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="dt-sidebar-title">',
		'after_title'   => '</h2>'
	) );


	//Register Front Page Section
    register_sidebar( array(
        'name'          => __( 'Front Page: Tierone Section', 'tierone' ),
        'id'            => 'dt-site-tierone-section',
        'description'   => __('Add Widget to show list of tierone from category at Front Page Section', 'tierone'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="dt-sidebar-title">',
        'after_title'   => '</h2>',
    ) );

	//Register Footer Position A
	register_sidebar(array(
		'name'          => __( 'Footer Position A', 'tierone' ),
		'id'            => 'dt-footer-a',
		'description'   => __('Add widgets to Show widgets at Footer Position A', 'tierone'),
		'before_widget' => '<aside id="%1$s" class="widget dt-footer-a %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

	//Register Footer Position B
	register_sidebar(array(
		'name'          => __( 'Footer Position B', 'tierone' ),
		'id'            => 'dt-footer-b',
		'description'   => __('Add widgets to Show widgets at Footer Position B', 'tierone'),
		'before_widget' => '<aside id="%1$s" class="widget dt-footer-b %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

	//Register Footer Position C
	register_sidebar(array(
		'name'          => __( 'Footer Position C', 'tierone' ),
		'id'            => 'dt-footer-c',
		'description'   => __('Add widgets to Show widgets at Footer Position C', 'tierone'),
		'before_widget' => '<aside id="%1$s" class="widget dt-footer-c %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

	//Register Footer Position D
	register_sidebar(array(
		'name'          => __( 'Footer Position D', 'tierone' ),
		'id'            => 'dt-footer-d',
		'description'   => __('Add widgets to Show widgets at Footer Position D', 'tierone'),
		'before_widget' => '<aside id="%1$s" class="widget dt-footer-d %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );

}

add_action('widgets_init','tierone_widget_init');

/**
* Enqueue Admin Scripts
*/

function tierone_media_scripts( $hook ){
	if ( 'widgets.php' != $hook) {
		return;
	}
	wp_enqueue_style( 'wp-color-picker' );

	//Update Style with in the admin
	wp_enqueue_style( 'tierone-widgets', get_template_directory_uri() . '/inc/widgets/widgets.css');

	wp_enqueue_media();
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script( 'tierone-media-upload', get_template_directory_uri() . '/inc/widgets/widgets.js', array('jquery'), ' ' , true);
}
add_action( 'admin_enqueue_scripts', 'tierone_media_scripts');

/**
* Social Media
*/
class tierone_social_media extends WP_Widget{
	
	public function __construct(){
		parent:: __construct(
			'tierone_social_media',
			__('Tierone: Social Media', 'tierone'),
			array(
				'description' => __( 'Social Media Icons', 'tierone' )
			)
		);
	}

	public function widget( $args, $instance ) {
        $title      = isset( $instance['title'] ) ? $instance['title'] : '';
        $facebook   = isset( $instance['facebook'] ) ? $instance['facebook'] : '';
        $twitter 	= isset( $instance[ 'twitter' ] ) ? $instance[ 'twitter' ] : '';
		$pinterest 	= isset( $instance[ 'pinterest' ] ) ? $instance[ 'pinterest' ] : '';
		$google 	= isset( $instance[ 'google' ] ) ? $instance[ 'google' ] : '';
		$youtube 	= isset( $instance[ 'youtube' ] ) ? $instance[ 'youtube' ] : '';
		$linkedin 	= isset( $instance[ 'linkedin' ] ) ? $instance[ 'linkedin' ] : '';
	?>
		<aside class="dt-social-media">
			<h2 class="dt-widget-title"><?php if( ! empty( $title ) ){ echo esc_attr( $title ); }?></h2>
			<ul>
                <?php if( ! empty( $facebook ) ) { ?>
                    <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $twitter ) ) { ?>
                    <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fa fa-twitter"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $pinterest ) ) { ?>
                    <li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $google ) ) { ?>
                    <li><a href="<?php echo esc_url( $google ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $youtube ) ) { ?>
                    <li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank"><i class="fa fa-youtube"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $linkedin ) ) { ?>
                    <li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a> </li>
                <?php } ?>

			</ul>
		</aside>

	<?php
	}

    public function form( $instance ) {

        $instance = wp_parse_args(
            (array) $instance, array(
                'title'             => '',
                'facebook'          => ''
            )
        );
		?>
		<div class="dt-social-media">
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title','tierone' )?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e( 'Title', 'tierone' ); ?>">
			</div>
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook','tierone' )?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' );?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>" placeholder="<?php _e( 'https://www.facebook.com/' , 'tierone' ); ?>">
			</div>
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter','tierone' )?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' );?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>" placeholder="<?php _e( 'https://www.twitter.com/' , 'tierone' ); ?>">
			</div>
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest','tierone' )?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' );?>" value="<?php echo esc_attr( $instance['pinterest'] ); ?>" placeholder="<?php _e( 'https://www.pinterest.com/' , 'tierone' ); ?>">
			</div>
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'google' ); ?>"><?php _e( 'Gooogle +','tierone' )?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'google' ); ?>" name="<?php echo $this->get_field_name( 'google' );?>" value="<?php echo esc_attr( $instance['google'] ); ?>" placeholder="<?php _e( 'https://plus.google.com/' , 'tierone' ); ?>">
			</div>
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube','tierone' )?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' );?>" value="<?php echo esc_attr( $instance['youtube'] ); ?>" placeholder="<?php _e( 'https://www.youtube.com/' , 'tierone' ); ?>">
			</div>
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin','tierone' )?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' );?>" value="<?php echo esc_attr( $instance['linkedin'] ); ?>" placeholder="<?php _e( 'https://www.linkedin.com/' , 'tierone' ); ?>">
			</div>
		</div>
	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance	=	$old_instance;
		$instance['title'] 	= strip_tags( stripslashes( $new_instance['title']  ) );
		$instance['facebook'] 	= strip_tags( stripslashes( $new_instance['facebook'] ) );
		$instance['twitter'] 	= strip_tags( stripslashes( $new_instance['twitter'] ) );
		$instance['pinterest'] 	= strip_tags( stripslashes( $new_instance['pinterest'] ) );
		$instance['google'] 	= strip_tags( stripslashes( $new_instance['google'] ) );
		$instance['youtube'] 	= strip_tags( stripslashes( $new_instance['youtube'] ) );
		$instance['linkedin'] 	= strip_tags( stripslashes( $new_instance['linkedin'] ) );
		return $instance;
	}

}


/**
* Custom Meta
*/
class tierone_meta_box extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_meta_box',
			__( 'Tierone: Custom Meta Box' , 'tierone' ),
			array(
				'description' => __( 'Meta Tag Box' , 'tierone' )
			)
		);
	}

	public function widget($args,$instance){
		$meta_box 	= isset( $instance['meta_box'] ) ? $instance['meta_box'] : '';
		
		echo  $meta_box ;
	}

	public function form($instance){
		$instance = wp_parse_args(
			(array) $instance, array(
				'meta_box' 	=> ''
			)
		);
		?>
		<div class="dt-meta-box">
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'meta_box' );?>"><?php _e( 'Meta Tags:' , 'tierone'); ?></label>
				<textarea id="<?php echo $this->get_field_id('meta_box');?>" name="<?php echo $this->get_field_name('meta_box')?>" ><?php echo  $instance['meta_box']; ?></textarea>
			</div>
		</div>
		<?php
	}

	public function update($new_instance,$old_instance){
		$instance 		= $old_instance;
		$instance['meta_box']      =    $new_instance['meta_box']  ;

		 return $instance;
	}
}

/**
* Custom Box
*/
class tierone_custom_box extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_custom_box',
			__( 'Tierone: Custom Box' , 'tierone' ),
			array(
				'description' => __( 'Show the Custom script , style and normal html tag' , 'tierone' )
			)
		);
	}
	public function widget($args,$instance){
		$box_script = isset( $instance['box_script'] ) ? $instance['box_script'] : '';
		$box_style 	= isset( $instance['box_style'] ) ? $instance['box_style'] : '';
		
		?>
		<script type="text/javascript">
			<?php echo  $box_script ; ?>
		</script>
		<style type="text/css">
			<?php echo  $box_style ; ?>
		</style>
		<?php
	}

	public function form($instance){
		$instance = wp_parse_args(
			(array) $instance, array(
				'title' 	=> '',
				'box_script' 	=> ''
			)
		);
		?>
		<div class="dt-meta-box">
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'box_style' );?>"><?php _e( 'CSS Editor:' , 'tierone'); ?></label>
				<textarea id="<?php echo $this->get_field_id('box_style');?>" name="<?php echo $this->get_field_name('box_style')?>" placeholder="<?php _e( 'Put Style Here','tierone' );  ?>"><?php echo  $instance['box_style']; ?></textarea>
			</div>
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'box_script' );?>"><?php _e( 'Script Editor:' , 'tierone'); ?></label>
				<textarea id="<?php echo $this->get_field_id('box_script');?>" name="<?php echo $this->get_field_name('box_script')?>" placeholder="<?php _e( 'Put Script Here','tierone' );  ?>"><?php echo  $instance['box_script']; ?></textarea>
			</div>
		</div>
		<?php
	}

	public function update($new_instance,$old_instance){
		$instance 		= $old_instance;
		$instance['box_script']      =    $new_instance['box_script']  ;
		$instance['box_style']      =    $new_instance['box_style']  ;

		return $instance;
	}
}


/**
* Ads 300x250
*/
class tierone_ads_300x250 extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_ads_300x250',
			__('Tierone: Ads 300x250', 'tierone'),
			array(
				'description' => __('Advertisement with size 300x250 for Sidebar position', 'tierone')
			)
		);
	}

	public function widget($args,$instance){
		$title          = isset( $instance['title'] ) ? $instance['title'] : '';
		$ads_image_path = isset( $instance['ads_image'] ) ? $instance['ads_image'] : '';
		$ads_link       = isset( $instance['ads_link'] ) ? $instance['ads_link'] : '';
		$ads_link_type  = isset( $instance['ads_link_type'] ) ? $instance['ads_link_type'] : '';

		if ( empty($title) ) {
			$title = __('300x250 Ads', 'tierone');
		}

		if ( empty($ads_image_path) ) {
			$ads_image_path = '';
		}

		if ( empty($ads_link) ) {
			$ads_link = esc_url( home_url( '/' ) );
		}

		if ( $ads_link_type == "nofollow" ) {
			$ads_link_type = "nofollow";
		}else{
			$ads_link_type = "dofollow";
		}

		?>
		<a href="<?php echo esc_url( $ads_link ); ?>" title="<?php echo esc_attr( $title ); ?>" rel="<?php echo esc_attr( $ads_link_type ); ?>" target="_blank" ><img src="<?php echo esc_url( $ads_image_path ); ?>" alt="<?php echo esc_attr( $title ); ?>" style="margin-top: 20px;"></a>
	<?php

    }

    public function form( $instance ) {

        $instance = wp_parse_args(
            (array) $instance, array(
                'title'              => '',
                'ads_link'           => '',
                'ads_image'          => '',
                'ads_link_type'      => ''
            )
        );

        ?>
        <div class="dt-ads-300x250">
        	<div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:' , 'tierone'); ?></label>
        		<input type="text" id="<?php echo $this->get_field_id( 'title' );?>"  name="<?php echo $this->get_field_name( 'title' );?>"  value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e('Advertise Title','tierone');?>">
        	</div><!--.dt-admin-input-wrap-->

        	<div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id( 'ads_link' );?>"><?php _e( 'Ads Link:' , 'tierone'); ?></label>
        		<input type="text" id="<?php echo $this->get_field_id( 'ads_link' );?>"  name="<?php echo $this->get_field_name( 'ads_link' );?>"  value="<?php echo esc_attr( $instance['ads_link'] ); ?>" placeholder="<?php _e('URL','tierone');?>">
        	</div><!--.dt-admin-input-wrap-->

        	<div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id( 'ads_link_type' );?>"><?php _e( 'Link Type:' , 'tierone'); ?></label>
        		<select id="<?php echo $this->get_field_id( 'ads_link_type' );?>" name="<?php echo $this->get_field_name( 'ads_link_type' );?>">
					<option value="dofollow" <?php selected( $instance['ads_link_type'], 'dofollow')?>>Do Follow</option>        			
					<option value="nofollow" <?php selected( $instance['ads_link_type'], 'nofollow')?>>No Follow</option>        			
        		</select>
        	</div><!--.dt-admin-input-wrap-->
        	<div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id( 'ads_image' );?>"><?php _e( 'Ads Image:' , 'tierone'); ?></label>
        		<?php
        			$dt_ads_img = $instance['ads_image'];
        			if ( !empty( $dt_ads_img ) ) { ?>
        				<img src="<?php echo $dt_ads_img; ?>"/>
        			<?php }else{ ?>
        				<img src="" />
        			<?php } ?>
        			<input type="hidden" class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'ads_image' );?>" name="<?php echo $this->get_field_name( 'ads_image' );?>" value="<?php echo esc_attr( $instance['ads_image'] ); ?>" />
                	<input type="button" class="dt-img-upload dt-custom-media-button" id="custom_media_button" name="<?php echo $this->get_field_name( 'ads_image' ); ?>"  value="<?php _e( 'select Image', 'tierone' ); ?>" />
        	</div><!--.dt-admin-input-wrap-->
        </div><!--.dt-ads-300x250-->
    <?php
	}


    public function update( $new_instance, $old_instance ) {

        $instance               = $old_instance;
        $instance['title']      = strip_tags( stripslashes( $new_instance['title'] ) );
        $instance['ads_link']   = strip_tags( stripslashes( $new_instance['ads_link'] ) );
        $instance['ads_link_type']  = strip_tags( $new_instance['ads_link_type'] );
        $instance['ads_image']  = strip_tags( $new_instance['ads_image'] );
        return $instance;

    }
} //ads300x250 

/**
* Ads 727x90
*/
class tierone_ads_727x90 extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_ads_727x90',
			__('Tierone: Ads 727x90', 'tierone'),
			array(
				'description' => __('Advertisement with size 727x90 for Front Page', 'tieone')
			)
		);
	}

	public function widget($args,$instance){
		$title          = isset( $instance['title'] ) ? $instance['title'] : '';
		$ads_image_path = isset( $instance['ads_image'] ) ? $instance['ads_image'] : '';
		$ads_link       = isset( $instance['ads_link'] ) ? $instance['ads_link'] : '';
		$ads_link_type  = isset( $instance['ads_link_type'] ) ? $instance['ads_link_type'] : '';

		if ( empty($title) ) {
			$title = __('720x90', 'tierone');
		}

		if ( empty($ads_image_path) ) {
			$ads_image_path = '';
		}

		if ( empty($ads_link) ) {
			$ads_link = esc_url( home_url( '/' ) );
		}

		if ( $ads_link_type == "nofollow" ) {
			$ads_link_type = "nofollow";
		}else{
			$ads_link_type = "dofollow";
		}

		?>
		<div class="dt-site-ads">
      		<a href="<?php echo esc_url( $ads_link ); ?>" title="<?php echo esc_attr( $title ); ?>" rel="<?php echo esc_attr( $ads_link_type ); ?>" target="_blank"><img src="<?php echo esc_url( $ads_image_path ); ?>" alt="<?php echo esc_attr( $title ); ?>"> </a>
		</div>
	<?php

    }

    public function form( $instance ) {

        $instance = wp_parse_args(
            (array) $instance, array(
                'title'              => '',
                'ads_link'           => '',
                'ads_image'          => '',
                'ads_link_type'      => ''
            )
        );

        ?>
        <div class="dt-ads-727x90">
        	<div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:' , 'tierone'); ?></label>
        		<input type="text" id="<?php echo $this->get_field_id( 'title' );?>"  name="<?php echo $this->get_field_name( 'title' );?>"  value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e('Advertise Title','tierone');?>">
        	</div><!--.dt-admin-input-wrap-->

        	<div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id( 'ads_link' );?>"><?php _e( 'Ads Link:' , 'tierone'); ?></label>
        		<input type="text" id="<?php echo $this->get_field_id( 'ads_link' );?>"  name="<?php echo $this->get_field_name( 'ads_link' );?>"  value="<?php echo esc_attr( $instance['ads_link'] ); ?>" placeholder="<?php _e('URL','tierone');?>">
        	</div><!--.dt-admin-input-wrap-->

        	<div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id( 'ads_link_type' );?>"><?php _e( 'Link Type:' , 'tierone'); ?></label>
        		<select id="<?php echo $this->get_field_id( 'ads_link_type' );?>" name="<?php echo $this->get_field_name( 'ads_link_type' );?>">
					<option value="dofollow" <?php selected( $instance['ads_link_type'], 'dofollow')?>>Do Follow</option>        			
					<option value="nofollow" <?php selected( $instance['ads_link_type'], 'nofollow')?>>No Follow</option>        			
        		</select>
        	</div><!--.dt-admin-input-wrap-->
        	<div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id( 'ads_image' );?>"><?php _e( 'Ads Image:' , 'tierone'); ?></label>
        		<?php
        			$dt_ads_img = $instance['ads_image'];
        			if ( !empty( $dt_ads_img ) ) { ?>
        				<img src="<?php echo $dt_ads_img; ?>"/>
        			<?php }else{ ?>
        				<img src="" />
        			<?php } ?>
        			<input type="hidden" class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'ads_image' );?>" name="<?php echo $this->get_field_name( 'ads_image' );?>" value="<?php echo esc_attr( $instance['ads_image'] ); ?>" />
                	<input type="button" class="dt-img-upload dt-custom-media-button" id="custom_media_button" name="<?php echo $this->get_field_name( 'ads_image' ); ?>"  value="<?php _e( 'select Image', 'tierone' ); ?>" />
        	</div><!--.dt-admin-input-wrap-->
        </div><!--.dt-ads-727x90-->
    <?php
	}
    public function update( $new_instance, $old_instance ) {

        $instance               = $old_instance;
        $instance['title']      = strip_tags( stripslashes( $new_instance['title'] ) );
        $instance['ads_link']   = strip_tags( stripslashes( $new_instance['ads_link'] ) );
        $instance['ads_link_type']  = strip_tags( $new_instance['ads_link_type'] );
        $instance['ads_image']  = strip_tags( $new_instance['ads_image'] );
        return $instance;

    }

}

/**
* Tierone Promo Ads Banner
*/
class tierone_banner_promo_ads extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_banner_promo_ads',
			__('Tierone: Promo Ads','tierone'),
			array(
				'description' => __( 'Multiple Promo Advertisement Banner', 'tierone' )
			)
		);
	}

	public function widget($args,$instance){
		$title1 			= isset( $instance['title1'] ) ? $instance['title1'] : '';
		$alt1 				= isset( $instance['alt1'] ) ? $instance['alt1'] : '';
		$ads_image_path1 	= isset( $instance['ads_image'] ) ? $instance['ads_image'] : '';
		$ads_link1 			= isset( $instance['ads_link1'] ) ? $instance['ads_link1'] : '';
		$ads_target1 		= isset( $instance['ads_target1'] ) ? $instance['ads_target1'] : '';

		/*bpa 2*/
		$title2 			= isset( $instance['title2'] ) ? $instance['title2'] : '';
		$alt2				= isset( $instance['alt2'] ) ? $instance['alt2'] : '';
		$ads_image_path2 	= isset( $instance['ads_image2'] ) ? $instance['ads_image2'] : '';
		$ads_link2 			= isset( $instance['ads_link2'] ) ? $instance['ads_link2'] : '';
		$ads_target2 		= isset( $instance['ads_target2'] ) ? $instance['ads_target2'] : '';

		/*bpa 3*/
		$title3 			= isset( $instance['title3'] ) ? $instance['title3'] : '';
		$alt3				= isset( $instance['alt3'] ) ? $instance['alt3'] : '';
		$ads_image_path3 	= isset( $instance['ads_image3'] ) ? $instance['ads_image3'] : '';
		$ads_link3			= isset( $instance['ads_link3'] ) ? $instance['ads_link3'] : '';
		$ads_target3 		= isset( $instance['ads_target3'] ) ? $instance['ads_target3'] : '';

		/*bpa 4*/
		$title4 			= isset( $instance['title4'] ) ? $instance['title4'] : '';
		$alt4				= isset( $instance['alt4'] ) ? $instance['alt4'] : '';
		$ads_image_path4 	= isset( $instance['ads_image4'] ) ? $instance['ads_image4'] : '';
		$ads_link4			= isset( $instance['ads_link4'] ) ? $instance['ads_link4'] : '';
		$ads_target4 		= isset( $instance['ads_target4'] ) ? $instance['ads_target4'] : '';

		if( empty( $title1 ) ){
			$title1 	= '';
		};

		if ( empty( $ads_image_path1 ) ) {
			$ads_image_path1 = '';
		};

		if ( empty( $ads_link1 ) ) {
			$ads_link1 = esc_url(home_url('/'));
		};

		if ( $ads_target1 == '_blank' ) {
			$ads_target1 = '_blank';
		}else{
			$ads_target1 = '_self';
		}
		/*2*/
		if( empty( $title2 ) ){
			$title2 	= '';
		};

		if ( empty( $ads_image_path2 ) ) {
			$ads_image_path2 = '';
		};

		if ( empty( $ads_link2 ) ) {
			$ads_link2 = esc_url(home_url('/'));
		};


		if ( $ads_target2 == '_blank' ) {
			$ads_target2 = '_blank';
		}else{
			$ads_target2 = '_self';
		}

		/*3*/
		if( empty( $title3 ) ){
			$title3 	= '';
		};

		if ( empty( $ads_image_path3 ) ) {
			$ads_image_path3 = '';
		};

		if ( empty( $ads_link3 ) ) {
			$ads_link3 = esc_url(home_url('/'));
		};

		if ( $ads_target3 == '_blank' ) {
			$ads_target3 = '_blank';
		}else{
			$ads_target3 = '_self';
		}

		/*4*/
		if( empty( $title4 ) ){
			$title4 	= '';
		};

		if ( empty( $ads_image_path4 ) ) {
			$ads_image_path4 = '';
		};

		if ( empty( $ads_link4 ) ) {
			$ads_link4 = esc_url(home_url('/'));
		};


		if ( $ads_target4 == '_blank' ) {
			$ads_target4 = '_blank';
		}else{
			$ads_target4 = '_self';
		}
		
		$ads_link1 = do_shortcode($ads_link1);
		$ads_link2 = do_shortcode($ads_link2);
		$ads_link3 = do_shortcode($ads_link3);
		$ads_link4 = do_shortcode($ads_link4);
		?>
		<div class="dt-site-bpa-ads">
			<div class="dt-site-bpa-box">
				<a href="<?php echo $ads_link1; ?>" target="<?php echo esc_attr( $ads_target1 ); ?>" >
					<img src="<?php echo esc_url( $ads_image_path1 ); ?>" title="<?php echo esc_attr( $title1 ); ?>" alt="<?php echo esc_attr( $alt1 ); ?>">
				</a>
			</div>
			<div class="dt-site-bpa-box">
				<a href="<?php echo  $ads_link2; ?>" target="<?php echo esc_attr( $ads_target2 ); ?>" >
					<img src="<?php echo esc_url( $ads_image_path2 ); ?>" title="<?php echo esc_attr( $title2 ); ?>" alt="<?php echo esc_attr( $alt2 ); ?>">
				</a>
			</div>
			<div class="dt-site-bpa-box">
				<a href="<?php echo $ads_link3; ?>" target="<?php echo esc_attr( $ads_target3 ); ?>" >
					<img src="<?php echo esc_url( $ads_image_path3 ); ?>" title="<?php echo esc_attr( $title3 ); ?>" alt="<?php echo esc_attr( $alt3 ); ?>">
				</a>
			</div>
			<div class="dt-site-bpa-box">
				<a href="<?php echo $ads_link4; ?>" target="<?php echo esc_attr( $ads_target4 ); ?>" >
					<img src="<?php echo esc_url( $ads_image_path4 ); ?>" title="<?php echo esc_attr( $title4 ); ?>" alt="<?php echo esc_attr( $alt4 ); ?>">
				</a>
			</div>
			<span class="clearfix"></span>
		</div>
		<?php
	}

	public function form($instance){
		$instance = wp_parse_args(
			(array) $instance, array(
				'title1'				=> '',
				'alt1'					=> '',
				'ads_image'				=> '',
				'ads_link1'				=> '',
				'ads_target1'			=> '',
				'title2'				=> '',
				'alt2'					=> '',
				'ads_image2'			=> '',
				'ads_link2'				=> '',
				'ads_target2'			=> '',
				'title3'				=> '',
				'alt3'					=> '',
				'ads_image3'			=> '',
				'ads_link3'				=> '',
				'ads_target3'			=> '',
				'title4'				=> '',
				'alt4'					=> '',
				'ads_image4'			=> '',
				'ads_link4'				=> '',
				'ads_target4'			=> ''
			)
		);
		?>
		<div class="dt-ads-bpa">
			<h3><?php _e('Promo Ads 1','tierone'); ?></h3>
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e( 'Title:','tierone' ); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('title1'); ?>" name="<?php echo $this->get_field_name('title1'); ?>" value="<?php echo esc_attr( $instance['title1'] ); ?>" placeholder="<?php _e( 'Promo Ads Title Image','tierone' ); ?>">
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('alt1'); ?>"><?php _e( 'Alt Text:','tierone' ); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('alt1'); ?>" name="<?php echo $this->get_field_name('alt1'); ?>" value="<?php echo esc_attr( $instance['alt1'] ); ?>" placeholder="<?php _e( 'Promo Ads Alternative Text','tierone' ); ?>">				
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('ads_link1'); ?>"><?php _e( 'Ads Link:','tierone' ); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('ads_link1'); ?>" name="<?php echo $this->get_field_name('ads_link1'); ?>" value="<?php echo esc_attr( $instance['ads_link1'] ); ?>" placeholder="<?php _e( 'Promo Ads URL ','tierone' ); ?>">				
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('ads_target1'); ?>"><?php _e( 'Link Target:','tierone' ); ?></label>
				<select id="<?php echo $this->get_field_id('ads_target1'); ?>" name="<?php echo $this->get_field_name('ads_target1'); ?>">
					<option value="_blank" <?php selected( $instance['ads_target1'], '_blank' ); ?>>_blank</option>
					<option value="_self" <?php selected( $instance['ads_target1'], '_self' ); ?>>_self</option>
				</select>			
			</div><!--.dt-admin-input-wrap-->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'ads_image' ); ?>"><?php _e( 'Ads Image:', 'tierone' ); ?></label>
            	<?php $dt_ads_img = $instance['ads_image'];
                if ( ! empty( $dt_ads_img ) ) { ?>
                    <img src="<?php echo $dt_ads_img; ?>" />
                <?php } else { ?>
                    <img src="" />
                <?php } ?>
           		<input type="text"  class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'ads_image' ); ?>" name="<?php echo $this->get_field_name( 'ads_image' ); ?>" value="<?php echo esc_attr( $instance['ads_image'] ); ?>" style="width: calc( 100% - 10px );"/>
            </div><!-- .dt-admin-input-wrap -->


            <?php /* 2 */ ?>
            <h3><?php _e('Promo Ads 2','tierone'); ?></h3>
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('title2'); ?>"><?php _e( 'Title:','tierone' ); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" value="<?php echo esc_attr( $instance['title2'] ); ?>" placeholder="<?php _e( 'Promo Ads Title Image','tierone' ); ?>">
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('alt2'); ?>"><?php _e( 'Alt Text:','tierone' ); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('alt2'); ?>" name="<?php echo $this->get_field_name('alt2'); ?>" value="<?php echo esc_attr( $instance['alt2'] ); ?>" placeholder="<?php _e( 'Promo Ads Alternative Text','tierone' ); ?>">				
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('ads_link2'); ?>"><?php _e( 'Ads Link:','tierone' ); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('ads_link2'); ?>" name="<?php echo $this->get_field_name('ads_link2'); ?>" value="<?php echo esc_attr( $instance['ads_link2'] ); ?>" placeholder="<?php _e( 'Promo Ads URL ','tierone' ); ?>">				
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('ads_target2'); ?>"><?php _e( 'Link Target:','tierone' ); ?></label>
				<select id="<?php echo $this->get_field_id('ads_target2'); ?>" name="<?php echo $this->get_field_name('ads_target2'); ?>">
					<option value="_blank" <?php selected( $instance['ads_target2'], '_blank' ); ?>>_blank</option>
					<option value="_self" <?php selected( $instance['ads_target2'], '_self' ); ?>>_self</option>
				</select>			
			</div><!--.dt-admin-input-wrap-->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id('ads_image2'); ?>"><?php _e( 'Ads Image:','tierone' ); ?></label>

                <?php $dt_ads_img2 = $instance['ads_image2'];
                if ( ! empty( $dt_ads_img2 ) ) { ?>
                    <img src="<?php echo $dt_ads_img2; ?>" />
                <?php } else { ?>
                    <img src="" />
                <?php } ?>

               	<input type="text"  class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'ads_image2' ); ?>" name="<?php echo $this->get_field_name( 'ads_image2' ); ?>" value="<?php echo esc_attr( $instance['ads_image2'] ); ?>" style="width: calc( 100% - 10px );"/>
            </div><!-- .dt-admin-input-wrap -->

            <?php /* 3 */ ?>
            <h3><?php _e('Promo Ads 3','tierone'); ?></h3>
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('title3'); ?>"><?php _e( 'Title:','tierone' ); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('title3'); ?>" name="<?php echo $this->get_field_name('title3'); ?>" value="<?php echo esc_attr( $instance['title3'] ); ?>" placeholder="<?php _e( 'Promo Ads Title Image 3','tierone' ); ?>">
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('alt3'); ?>"><?php _e( 'Alt Text:','tierone' ); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('alt3'); ?>" name="<?php echo $this->get_field_name('alt3'); ?>" value="<?php echo esc_attr( $instance['alt3'] ); ?>" placeholder="<?php _e( 'Promo Ads Alternative Text 3','tierone' ); ?>">				
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('ads_link3'); ?>"><?php _e( 'Ads Link:','tierone' ); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('ads_link3'); ?>" name="<?php echo $this->get_field_name('ads_link3'); ?>" value="<?php echo esc_attr( $instance['ads_link3'] ); ?>" placeholder="<?php _e( 'Promo Ads URL 3','tierone' ); ?>">				
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('ads_target3'); ?>"><?php _e( 'Link Target:','tierone' ); ?></label>
				<select id="<?php echo $this->get_field_id('ads_target3'); ?>" name="<?php echo $this->get_field_name('ads_target3'); ?>">
					<option value="_blank" <?php selected( $instance['ads_target3'], '_blank' ); ?>>_blank</option>
					<option value="_self" <?php selected( $instance['ads_target3'], '_self' ); ?>>_self</option>
				</select>			
			</div><!--.dt-admin-input-wrap-->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id('ads_image3'); ?>"><?php _e( 'Ads Image:','tierone' ); ?></label>

                <?php $dt_ads_img3 = $instance['ads_image3'];
                if ( ! empty( $dt_ads_img3 ) ) { ?>
                    <img src="<?php echo $dt_ads_img3; ?>" />
                <?php } else { ?>
                    <img src="" />
                <?php } ?>
               	<input type="text"  class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'ads_image3' ); ?>" name="<?php echo $this->get_field_name( 'ads_image3' ); ?>" value="<?php echo esc_attr( $instance['ads_image3'] ); ?>" style="width: calc( 100% - 10px );"/>
            </div><!-- .dt-admin-input-wrap -->

            <?php /* 4 */ ?>
            <h3><?php _e('Promo Ads 4','tierone'); ?></h3>
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('title4'); ?>"><?php _e( 'Title:','tierone' ); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('title4'); ?>" name="<?php echo $this->get_field_name('title4'); ?>" value="<?php echo esc_attr( $instance['title4'] ); ?>" placeholder="<?php _e( 'Promo Ads Title Image 4','tierone' ); ?>">
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('alt4'); ?>"><?php _e( 'Alt Text:','tierone' ); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('alt4'); ?>" name="<?php echo $this->get_field_name('alt4'); ?>" value="<?php echo esc_attr( $instance['alt4'] ); ?>" placeholder="<?php _e( 'Promo Ads Alternative Text 4','tierone' ); ?>">				
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('ads_link4'); ?>"><?php _e( 'Ads Link:','tierone' ); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('ads_link4'); ?>" name="<?php echo $this->get_field_name('ads_link4'); ?>" value="<?php echo esc_attr( $instance['ads_link4'] ); ?>" placeholder="<?php _e( 'Promo Ads URL 4','tierone' ); ?>">				
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id('ads_target4'); ?>"><?php _e( 'Link Target:','tierone' ); ?></label>
				<select id="<?php echo $this->get_field_id('ads_target4'); ?>" name="<?php echo $this->get_field_name('ads_target4'); ?>">
					<option value="_blank" <?php selected( $instance['ads_target4'], '_blank' ); ?>>_blank</option>
					<option value="_self" <?php selected( $instance['ads_target4'], '_self' ); ?>>_self</option>
				</select>			
			</div><!--.dt-admin-input-wrap-->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id('ads_image4'); ?>"><?php _e( 'Ads Image:','tierone' ); ?></label>

                <?php $dt_ads_img4 = $instance['ads_image4'];
                if ( ! empty( $dt_ads_img4 ) ) { ?>
                    <img src="<?php echo $dt_ads_img4; ?>" />
                <?php } else { ?>
                    <img src="" />
                <?php } ?>
               	<input type="text"  class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'ads_image4' ); ?>" name="<?php echo $this->get_field_name( 'ads_image4' ); ?>" value="<?php echo esc_attr( $instance['ads_image4'] ); ?>" style="width: calc( 100% - 10px );"/>
            </div><!-- .dt-admin-input-wrap -->

		</div>
		<?php		
	}

	public function update($new_instance,$old_instance){

        $instance               = $old_instance;
        $instance['title1']      		= strip_tags( stripslashes( $new_instance['title1'] ) );
        $instance['alt1']      			= strip_tags( stripslashes( $new_instance['alt1'] ) );
        $instance['ads_link1']   		= strip_tags( stripslashes( $new_instance['ads_link1'] ) );
        $instance['ads_target1']  		= strip_tags( $new_instance['ads_target1'] );
        $instance['ads_image']  		= strip_tags( $new_instance['ads_image'] );
        /*2*/
        $instance['title2']      		= strip_tags( stripslashes( $new_instance['title2'] ) );
        $instance['alt2']      			= strip_tags( stripslashes( $new_instance['alt2'] ) );
        $instance['ads_link2']   		= strip_tags( stripslashes( $new_instance['ads_link2'] ) );
        $instance['ads_target2']  		= strip_tags( $new_instance['ads_target2'] );
        $instance['ads_image2']  		= strip_tags( $new_instance['ads_image2'] );
        /*3*/
        $instance['title3']      		= strip_tags( stripslashes( $new_instance['title3'] ) );
        $instance['alt3']      			= strip_tags( stripslashes( $new_instance['alt3'] ) );
        $instance['ads_link3']   		= strip_tags( stripslashes( $new_instance['ads_link3'] ) );
        $instance['ads_target3']  		= strip_tags( $new_instance['ads_target3'] );
        $instance['ads_image3']  		= strip_tags( $new_instance['ads_image3'] );
        /*4*/
        $instance['title4']      		= strip_tags( stripslashes( $new_instance['title4'] ) );
        $instance['alt4']      			= strip_tags( stripslashes( $new_instance['alt4'] ) );
        $instance['ads_link4']   		= strip_tags( stripslashes( $new_instance['ads_link4'] ) );
        $instance['ads_target4']  		= strip_tags( $new_instance['ads_target4'] );
        $instance['ads_image4']  		= strip_tags( $new_instance['ads_image4'] );
        return $instance;

	}
}


/**
* Tierone Ticker
*/
class tierone_ticker extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_ticker',
			__( 'Tierone: Ticker' , 'tierone' ),
			array(
				'description'	=> __( 'Tierone Ticker','tierone' )
			)
		);
	}

	public function widget($args,$instance){
		$title 		= isset( $instance['title'] ) ? $instance['title'] : 'Headlines';
		$show_posts_from = isset( $instance[ 'show_posts_from' ] ) ? $instance[ 'show_posts_from' ] : '';
		$category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$no_of_posts     = isset( $instance['no_of_posts'] ) ? $instance['no_of_posts'] : '5';

		if ( $show_posts_from == "recent" ) {
			$tierone_ticker_posts = new WP_Query( array(
				'post_type' 		=> 'post',
				'category__in' 		=> $category,
				'posts_per_page' 	=> $no_of_posts,
				'ignore_sticky_posts' => true
			) );
		}else{
			$tierone_ticker_posts = new WP_Query( array(
				'post_type' 		=> 'post',
				'category__in' 		=> $category,
				'posts_per_page' 	=> $no_of_posts
			) );
		}

		if ( $tierone_ticker_posts->have_posts() ) : ?>
		<div class="dt-tier-ticker ticker">

			<?php if( ! empty( $title ) ) : ?><span class="dt-ticker-tag"><?php echo esc_attr( $title ); ?> /// </span><?php endif;?>

		    <ul class="dt-tierone-ticker">
		    	<?php while( $tierone_ticker_posts->have_posts() ) : $tierone_ticker_posts->the_post(); ?>
                    <li><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"> <?php esc_attr( the_title() ); ?></a> - <?php echo strip_tags( esc_attr( tierone_excerpt_max_charlength(85) ) ) ?></li>
				<?php endwhile;?>
		    </ul>
		</div>
		<?php else : ?>
			<p><?php _e('Sorry, no posts found in selected category','tierone'); ?></p>
		<?php endif;
	}

	public function form($instance){
        $instance = wp_parse_args(
            (array) $instance, array(
                'title'              => 'headlines',
                'show_posts_from'    => 'recent',
                'category'           => '',
                'no_of_posts'        => '5'
            )
        );
      ?>

        <div class="dt-featured-post-slider">
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title', 'tierone' ); ?></strong></label>
                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
            </div>

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'show_posts_from' ); ?>"><strong><?php _e( 'Chose Type', 'tierone' ); ?></strong></label>

                <input type="radio" id="<?php echo $this->get_field_id( 'show_posts_from' ); ?>" name="<?php echo $this->get_field_name( 'show_posts_from' ); ?>" value="<?php _e( 'recent', 'tierone' ); ?>" <?php checked( $instance[ 'show_posts_from' ], 'recent' ); ?> ><?php _e( 'Recent Posts', 'tierone' ); ?>
                <input type="radio" id="<?php echo $this->get_field_id( 'show_posts_from' ); ?>" name="<?php echo $this->get_field_name( 'show_posts_from' ); ?>" value="<?php _e( 'category', 'tierone' ); ?>" <?php checked( $instance[ 'show_posts_from' ], 'category' ); ?> ><?php _e( 'Category', 'tierone' ); ?>

                <br /><br />
            </div>

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'category' ); ?>"><strong><?php _e( 'Category', 'tierone' ); ?></strong></label>

                <select id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">

                    <?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
                        <option <?php selected( $instance['category'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'no_of_posts' ); ?>"><strong><?php _e( 'No. of Posts', 'tierone' ); ?></strong></label>
                <input type="number" id="<?php echo $this->get_field_id( 'no_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'no_of_posts' ); ?>" value="<?php echo esc_attr( $instance['no_of_posts'] ); ?>">
            </div>
        </div>
      <?php
	}
	public function update($new_instance,$old_instance){

        $instance                       = $old_instance;
        $instance[ 'title' ]            = strip_tags( stripslashes( $new_instance[ 'title' ] ) );
        $instance[ 'show_posts_from' ]  = $new_instance[ 'show_posts_from' ];
        $instance[ 'category' ]         = $new_instance[ 'category' ];
        $instance[ 'no_of_posts' ]      = strip_tags( stripslashes( $new_instance[ 'no_of_posts' ]  ) );
        return $instance;
	}
}


/**
* Tierone Slider
*/
class tierone_slider extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_slider',
			__('Tierone: Slider', 'tierone'),
			array(
				'description'	=> __('Tierone Image Slider with title and content','tierone')
			)
		);
	}

	public function widget($args,$instance){
		global $post;
		$show_posts_from	=	isset( $instance[ 'show_posts_from' ] ) ? $instance[ 'show_posts_from' ] : '';
		$category 			= 	isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$no_of_posts     = isset( $instance['no_of_posts'] ) ? $instance['no_of_posts'] : '5';

		if ( $show_posts_from == "recent" ) {
			$tierone_recent_slider_posts = new WP_Query( array(
				'post_type' 		=> 'post',
				'category__in' 		=> $category,
				'posts_per_page' 	=> $no_of_posts,
				'ignore_sticky_posts' => true
			) );
		} else {
			$tierone_recent_slider_posts = new WP_Query( array(
				'post_type' 		=> 'post',
				'category__in' 		=> $category,
				'posts_per_page' 	=> $no_of_posts
			) );
		}

		if ( $tierone_recent_slider_posts->have_posts() ) : ?>
			<div id="dt-carousel" >
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">

						<?php
							$count_ia = 0;

							while ( $tierone_recent_slider_posts->have_posts() ) : $tierone_recent_slider_posts->the_post();

								if($count_ia == 0 ){
									$activate = 'active';
								}else{
									$activate = '';
								}
						?>
							 <li data-target="#carousel-example-generic" data-slide-to="<?php echo $count_ia; ?>" class="<?php echo $activate; ?>" ></li>
						<?php	
							$count_ia++;	
							endwhile;
						?>
					</ol><!-- Indicators -->
					<div class="carousel-inner" role="listbox">
						<?php 
							$count_ib = 0;
							while ( $tierone_recent_slider_posts->have_posts() ) : $tierone_recent_slider_posts->the_post(); 
							if($count_ib == 0 ){
								$activate = 'active';
							}else{
								$activate = '';
							}
							?>
						<div class="item <?php echo $activate; ?>">
							<figure class="carousel-img-wrap">
								 <div class="carousel-post-wrap">
									<?php										
									$src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'dt-featured-post-slider-post' );
									$first_image = '';
									if ( !has_post_thumbnail() ) { $first_image = get_first_image(); }
									
									if( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url('dt-featured-slider-post'); ?>" title="<?php echo get_the_title();?>"></a>
									<?php elseif ( is_url_exist($first_image) ) : ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="dt-featured-pslider-post" src="<?php echo get_first_image(); ?>"/></a>
									<?php else: ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img  src="<?php echo get_template_directory_uri(); ?>/img/default/dt-featured-post-large.jpg" alt="<?php the_title(); ?>" /></a>
									<?php endif;?>
                                </div>
							</figure>
							<div class="carousel-caption">
								 <header class="entry-header">
								 	<h1 class="entry-Title"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></h1>
								 </header>
								 <div class="entry-content">
									<?php $excerpt = get_the_excerpt();
                                    $limit   = "350"; 
                                    $pad     = "...";

                                    if( strlen( $excerpt ) <= $limit ) {
                                        echo esc_html( $excerpt );
                                    } else {
                                    $excerpt = substr( $excerpt, 0, $limit ) . $pad;
                                        echo esc_html( $excerpt );
                                    } ?>

								 </div>
							</div>
						</div>
						<?php 
							$count_ib++;
							endwhile;
						?>
					</div> <!-- Wrapper for slides -->
				</div>
			</div>
		<?php else : ?>
			<p><?php _e('Sorry, no posts found in selected category','tierone'); ?></p>
		<?php endif;
	}

	public function form($instance){
        $instance = wp_parse_args(
            (array) $instance, array(
                'title'              => '',
                'show_posts_from'    => 'recent',
                'category'           => '',
                'no_of_posts'        => '5'
            )
        );
        ?>
        <div class="dt-featured-post-slider">
        	<div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title', 'tierone' ); ?></strong></label>
                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e( 'Title for Featured Posts', 'tierone' ); ?>">
        	</div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'show_posts_from' ); ?>"><strong><?php _e( 'Chose Type', 'tierone' ); ?></strong></label>

               <input type="radio" id="<?php echo $this->get_field_id( 'show_posts_from' ); ?>" name="<?php echo $this->get_field_name( 'show_posts_from' ); ?>" value="<?php _e( 'recent', 'tierone' ); ?>" <?php checked( $instance[ 'show_posts_from' ], 'recent' ); ?> ><?php _e( 'Recent Posts', 'tierone' ); ?>
               <input type="radio" id="<?php echo $this->get_field_id( 'show_posts_from' ); ?>" name="<?php echo $this->get_field_name( 'show_posts_from' ); ?>" value="<?php _e( 'category', 'tierone' ); ?>" <?php checked( $instance[ 'show_posts_from' ], 'category' ); ?> ><?php _e( 'Category', 'tierone' ); ?>
                <br /><br />
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'category' ); ?>"><strong><?php _e( 'Category', 'tierone' ); ?></strong></label>

                <select id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">

                    <?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
                        <option <?php selected( $instance['category'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                    <?php } ?>
                </select>
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'no_of_posts' ); ?>"><strong><?php _e( 'No. of Posts', 'tierone' ); ?></strong></label>
                <input type="number" id="<?php echo $this->get_field_id( 'no_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'no_of_posts' ); ?>" value="<?php echo esc_attr( $instance['no_of_posts'] ); ?>">
            </div><!-- .dt-admin-input-wrap -->
        </div>
        <?php
	}

	public function update($new_instance,$old_instance){

        $instance                       = $old_instance;
        $instance[ 'title' ]            = strip_tags( stripslashes( $new_instance[ 'title' ] ) );
        $instance[ 'show_posts_from' ]  = $new_instance[ 'show_posts_from' ];
        $instance[ 'category' ]         = $new_instance[ 'category' ];
        $instance[ 'no_of_posts' ]      = strip_tags( stripslashes( $new_instance[ 'no_of_posts' ]  ) );
        return $instance;
	}
}


/**
* Popular Post
*/
class tierone_popular_post extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_popular_post',
			__('Tierone: Popular Post', 'tierone'),
			array(
				'description' => __('Show the Popular post', 'tieone')
			)
		);
	}


	public function widget( $args, $instance ){
		extract($args);
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$nop = ( ! empty( $instance['nop'] ) ) ? (int)( $instance['nop'] ) : 5;

		if ( empty($title) ) {
			$title = __('Popular Post', 'tierone');
		}
		echo $before_widget; ?>
				<h2 class="dt-sidebar-title"><?php echo esc_attr( $title ); ?></h2>
				<?php 
					$args = array( 'ignore_sticky_posts' => 1, 'posts_per_page' => $nop, 'post_status' => 'publish', 'orderby' => 'comment_count', 'order' => 'desc' );
					$popular = new WP_Query( $args );

					if ( $popular->have_posts() ) :
						while ( $popular->have_posts() ) : $popular->the_post(); ?>
						<div class="dt-site-pupolar-post dt-site-post clearfix">
							<figure class="dt-site-post-img col-xs-4 col-sm-4 col-md-4 site-no-pad">
                                <?php                                       
                                $src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'dt-featured-post-xxs-small' );
                                $first_image = '';
                                if ( !has_post_thumbnail() ) { $first_image = get_first_image(); }
                                
                                if( has_post_thumbnail() ) : ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url('dt-featured-post-xxs-small'); ?>" title="<?php echo get_the_title();?>"></a>
                                <?php elseif ( is_url_exist($first_image) ) : ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="dt-featured-post-xxs-small" src="<?php echo get_first_image(); ?>"/></a>
                                <?php else: ?>
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img  src="<?php echo get_template_directory_uri(); ?>/img/default/dt-featured-post-small.jpg" alt="<?php the_title(); ?>" /></a>
                                <?php endif;?>

							</figure>
							<div class="dt-site-content col-xs-8 col-sm-8 col-md-8 site-no-pad-r">
								<a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><h3><?php echo wp_trim_words( get_the_title(), 7, '...' ); ?></h3></a>
								<div class="dt-post-meta">
									<span class="dt-post-calendar"><?php the_time('F j, Y'); ?></span>
								</div>
							</div>

						</div>
					<?php
						endwhile;
					endif;
				?>
		<?php
		echo $after_widget;	
	}


	public function form($instance){
        $instance = wp_parse_args(
            (array) $instance, array(
                'title'              => ''
            )
        );
		$nop = ! empty( $instance['nop'] ) ? absint( $instance['nop'] ) : 5;

		?>
		 <div class="dt-pupolar-post">
		 	<div class="dt-admin-input-wrap">
		 		<label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:' , 'tierone'); ?></label>
        		<input type="text" id="<?php echo $this->get_field_id( 'title' );?>"  name="<?php echo $this->get_field_name( 'title' );?>"  value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e('Popular Post Title','tierone');?>">
		 	</div>
		 	<div class="dt-admin-input-wrap">
		 		<label for="<?php echo $this->get_field_id( 'nop' ); ?>"><?php _e( 'Number of popular posts:', 'tierone' ); ?></label>
		 		<input id="<?php echo $this->get_field_id( 'nop' ); ?>" name="<?php echo $this->get_field_name( 'nop' ); ?>" type="text" value="<?php echo esc_attr( $nop ); ?>">
		 	</div>
		 </div>
	<?php	
	}

	public function update($new_instance, $old_instance){
		$instance = array();
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$instance['nop'] = ( ! empty( $new_instance['nop'] ) ) ? (int)( $new_instance['nop'] ) : '';
		return $instance;
	}

}


/**
* Show Landing Page or Any Site that you want
*/
class tierone_landing_page extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_landing_page',
			__('Tierone: Show Site', 'tierone'),
			array(
				'description' => __('Put Site to show in the fornt page', 'tierone')
			)
		);
	}

	public function widget( $args, $instance){
		$title         = isset( $instance['title'] ) ? $instance['title'] : '';
		$dt_image_path = isset( $instance['dt_image_path'] ) ? $instance['dt_image_path'] : '';
		$dt_link       = isset( $instance['dt_link'] ) ? $instance['dt_link'] : '';
		$dt_link_type  = isset( $instance['dt_link_type'] ) ? $instance['dt_link_type'] : '';
		$dt_link_alt  = isset( $instance['dt_link_alt'] ) ? $instance['dt_link_alt'] : '';
		$dt_desc       = isset(  $instance['dt_desc']  ) ? $instance['dt_desc']  : '';
		$display_url = preg_replace( "(^https?://)", "", $dt_link);

		if ( empty($title) ) {
			$title = __('', 'tierone');
		}

		if ( empty($dt_image_path) ) {
			$dt_image_path = '';
		}

		if ( empty($dt_link) ) {
			$dt_link = esc_url( home_url( '/' ) );
		}

		if ( $dt_link_type == "nofollow" ) {
			$dt_link_type = "nofollow";
		}else{
			$dt_link_type = "dofollow";
		}

		if (empty($dt_link_alt)) {
			$dt_link_alt = __('','tierone');
		}

		if (empty($dt_desc)) {
			$dt_desc = "";
		}
		?>
		<aside class="dt-show-site-wrap">
			<h2 class="dt-sidebar-title"><?php echo esc_attr( $title ); ?></h2>
			<div class="dt-sidebar-landing clearfix">
				<figure>
					<img src="<?php echo esc_url( $dt_image_path ); ?>" alt="<?php echo esc_attr( $title ); ?>">
				</figure>
				<div class="dt-site-content">
					<span><a href="<?php echo esc_url( $dt_link ); ?>"><?php echo $display_url; ?></a></span> <?php echo esc_textarea( $dt_desc ); ?>
				</div>
				<div class="pull-right">
					<a href="<?php echo esc_url($dt_link);?>" target="_blank" class="btn btn-primary">Visit</a>
				</div>
			</div>
		</aside>
		<?php
		
	}

	public function form($instance){
        $instance = wp_parse_args(
            (array) $instance, array(
                'title'              => '',
                'dt_link'           => '',
                'dt_image_path'          => '',
                'dt_link_type'      => '',
                'dt_link_alt'      => '',
                'dt_desc'      => ''
            )
        );
      ?>

		<div class="dt-show-site">
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:' , 'tierone'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title')?>" value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e('Site Title','tierone');?>">
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'dt_link' );?>"><?php _e( 'Site Link:' , 'tierone'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('dt_link');?>" name="<?php echo $this->get_field_name('dt_link')?>" value="<?php echo esc_attr( $instance['dt_link'] ); ?>" placeholder="<?php _e('Site Link','tierone');?>">
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'dt_link_alt' );?>"><?php _e( 'Link Alt:' , 'tierone'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('dt_link_alt');?>" name="<?php echo $this->get_field_name('dt_link_alt')?>" value="<?php echo esc_attr( $instance['dt_link_alt'] ); ?>" placeholder="<?php _e('Link Alternative','tierone');?>">
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'dt_link_type' );?>"><?php _e( 'Link Type:' , 'tierone'); ?></label>
				<select id="<?php echo $this->get_field_id( 'dt_link_type' );?>" name="<?php echo $this->get_field_name( 'dt_link_type' );?>">
					<option value="dofollow" <?php selected( $instance['dt_link_type'], 'dofollow')?>>Do Follow</option>        			
					<option value="nofollow" <?php selected( $instance['dt_link_type'], 'nofollow')?>>No Follow</option>        			
				</select>
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'dt_desc' );?>"><?php _e( 'Site Desc:' , 'tierone'); ?></label>
				<textarea id="<?php echo $this->get_field_id('dt_desc');?>" name="<?php echo $this->get_field_name('dt_desc')?>" placeholder="<?php _e('Site Description','tierone');?>"><?php echo esc_attr( $instance['dt_desc'] ); ?></textarea>
			</div><!--.dt-admin-input-wrap-->
        	<div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id( 'dt_image_path' );?>"><?php _e( 'Ads Image:' , 'tierone'); ?></label>
        		<?php
        			$dt_ads_img = $instance['dt_image_path'];
        			if ( !empty( $dt_ads_img ) ) { ?>
        				<img src="<?php echo $dt_ads_img; ?>"/>
        			<?php }else{ ?>
        				<img src="" />
        			<?php } ?>
        			<input type="hidden" class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'dt_image_path' );?>" name="<?php echo $this->get_field_name( 'dt_image_path' );?>" value="<?php echo esc_attr( $instance['dt_image_path'] ); ?>" />
                	<input type="button" class="dt-img-upload dt-custom-media-button" id="custom_media_button" name="<?php echo $this->get_field_name( 'dt_image_path' ); ?>"  value="<?php _e( 'select Image', 'tierone' ); ?>" />
        	</div><!--.dt-admin-input-wrap-->

		</div>
      <?php
	}

	public function update($new_instance,$old_instance){


        $instance               = $old_instance;
        $instance['title']      = strip_tags( stripslashes( $new_instance['title'] ) );
        $instance['dt_link']   = strip_tags( stripslashes( $new_instance['dt_link'] ) );
        $instance['dt_link_type']  = strip_tags( $new_instance['dt_link_type'] );
        $instance['dt_image_path']  = strip_tags( $new_instance['dt_image_path'] );
        $instance['dt_link_alt']  = strip_tags( $new_instance['dt_link_alt'] );
        $instance['dt_desc']  = strip_tags( $new_instance['dt_desc'] );
        return $instance;
	}

}

/**
* Displays recent post, tags and comments in tabbed panel
*/
class tierone_tabbed_widget extends WP_Widget{
	public function __construct(){
		parent::__construct(
			'tierone_tabbed_widget',
			__('Tierone: Recent Posts, Tags, Comment', 'tierone'),
			array(
				'description' => __('Display your recent post , tags, and comment in tabbed panel','tierone')
			)
		);
	}


	public function widget($args,$instance){
		extract($args);
		$norp = ( ! empty($instance['$norp']) ) ? (int)($instance['$norp']) : 5;
		$noc = ( ! empty( $instance['noc'] ) ) ? (int)( $instance['noc'] ) : 5;

		echo $args['before_widget']; ?>

		<div class="dt-sidebar-section recent_tag_comments">
			<ul class="nav nav-pills">
				<li class="active"><a data-toggle="pill" href="#recent">Recent</a></li>
				<li><a data-toggle="pill" href="#tags">Tags</a></li>
				<li><a data-toggle="pill" href="#comment_tag">Comment</a></li>
			</ul>
			<div class="tab-content">
				<div id="recent" class="tab-pane fade in active">
					<?php
						$args = array( 'posts_per_page' => $norp, 'post_status' => 'publish', 'orderby' => 'post_date', 'order' => 'desc' );
						//$recent_post = query_posts($args);
						query_posts($args);

						if(have_posts()):
							while (have_posts()) : the_post(); ?>
								
							<div class="dt-site-recent clearfix">
								<figure class="dt-site-post-img col-xs-4 col-sm-4 col-md-4 site-no-pad">
									<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'dt-featured-medium-small', array('title' => get_the_title()) ); ?></a>
									<?php } else { ?>
										<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img  src="<?php echo get_template_directory_uri(); ?>/img/default/dt-featured-post-medium.jpg" alt="<?php the_title(); ?>" /></a>
									<?php } ?>

								</figure>
								<div class="dt-site-content col-xs-8 col-sm-8 col-md-8 site-no-pad-r">
									<a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><h3><?php echo wp_trim_words( get_the_title(), 6, '...' ); ?></h3></a>
									<div class="dt-post-meta">
										<span class="dt-post-calendar"><?php the_time('F j, Y'); ?></span>
									</div>
								</div>
							</div>

						<?php endwhile;
						endif;
					?>
				</div>
				<div id="tags" class="tab-pane fade">
					<div class="dt-tags-box">
						<?php
							$tags = get_tags(array('get'=>'all'));
							if ($tags) : 
								foreach ( $tags as $tag ) : ?>
									<a href="<?php echo get_term_link($tag); ?>" class="dt-sidebar-tagslink" ><span><?php echo $tag->name; ?></span></a>
								<?php endforeach;
							else:
								_e('No Tags Created','tierone');
							endif;
						?>
					</div>	

				</div>
				<div id="comment_tag" class="tab-pane fade">
					<?php
						$avatar_size = 80;
						$comment_length = 80;
						$args = array(
							'number'       => $noc,
							'status'       => 'approve'
						);

						//The Query
						$comments_query = new WP_Comment_Query;
						$comments = $comments_query->query( $args );

						//Comment Loop
						if ( $comments ) {
							foreach ( $comments as $comment ) {  ?>
							<div class="dt-site-comment clearfix">
								<figure class="dt-site-post-img tierone_avatar">
									<a href="<?php echo get_comment_link($comment->comment_ID); ?>">
										<?php echo get_avatar( $comment->comment_author_email, $avatar_size ); ?>     
									</a>
								</figure>
								<div class="tierone_body">
									 <span class="dt-tierone-comment-auth"><a href="<?php echo get_comments_link($comment->comment_ID); ?>"><?php echo get_comment_author( $comment->comment_ID ); ?></a></span> on <span class="dt-tierone-comment-post"><?php echo get_the_title($comment->comment_post_ID); ?></span>
									<span class="comment-body"><?php echo comment_excerpt($comment->comment_ID); ?></span>
								</div>
							</div>
							<?php }
						} else {
							echo 'No comments found.';
						}
					?>
				</div>
			</div>
		</div>

	<?php
		echo $after_widget;
	}

	public function form($instance){
		$norp =  ! empty($instance['$norp']) ? (int)($instance['$norp']) : 5;
		$noc =  ! empty($instance['$noc']) ? (int)($instance['$noc']) : 5;
		?>
		<div class="dt-tabbed-widget">
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'norp' ); ?>"><?php _e( 'Number of popular posts:', 'tierone' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'norp' ); ?>" name="<?php echo $this->get_field_name( 'norp' ); ?>" type="text" value="<?php echo esc_attr( $norp ); ?>"  placeholder="<?php _e('Number of recent post to show','tierone'); ?>">
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'noc' ); ?>"><?php _e( 'Number of comments:', 'tierone' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'noc' ); ?>" name="<?php echo $this->get_field_name( 'noc' ); ?>" type="text" value="<?php echo esc_attr( $noc ); ?>" placeholder="<?php _e('Number of Comment','tierone'); ?>">
			</div>
		</div>

		<?php
	}

	public function update($new_instance, $old_instance){
		$instance = array();
		$instance['norp'] = ( ! empty( $new_instance['norp'] ) ) ? (int)( $new_instance['norp'] ) : '';
		$instance['noc'] = ( ! empty( $new_instance['noc'] ) ) ? (int)( $new_instance['noc'] ) : '';
		return $instance;
	}
}

/**
* Youtube Video
*
*/
class tierone_youtube extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_youtube',
			__( 'Tierone Youtube', 'tierone' ),
			array(
				'description' => __( 'Display Youtube', 'tierone' )
			)
		);
	}
	public function widget($args,$instance){
		$title 		= isset( $instance['title'] ) ? $instance['title'] : '';
		$tag_line 	= isset( $instance['tag_line'] ) ? $instance['tag_line'] : '';
		$url 		= isset( $instance['url'] ) ? $instance['url'] : '';

		if ( empty($title) ) {
			$title = __('Youtube Video', 'tierone');
		}
		if ( empty( $url )) {
			$url = __( 'ytsXgBcJxX8', 'tierone' );
		}
	?>
		<aside class="tierone-youtube">
			<h2 class="dt-sidebar-title"><?php echo esc_attr( $title ); ?></h2>
			<iframe width="100%" height="100%" src="http://www.youtube.com/embed/<?php echo esc_attr( $url ); ?>" frameborder="0" allowfullscreen></iframe>
			<p><?php echo esc_attr( $tag_line ); ?></p>
		</aside>
	<?php
	}

	public function form($instance){
		$instance = wp_parse_args(
			(array) $instance ,array(
				'title'		=> '',
				'url'		=>  'ytsXgBcJxX8',
				'tag_line'  => '',
			)
		);
	?>
	<aside class="dt-youtube">
		<div class="dt-admin-input-wrap">
			<label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:' , 'tierone'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title')?>" value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e('Video Title','tierone');?>">
		</div><!--.dt-admin-input-wrap-->
		<div class="dt-admin-input-wrap">
			<label for="<?php echo $this->get_field_id( 'url' );?>"><?php _e( 'Youtube Video ID:' , 'tierone'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('url');?>" name="<?php echo $this->get_field_name('url')?>" value="<?php echo esc_attr( $instance['url'] ); ?>" placeholder="<?php _e('ytsXgBcJxX8','tierone');?>">
		</div><!--.dt-admin-input-wrap-->
		<div class="dt-admin-input-wrap">
			<label for="<?php echo $this->get_field_id( 'tag_line' );?>"><?php _e( 'Tagline :' , 'tierone'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('tag_line');?>" name="<?php echo $this->get_field_name('tag_line')?>" value="<?php echo esc_attr( $instance['tag_line'] ); ?>" placeholder="<?php _e('Tagline','tierone');?>">
		</div><!--.dt-admin-input-wrap-->
	</aside>
	<?php
	}

	public function update($new_instance,$old_instance){
		$instance 		= $old_instance;
		$instance['title']      = strip_tags( stripslashes( $new_instance['title'] ) );
		$instance['url']      = strip_tags( stripslashes( $new_instance['url'] ) );
		$instance['tag_line']      = strip_tags( stripslashes( $new_instance['tag_line'] ) );
		return $instance;

	}
}


/**
* Tierone Layout 1
*/
class tierone_layout1 extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_layout1',
			__('Tierone: Layout 1', 'tierone'),
			array(
				'description' => __('Post Display layout 1 for recent post','tierone')
			)
		);
	}

	public function widget($args,$instance){
		$title          = isset( $instance['title'] ) ? $instance['title'] : '';
		$category1 		= isset( $instance[ 'category1' ] ) ? $instance[ 'category1' ] : '';
		$category2 		= isset( $instance[ 'category2' ] ) ? $instance[ 'category2' ] : '';
		$category3 		= isset( $instance[ 'category3' ] ) ? $instance[ 'category3' ] : '';
		$category4 		= isset( $instance[ 'category4' ] ) ? $instance[ 'category4' ] : '';
		$category5 		= isset( $instance[ 'category5' ] ) ? $instance[ 'category5' ] : '';
		$category6 		= isset( $instance[ 'category6' ] ) ? $instance[ 'category6' ] : '';
		$dt_icons1		= isset( $instance[ 'dt_icons1' ] ) ? $instance[ 'dt_icons1' ] : '';
		$dt_icons2		= isset( $instance[ 'dt_icons2' ] ) ? $instance[ 'dt_icons2' ] : '';
		$dt_icons3		= isset( $instance[ 'dt_icons3' ] ) ? $instance[ 'dt_icons3' ] : '';
		$dt_icons4		= isset( $instance[ 'dt_icons2' ] ) ? $instance[ 'dt_icons2' ] : '';
		$dt_icons5		= isset( $instance[ 'dt_icons5' ] ) ? $instance[ 'dt_icons5' ] : '';
		$dt_icons6		= isset( $instance[ 'dt_icons6' ] ) ? $instance[ 'dt_icons6' ] : '';


		if( empty( $title ) ) {
			$title = __( 'Layout 1', 'tierone' );
		};

		/*icons 1*/
		if ( $dt_icons1 == "casino" ) {
			$dt_icons1 = "casino";
		}else if ( $dt_icons1 == "sports" ) {
			$dt_icons1 = "sports";
		}else if ( $dt_icons1 == "egames" ) {
			$dt_icons1 = "egames";
		}else if ( $dt_icons1 == "lottery" ) {
			$dt_icons1 = "lottery";
		}else if ( $dt_icons1 == "poker" ) {
			$dt_icons1 = "poker";
		}else if ( $dt_icons1 == "racing" ) {
			$dt_icons1 = "racing";
		}

		/*icons 2*/
		if ( $dt_icons2 == "casino" ) {
			$dt_icons2 = "casino";
		}else if ( $dt_icons2 == "sports" ) {
			$dt_icons2 = "sports";
		}else if ( $dt_icons2 == "egames" ) {
			$dt_icons2 = "egames";
		}else if ( $dt_icons2 == "lottery" ) {
			$dt_icons2 = "lottery";
		}else if ( $dt_icons2 == "poker" ) {
			$dt_icons2 = "poker";
		}else if ( $dt_icons2 == "racing" ) {
			$dt_icons2 = "racing";
		}
		/*icons 3*/
		if ( $dt_icons3 == "casino" ) {
			$dt_icons3 = "casino";
		}else if ( $dt_icons3 == "sports" ) {
			$dt_icons3 = "sports";
		}else if ( $dt_icons3 == "egames" ) {
			$dt_icons3 = "egames";
		}else if ( $dt_icons3 == "lottery" ) {
			$dt_icons3 = "lottery";
		}else if ( $dt_icons3 == "poker" ) {
			$dt_icons3 = "poker";
		}else if ( $dt_icons3 == "racing" ) {
			$dt_icons3 = "racing";
		}

		/*icons 4*/
		if ( $dt_icons4 == "casino" ) {
			$dt_icons4 = "casino";
		}else if ( $dt_icons4 == "sports" ) {
			$dt_icons4 = "sports";
		}else if ( $dt_icons4 == "egames" ) {
			$dt_icons4 = "egames";
		}else if ( $dt_icons4 == "lottery" ) {
			$dt_icons4 = "lottery";
		}else if ( $dt_icons4 == "poker" ) {
			$dt_icons4 = "poker";
		}else if ( $dt_icons4 == "racing" ) {
			$dt_icons4 = "racing";
		}
		/*icons 5*/
		if ( $dt_icons5 == "casino" ) {
			$dt_icons5 = "casino";
		}else if ( $dt_icons5 == "sports" ) {
			$dt_icons5 = "sports";
		}else if ( $dt_icons5 == "egames" ) {
			$dt_icons5 = "egames";
		}else if ( $dt_icons5 == "lottery" ) {
			$dt_icons5 = "lottery";
		}else if ( $dt_icons5 == "poker" ) {
			$dt_icons5 = "poker";
		}else if ( $dt_icons5 == "racing" ) {
			$dt_icons5 = "racing";
		}

		/*icons 6*/
		if ( $dt_icons6 == "casino" ) {
			$dt_icons2 = "casino";
		}else if ( $dt_icons6 == "sports" ) {
			$dt_icons6 = "sports";
		}else if ( $dt_icons6 == "egames" ) {
			$dt_icons6 = "egames";
		}else if ( $dt_icons6 == "lottery" ) {
			$dt_icons6 = "lottery";
		}else if ( $dt_icons6 == "poker" ) {
			$dt_icons6 = "poker";
		}else if ( $dt_icons6 == "racing" ) {
			$dt_icons6 = "racing";
		}

		$layout1_a	= new WP_Query( array(
			'post_type' => 'post',
			'category__in' => $category1,
			'posts_per_page' => '1'
		) );
		$layout1_b	= new WP_Query( array(
			'post_type' => 'post',
			'category__in' => $category2,
			'posts_per_page' => '1'
		) );
		$layout1_c	= new WP_Query( array(
			'post_type' => 'post',
			'category__in' => $category3,
			'posts_per_page' => '1'
		) );
		$layout1_d	= new WP_Query( array(
			'post_type' => 'post',
			'category__in' => $category4,
			'posts_per_page' => '1'
		) );
		$layout1_e	= new WP_Query( array(
			'post_type' => 'post',
			'category__in' => $category5,
			'posts_per_page' => '1'
		) );
		$layout1_f	= new WP_Query( array(
			'post_type' => 'post',
			'category__in' => $category6,
			'posts_per_page' => '1'
		) );
		?>
		<div class="dt-site-1">
			<?php if ( ! empty($title) ) { ?>
				<h2 class="dt-site-title"> <?php echo esc_html( $title ); ?> </h2>
			<?php }	?>
			<div class="dt-categories-box">
			
				<?php if ( $layout1_a->have_posts() && $layout1_a != '') : ?>
					<?php while( $layout1_a->have_posts() ) : $layout1_a->the_post(); ?>
						<div class="dt-categories-shape">
							<figure class="dt-categories-img-circle">
								<a href="<?php echo esc_url( get_category_link( $category1 ) ) ; ?>" title="<?php echo esc_attr( get_cat_name( $category1 ) ) ; ?>"><i class='da da-8x  icon-<?php echo esc_attr( $dt_icons1 ); ?>'></i></a>
							</figure>
							<span class="dt-cat-shape-box">
								<h2 class="dt-entry-title"><a href="<?php esc_attr( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php esc_attr( the_title() ); ?></a></h2>
							</span>
						</div><!--.dt-categories-shape-->
					<?php endwhile; ?>
				<?php else : ?>
					<p><?php _e( 'Sorry, no posts found in selected category.', 'tierone' ); ?></p>
				<?php endif; ?>
				
				<?php if ( $layout1_b->have_posts() && $layout1_b != '') : ?>
					<?php while( $layout1_b->have_posts() ) : $layout1_b->the_post(); ?>
						<div class="dt-categories-shape">
							<figure class="dt-categories-img-circle">
								<a href="<?php echo esc_url( get_category_link( $category2 ) ) ; ?>" title="<?php echo esc_attr( get_cat_name( $category2 ) ) ; ?>"><i class='da da-8x icon-<?php echo esc_attr( $dt_icons2 );  ?>'></i></a>
							</figure>
							<span class="dt-cat-shape-box">
								<h2 class="dt-entry-title"><a href="<?php esc_attr( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php esc_attr( the_title() ); ?></a></h2>
							</span>
						</div><!--.dt-categories-shape-->
					<?php endwhile; ?>
				<?php else : ?>
					<p><?php _e( 'Sorry, no posts found in selected category.', 'tierone' ); ?></p>
				<?php endif; ?>		

				<?php if ( $layout1_c->have_posts() && $layout1_c != '') : ?>
					<?php while( $layout1_c->have_posts() ) : $layout1_c->the_post(); ?>
						<div class="dt-categories-shape">
							<figure class="dt-categories-img-circle">
								<a href="<?php echo esc_url( get_category_link( $category3 ) ) ; ?>" title="<?php echo esc_attr( get_cat_name( $category3 ) ) ; ?>"><i class='da da-8x  icon-<?php echo esc_attr( $dt_icons3 ); ?>'></i></a>
							</figure>
							<span class="dt-cat-shape-box">
								<h2 class="dt-entry-title"><a href="<?php esc_attr( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php esc_attr( the_title() ); ?></a></h2>
							</span>
						</div><!--.dt-categories-shape-->
					<?php endwhile; ?>
				<?php else : ?>
					<p><?php _e( 'Sorry, no posts found in selected category.', 'tierone' ); ?></p>
				<?php endif; ?>
				
				<?php if ( $layout1_d->have_posts() && $layout1_d != '') : ?>
					<?php while( $layout1_d->have_posts() ) : $layout1_d->the_post(); ?>
						<div class="dt-categories-shape">
							<figure class="dt-categories-img-circle">
								<a href="<?php echo esc_url( get_category_link( $category4 ) ) ; ?>" title="<?php echo esc_attr( get_cat_name( $category4 ) ) ; ?>"><i class='da da-8x icon-<?php echo esc_attr( $dt_icons4 );  ?>'></i></a>
							</figure>
							<span class="dt-cat-shape-box">
								<h2 class="dt-entry-title"><a href="<?php esc_attr( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php esc_attr( the_title() ); ?></a></h2>
							</span>
						</div><!--.dt-categories-shape-->
					<?php endwhile; ?>
				<?php else : ?>
					<p><?php _e( 'Sorry, no posts found in selected category.', 'tierone' ); ?></p>
				<?php endif; ?>	
						
				<?php if ( $layout1_e->have_posts() && $layout1_e != '') : ?>
					<?php while( $layout1_e->have_posts() ) : $layout1_e->the_post(); ?>
						<div class="dt-categories-shape">
							<figure class="dt-categories-img-circle">
								<a href="<?php echo esc_url( get_category_link( $category5 ) ) ; ?>" title="<?php echo esc_attr( get_cat_name( $category5 ) ) ; ?>"><i class='da da-8x  icon-<?php echo esc_attr( $dt_icons5 ); ?>'></i></a>
							</figure>
							<span class="dt-cat-shape-box">
								<h2 class="dt-entry-title"><a href="<?php esc_attr( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php esc_attr( the_title() ); ?></a></h2>
							</span>
						</div><!--.dt-categories-shape-->
					<?php endwhile; ?>
				<?php else : ?>
					<p><?php _e( 'Sorry, no posts found in selected category.', 'tierone' ); ?></p>
				<?php endif; ?>
				
				<?php if ( $layout1_f->have_posts() && $layout1_f != '') : ?>
					<?php while( $layout1_f->have_posts() ) : $layout1_f->the_post(); ?>
						<div class="dt-categories-shape">
							<figure class="dt-categories-img-circle">
								<a href="<?php echo esc_url( get_category_link( $category6 ) ) ; ?>" title="<?php echo esc_attr( get_cat_name( $category6 ) ) ; ?>"><i class='da da-8x icon-<?php echo esc_attr( $dt_icons6 );  ?>'></i></a>
							</figure>
							<span class="dt-cat-shape-box">
								<h2 class="dt-entry-title"><a href="<?php esc_attr( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php esc_attr( the_title() ); ?></a></h2>
							</span>
						</div><!--.dt-categories-shape-->
					<?php endwhile; ?>
				<?php else : ?>
					<p><?php _e( 'Sorry, no posts found in selected category.', 'tierone' ); ?></p>
				<?php endif; ?>

				
			</div><!--.dt-categories-box-->
			
		</div>

		<?php
	}

	public function form( $instance ) {

        $instance = wp_parse_args(
            (array) $instance, array(
                'title'          => '',
                'category1'      => '',
                'category2'      => '',
                'category3'      => '',
                'category4'      => '',
                'category5'      => '',
                'category6'      => '',
                'dt_icons1'      => '',
                'dt_icons2'      => '',
                'dt_icons3'      => '',
                'dt_icons4'      => '',
                'dt_icons5'      => '',
                'dt_icons6'      => ''
            )
        );

		?>
		<div class="dt-tierone-layout-1">
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'tierone' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e( 'Title for Featured Posts', 'tierone' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'category1' ); ?>"><?php _e( 'Category 1:', 'tierone' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'category1' ); ?>" name="<?php echo $this->get_field_name( 'category1' ); ?>" >
					<?php foreach ( get_terms( 'category' , 'parent=0&hide_empty=0' ) as $term ) : ?>
						<option <?php selected( $instance[ 'category1' ], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'dt_icons1' ); ?>"><?php _e( 'Icon 1:', 'tierone' ); ?></label>
                <select id="<?php echo $this->get_field_id('dt_icons1'); ?>" name="<?php echo $this->get_field_name('dt_icons1'); ?>">
                    <option value="casino" <?php selected( $instance['dt_icons1'], 'casino' ); ?>>casino</option>
                    <option value="sports" <?php selected( $instance['dt_icons1'], 'sports' );?>>sports</option>
                    <option value="egames" <?php selected( $instance['dt_icons1'], 'egames' ); ?>>egames</option>
                    <option value="lottery" <?php selected( $instance['dt_icons1'], 'lottery' );?>>lottery</option>
                    <option value="poker" <?php selected( $instance['dt_icons1'], 'poker' ); ?>>poker</option>
                    <option value="racing" <?php selected( $instance['dt_icons1'], 'racing' );?>>racing</option>
                </select>
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'category2' ); ?>"><?php _e( 'Category 2:', 'tierone' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'category2' ); ?>" name="<?php echo $this->get_field_name( 'category2' ); ?>" >
					<?php foreach ( get_terms( 'category' , 'parent=0&hide_empty=0' ) as $term ) : ?>
						<option <?php selected( $instance[ 'category2' ], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'dt_icons2' ); ?>"><?php _e( 'Icon 2:', 'tierone' ); ?></label>
                <select id="<?php echo $this->get_field_id('dt_icons2'); ?>" name="<?php echo $this->get_field_name('dt_icons2'); ?>">
                    <option value="casino" <?php selected( $instance['dt_icons2'], 'casino' ); ?>>casino</option>
                    <option value="sports" <?php selected( $instance['dt_icons2'], 'sports' );?>>sports</option>
                    <option value="egames" <?php selected( $instance['dt_icons2'], 'egames' ); ?>>egames</option>
                    <option value="lottery" <?php selected( $instance['dt_icons2'], 'lottery' );?>>lottery</option>
                    <option value="poker" <?php selected( $instance['dt_icons2'], 'poker' ); ?>>poker</option>
                    <option value="racing" <?php selected( $instance['dt_icons2'], 'racing' );?>>racing</option>
                </select>
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'category3' ); ?>"><?php _e( 'Category 3:', 'tierone' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'category3' ); ?>" name="<?php echo $this->get_field_name( 'category3' ); ?>" >
					<?php foreach ( get_terms( 'category' , 'parent=0&hide_empty=0' ) as $term ) : ?>
						<option <?php selected( $instance[ 'category3' ], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'dt_icons3' ); ?>"><?php _e( 'Icon 3:', 'tierone' ); ?></label>
                <select id="<?php echo $this->get_field_id('dt_icons3'); ?>" name="<?php echo $this->get_field_name('dt_icons3'); ?>">
                    <option value="casino" <?php selected( $instance['dt_icons3'], 'casino' ); ?>>casino</option>
                    <option value="sports" <?php selected( $instance['dt_icons3'], 'sports' );?>>sports</option>
                    <option value="egames" <?php selected( $instance['dt_icons3'], 'egames' ); ?>>egames</option>
                    <option value="lottery" <?php selected( $instance['dt_icons3'], 'lottery' );?>>lottery</option>
                    <option value="poker" <?php selected( $instance['dt_icons3'], 'poker' ); ?>>poker</option>
                    <option value="racing" <?php selected( $instance['dt_icons3'], 'racing' );?>>racing</option>
                </select>
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'category4' ); ?>"><?php _e( 'Category 4:', 'tierone' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'category4' ); ?>" name="<?php echo $this->get_field_name( 'category4' ); ?>" >
					<?php foreach ( get_terms( 'category' , 'parent=0&hide_empty=0' ) as $term ) : ?>
						<option <?php selected( $instance[ 'category4' ], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'dt_icons4' ); ?>"><?php _e( 'Icon 4:', 'tierone' ); ?></label>
                <select id="<?php echo $this->get_field_id('dt_icons4'); ?>" name="<?php echo $this->get_field_name('dt_icons4'); ?>">
                    <option value="casino" <?php selected( $instance['dt_icons4'], 'casino' ); ?>>casino</option>
                    <option value="sports" <?php selected( $instance['dt_icons4'], 'sports' );?>>sports</option>
                    <option value="egames" <?php selected( $instance['dt_icons4'], 'egames' ); ?>>egames</option>
                    <option value="lottery" <?php selected( $instance['dt_icons4'], 'lottery' );?>>lottery</option>
                    <option value="poker" <?php selected( $instance['dt_icons4'], 'poker' ); ?>>poker</option>
                    <option value="racing" <?php selected( $instance['dt_icons4'], 'racing' );?>>racing</option>
                </select>
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'category5' ); ?>"><?php _e( 'Category 5:', 'tierone' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'category5' ); ?>" name="<?php echo $this->get_field_name( 'category5' ); ?>" >
					<?php foreach ( get_terms( 'category' , 'parent=0&hide_empty=0' ) as $term ) : ?>
						<option <?php selected( $instance[ 'category5' ], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'dt_icons5' ); ?>"><?php _e( 'Icon 5:', 'tierone' ); ?></label>
                <select id="<?php echo $this->get_field_id('dt_icons5'); ?>" name="<?php echo $this->get_field_name('dt_icons5'); ?>">
                    <option value="casino" <?php selected( $instance['dt_icons5'], 'casino' ); ?>>casino</option>
                    <option value="sports" <?php selected( $instance['dt_icons5'], 'sports' );?>>sports</option>
                    <option value="egames" <?php selected( $instance['dt_icons5'], 'egames' ); ?>>egames</option>
                    <option value="lottery" <?php selected( $instance['dt_icons5'], 'lottery' );?>>lottery</option>
                    <option value="poker" <?php selected( $instance['dt_icons5'], 'poker' ); ?>>poker</option>
                    <option value="racing" <?php selected( $instance['dt_icons5'], 'racing' );?>>racing</option>
                </select>
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'category6' ); ?>"><?php _e( 'Category 6:', 'tierone' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'category6' ); ?>" name="<?php echo $this->get_field_name( 'category6' ); ?>" >
					<?php foreach ( get_terms( 'category' , 'parent=0&hide_empty=0' ) as $term ) : ?>
						<option <?php selected( $instance[ 'category6' ], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div><!--.dt-admin-input-wrap-->
			<div class="dt-admin-input-wrap">
				<label for="<?php echo $this->get_field_id( 'dt_icons6' ); ?>"><?php _e( 'Icon 6:', 'tierone' ); ?></label>
                <select id="<?php echo $this->get_field_id('dt_icons6'); ?>" name="<?php echo $this->get_field_name('dt_icons6'); ?>">
                    <option value="casino" <?php selected( $instance['dt_icons6'], 'casino' ); ?>>casino</option>
                    <option value="sports" <?php selected( $instance['dt_icons6'], 'sports' );?>>sports</option>
                    <option value="egames" <?php selected( $instance['dt_icons6'], 'egames' ); ?>>egames</option>
                    <option value="lottery" <?php selected( $instance['dt_icons6'], 'lottery' );?>>lottery</option>
                    <option value="poker" <?php selected( $instance['dt_icons6'], 'poker' ); ?>>poker</option>
                    <option value="racing" <?php selected( $instance['dt_icons6'], 'racing' );?>>racing</option>
                </select>
			</div><!--.dt-admin-input-wrap-->
			
		</div>
		<?php
	}

	public function update( $new_instance, $old_instance ) {

		$instance               = $old_instance;
		$instance['title']      = strip_tags( stripslashes( $new_instance['title'] ) );
		$instance[ 'category1' ]    = $new_instance[ 'category1' ];
		$instance[ 'category2' ]    = $new_instance[ 'category2' ];
		$instance[ 'category3' ]    = $new_instance[ 'category3' ];
		$instance[ 'category4' ]    = $new_instance[ 'category4' ];
		$instance[ 'category5' ]    = $new_instance[ 'category5' ];
		$instance[ 'category6' ]    = $new_instance[ 'category6' ];
		$instance[ 'dt_icons1' ]     = strip_tags( stripslashes( $new_instance['dt_icons1'] ) );
		$instance[ 'dt_icons2' ]     = strip_tags( stripslashes( $new_instance['dt_icons2'] ) );
		$instance[ 'dt_icons3' ]     = strip_tags( stripslashes( $new_instance['dt_icons3'] ) );
		$instance[ 'dt_icons4' ]     = strip_tags( stripslashes( $new_instance['dt_icons4'] ) );
		$instance[ 'dt_icons5' ]     = strip_tags( stripslashes( $new_instance['dt_icons5'] ) );
		$instance[ 'dt_icons6' ]     = strip_tags( stripslashes( $new_instance['dt_icons6'] ) );

		return $instance;
	}

}


/**
* Tierone Layout 2
*/

class tierone_layout2 extends WP_Widget{
	
	public function  __construct(){
		parent::__construct(
			'tierone_layout2',
			__('Tierone: Layout 2', 'tierone'),
			array(
				'description'	=> __('Post Display layout 2 for recently post','tierone')
			)
		);
	}

	public function widget($args,$instance){
		$title 		= isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' ;
		$category 	= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$no_of_post = isset( $instance[ 'no_of_post' ] ) ? $instance[ 'no_of_post' ] : '';

		$layout2a = new WP_Query( array(
			'post_type' => 'post',
			'category__in' => $category,
			'posts_per_page' => $no_of_post
		) );

		//$title2		= isset( $instance[ 'title2' ] ) ? $instance[ 'title2' ] : '';
		$category2		= isset( $instance[ 'category2' ] ) ? $instance[ 'category2' ] : '';

		$layout2b = new WP_Query( array(
			'post_type' => 'post',
			'category__in' => $category2,
			'posts_per_page' => $no_of_post
		) );
		?>
		<div class="dt-site-2">
			<?php if ( ! empty($title) ) { ?>
				<h2 class="dt-site-title"> <?php echo esc_html( $title ); ?> </h2>
			<?php }	?>
			<div class="row">
				<?php $count_b1 = 1; ?>
				<?php if ( $layout2a->have_posts() ) : ?>
					<div class="dt-site-layout-2a col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<?php 
							while ( $layout2a->have_posts() ) : $layout2a->the_post();
							if ($count_b1 == 1) :
						?>

							<div class="dt-site-content">
								<figure class="dt-site-post-img">
									<?php										
									$src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'dt-featured-post-medium' );
									$first_image = '';
									if ( !has_post_thumbnail() ) { $first_image = get_first_image(); }
									
									if( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url('dt-featured-post-medium'); ?>" title="<?php echo get_the_title();?>"></a>
									<?php elseif ( is_url_exist($first_image) ) : ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="dt-featured-post-medium" src="<?php echo get_first_image(); ?>"/></a>
									<?php else: ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/default/dt-featured-post-medium.jpg" alt="<?php the_title(); ?>" /></a>
									<?php endif;?>
								</figure><!--dt-site-post-img-->
								<div class="dt-post-overlay">
									<h2><a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php  the_title();  /*echo wp_trim_words( get_the_title(), 5, '...' );  */ ?></a></h2>
									<div class="dt-post-meta">
										<?php 
											if( get_theme_mod('display_post_comments', 1 ) ){
												if(! post_password_required() && ( post_password_required() || comments_open() ) ) : ?>
													<span class="dt-post-comment "><i class="da icon-Comment-Icon da-xl"></i><?php comments_popup_link( __( 'Comment', 'tierone' ), '1', '%'); ?></span>
											<?php endif; 
											}
										?>
										 <span class="dt-post-view"><a href="<?php esc_url( get_category_link( $category ) ); ?>"><?php _e('<i class="da icon-View-Icon da-xl"></i>','tierone')?></a></span> 
									</div><!--dt-post-meta-->
								</div>
							</div>
						<?php else : ?>
							<div class="dt-site-ams">
								<figure class="dt-site-ams-img col-xs-4 col-sm-3 col-md-4 site-no-pad-l">
										<?php										
										$src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'dt-featured-post-xs-small' );
										$first_image = '';
										if ( !has_post_thumbnail() ) { $first_image = get_first_image(); }
										
										if( has_post_thumbnail() ) : ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url('dt-featured-post-xs-small'); ?>" title="<?php echo get_the_title();?>"></a>
										<?php elseif ( is_url_exist($first_image) ) : ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="dt-featured-post-xs-small" src="<?php echo get_first_image(); ?>"/></a>
										<?php else: ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img  class="dt-featured-post-xs-small" src="<?php echo get_template_directory_uri(); ?>/img/default/dt-featured-post-medium-small.jpg" alt="<?php the_title(); ?>" /></a>
										<?php endif;?>

								</figure><!--dt-site-post-img-->
								<div class="dt-site-ams-content col-xs-8 col-sm-9 col-md-8 site-no-pad-r">
									<h2 class="dt-site-ams-title"><a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title();?></a></h2>
									<div class="dt-post-meta dt-post-meta-ams">
										<?php 
											if( get_theme_mod('display_post_comments', 1 ) ){
												if(! post_password_required() && ( post_password_required() || comments_open() ) ) : ?>
													<span class="dt-post-comment "><i class="da icon-Comment-Icon da-xl"></i><?php comments_popup_link( __( 'Comment', 'tierone' ), '1', '%'); ?></span>
											<?php endif; 
											}
										?>
										<span class="dt-post-view"><a href="<?php esc_url( get_category_link( $category ) ); ?>"><?php _e('<i class="da icon-View-Icon da-xl"></i>','tierone')?></a></span>
									</div>									
								</div>
								<span class="clearfix"></span>
							</div>
						<?php
							endif;
							$count_b1++; //count
							endwhile;
						?>
					</div>
				<?php else: ?>
					<p><?php _e('Sorry, no posts found in selected category','tierone'); ?></p>
				<?php endif; ?> 

				<?php 
					if ( $layout2b->have_posts() ) : ?>
						<?php $count_b2 = 1; ?>
						<div class="dt-site-layout-2b col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<?php 
								while ( $layout2b->have_posts() ) : $layout2b->the_post();
								if ($count_b2 == 1) :
							?>
								<div class="dt-site-content">
									<figure class="dt-site-post-img">
										<?php										
										$src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'dt-featured-post-medium' );
										$first_image = '';
										if ( !has_post_thumbnail() ) { $first_image = get_first_image(); }
										
										if( has_post_thumbnail() ) : ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url('dt-featured-post-medium'); ?>" title="<?php echo get_the_title();?>"></a>
										<?php elseif ( is_url_exist($first_image) ) : ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="dt-featured-post-medium" src="<?php echo get_first_image(); ?>"/></a>
										<?php else: ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img  class="dt-featured-post-medium" src="<?php echo get_template_directory_uri(); ?>/img/default/dt-featured-post-medium.jpg" alt="<?php the_title(); ?>" /></a>
										<?php endif;?>
									</figure><!--dt-site-post-img-->
									<div class="dt-post-overlay">
										<h2><a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title(); ?></a></h2>
										<div class="dt-post-meta">
											<?php 
												if( get_theme_mod('display_post_comments', 1 ) ){
													if(! post_password_required() && ( post_password_required() || comments_open() ) ) : ?>
														<span class="dt-post-comment "><i class="da icon-Comment-Icon da-xl"></i><?php comments_popup_link( __( 'Comment', 'tierone' ), '1', '%'); ?></span>
												<?php endif; 
												}
											?>
											<span class="dt-post-view"><a href="<?php esc_url( get_category_link( $category ) ); ?>"><?php _e('<i class="da icon-View-Icon da-xl"></i>','tierone')?></a></span>
										</div><!--dt-post-meta-->
									</div>
								</div>
							<?php else : ?>
								<div class="dt-site-ams">
									<figure class="dt-site-ams-img col-xs-4 col-sm-4 col-md-4 site-no-pad-l">
										<?php										
										$src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'dt-featured-post-xs-small' );
										$first_image = '';
										if ( !has_post_thumbnail() ) { $first_image = get_first_image(); }
										
										if( has_post_thumbnail() ) : ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url('dt-featured-post-xs-small'); ?>" title="<?php echo get_the_title();?>"></a>
										<?php elseif ( is_url_exist($first_image) ) : ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="dt-featured-post-xs-small" src="<?php echo get_first_image(); ?>"/></a>
										<?php else: ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img  class="dt-featured-post-xs-small" src="<?php echo get_template_directory_uri(); ?>/img/def-im/dt-featured-post-medium-small.jpg" alt="<?php the_title(); ?>" /></a>
										<?php endif;?>
									</figure><!--dt-site-post-img-->
									<div class="dt-site-ams-content col-xs-8 col-sm-8 col-md-8 site-no-pad-r">
										<h2 class="dt-site-ams-title"><a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title();?></a></h2>
										<div class="dt-post-meta dt-post-meta-ams">
											<?php 
												if( get_theme_mod('display_post_comments', 1 ) ){
													if(! post_password_required() && ( post_password_required() || comments_open() ) ) : ?>
														<span class="dt-post-comment "><i class="da icon-Comment-Icon da-xl"></i><?php comments_popup_link( __( 'Comment', 'tierone' ), '1', '%'); ?></span>
												<?php endif; 
												}
											?>
											<span class="dt-post-view"><a href="<?php esc_url( get_category_link( $category ) ); ?>"><?php _e('<i class="da icon-View-Icon da-xl"></i>','tierone')?></a></span>
										</div>									
									</div>
									<span class="clearfix"></span>
								</div>
							<?php
								endif;
								$count_b2++; //count
								endwhile;
							?>
						</div>
				<?php else: ?>
					<p><?php _e('Sorry, no posts found in selected category','tierone'); ?></p>
				<?php endif; ?>

				<div class="clearfix"></div>
			</div><!--row-->
		</div><!--dt-site-2-->
		<?php
	}

	public function form( $instance ){
        $instance = wp_parse_args(
            (array) $instance, array(
                'title'              => '',
                'category'           => '',
                'no_of_post'        => '6',
                'category2'          => ''
            )
        );

        ?>
        	<div class="dt-tierone-layout-2">
	            <div class="dt-admin-input-wrap">
	                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'tierone' ); ?></label>
	                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" >
	            </div><!-- .dt-admin-input-wrap -->
	            <div class="dt-admin-input-wrap">
	                <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category 1', 'tierone' ); ?></label>
	                <select id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">

	                    <?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
	                        <option <?php selected( $instance['category'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
	                    <?php } ?>

	                </select>
	            </div><!-- .dt-admin-input-wrap -->
        	</div>
        	<div class="dt-tierone-layout-2">
        		<div class="dt-admin-input-wrap">
        			<label for="<?php echo $this->get_field_id( 'category2' )?>"><?php _e( 'Category 2','tierone' ); ?></label>
        			<select id="<?php echo $this->get_field_id( 'category2' ); ?>" name="<?php echo $this->get_field_name( 'category2' ); ?>">
	                    <?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
	                        <option <?php selected( $instance['category2'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
	                    <?php } ?>
        			</select>
        		</div>
	            <div class="dt-admin-input-wrap">
	                <label for="<?php echo $this->get_field_id( 'no_of_post' ); ?>"><?php _e( 'No. of Posts', 'tierone' ); ?></label>
	                <input type="number" id="<?php echo $this->get_field_id( 'no_of_post' ); ?>" name="<?php echo $this->get_field_name( 'no_of_post' ); ?>" value="<?php echo esc_attr( $instance['no_of_post'] ); ?>">
	            </div><!-- .dt-admin-input-wrap -->
        	</div>
        <?php
	}

	public function update($new_instance, $old_instance){
        $instance                = $old_instance;
        $instance['title']       = strip_tags( stripslashes( $new_instance['title'] ) );
        $instance['category']    = $new_instance['category'];
        $instance['no_of_post'] = strip_tags( stripslashes( $new_instance['no_of_post'] ) );
        $instance['category2']   = $new_instance['category2'];
        return $instance;
	}


}


/**
* Tierone Layout 3
*/
class tierone_layout3 extends WP_Widget{
	public function  __construct(){
		parent::__construct(
			'tierone_layout3',
			__('Tierone: Layout 3', 'tierone'),
			array(
				'description'	=> __('Post Display layout 3 for recently post','tierone')
			)
		);
	}

	public function widget($args,$instance){
		global $post;
		$title 		= isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$category 		= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$no_of_post 		= isset( $instance[ 'no_of_post' ] ) ? $instance[ 'no_of_post' ] : '';
		$random_posts 		= isset( $instance[ 'random_posts' ] ) ? $instance[ 'random_posts' ] : '';

		if ( $random_posts == "on") {
			$random_posts = "rand";
		}

		$layoutc = new WP_Query( array(
			'post_type' 	 => 'post',
			'category__in' 	 => $category,
			'posts_per_page' => $no_of_post,
			'orderby'		 => $random_posts
		) );
		?>
		<div class="dt-site-3">
			<?php if ( ! empty($title) ) { ?>
				<h2 class="dt-site-title"> <?php echo esc_html( $title ); ?> </h2>
			<?php }	?>
			<div class="row">
				<?php
					if ( $layoutc->have_posts() ) :
						while ( $layoutc->have_posts() ) : $layoutc->the_post();
					?>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<div class="dt-site-content">
							<figure class="dt-site-post-img">
								<?php										
								$src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'dt-featured-post-t3' );
								$first_image = '';
								if ( !has_post_thumbnail() ) { $first_image = get_first_image(); }
								
								if( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url('dt-featured-post-t3'); ?>" title="<?php echo get_the_title();?>"></a>
								<?php elseif ( is_url_exist($first_image) ) : ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="dt-featured-post-t3" src="<?php echo get_first_image(); ?>"/></a>
								<?php else: ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img  src="<?php echo get_template_directory_uri(); ?>/img/default/dt-featured-post-small.jpg" alt="<?php the_title(); ?>" /></a>
								<?php endif;?>
							</figure>
							<div class="dt-post-overlay">
								<h2 ><a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title(); ?></a></h2>
								<div class="dt-post-meta">
									<?php 
										if( get_theme_mod('display_post_comments', 1 ) ){
											if(! post_password_required() && ( post_password_required() || comments_open() ) ) : ?>
												<span class="dt-post-comment "><i class="da icon-Comment-Icon da-xl"></i><?php comments_popup_link( __( 'Comment', 'tierone' ), '1', '%'); ?></span>
										<?php endif; 
										}
									?>
									<span class="dt-post-view"><a href="<?php esc_url( get_category_link( $category ) ); ?>"><?php _e('<i class="da icon-View-Icon da-xl"></i>','tierone')?></a></span>
								</div><!--dt-post-meta-->
							</div>
						</div>
					</div>
					<?php		
						endwhile;
					else:?>
						<p><?php _e('Sorry, no posts found in selected category','tierone'); ?></p>
				<?php endif; ?>
			</div>
		</div><!--dt-site-3-->
		<?php
	}

	public function form($instance){
        $instance = wp_parse_args(
            (array) $instance, array(
                'title'          => '',
                'post_type'          => '',
                'category'           => '',
                'no_of_post'         => '6',
                'random_posts'       => ''
            )
        );
        ?>
        <div class="dt-tierone-layout-3">
        	<div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id('title')?>"><?php _e('Title:','tierone');?></label>
        		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" >
        	</div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select a post category', 'tierone' ); ?></label>
                <?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category'), 'selected' => $instance['category'], 'show_option_all' => 'Show all posts') );?>
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id('random_posts')?>"><?php _e('Random Posts:','tierone');?></label>
        		<input type="checkbox" <?php checked( $instance[ 'random_posts' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" />
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'no_of_post' ); ?>"><?php _e( 'No. of Posts', 'tierone' ); ?></label>
                <input type="number" id="<?php echo $this->get_field_id( 'no_of_post' ); ?>" name="<?php echo $this->get_field_name( 'no_of_post' ); ?>" value="<?php echo esc_attr( $instance['no_of_post'] ); ?>">
            </div><!-- .dt-admin-input-wrap -->
        </div>

        <?php

	}

	public function update($new_instance, $old_instance){
        $instance                = $old_instance;
        $instance['title']       = strip_tags( stripslashes( $new_instance['title'] ) );
        $instance['category']    = $new_instance['category'];
        $instance['random_posts']    = $new_instance['random_posts'];
        $instance['no_of_post'] = strip_tags( stripslashes( $new_instance['no_of_post'] ) );
        return $instance;
	}
}

/**
* Tierone Layout 4 - Recent Post
*/
class tierone_layout4 extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_layout4',
			__('Tierone: Layout 4 - Recent Post','tierone'),
			array(
				'description'	=> __('Post Display layout 4 for recently post','tierone')
			)
		);
	}

	public function widget($args,$instance){
		global $post;
		$title 				= isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$category 			= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		//$no_of_post 		= isset( $instance[ 'no_of_post' ] ) ? $instance[ 'no_of_post' ] : '';

		$layoutd = new WP_Query( array(
			'post_type' => 'post',
			'category__in' => $category,
			'posts_per_page' => 3,
			'ignore_sticky_posts' => true
		) );

		?>
		<div class="dt-site-4">
			<?php if ( ! empty($title) ) { ?>
				<h2 class="dt-site-title"> <?php echo esc_html( $title ); ?> </h2>
			<?php }	?>
			<?php
				if ( $layoutd->have_posts() ) :
					while ( $layoutd->have_posts() ) : $layoutd->the_post();
					?>
					<div class="col-xs-12 col-sm-12 col-md-4 site-no-pad">
						<div class="dt-site-content">
							<figure class="dt-site-post-img">
								<?php										
								$src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'dt-featured-post-t4' );
								$first_image = '';
								if ( !has_post_thumbnail() ) { $first_image = get_first_image(); }
								
								if( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url('dt-featured-post-t4'); ?>" title="<?php echo get_the_title();?>"></a>
								<?php elseif ( is_url_exist($first_image) ) : ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="dt-featured-post-t4" src="<?php echo get_first_image(); ?>"/></a>
								<?php else: ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img  src="<?php echo get_template_directory_uri(); ?>/img/default/dt-featured-post-medium.jpg" alt="<?php the_title(); ?>" /></a>
								<?php endif;?>
							</figure>
							<h2 class="dt-recent-post dt-site-title"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></h2>
							<div class="dt-site-content">
								<?php $excerpt = get_the_excerpt();
                                $limit   = "70";
                                $pad     = "...";

                                if( strlen( $excerpt ) <= $limit ) {
                                    echo esc_html( $excerpt );
                                } else {
                                $excerpt = substr( $excerpt, 0, $limit ) . $pad;
                                    echo esc_html( $excerpt );
                                } ?>
							</div>
                            <a href="<?php echo esc_url( the_permalink() ); ?>"  title="<?php the_title_attribute(); ?>" class="dt-sidebar-tagslink"><?php _e('View','tierone'); ?></a>
						</div>
					</div>
					<?php
					endwhile;
				else : ?>
				<p><?php _e('Sorry, no posts found in selected category','tierone'); ?></p>
			<?php
				endif;
			?>
			<span class="clearfix"></span>
		</div>
		<?php

	}

	public function form($instance){
        $instance = wp_parse_args(
            (array) $instance, array(
                'title'          	 => __('Recent Posts','tierone'),
                'post_type'          => '',
                'category'           => '',
                'no_of_post'         => '3'
            )
        );

       ?>
      <div class="dt-tierone-layout-4">
        	<div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id('title')?>"><?php _e('Title:','tierone');?></label>
        		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" >
        	</div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category', 'tierone' ); ?></label>
                <select id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">

                    <?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
                        <option <?php selected( $instance['category'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                    <?php } ?>
                </select>
            </div><!-- .dt-admin-input-wrap -->       	
       </div>
       <?php
	}

	public function update($new_instance,$old_instance){
        $instance                = $old_instance;
        $instance['title']       = strip_tags( stripslashes( $new_instance['title'] ) );
        $instance['category']    = $new_instance['category'];
        return $instance;

	}

}

/**
* Tierone Layout 5 - Random Recent Posts
*/
class tierone_layout5 extends WP_Widget{
	
	public function __construct(){
		parent::__construct(
			'tierone_layout5',
			__('Tierone: Layout 5 - Recent Post Randomly','tierone'),
			array(
				'description'	=> __('Post Display layout 5 for recently post randomly','tierone')
			)
		);
	}

	public function widget($args,$instance){
		$title 				= isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$category 			= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
		$random_posts 		= isset( $instance[ 'random_posts' ] ) ? $instance[ 'random_posts' ] : '';

		if ( $random_posts == "on") {
			$random_posts = "rand";
		}

		$layoute = new WP_Query( array(
			'post_type' => 'post',
			'category__in' => $category,
			'posts_per_page' => 2,
			'orderby' => $random_posts,
			'ignore_sticky_posts' => true
		) );
		?>
			<div class="dt-site-5">
				<?php if ( ! empty($title) ) { ?>
				<h2 class="dt-site-title"> <?php echo esc_html( $title ); ?> </h2>
				<?php }	?>
				<?php
					if ( $layoute->have_posts() ) :
						while ( $layoute->have_posts() ) : $layoute->the_post();
						?>
						<div class="dt-other-cat row">
							<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
								<figure class="dt-site-post-img">
									<?php										
									$src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'dt-featured-post-t5' );
									$first_image = '';
									if ( !has_post_thumbnail() ) { $first_image = get_first_image(); }
									
									if( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url('dt-featured-post-t5'); ?>" title="<?php echo get_the_title();?>"></a>
									<?php elseif ( is_url_exist($first_image) ) : ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="dt-featured-post-t5" src="<?php echo get_first_image(); ?>"/></a>
									<?php else: ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img  src="<?php echo get_template_directory_uri(); ?>/img/default/dt-featured-post-medium.jpg" alt="<?php the_title(); ?>" /></a>
									<?php endif;?>
								</figure>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
								<header class="dt-site-title">
									<h2><a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title(); /*wp_trim_words( get_the_title(), 7, '...' );*/ ?></a></h2>
								</header>
								<div class="dt-site-content">
									<?php $excerpt = get_the_excerpt();
	                                $limit   = "350";
	                                $pad     = "...";

	                                if( strlen( $excerpt ) <= $limit ) {
	                                    echo esc_html( $excerpt );
	                                } else {
	                                $excerpt = substr( $excerpt, 0, $limit ) . $pad;
	                                    echo esc_html( $excerpt );
	                                } ?>
								</div>
								<div class="dt-post-meta">
									<?php 
										if( get_theme_mod('display_post_comments', 1 ) ){
											if(! post_password_required() && ( post_password_required() || comments_open() ) ) : ?>
												<span class="dt-post-comment "><i class="da icon-Comment-Icon da-xl"></i><?php comments_popup_link( __( 'Comment', 'tierone' ), '1', '%'); ?></span>
										<?php endif; 
										}
									?>
									<span class="dt-post-view"><a href="<?php esc_url( get_category_link( $category ) ); ?>"><?php _e('<i class="da icon-View-Icon da-xl"></i>','tierone')?></a></span>
								</div><!--dt-post-meta-->
								<div class="pull-right">
									<a href="<?php echo esc_url( the_permalink() ); ?>"  title="<?php the_title_attribute(); ?>" class="dt-sidebar-tagslink"><?php _e('Read','tierone'); ?></a>
								</div>
							</div>
							<span class="clearfix"></span>
						</div><!--.dt-other-cat-->
						<?php
						endwhile;
					else : ?>
					<p><?php _e('Sorry, no posts found in selected category','tierone'); ?></p>
				<?php
					endif;
				?>
			</div>
		<?php
	}

	public function form($instance){
        $instance = wp_parse_args(
            (array) $instance, array(
                'title'          	 => '',
                'post_type'          => '',
                'category'           => '',
                'no_of_post'         => '2',
                'random_posts'       => ''
            )
        );

        ?>
        <div class="dt-tierone-layout-5">
        	<div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id('title')?>"><?php _e('Title:','tierone');?></label>
        		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" >
        	</div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category', 'tierone' ); ?></label>
                <select id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">

                    <?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
                        <option <?php selected( $instance['category'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                    <?php } ?>
                </select>
            </div><!-- .dt-admin-input-wrap -->  
            <div class="dt-admin-input-wrap">
        		<label for="<?php echo $this->get_field_id('random_posts')?>"><?php _e('Random Posts:','tierone');?></label>
        		<input type="checkbox" <?php checked( $instance[ 'random_posts' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" />
            </div><!-- .dt-admin-input-wrap -->

        </div>
      	<?php
	}

	public function update($new_instance,$old_instance){
        $instance                = $old_instance;
        $instance['title']       = strip_tags( stripslashes( $new_instance['title'] ) );
        $instance['category']    = $new_instance['category'];
        $instance['random_posts']    = $new_instance['random_posts'];
        return $instance;
	}
}


function tierone_register_widgets(){
	register_widget('tierone_social_media');
	register_widget('tierone_meta_box');
	register_widget('tierone_custom_box');
	register_widget('tierone_ads_300x250');
	register_widget('tierone_ads_727x90');
	register_widget('tierone_banner_promo_ads');
	register_widget('tierone_ticker');
	register_widget('tierone_slider');
	register_widget('tierone_popular_post');
	register_widget('tierone_landing_page');
	register_widget('tierone_tabbed_widget');
	register_widget('tierone_youtube');
	register_widget('tierone_layout1');
	register_widget('tierone_layout2');
	register_widget('tierone_layout3');
	register_widget('tierone_layout4');
	register_widget('tierone_layout5');
}

add_action('widgets_init','tierone_register_widgets');