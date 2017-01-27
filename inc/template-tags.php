<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;


class Excerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // So you can call: my_excerpt('short');
  public static $types = array(
      'daniel-short' => 5,
      'bryan-short' => 15,
      'catstyle2-short' => 8,
      'short' => 25,
      'regular' => 55,
      'long' => 100
    );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length 
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55, $walang_rm = false) {
    Excerpt::$length = $new_length;

    add_filter('excerpt_length', 'Excerpt::new_length');
      
    if ( $walang_rm == false ) {
        add_filter('the_excerpt', function($text) {
            $excerpt = '' . strip_tags($text) . '<a class="moretag " href="'. get_permalink() . '"> ' . wp_kses_post( get_theme_mod( 'read_more_text', 'Read More <i class="fa fa-angle-double-right"></i>' ) ) . '</a>';
            return $excerpt;
        });
    }
    
    remove_filter('the_excerpt', 'wpautop');

    Excerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(Excerpt::$types[Excerpt::$length]) )
      return Excerpt::$types[Excerpt::$length];
    else
      return Excerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

/* https://wordpress.org/support/topic/how-to-remove-the-from-the-excerpt#post-1000123 */
function trim_excerpt($text) {
    /* http://wordpress.stackexchange.com/questions/109358/hellip-appearing-instead-of#answer-114031 */
    return str_replace('[&hellip;]', '', $text);
}
add_filter('get_the_excerpt', 'trim_excerpt');

// An alias to the class
function tierone_excerpt($length = 55, $walang_read_more = false) {
    Excerpt::length($length, $walang_read_more);
}

/*Remove Excerpt*/
function tierone_excerpt_length($more){
    return ' ';
}
add_filter( 'excerpt_more','tierone_excerpt_length' );



function tierone_excerpt_max_charlength($charlength) {
  $excerpt = get_the_excerpt();
  $charlength++;

  if ( mb_strlen( $excerpt ) > $charlength ) {
    $subex = mb_substr( $excerpt, 0, $charlength - 5 );
    $exwords = explode( ' ', $subex );
    $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
    if ( $excut < 0 ) {
      echo mb_substr( $subex, 0, $excut );
    } else {
      echo $subex;
    }
    echo '[...]';
  } else {
    echo $excerpt;
  }
}


