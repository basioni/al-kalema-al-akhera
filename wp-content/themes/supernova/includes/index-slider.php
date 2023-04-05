<?php
/**
 * Template for displaying slider on home page
 *
 * @package Supernova
 * @since Supenova 1.0.4
 * @license GPL 2.0
 */

global $supernova_options, $paged;

if($paged==0 && !supernova_options('disable-slider')): ?>
<div id="supernova_slider_wrapper">
    <div class="flexslider">
          <ul class="slides">
            <?php for($i=1; $i<=8; $i++){
                        $post_id  = trim(intval($supernova_options['fat'.$i]));
                        $slider_image = esc_url(trim($supernova_options['slider'.$i]));
						                        
                    if(!$post_id && !$slider_image){ break; } ?> 
                <li>                	
                    <div class="featured_item"> 
                    <?php if($post_id){ ?>
                        <div class="featured_content">
                            	<a href="<?php echo get_permalink($post_id); ?>">
                               <?php echo  "<h3>".supernova_chopper(get_the_title($post_id), 48)."</h3>";
									 if(!supernova_options('disable-slider-date')){ 
									 echo "<p>" . get_the_time('F jS, Y', $post_id). "</p>"; } ?>
                                </a>
                       </div><!--featured content -->
                        <?php } 
                      		if($slider_image){ ?>
                        <img src="<?php echo $slider_image;  ?>" alt="" />
                        <?php }else{ ?>
                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post_id)); ?>" alt="" />
                    </div><!--featured_item -->
                    <?php } ?>
                </li>
           <?php } //for loop ENDS ?>
          </ul>
    </div> <!--flexslider -->
</div><!--slider_wrapper ENDS -->
<?php endif; ?>
      
      