<?php 
/* 
 * Gets the list of pages in select
 * @param $supernova_page_type
 * @param $supernova_pagelist_settings
 * @param $supernova_pagelist_options
 * Example: supernova_page_list('page', 'supernova_settings[featured_item_page_id'.$i.']', $supernova_options['featured_item_page_id'.$i]);
*/

function supernova_page_list($supernova_page_type, $supernova_pagelist_settings, $supernova_pagelist_options){
	global $wpdb;
	$page_results= $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type='$supernova_page_type' AND post_status='publish'  ORDER BY menu_order", 'OBJECT');		
	?>
	<select name="<?php echo $supernova_pagelist_settings ?>">
		<option value="<?php echo $supernova_pagelist_options; ?>"><?php if(trim($supernova_pagelist_options)){ echo get_the_title($supernova_pagelist_options);}else{ echo "------select ".$supernova_page_type."------";} ?></option>
                <option value=""><?php if(trim($supernova_pagelist_options)=='blank'){ echo '';} ?></option>
                <?php if ( $page_results ) : foreach ( $page_results as $pages ) : ?>
                        <option value="<?php echo $pages->ID; ?>">
                        <?php echo supernova_chopper($pages->post_title, 40);?>	
                        </option>
        <?php endforeach; endif; ?>
        </select>             
	<?php
	}

/*
 *Cuts off any string 
 *@param $string
 *@return $string
*/
function supernova_chopper($string, $limit){
	$string = (strlen($string) > $limit) ? substr($string,0,$limit).'...' : $string;
	return $string;
	}	

/* 
 * Returns script for the slider bar in admin
 * @param $slider_class
 * @param $result_class
 * @param $hidden_id
 * @param $slider_bar_value
 * @param $slider_default
 * @param $min_value 
 * @param $max_value
*/

function supernova_slider_bar_settings($slider_class, $result_class, $hidden_id, $slider_bar_value, $slider_default, $min_value, $max_value){
	?>
	<script>
        jQuery( ".<?php echo $slider_class; ?>" ).slider({
                animate: true,
                range: "min",
                value: <?php if($slider_bar_value){ echo $slider_bar_value;}else{echo $slider_default;} ?>,
                min: <?php echo $min_value; ?>,
                max: <?php echo $max_value; ?>,
                step: 1,				
                slide: function( event, ui ) {
                        jQuery( ".<?php echo $result_class; ?>" ).html( ui.value );
                },
                change: function(event, ui) { 
                jQuery('#<?php echo $hidden_id; ?>').attr('value', ui.value);
                }			
                });	
	</script>                
	<?php }
	
//Reminds user to update their version
function supernova_version_notice(){
    global $wp_version;
    if ( $wp_version < 3.5) {
            echo '<p id="message" class="supernova_version_notice">'.__('This theme works best on the latest version of wordpress, some features might not work properly on this version, please update you wordpress!!', 'Supernova').'</p>';
            }
	}
	
//For thumbnail
function supernova_thumbnail(){
	if (has_post_thumbnail()){
	return the_post_thumbnail('thumbnail');
		};
	}
 
//Header title image
function supernova_title_image(){
	    $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
	<a href="<?php echo esc_url( home_url() ); ?>"><img class="site-logo" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a>
    	<?php endif; 
	}
	
/*Function for displaying Ad
* @param $id
* returns Ad Code
* @since version 1.1.0
*/
function supernova_display_ad($id){
	global $supernova_options;
if(supernova_options(''.$id.'')){ ?>
        <section class="<?php echo $id; ?>">
            <div class="<?php echo $id; ?>-inner"><?php echo $supernova_options[''.$id.''];?></div>
        </section>        
        <?php }
	}
        
function supernova_ajax_main_button(){
    global $wp_query, $supernova_options;
    $total_pages = $wp_query->max_num_pages;
    $posts_per_page = get_option('posts_per_page');
    if($total_pages == 1 || supernova_options('ajax-postloader') ){return false;}else{
    echo '<button class="supernova_load_more_main '.$total_pages.' button '.$posts_per_page.'">'.__('Load More', 'Supernova').'</button><img class="main_loader" src="'.SUPERNOVA_ROOT_ADMIN.'/images/loader.gif">';
        }
}

function supernova_ajax_tabs(){
    global $supernova_options;
    $tabs = '';
    $rec_text = (isset($supernova_options['rec-text'])) ? esc_attr($supernova_options['rec-text']): 'Recommended';    
    if(!supernova_options('rec-tab')){
    $tabs .= '<div id="tabs">';
    $tabs .= '<div class="tab_current" id="tab_one">'.esc_attr($supernova_options["latest-blog"]).'</div>';
    $tabs .= '<div id="tab_two">Popular Posts</div>';
    $tabs .=  '<div id="tab_three">'.$rec_text.'</div>';
    $tabs .=  '</div>';
     echo $tabs;
        }
}