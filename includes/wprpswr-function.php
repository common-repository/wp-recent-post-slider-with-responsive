<?php
/**
 * Plugin generic functions file
 *
 * @package WP Recent Post Slider with Responsive
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Function to get plugin image sizes array
 * 
 * @package WP Recent Post Slider with Responsive
 * @since 1.2.2
 */
function wprpswr_get_unique() {
  static $unique = 0;
  $unique++;
  return $unique;
}

/**
 * Function to get Taxonomies list 
 * 
 * @package WP Recent Post Slider with Responsive Pro
 * @since 1.3.3
 */
function wprpswr_get_category_list( $post_id = 0, $taxonomy = '' ) {
    $output = '';
    $terms  = get_the_terms( $post_id, $taxonomy );
    if( $terms && !is_wp_error($terms) && !empty($taxonomy) ) {
        $output .= '<ul class="post-categories wprpswr-post-categories">';
        foreach ( $terms as $term ) {
             $output .= '<li><a href="'.get_term_link($term).'" rel="'.$taxonomy.'"> '.$term->name.' </a></li>';
        }
        $output .= '</ul>';
    }
    return $output;
}
/**
 * Function to get shortcode designs
 * 
 * @package WP Recent Post Slider with Responsive
 * @since 1.2.5
 */
function wprpswr_slider_designs() {
    $design_arr = array(
        'design-1'  	=> __('Design 1', 'wp-recent-post-slider-with-responsive'),
        'design-2'  	=> __('Design 2', 'wp-recent-post-slider-with-responsive'),
        'design-3'  	=> __('Design 3', 'wp-recent-post-slider-with-responsive'),
        'design-4' 		=> __('Design 4', 'wp-recent-post-slider-with-responsive'),              
	);
	return apply_filters('wprpswr_slider_designs', $design_arr );
}

/**
 * Function to add array after specific key
 * 
 * @package WP Recent Post Slider with Responsive
 * @since 1.2.5
 */
function wprpswr_add_array(&$array, $value, $index, $from_last = false) {
    
    if( is_array($array) && is_array($value) ) {
        if( $from_last ) {
            $total_count    = count($array);
            $index     = (!empty($total_count) && ($total_count > $index)) ? ($total_count-$index): $index;
        }        
            $split_arr  = array_splice($array, max(0, $index));
            $array      = array_merge( $array, $value, $split_arr);
    }    
    return $array;
}

/**
 * Function to post featured image
 * 
 * @package WP Recent Post Slider with Responsive
 * @since 1.2.5
 */
function wprpswr_get_post_featured_image( $post_id = '', $size = 'full') {
    $size   = !empty($size) ? $size : 'full';
    $image  = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );

    if( !empty($image) ) {
        $image = isset($image[0]) ? $image[0] : '';
    }
    return $image;
}

// Manage Category Shortcode Columns

add_filter("manage_category_custom_column", 'wprpswr_category_columns' , 10, 3);
add_filter("manage_edit-category_columns", 'wprpswr_category_manage_columns'); 
function wprpswr_category_manage_columns($columns) {
   $new_columns['wpoh_shortcode'] = __( 'Category ID', 'wp-recent-post-slider-with-responsive' );
		$columns = wprpswr_add_array( $columns, $new_columns, 2 );
		return $columns;
}
function wprpswr_category_columns($ouput, $column_name, $tax_id) {
	if( $column_name == 'wpoh_shortcode' ) {
			$ouput .= $tax_id;			
	    }		
	    return $ouput;
}
// Manage conetnt limit

function wprpswr_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}