// automatically retrieve the first image from posts
function get_first_image($src = null) {
    global $post, $posts;
    $isnot = ($src) ? true : false;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all( '/<img .+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
    $first_img = $matches[1][0]; 
    if ( empty( $first_img ) ) :
        // defines a fallback imaage
        if(!file_exists($first_img)) :
        $first_img = get_template_directory_uri() . "/img/default/default.jpg";
        endif;
    endif;

    return $first_img;
}

/*http://stackoverflow.com/questions/7684771/how-check-if-file-exists-from-the-url#answer-7684862*/
function is_url_exist($url){
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}



if ( ! function_exists( 'tierone_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tierone_posted_on() {
    $time_string = '<time class="entry-date published updated"  itemprop="dateModified" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" itemprop="datePublished" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );

    $posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

    $byline = '<span class="author vcard" itemprop="author"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

    echo '<span class="posted-on">' . $posted_on . '</span> / <span class="byline">' . $byline . '</span>';

}
endif;

/*featured image*/
function tierone_featured_image(){
    if ( post_password_required() || ! has_post_thumbnail() ) {
        return;
    }

   if ( is_singular() ) : 
        if ( get_theme_mod( 'show_article_featured_image', 1 ) ) { ?>
            <div class="article-featured-image">
                <?php the_post_thumbnail( 'featured-slider' ); ?>
            </div>
        <?php } ?>
    <?php else : ?>
        <div class="article-preview-image">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'featured', array('itemprop' => 'contentUrl') ); ?></a>
        </div>
    <?php endif;
}


/*next post & prev post*/

function tierone_next_prev_link()
{
     if (get_next_post() || get_previous_post()) { ?>
        <nav class="clearfix block">
            <ul class="pagination  page-numbers pull-right">
                <li class="page-item previous"><?php previous_post_link('%link', "&laquo; " . __( 'Previous Post', "tierone")); ?></li>
                <li class="page-item next"><?php next_post_link('%link', __( 'Next Post', "tierone") . " &raquo;"); ?></li>
            </ul>
        </nav>
    <?php } 
}

function tierone_tags(){
    $posttags = get_the_tags();
    if ($posttags) {
        foreach($posttags as $tag) {
            ?><a rel="tags" href="<?php echo get_tag_link($tag->term_id);?>"><span itemprop="keywords"><?php echo $tag->name;?></span></a>, <?php
        }
    }
}


/* https://wordpress.org/support/topic/need-previous_posts_link-next_posts_link-has-title-and-rel */

if ( !function_exists('get_next_posts_link_attributes') ){
  function get_next_posts_link_attributes($attr){
    $attr = 'rel="myrel" title="mytitle"';
    return $attr;
  }
    add_filter('next_posts_link_attributes', 'get_next_posts_link_attributes');
}
if ( !function_exists('get_previous_posts_link_attributes') ){
  function get_previous_posts_link_attributes($attr){
    $attr = 'rel="myrel" title="mytitle"';
    return $attr;
  }
    add_filter('previous_posts_link_attributes', 'get_previous_posts_link_attributes');
}


/**
* Prints HTML with meta information for the categories, tags and comments.
*/
if ( ! function_exists( 'tierone_footer' ) ) :
  function tierone_footer (){
    // Hide pages and tag text for footer.
    if( 'post' == get_post_types() ){

      $cat_list = get_the_category_list( esc_html( ',', 'tierone' ) );
      if ( $cat_list && tierone_cat_zoned() ) {
        printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'tierone' ) . '</span>', $cat_list ); // WPCS: XSS OK.
      }

      /*Translations tag list*/
      $tag_list = tag_list( ' ', esc_html__( ',', 'tierone' ) );
      if( $tag_list ){
        printf( '<span class="tag-links">' . esc_html__( 'Tagged %1$s', 'tierone' ) . '</span>', $tag_list ); // WPCS: XSS OK.
      }

    }

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
      <span class="comments-link">
        <?php comments_popup_link( esc_html( 'Leave a comment', 'tierone' ) , esc_html__( '1 Comment' , 'tierone') , esc_html__( '% Comments', 'tierone' ) ); ?>
      </span>
    <?php endif;

    edit_post_link(
      sprintf( 
        /* transition of current post */
        esc_html( ' Edit Post ' , 'tierone'),
        the_title( '<span class="screen-reader-text">"', '"</span>', false )
      )
    );
  }

endif;

/**
* Return true if the blog is more than 1 category
*/

function tierone_cat_zoned(){
  // Get any existing copy of our transient data
  if ( false === ( $all_the_cat = get_transient( 'tierone_cat' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cat = get_categories( array(
      'fields'      => 'ids',
      'hide_empty'  => 1,
      'number'      => 2,
    ) );

    //count the number of categories that are attached to the posts.
    $all_the_cat = count( $all_the_cat );

    set_transient( 'tierone_cat',  $all_the_cat );
  }
  
  if( $all_the_cat > 1 ){
    return true;
  }else{
    return false;
  }

}
/**
 * Flush out the transients used in tierone_cat_zoned.
 */
function tierone_cat_transient_flusher(){
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  delete_transient( 'tierone_cat' );

}
add_action( 'edit_category', 'tierone_cat_transient_flusher' );
add_action( 'save_post', 'tierone_cat_transient_flusher' );

/**
* Image Sanitize
*/
function if_file_exists($image){
  stream_context_set_default(array('http' => array('method' => 'HEAD')));$headers = get_headers($image, 1);
  return stristr($headers[0], '200');
}

?>