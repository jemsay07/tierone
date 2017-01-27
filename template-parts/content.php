<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* Template part for displaying posts.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package tierone
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost" >
	<header class="entry-header" itemprop="headline">
		<?php the_title( sprintf( '<h1 class="dt-site-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if( 'post' == get_post_type() ) : ?>
			<?php tierone_posted_on(); ?>
		<?php endif; ?>

	</header> <!--Header-->
	<div class="entry-content">
		<?php the_content( sprintf(
			/* translators: %s: Name of current post */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'tierone' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tierone' ),
				'after'  => '</div>',
			) );
		?>
	</div> <!--entry-content-->
	<footer>
		<?php echo tierone_footer(); ?>
	</footer>
</article>