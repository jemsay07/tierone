<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* Template part of displaying page content in page.php
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package tierone
*/
?>

<article id="post-<?php the_ID();?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="page-entry-header" itemprop="headline">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header>
	<div class="entry-content" itemprop="text">

		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tierone' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-content">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'tierone' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer>

</article>