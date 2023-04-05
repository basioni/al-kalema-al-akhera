<?php
/*
* These are admin defined styles which are applied to the front end 
* Some scripts have also been used which are applied only when a certain features are turned on by the admin.
* @package Supernova
* @since Supenova 1.0.1
*/

add_action('wp_head', 'supernova_user_css');
function supernova_user_css(){
global $supernova_options; ?>
<style>
<?php if($supernova_options['font-style']!=='default'){ ?>
#content .entry p, #sidebar a, #sidebar p, #sidebar, #sidebar lable, body{font-family: <?php echo $supernova_options['font-style']; ?> !Important;}
<?php }
if($supernova_options['post-para-size']!=='14'){ ?>
#content .entry p{font-size: <?php echo intval($supernova_options['post-para-size'])/10; ?>em !important ;}
<?php }
if(trim($supernova_options['post-para-color'])!=='000000'){ ?>
#content .entry p{color: #<?php echo esc_html($supernova_options['post-para-color']); ?> !Important;}
<?php }
if(trim($supernova_options['post-heading-color'])!=='525252'){ ?>
.post_title a, .single_heading{color: #<?php echo esc_html($supernova_options['post-heading-color']); ?> !Important;}
<?php }
if($supernova_options['post-heading-size']!=='25'){ ?>
.post_title{font-size: <?php echo intval($supernova_options['post-heading-size'])/10; ?>em !important ;}
<?php }
if($supernova_options['site-heading-size']!=='30'){ ?>
#header_title h1{font-size: <?php echo intval($supernova_options['site-heading-size'])/10; ?>em !important ;}
<?php }
if($supernova_options['site-desc-size'] !=='14'){ ?>
#header_title p{font-size: <?php echo intval($supernova_options['site-desc-size'])/10; ?>em !important ;}
<?php }
if($supernova_options['sidebar-heading-size']!=='23'){ ?>
#sidebar .widget h2{font-size: <?php echo intval($supernova_options['sidebar-heading-size'])/10; ?>em !important ;}
<?php }
if($supernova_options['sidebar-width']){ ?>
#sidebar{width: <?php echo intval($supernova_options['sidebar-width']-2); ?>%!Important;}
<?php }
if($supernova_options['layout-width']){ ?>
#wrapper, #footer, #top_most{width: <?php echo esc_html(intval($supernova_options['layout-width'])); ?>px;}
<?php }
if($supernova_options['content-width']){ ?>
#content{width: <?php echo intval($supernova_options['content-width']-3); ?>% !Important;}
<?php }
if($supernova_options['sidebar-pos']==1){ ?>
#sidebar{float:right !important; margin-right:5% !important;}
#content{float:right !important; margin-right:0% !important;}
<?php }
if(supernova_options('disable-search')==1){ ?>
#nav {max-width:100% !important;}
<?php }
if(supernova_options('disable-categories')==1){ ?>
.header_nav{max-width:90%;padding-bottom: 5px;} .top_search_box {left: -187px;}
<?php } 
if(supernova_options('footer-color')!=='FFFFFF'){ ?> 
#footer_wrapper, #footer, #lower_footer{background:#<?php echo esc_html(supernova_options('footer-color')); ?>;}
<?php } 
if(trim(supernova_options('footer-bg'))!==''){ ?> 
#footer_wrapper, #footer, #lower_footer{background:url('<?php echo esc_url(supernova_options('footer-bg')); ?>');}
<?php }
if(supernova_options('footertext-color')!=='CCCCCC'){ ?>
#footer #footer_left_part span, #footer #footer_left_part a, #footer	.widget, #footer a, #footer p, #footer pre, #footer span, #footer i, #footer a.rsswidget{color:#<?php echo esc_html(supernova_options('footertext-color')); ?> !important;}	
<?php }
if(supernova_options('footerheading-color')!=='FFFFFF'){ ?>
#footer .widget h2{color:#<?php echo esc_html(supernova_options('footerheading-color')); ?> !important;}	
<?php }
if(supernova_options('sidebar-heading-color')!=='FFFFFF'){ ?>
#sidebar .widget h2{color:#<?php echo esc_html(supernova_options('sidebar-heading-color')); ?> !important;}	
<?php }
if(supernova_options('nosidebar-home') && is_front_page()){ ?>
#sidebar{display:none;}#wrapper #content{width:100%!important; margin-right:0;} #supernova_slider img {height: 350px;} .featured_content{top:210px;}
#supernova_slider_wrapper {margin-bottom:100px;}
<?php }
if(supernova_options('icon-color')=='2'){ ?>
#footer .facebook_b{background-position:0 0}#footer .twitter_b{background-position:-32px 0}#footer .google_b{background-position:-64px 0}#footer .stumble_b{background-position:-96px 0}#footer .rss_b{background-position:-128px 0}#footer .youtube_b{background-position:-160px 0}
<?php } 
$background_color = get_background_color(); $background_image= get_background_image();
if($background_color=='ffffff' || !$background_color  && !$background_image){ ?>
.main_content{border:none;}
<?php } ?>
</style>
<?php }

//Adds script for the sticky navigation, its important to add or remove it when the main script is removed or else it may creates conflicts
add_action('wp_footer','supernova_custom_footer_js');
function supernova_custom_footer_js(){
global $supernova_options;
if(!supernova_options('disable-resizer') && is_single() ){ ?>
<script>
    var c = document.getElementById("entry"); function resizeText(multiplier) { if (c.style.fontSize === "") { c.style.fontSize = "1.0em"; } c.style.fontSize = parseFloat(c.style.fontSize) + (multiplier * 0.2) + "em"; }
</script>
<?php } 

/*
* @package Supernova
* @since Supenova 1.0.4
*/
if(!supernova_options('disable-slider') && is_home() || is_page_template( 'page-templates/slider-temp.php' ) || is_page_template( 'page-templates/slider-nosidebar.php') ){ ?>
  <script type="text/javascript">
    jQuery(window).load(function(){
      jQuery('.flexslider').flexslider({
        animation: "<?php if($supernova_options['fade-slider']=='fade'){echo "fade"; }else{ echo "slide"; } ?>" ,
        start: function(slider){
          jQuery('body').removeClass('loading');
        }});});
  </script>
<?php } }

/*
 * @package Supernova
 * @since Supernova 1.3.0
 */

add_action('wp_head', 'supernova_single_post_css');
function supernova_single_post_css(){
    $post_id = get_the_ID() ;
    $custom_css = get_post_meta( $post_id, 'post-style', true );        
    if(isset($custom_css)){
        echo $custom_css;  
    }
    echo '<i style="display:none"> total_views = '.get_post_meta(get_the_ID(), 'supernova_post_views_count', true).'</i>'; // Only for testing
}