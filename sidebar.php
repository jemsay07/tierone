<?php
if ( !defined( 'ABSPATH' ) ) :
 exit; // Exit if accessed directly
endif;

/**
* The sidebar containing the error widget area.
*
*
*@link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
*@package TierOne
*/


if ( ! is_active_sidebar('dt-site-right-sidebar') ){
	return;
}

?>
<div class="dt-sidebar">
	<?php dynamic_sidebar( 'dt-site-right-sidebar' );?>
</div>