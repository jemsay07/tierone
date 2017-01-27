<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* Template Name: Front Page
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package tierone
*/
?>
<?php get_header();?>

<?php if( 'page' == get_option( 'show_on_front' ) ) : ?>
	<div class="container">
 		<?php if ( is_active_sidebar( 'dt-site-ticker' ) ) : ?>
			<?php dynamic_sidebar( 'dt-site-ticker' ); ?>
		<?php endif; ?> 

		<?php if ( is_active_sidebar( 'dt-site-carousel' ) ) : ?>
			<?php dynamic_sidebar( 'dt-site-carousel' ); ?>
		<?php endif; ?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<?php if ( is_active_sidebar( 'dt-site-tierone-section' ) ) : ?>
					<?php dynamic_sidebar( 'dt-site-tierone-section' ); ?>
				<?php else : ?>
					<div id="primary" class="dt-content-area">
						<main id="main" class="dt-site-main">
							<?php
								if ( have_posts() ) :
									if ( is_home() && ! is_front_page() ) : ?>
										<header>
											<h1 class="dt-page-title search-reader-text"><?php single_post_title(); ?></h1>
										</header>
								<?php endif; ?>
								<?php
									// start looping
									while ( have_posts() ) : the_post(); 

									/*
		                             * Include the Post-Format-specific template for the content.
		                             * If you want to override this in a child theme, then include a file
		                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		                             */

										get_template_part( 'template-parts/content', get_post_format() );

									endwhile;

									the_post_navigation();

									else :
										get_template_part( 'template-parts/content', 'none' );
								?>
							<?php endif; ?>
						</main>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<?php get_sidebar();?>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<?php if( have_posts() ) : ?>

						<?php while( have_posts() ) : the_post(); ?>
						
							<div <?php post_class( 'dt-archieve-post' ); ?> >

								<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
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

								<article class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
									<header class="dt-site-header">
										<?php the_title( sprintf( '<h2 class="dt-site-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
									</header>
									<div class="dt-site-content">
										<?php the_excerpt(); ?>
										<a href="<?php the_permalink(); ?>" class="dt-view-site pull-right" rel="bookmark">Read</a>
									</div>
								</article>
								<span class="clearfix"></span>
							</div>
						
						<?php endwhile;?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

				<div class="dt-pagination-nav">
					<?php echo the_posts_pagination(); ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<?php get_sidebar();?>
			</div>
		</div>
	</div> 
<?php endif; ?>

<?php get_footer();?>
