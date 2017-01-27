<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* The header of our Theme
*
* This is the template displays the <head> section and everything up until <div id="primary">
*
*@link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
*@package TierOne
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php if( is_active_sidebar('dt-site-meta-box') ) : ?>
			<?php dynamic_sidebar('dt-site-meta-box'); ?>
		<?php endif;?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage" itemprop="mainContentOfPage">
	<?php if ( is_single() ) {
			facebook_javascript_sdk();
		}
	?>
	<div class="main_wrap ">
		<header id="masthead" class="dt-site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
			<div id="top-header">
				<div class="container">
					<div class="col-md-5">
						<div class="dt-site-logo">
							<?php
							if ( function_exists( 'get_custom_logo' ) && has_custom_logo() ) :
								tierone_custom_logo( );
							else :
								?>
								<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $description; ?></p>
								<?php endif; ?>								

							<?php endif; ?>
						</div>
					</div>
					<?php if ( is_active_sidebar( 'dt-site-ads' ) ) : ?>
					<div class="col-xs-12 col-md-7">
						<?php dynamic_sidebar( 'dt-site-ads' ); ?>
					<?php else : ?>
					<div class="col-xs-12 col-md-4 col-md-offset-3">
						<?php echo tierone_search_form(); ?>
					<?php endif; ?>
					</div><!--custom-search-form-->
				</div>
			</div>
			<nav class="navbar navbar-t1-blue"  itemscope itemtype='http://schema.org/SiteNavigationElement'>
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#cNavbar">
							<span class="sr-only"><?php _e('Navigation', 'tierone'); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div id="cNavbar" class="navbar-collapse collapse">
						<?php
							if ( has_nav_menu('primary-menu') ):
								tierone_display_menu();
							endif;
						?>
					</div>
				</div>
			</nav>	
		</header>

		<?php if ( ! is_front_page() && ! is_home() ) : ?>
			<div  class="breadcrumb-list">
				<div class="container">
					<?php echo  custom_breadcrumbs(); ?>
				</div>
			</div>
		<?php endif; ?>
