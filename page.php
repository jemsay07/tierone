<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* This Template will display all pages.
* 
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package tierone
*/

get_header();?>
<div class="dt-default-page">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<main id="main" class="site-main" role="main">

					<?php while( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php
							/*Comments*/
							if ( comments_open() || get_comments_number() ) :
									comments_template();
							endif;
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