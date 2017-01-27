<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* This template is for displaying 404 pages (not found).
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package tierone
*/
?>
<?php get_header(); ?>
	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"> <?php esc_html_e( 'Oops! That page can&rsquo;t be found.','tierone'); ?> </h1>
					</header>
					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'tierone' ); ?></p>
					</div><!--.page-content-->
				</section><!--.not-found-->
				
			</main><!--.site-main-->
		</div><!--#primary-->
	</div><!--.container-->
<?php get_footer(); ?>