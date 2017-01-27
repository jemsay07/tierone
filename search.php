<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* The template for displaying search result pages.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
*
* @package tierone
*/
get_header();

?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-lg-8">
			<section id="primary" class="content-area search">
				<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
					<?php if( have_posts() ) : ?>
						
						<header class="entry-header">
							<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'tierone' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header>
						<?php /* Start the Loop */ ?>
						<?php while( have_posts() ) : the_post(); ?>

							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );
							?>
						<?php endwhile;?>

						<div class=" dt-pagination-nav">
							<?php the_posts_navigation(); ?>
						</div>

					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>
				</main>
			</section>
		</div>
		<div class="col-lg-4 col-md-4">
			<?php get_sidebar(); ?>
		</div>	
	</div>
</div>
<?php get_footer();?>