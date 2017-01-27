<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* This Template display result for search
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package tierone
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class();?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class=" entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php tierone_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif;?>
	</header><!-- .entry-header -->
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php tierone_footer(); ?>
	</footer><!-- .entry-footer -->

</article>