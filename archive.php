<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* Template for displaying archive page
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package tierone
*/
?>

<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="dt-category-wrap">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
							<?php if( have_posts() ) : ?>
								<header class="page-header">
									<?php the_archive_title( '<h1 class="page-title">','</h1>'); ?>
									<?php the_archive_description( '<div class="taxonomy-description">','</div>' ); ?>
								</header><!--.page-header-->
								<?php /* Start Looping */ ?>
								<div class="dt-category-posts ">

									<?php while( have_posts() ) : the_post();?>
										<div class="dt-site-post">
											<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 site-no-pad-l">
												<?php if ( has_post_thumbnail() ) : ?>
													<figure class="dt-site-post-img">
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_post_thumbnail('dt-featured-post-medium', array('title' => get_the_title()) ); ?></a>
													</figure>
												<?php else : ?>
													<figure class="dt-site-post-img">
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/img/default/dt-featured-post-large.jpg"></a>
													</figure>
												<?php endif; ?>
											</div>

											<article class="col-xs-12 col-sm-12 col-md-7 col-lg-7 site-no-pad-r">
												<header class="dt-site-header">
													<?php the_title( sprintf( '<h2 class="dt-site-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
												</header>
												<div class="dt-post-content">
													<?php the_excerpt(); ?>
													<div class="dt-post-meta">
														 <span class="dt-post-comment"><i class="da icon-Comment-Icon da-xl"></i> <?php comments_number( 'No Responses', 'one Response', '% Responses' ); ?></span> 
														<span class="dt-post-view"><a href="<?php esc_url( get_category_link( $category ) ); ?>"><?php _e('<i class="da icon-View-Icon da-xl"></i>','tierone')?></a></span>
													</div>
													<a href="<?php the_permalink(); ?>" class="dt-view-site pull-right" rel="bookmark">Read</a>
												</div>
											</article>
											<span class="clearfix"></span>
										</div>
									<?php endwhile;?>

									<?php wp_reset_postdata(); ?>

									<div class="dt-pagination-nav">
										<?php echo paginate_links(); ?>
									</div><!---- .jw-pagination-nav ---->

								</div>
							<?php else : ?>

								<p><?php _e( 'Sorry, no posts matched your criteria.', 'tierone' ); ?></p>

							<?php endif;?>
							
						</main>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
