<?php
if ( !defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;

/* custom breadcrumbs */ 

// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumb';
    $home_title         = _('Home');
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
     ?>
     <nav class="breadcrumb" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
     <?php
    // Do not display on the homepage
    if ( !is_front_page() ) :
        ?>
    <!--  // Home page -->
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <meta itemprop="position" content="2" />
                <a href="<?php echo get_home_url(); ?>" itemprop="item" >
                    <?php echo $home_title; ?>
                </a>
            </li>
         <?php  
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
            
            if ( is_day() ) { ?>
                <!-- // Day archive -->
                <!-- // Year link -->
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="2" />
                    <a href="<?php echo get_year_link( get_the_time('Y') ); ?> " title="<?php echo get_the_time('Y'); ?>" itemprop="item" >
                        <?php echo get_the_time('Y'); ?> : Archives
                    </a>
                </li>
                <!-- // Month link -->
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="3" />
                    <a href="<?php echo get_month_link( get_the_time('Y'), get_the_time('m') ); ?> " title="<?php echo get_the_time('M'); ?>" itemprop="item" >
                        <?php echo get_the_time('M'); ?> : Archives 
                    </a>
                </li>

                <?php /* Day display */ ?>

                <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="4" />
                    <?php echo get_the_time('jS') . ' ' . get_the_time('M'); ?> : Archives
                </li>

            <?php } else if ( is_month() ) { ?>

                <?php /* Month Archive */ ?>

                <?php /* Year link */ ?>
                
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="2" />
                    <a href="<?php echo get_year_link( get_the_time('Y') ); ?> " title="<?php echo get_the_time('Y'); ?>" itemprop="item" >
                        <?php echo get_the_time('Y'); ?> : Archives 
                    </a>
                </li>

                <?php /* Month display */ ?>
                <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="3" />
                    <a title="<?php echo get_the_time('M'); ?>" itemprop="item" >
                        <?php echo get_the_time('M'); ?> : Archives 
                    </a>
                </li>

           <?php } else if ( is_year() ) { ?>

                <?php /* Display year archive */ ?>
                <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="2" />
                    <a title="<?php echo get_the_time('Y'); ?>" itemprop="item" >
                        <?php echo get_the_time('Y'); ?> : Archives 
                    </a>
                </li>
                    
            <?php } else { ?>

                <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="2" />
                    <a title="<?php echo post_type_archive_title(); ?>" itemprop="item" >
                        <?php echo get_the_time('Y'); ?> : Archives 
                    </a>
                </li>
                
           <?php }
              
            
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') :
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                ?>

                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="2" />
                    <a href="<?php echo $post_type_archive; ?>" itemprop="item" >
                        <?php echo $post_type_object->labels->name; ?> 
                    </a>
                </li>

            <?php endif; ?>
              
            <?php $custom_tax_name = get_queried_object()->name; ?>

                <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="3" />
                    <a itemprop="item" ><?php echo $custom_tax_name; ?></a>
                </li>                    
        
        <?php } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
            ?>  

                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="3" />
                    <a href="<?php echo $post_type_archive; ?>" itemprop="item" ><?php echo $post_type_object->labels->name; ?></a>
                </li>    
              
            <?php }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = array_values($category);
                $last_category = end($last_category);
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $parents = preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1"><span itemprop="name">$2</span></a>', $parents);
                    $parents = str_replace( '<a', '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                                    <meta itemprop="position" content="2" />
                                                    <a itemprop="item" ', $parents );
                    $parents = str_replace( '</a>', '</a>
                                                    </lie>', $parents );
                    $cat_display .= $parents;
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display; ?>

                <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="3" />
                    <a title="<?php echo get_the_title(); ?>" itemprop="item" ><?php echo get_the_title(); ?></a>
                </li>

            <?php
            // Else if post is in a custom taxonomy
            } else if( !empty( $cat_id ) ) { ?>

                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="3" />
                    <a href="<?php echo $cat_link; ?>" title="<?php echo $cat_name; ?>" itemprop="item" ><?php echo $cat_name; ?></a>
                </li>
                <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="4" />
                    <a title="<?php echo get_the_title(); ?>" itemprop="item" ><?php echo get_the_title(); ?></a>
                </li>

              
           <?php } else { ?>

                <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="3" />
                    <a title="<?php echo get_the_title(); ?>" itemprop="item" ><?php echo get_the_title(); ?></a>
                </li>
                  
           <?php }
              
        } else if ( is_category() ) { ?>

            <!-- // Category page -->
                <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="2" />
                    <a itemprop="item" ><?php echo single_cat_title('', false); ?></a>
                </li>
               
       <?php } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <meta itemprop="position" content="2" />
                                    <a itemprop="item" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '"><span itemprop="name">' . get_the_title($ancestor) . '</span></a>
                                </li>';
                }
                   
                // Display parent pages
                echo $parents;
                ?>   
                <!-- // Current page -->
                    <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="3" />
                        <a itemprop="item" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
                    </li>

                   
        <?php } else { ?>

                <?php /* Just display current page if not parents */ ?>
            
                <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="2" />
                    <a itemprop="item" ><?php echo get_the_title(); ?></a>
                </li>
                   
        <?php   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
            
            /* Display the tag name */ ?>
        
            <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <meta itemprop="position" content="2" />
                <a itemprop="item" ><?php echo $get_term_name; ?></a>
            </li>

        <?php } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
        ?>
            <?php /* Display author name */ ?>
            <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <meta itemprop="position" content="2" />
                <a itemprop="item" title="<?php echo $userdata->display_name; ?>">Author : <?php echo $userdata->display_name; ?></a>
            </li>
        <?php } else if ( get_query_var('paged') ) { ?>

            <?php /* Paginated archives */ ?>

            <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <meta itemprop="position" content="2" />
                <a itemprop="item" title="Page <?php echo get_query_var('paged'); ?>">Author : <?php echo __('Page') . ' ' . get_query_var('paged') ; ?></a>
            </li>
               
        <?php } else if ( is_search() ) { ?>
           
            <?php /* Search results page */ ?>

            <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <meta itemprop="position" content="2" />
                <a itemprop="item" title="Search results for : <?php echo get_search_query(); ?>">Search results for : <?php echo get_search_query() ; ?></a>
            </li>

        <?php } elseif ( is_404() ) { ?>
        
            <?php /* 404 page */ ?>

            <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <meta itemprop="position" content="2" />
                <a itemprop="item" >Error 404</a>
            </li>
        <?php }
    endif;
   ?>
   </nav>
   <?php
       
}