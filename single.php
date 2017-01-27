<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* Template for displaying the Single page
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package tierone
*/

get_header(); ?>

<div class="dt-single-page">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<main id="main" class="site-main" role="main">
					<?php while ( have_posts() ) : the_post(); //looping ?>
						
						<?php get_template_part( 'template-parts/content-single', 'page' ); ?>	
						
						<?php tierone_next_prev_link(); /* Next and Prev */ ?>
						<div class="divider"></div>
						<!--.Social Sharing-->
						<?php if( get_theme_mod( 'tierone_share_social_media_setting', 0 ) == 1 ) : ?>

								<?php get_template_part('template-parts/social-sharing'); ?>

						<?php endif;?>

						<div class="divider"></div>
						<!--.Related Post-->
						<?php if( get_theme_mod( 'tierone_related_posts_setting', 0 ) == 1 ) : ?>

							<?php get_template_part('template-parts/related-post'); ?>

						<?php endif;?>

						<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5" data-width="100%"></div>

						<?php
							/*Comments*/
							if( comments_open() || get_comment_number() ){
								comments_template( '', true ); // comments
							}
						?>
						
					<?php endwhile; ?>
				</main>
			</div>
			<div class="col-lg-4 col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>