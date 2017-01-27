<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* This Template part for displaying a message posts cannot found.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package tierone
*/
?>

<section class="no-results not-found">

	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'tierone' ); ?></h1>	
	</header><!-- .page-header -->

	<div class="page-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'tierone' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tierone' ); ?></p>
			<div class="col-xs-12 col-md-4 site-no-pad"><?php get_search_form(); ?></div>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'tierone' ); ?></p>
			<div class="col-xs-12 col-md-4 site-no-pad"><?php get_search_form(); ?></div>
			
		<?php endif; ?>
		<span class="clearfix"></span>
	</div><!-- .page-content -->
</section><!-- .no-results -->