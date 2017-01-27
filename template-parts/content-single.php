<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* This Template for displaying single post
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package tierone
*/
?>
<article id="post-<?php the_ID();?>" <?php post_class();?> itemscope itemtype="http://schema.org/Article">
	<link itemprop="mainEntityOfPage" href="<?php echo esc_url( get_permalink() );?>" />
	<header class="entry-header">
        <meta itemprop="author" content="<?php the_author();?>">
        <meta itemprop="datePublished" content="<?php the_time('c'); ?> ">
        <meta itemprop="dateModified" content="<?php the_modified_time('c'); ?>">
        <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
            <?php $logo = get_theme_mod( 'site_logo', '' ); 
            if ( !empty($logo) ) : ?>
            <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                <meta itemprop="url" content="<?php echo esc_url( $logo ); ?>">
            </span>
            <?php endif; ?>
            <meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
        </span>
        <?php 
            global $lang_support;
            $lang = get_theme_mod( 'force_locale', 'en' );
        ?>
        <meta itemprop="inLanguage" content="<?php echo $lang_support['html'][$lang]; ?>">
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php tierone_posted_on(); ?>
		</div>
	</header><!--.entry-header-->
	<div class="entry-content" itemprop="articleBody">
        <figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject">

            <?php if (has_post_thumbnail() ) { ?>
            <meta itemprop="url" content="<?php the_post_thumbnail_url(); ?>">
            <?php
                $file = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); 
                if (if_file_exists($file)) :
                    list($width, $height, $type, $attr) = getimagesize($file);  ?>
                    <meta itemprop="width" content="<?php echo $width; ?>">
                    <meta itemprop="height" content="<?php echo $height; ?>">
                <?php endif; ?>
            <?php } else { ?>
            <meta itemprop="url" content="<?php echo get_first_image(); ?>">
            <?php
                $file = get_first_image(); 
                if (if_file_exists($file)) :
                    list($width, $height, $type, $attr) = getimagesize($file);  ?>
                    <meta itemprop="width" content="<?php echo $width; ?>">
                    <meta itemprop="height" content="<?php echo $height; ?>">
                <?php endif; ?>
            <?php } ?>

        </figure>
		<div itemprop="description">
			<?php the_content(); ?>
		</div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tierone' ),
				'after'  => '</div>',
			) );
		?>
	</div><!--.entry-content-->
	<footer class="entry-footer">
		<?php tierone_footer(); ?>
	</footer><!--.entry-footer-->
</article><!--##Post-->


