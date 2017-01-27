<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;


 get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" itemscope itemtype="http://schema.org/Blog">
					<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) : ?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>

							<?php
						endif;

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<div class="col-lg-4 col-md-4">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>