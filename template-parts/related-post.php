<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;
/**
* Related Post
*/

$delta_post_per_page = 4;

$args = array(
	'category__in' => wp_get_post_categories( $post->ID ),
	'post__not_in' => array( $post->ID ),
	'orderby'	   => 'rand',
	'posts_per_page' => $delta_post_per_page,
	'ignore_sticky_posts' => 1
);

$delta_tierone  = get_posts( $args );

?>
<?php if( !empty( $delta_tierone ) ) : ?>

<div class="dt-related-posts">
	<h2 class="related-title"><?php _e( 'Related Post', 'tierone' ); ?></h2>
	<div class="row">
		<?php 
			if( $delta_tierone ) foreach ($delta_tierone as $post) {
			setup_postdata( $post );
		?>
			<div class="col-md-3">
				<div class="related-panel related-default">
					<div class="related-heading">
						<figure>								
							<?php if ( has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'dt-featured-post-medium', array('title' => get_the_title()) ); ?></a>
							<?php } else { ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img  src="<?php echo get_template_directory_uri(); ?>/img/default/dt-featured-post-medium.jpg" alt="<?php the_title(); ?>" /></a>
							<?php } ?>
						</figure>
					</div>
					<div class="related-body">
						<h3><a href="<?php get_permalink(); ?>"  rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					</div>
				</div>
			</div>
		<?php }
			
		?>
	</div>
</div>

<div class="divider"></div>

<?php endif; ?>

<?php wp_reset_postdata(); ?>