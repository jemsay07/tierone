<?php 
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* The Template for displaying for footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package tierone
*/
?>

		<footer class="dt-footer">
			<?php if( is_active_sidebar('dt-footer-a') || is_active_sidebar('dt-footer-b') || is_active_sidebar('dt-footer-c') || is_active_sidebar('dt-footer-d') ) : ?>
				<div class="container">
					<div class="dt-footer-cont row">
						<div class="col-xs-12 col-sm-12 col-md-3">
							<?php dynamic_sidebar('dt-footer-a'); ?>
						</div><!--dt-footer-a-->
						<div class="col-xs-12 col-sm-12 col-md-3">
							<?php dynamic_sidebar('dt-footer-b'); ?>
						</div><!--dt-footer-b-->
						<div class="col-xs-12 col-sm-12 col-md-3">
							<?php dynamic_sidebar('dt-footer-c'); ?>
						</div><!--dt-footer-c-->
						<div class="col-xs-12 col-sm-12 col-md-3">
							<?php dynamic_sidebar('dt-footer-d'); ?>
						</div><!--dt-footer-d-->
					</div><!--.dt-footer-cont-->
				</div><!--.container-->
			<?php endif; ?>
			<div class="dt-footer-bar">
				<div class="container">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<!--<a href="#!"><img src="<?php echo get_template_directory_uri(); ?>/img/logo/tierone-footer-logo.png"></a>-->
					</div><!--.col-->
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="Copyright">
							<span>2016 All Right Reserved</span>
						</div><!--.Copyright-->
					</div><!--.col-->
				</div><!--.container-->
			</div><!--.dt-footer-bar-->
		</footer><!--.dt-footer-->
		<a id="back-to-top"><i class="fa fa-angle-up"></i></a><!-- #back-to-top -->
	</div><!--.main_wrap-->
	<?php require get_stylesheet_directory() . '/inc/download-app.php';?>
	<?php wp_footer(); ?>
	<?php if( is_active_sidebar('dt-site-box') ) : ?>

		<?php dynamic_sidebar('dt-site-box'); ?>
	
	<?php endif;?>
	</body>
</html>